var wardrobeVue;

function wardrobeInit() {
	wardrobeVue = new Vue( {
		el: '#wardrobe-container',

		data: {
			list: [],
			direction: false,
			index: 9,
			element: {},
			previousElement: {},
			nextElement: {},
			counter: 0
		},

		computed: {
			shouldFetch: function () {
				if ( Math.abs( this.counter ) >= 8) {
					this.counter = 0;
					return true;
				}
				else
					return false;
			}
		},

		methods: {
			previous: function () {
				this.direction = false;
				this.index--;
				this.moveElements();
				this.counter--;
				this.checkAndFetch();
			},

			next: function () {
				this.direction = true;
				this.index++;
				this.moveElements();
				this.counter++;
				this.checkAndFetch();
			},

			moveElements: function () {
				this.element = this.list[ this.index ];
				this.previousElement = this.list[ this.index - 1 ];
				this.nextElement = this.list[ this.index + 1 ];
			},

			checkAndFetch: function () {
				if (this.shouldFetch)
					this.fetchElements();
			},

			fetchElements: function() {
				this.$http.get( wardrobeUrl ).then( wardrobeAjax );
			}
		},

		created: function () {
			this.$http.get( wardrobeUrl ).then( function ( response ) {
				wardrobeAjaxInit( response, false );
			} );

			this.$http.get( wardrobeUrl ).then( function ( response ) {
				wardrobeAjaxInit( response, true )
			} );
		}
	} );
}

function wardrobeAjaxInit( response, move ) {
	var data = response.data;

	for ( var key in data ) {
		if ( !data.hasOwnProperty( key ) )
			continue;

		var element = data[ key ];

		var relevantElement = {
			name: element.name,
			url: scheme + domain + elementBase + element.id,
			image: scheme + domain + '/uploads/element-images/cropsized/' + element.image
		};

		wardrobeVue.list.push( relevantElement );
	}

	if ( move )
		wardrobeVue.moveElements();
}

function wardrobeAjax( response ) {
	var data = response.data;

	for ( var key in data ) {
		if ( !data.hasOwnProperty( key ) )
			continue;

		var element = data[ key ];

		var relevantElement = {
			name: element.name,
			url: scheme + domain + elementBase + element.id,
			image: scheme + domain + '/uploads/element-images/cropsized/' + element.image
		};

		if ( this.direction )
			this.list.push( relevantElement );
		else {
			this.list.unshift( relevantElement );
			this.index++;
			this.moveElements();
		}
	}
}