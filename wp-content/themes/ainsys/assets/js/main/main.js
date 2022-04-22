( function( $ ) {
	$( '.form-check-input-content' ).on( 'click', function() {
		$( this )
			.parent()
			.siblings( '.toggler__switch__label' )
			.toggleClass( 'active' );
		$( this )
			.closest( '.toggler__switch' )
			.siblings( '.toggler__screens' )
			.find( '.toggler__screen' )
			.toggleClass( 'active' );
	} );

	$( document ).ready( function() {
		$( '.form-check-input-content' ).click( function() {
			$( '.form-check-input' ).each( function( i, value ) {
				const { id } = value;

				if ( this.checked ) {
					// content
					$( `#pageContentAfter-${ id }` ).removeClass(
						'page__content__active'
					);
					$( `#pageContentBefore-${ id }` ).addClass(
						'page__content__active'
					);
					// label
					$( `#pageSwitchAfter-${ id }` ).removeClass(
						'label_active'
					);
					$( `#pageSwitchBefore-${ id }` ).addClass( 'label_active' );
				} else {
					// content
					$( `#pageContentAfter-${ id }` ).addClass(
						'page__content__active'
					);
					$( `#pageContentBefore-${ id }` ).removeClass(
						'page__content__active'
					);
					// label
					$( `#pageSwitchAfter-${ id }` ).addClass( 'label_active' );
					$( `#pageSwitchBefore-${ id }` ).removeClass(
						'label_active'
					);
				}
			} );
		} );

		$( '.burger' ).click( function() {
			$( '.burger span' ).toggleClass( 'active' );
			$( '.menu__mob' ).toggleClass( 'animate' );
		} );

		//   var dropdownmenu = $('.dropdown-menu')
		//   $(".dropdown").mouseover(function(){
		//       $('.dropdown-menu').addClass("show");
		//   });
		//   $(".dropdown").mouseout(function(){
		//     $('.dropdown-menu').removeClass("show");
		// });

		// $(".form-check-input-content").click(function(){

		//     $(".page__content__after").addClass("page__content__active");
		//     $(".page__content__before").removeClass("page__content__active");

		//     $(".form-check-input").not(this).each(function(){
		//       this.checked = false;
		//     });

		//     if (this.checked) {
		//         $(".page__content__after").removeClass("page__content__active");
		//         $(".page__content__before").addClass("page__content__active");
		//     }
		// });

		// $(".form-check-input").click(function(){

		//     $(".page__switch__after").addClass("label_active");
		//     $(".page__switch__before").removeClass("label_active");

		//     $(".form-check-input-content").not(this).each(function(){
		//       this.checked = false;
		//     });

		//     if (this.checked) {
		//         $(".page__switch__before").addClass("label_active");
		//         $(".page__switch__after").removeClass("label_active");
		//     }
		// });

		// $("#accordion-item-first").click(function(){
		//     $(this).toggleClass("accardion_active");
		//     $('#accordion-item-second').removeClass("accardion_active");
		//     $('#accordion-item-third').removeClass("accardion_active");
		// });
		// $("#accordion-item-second").click(function(){
		//     $(this).toggleClass("accardion_active");
		//     $('#accordion-item-first').removeClass("accardion_active");
		//     $('#accordion-item-third').removeClass("accardion_active");
		// });
		// $("#accordion-item-third").click(function(){
		//     $(this).toggleClass("accardion_active");
		//     $('#accordion-item-first').removeClass("accardion_active");
		//     $('#accordion-item-second').removeClass("accardion_active");
		// });
	} );

	let animBlock = document.querySelectorAll( '.animBlock' );

	window.addEventListener( 'scroll', () => {
		animBlock.forEach( ( anim ) => {
			if ( pageYOffset > anim.offsetTop - 500 ) {
				anim.classList.add( 'animateBlock' );
			}
		} );
	} );
} )( jQuery );
