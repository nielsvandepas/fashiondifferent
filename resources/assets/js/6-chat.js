var chatVue;
var chatPoller;
var chatInterval = 1000;

function chatInit( fetchUrl, postUrl, id ) {
	chatVue = new Vue( {
		el: '#chat-container',

		data: {
			messages: [],
			newMessage: '',
			id: 0,
			sinceId: 0
		},

		methods: {
			sendMessage: function () {
				if ( this.newMessage == '' )
					return;

				clearInterval( chatPoller );
				this.$http.post( postUrl, { body: this.newMessage } );
				this.newMessage = '';
				chatPoller = setInterval( chatVue.fetchMessages, chatInterval );
			},

			fetchMessages: function () {
				this.$http.get( fetchUrl + '?since=' + this.sinceId ).then( chatAjax );
			}
		},

		created: function () {
			this.id = id;
		}
	} );

	chatPoller = setInterval( chatVue.fetchMessages, chatInterval );
}

function chatAjax( response ) {
	var data = response.data;

	for ( var key in data )
	{
		if ( !data.hasOwnProperty( key ) )
			continue;

		var message = data[ key ];

		var messageClass = '';
		if ( message.from_id == chatVue.id )
			messageClass = 'chat-left';
		else
			messageClass = 'chat-right';

		relevantMessage = {
			body: message.body,
			class: messageClass,
		};

		chatVue.messages.push( relevantMessage );

		chatVue.sinceId = message.id;
	}
}