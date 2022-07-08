( function( $ ) {

	$('.jobs_vacantes_slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
		dots: true,
		arrow: true,
		infinite: true,
		speed: 500,
		autoplay: false,
		autoplaySpeed: 0,
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 750,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
	});
    
} )( jQuery ); 