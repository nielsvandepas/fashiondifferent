var scheme = 'http://'
var domain = 'dev.fashiondifferent.nl';
var urlBase = scheme + domain;
var wardrobeUrl = '/element/wardrobe';
var elementBase = '/element/';
var commentBase = '/comment/';
var chatBase = '/chat/';

Vue.config.debug = true;

Vue.http.headers.common[ 'X-CSRF-TOKEN' ] = document.querySelector( '#token' ).getAttribute( 'value' );

function profileImage ( user ) {
	if ( user.image == null )
		return '/images/avatar.png';
	else
		return '/uploads/profile-images/cropsized/' + user.image;
}

// From here on all code is fetched from the internet
function htmlDecode( input ) {
	var e = document.createElement( 'div' );
	e.innerHTML = input;
	return e.childNodes.length === 0 ? "" : e.childNodes[0].nodeValue;
}

function getPosition( element ) {
	var e = document.getElementById( element );
	var left = 0;
	var top = 0;

	do {
		left += e.offsetLeft;
		top += e.offsetTop;
	} while ( e = e.offsetParent );

	return [ left, top ];
}

function jumpTo( id ) {
	var position = getPosition( id );
	window.scrollTo( 0, position[ 1 ] );
}

function nlToBr( input ) {
	return input.replace(new RegExp('\r?\n','g'), '<br />');
}