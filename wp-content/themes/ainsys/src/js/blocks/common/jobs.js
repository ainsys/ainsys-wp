( function( $ ) {

    $(".jobs_wrapper_content_btn").click(function () {
        $([document.documentElement, document.body]).animate({
          scrollTop: $(".jobs_vacantes").offset().top
        }, 1000);
    });
    
} )( jQuery ); 