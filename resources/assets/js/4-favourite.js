var favouriteVue;

function favouriteInit( url ) {
	favouriteVue = new Vue( {
		el: '#favourite-button',

		data: {
			isFavourite: false
		},

		computed: {
			class: function () {
				if ( this.isFavourite )
					return [ 'favourite' ];
				else
					return [ 'unfavourite' ];
			},

			text: function () {
				if ( this.isFavourite )
					return 'favourited';
				else
					return 'not favoured';
			}
		},

		methods: {
			toggleFavourite: function () {
				if ( this.isFavourite )
					this.unfavourite();
				else
					this.favourite();
			},

			favourite: function () {
				this.$http.post( url, {} );
				this.isFavourite = true;
			},

			unfavourite: function () {
				this.$http.delete( url );
				this.isFavourite = false;
			}
		},

		created: function () {
			this.$http.get( url).then( function ( response ) {
				this.isFavourite = response.data;
			} );
		}
	} );
}