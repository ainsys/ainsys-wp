( function( $ ) {

    $(".integration_head_correct").click(function() {
        if ( $( ".integration_head_input" ).is( ":disabled" ) ) {
            $(".integration_head_input").prop("disabled", false);
        }
        else {
            $(".integration_head_input").prop("disabled", true);
        }
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

    $(".options_settings_correct").click(function() {
        if ( $( ".integration_form_options_textarea" ).is( ":disabled" ) ) {
            $( '.integration_form_options_textarea' )
            .prop("disabled", false);
        }
        else {
            $( '.integration_form_options_textarea' )
            .prop("disabled", true);
        }
    });

    $(".integration_upload").click(function() {
        $( this )
        .addClass('disabl');   

        $( '.field__wrapper' )
        .removeClass('disabl');
    });



    


    let fields = document.querySelectorAll('.field__file');
    Array.prototype.forEach.call(fields, function (input) {
      let label = input.nextElementSibling,
        labelVal = label.querySelector('.field__file-fake').innerText;
  
      input.addEventListener('change', function (e) {
        let countFiles = '';
        if (this.files && this.files.length >= 1)
          countFiles = this.files.length;
  
        if (countFiles)
          label.querySelector('.field__file-fake').innerText = 'Выбрано файлов: ' + countFiles;
        else
          label.querySelector('.field__file-fake').innerText = labelVal;
      });
    });

    $(".settings_add").click(function() {
        $('.integration_form_options_inputs_start').after(
            $('<div class="integration_form_options_inputs">' +
            '<div class="integration_form_field">' +
            '<div class="integration_form_budget_field_head">' + 
            '<p class="integration_form_budget_field_head_text">Альтернативные способы связи</p>' +
            '<span class="tooltips__item">' +
            '<div class="tooltips">test</div>' +
            '</span>'+
            '</div>' +
            '<input class="integration_form_budget_field_input" type="text" placeholder="www.google.ru">' +
            '</div>' +
            '<div class="integration_form_field">' +
            '<div class="integration_form_budget_field_head">' +
            '<p class="integration_form_budget_field_head_text">Выберите тип данных</p>' +
            '<span class="tooltips__item">' +
            '<div class="tooltips">test</div>' +
            '</span>' +
            '</div>' +
            '<div class="select">' +
            '<input class="select__input" type="hidden" name="">' +
            '<div class="select__head">Web site</div>' +
            '<ul class="select__list" style="display: none;">' +
            '<li class="select__item">Web site</li>' +
            '<li class="select__item">Whatsapp</li>' +
            '<li class="select__item">Facebook</li>' +
            '<li class="select__item">Instagram</li>' +
            '<li class="select__item">Telegram</li>' +
            '<li class="select__item">Linkedin</li>' +
            '<li class="select__item">Другое</li>' +
            '</ul>' +
            '</div>' +
            '</div>' +
            '</div>'
            )
          );
    });


} )( jQuery ); 