var commentVue;
var commentPoller;
var commentInterval = 5000;

function commentInit( url, user ) {
	commentVue = new Vue( {
		el: '#comment-container',

		data: {
			message: '',
			comments: [],
			sinceId: 0,
			user: {}
		},

		methods: {
			fetchComments: function () {
				this.$http.get( url + '?since=' + this.sinceId ).then( commentAjax );
			},

			submitComment: function () {
				this.$http.post( url, { body: this.message } );

				this.message = '';

				jumpTo( 'comment-top' );
			}
		},

		created: function () {
			this.user = JSON.parse( user );
			this.fetchComments();
			commentPoller = setInterval( this.fetchComments, commentInterval );
		}
	} );
}

function commentInitGuest( url ) {
	commentVue = new Vue( {
		el: '#comment-container',

		data: {
			comments: [],
			sinceId: 0
		},

		methods: {
			fetchComments: function () {
				this.$http.get( url + '?since=' + this.sinceId ).then( commentAjax );
			}
		},

		created: function () {
			this.fetchComments();
			commentPoller = setInterval( this.fetchComments, commentInterval );
		}
	} );
}

function commentAjax( response ) {
	var data = response.data;

	for ( var key in data )
	{
		if ( !data.hasOwnProperty( key ) )
			continue;

		var comment = data[ key ];

		var newComment = {
			body: nlToBr( htmlDecode( comment.body ) ),
			name: comment.user.name,
			image: profileImage( comment.user ),
			url: urlBase + chatBase + comment.user.id
		}

		commentVue.comments.unshift( newComment );
		commentVue.sinceId = comment.id;
	}
}