( function( $ ) {
	const $siteHeader = $( '.header' );
	const $menu = $( '.header__menu > ul', $siteHeader );

	// Toggle submenu
	$( '.header__toggler' ).on( 'click', function( event ) {
		event.preventDefault();

		if ( $( this ).attr( 'aria-expanded' ) === 'false' ) {
			$( this ).attr( 'aria-expanded', 'true' );
			$( 'body' ).addClass( 'menu-open' ); // this should go last
		} else {
			$( 'body' ).removeClass( 'menu-open' ); // this should go first
			$( this ).attr( 'aria-expanded', 'false' );
		}
	} );

	// Toggle submenu
	$( '.menu__item---has-children > a.menu__submenu-toggler', $menu ).on(
		'click',
		function( event ) {
			event.preventDefault().stopPropagation();

			/*
			const $a = $( this );
			const $li = $a.closest( '.menu-item-has-children' );
			if ( ! $li.hasClass( 'open' ) ) {
				$( '.menu-item-has-children', $menu ).removeClass( 'open' );
				$li.addClass( 'open' );
			} else {
				$( '.menu-item-has-children', $menu ).removeClass( 'open' );
			}
			*/
		}
	);
} )( jQuery );
