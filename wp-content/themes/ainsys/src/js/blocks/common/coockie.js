( function( $ ) {
	function setCookie( c_name, value, exdays ) {
		const exdate = new Date();
		exdate.setDate( exdate.getDate() + exdays );
		const c_value =
			escape( value ) +
			( exdays == null ? '' : '; expires=' + exdate.toUTCString() );
		document.cookie = c_name + '=' + c_value;
	}

	function getCookie( c_name ) {
		let i,
			x,
			y,
			ARRcookies = document.cookie.split( ';' );
		for ( i = 0; i < ARRcookies.length; i++ ) {
			x = ARRcookies[ i ].substr( 0, ARRcookies[ i ].indexOf( '=' ) );
			y = ARRcookies[ i ].substr( ARRcookies[ i ].indexOf( '=' ) + 1 );
			x = x.replace( /^\s+|\s+$/g, '' );
			if ( x == c_name ) {
				return unescape( y );
			}
		}
	}

	function deleteAllCookies() {
		const cookies = document.cookie.split( ';' );

		for ( let i = 0; i < cookies.length; i++ ) {
			const cookie = cookies[ i ];
			const eqPos = cookie.indexOf( '=' );
			const name = eqPos > -1 ? cookie.substr( 0, eqPos ) : cookie;
			document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:00 GMT';
		}
	}
	/*function deleteSpecificCookies() {

		var cookies = document.cookie.split(";");
		var all_cookies = '';

		for (var i = 0; i < cookies.length; i++) {

			var cookie_name  = cookies[i].split("=")[0];
			var cookie_value = cookies[i].split("=")[1];

			if( cookie_name.trim() != '__utmb' ) { all_cookies = all_cookies + cookies[i] + ";"; }


		}

		if(!document.__defineGetter__) {

			Object.defineProperty(document, 'cookie', {
				get: function(){return all_cookies; },
				set: function(){return true},
			});

		} else {

			document.__defineGetter__("cookie", function() { return all_cookies; } );
			document.__defineSetter__("cookie", function() { return true; } );

		}

	}*/

	function closethis() {
		let result = confirm('You must accept cookies to continue using the site');
			document.location.assign('/cookies/');
		}

	const acceptCookie = getCookie( 'acceptCookie' );
	if ( acceptCookie === 'cookie accepted' ) {
		$( '#coockie' ).addClass( 'coockie-disabled' );
		//alert( 'Cookie accepted' );
	} /*else {
		document.addEventListener( 'DOMContentLoaded', deleteAllCookies() );
	}*/

	$( '.coockie_button-disagree' ).click( function() {
		$( '#coockie' ).addClass( 'coockie-disabled' );
		deleteAllCookies();
		closethis();
	} );
	$( '.coockie_close.ok' ).click( function() {
		$( '#coockie' ).addClass( 'coockie-disabled' );
		setCookie( 'acceptCookie', 'cookie accepted', 14 );
	} );

} )( jQuery );
