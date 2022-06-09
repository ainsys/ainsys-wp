( function( $ ) {

    $(".menu__item_scroll").click(function() {
        $([document.documentElement, document.body]).animate({
            scrollTop: $(".footer").offset().top
        }, 1000);
    });
    
} )( jQuery ); 