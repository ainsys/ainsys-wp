( function( $ ) {
	$( document ).ready( function() {
		closeMoodal();
	} );
	function closeMoodal() {
		$( '.modal__button--close' ).on( 'click', function() {
			$( this )
				.closest( '.modal__wrapper' )
				.removeClass( 'show' );
		} );
	}

} )( jQuery );
