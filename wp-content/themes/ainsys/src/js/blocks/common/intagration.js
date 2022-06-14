( function( $ ) {

    $(".integration_head_correct").click(function() {
        $(".integration_head_input").prop("disabled", false);
    });
    $(".integration_head_switch").click(function() {
        $(".switch_popup").toggleClass('disabl');
    });
    $(".connector_requirements").click(function() {
        $( this )
        .find( '.connector_requirements_preview' )
        .addClass('disabl');

        $( this )
        .find( '.connector_requirements_main' )
        .removeClass('disabl');
    });
    $(".settings_correct").click(function() {
        $( this )
        .closest( '.connector' )
        .find( '.main_content' )
        .prop("disabled", false);

        $( this )
        .parent()
        .addClass('preview');
    });
    $(".settings_accept").click(function() {
        $( this )
        .parent()
        .closest( '.connector' )
        .find( '.main_content' )
        .prop("disabled", true);

        $( this )
        .parent()
        .removeClass('preview');
    });
    $(".settings_cancel").click(function() {
        $( this )
        .parent()
        .closest( '.connector' )
        .find( '.main_content' )
        .prop("disabled", true);

        $( this )
        .parent()
        .removeClass('preview');
    });
    $(".connector_delete_btn").click(function() {
        $( this )
        .parent()
        .closest( '.connector' )
        .find( '.connector_content' )
        .addClass('disabl');
    });

    $(".term_item_toggler").click(function() {
        $( this )
        .parent()
        .closest( '.term_item' )
        .find( '.term_item_content' )
        .toggleClass('disabl');

        $( this )
        .find( '.term_item_toggler_more' )
        .toggleClass('disabl');   
        
        $( this )
        .find( '.term_item_toggler_less' )
        .toggleClass('disabl');     
    });
    

} )( jQuery ); 