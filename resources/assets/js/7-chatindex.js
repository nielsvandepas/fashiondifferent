var chatIndexVue;
var chatIndexPoller;
var chatIndexInterval = 2000;

function chatIndexInit( url ) {
	chatIndexVue = new Vue( {
		el: '#chat-list-container',

		data: {
			chats: []
		},

		methods: {
			fetchIndex: function () {
				this.$http.get( url ).then( chatIndexAjax );
			}
		},

		created: function () {
			this.fetchIndex();
			chatIndexPoller = setInterval( this.fetchIndex, chatIndexInterval );
		}
	} );
}

function chatIndexAjax( response ) {
	var data = response.data;

	var newIndex = [];

	for ( var key in data ) {
		if ( !data.hasOwnProperty( key ) )
			continue;

		var chat = data[ key ];
		chat.user.image = profileImage( chat.user );

		newIndex.push( chat );
	}

	chatIndexVue.chats = newIndex;
}