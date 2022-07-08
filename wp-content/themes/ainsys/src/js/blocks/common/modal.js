( function( $ ) {

    $(".first_content_video_play").click(function () {
        $(".first_modal").addClass('active');
    });
    $(".first_content_video_wrapper").click(function () {
        $(".first_modal").addClass('active');
    });
    $(".first_modal_close").click(function () {
        $(".first_modal").removeClass('active');
    });
    
} )( jQuery ); 