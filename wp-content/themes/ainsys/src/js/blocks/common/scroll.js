( function( $ ) {

    $(".menu__item_scroll").click(function() {
        $([document.documentElement, document.body]).animate({
            scrollTop: $(".footer").offset().top
        }, 1000);
    });

    $(".first_btn ").click(function() {
        $([document.documentElement, document.body]).animate({
            scrollTop: $(".rate_page").offset().top
        }, 500);
    });
    
} )( jQuery ); 