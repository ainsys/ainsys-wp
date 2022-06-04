( function( $ ) {
//contacf form reg
let wooForm = document.getElementById('cf7_woo_reg')
let wooFormBtn = $(wooForm).find('.wpcf7-submit')
let defaultWooForm = document.getElementById('default_woo_form')
if(typeof(wooForm) != 'undefined' && wooForm != null) {

    let billingClientRole = $("#billing_client_role")
    let billingClientSize = $("#billing_client_size")
    let billingClientIndustry = $("#billing_client_industry")
    let billingClientExperience = $("#billing_client_experience")

    $("#cf_billing_client_role").on('change', function(e) {
        $(billingClientRole).val($(this).val())
        console.log($(billingClientRole).val())
    });
    $("#cf_billing_client_size").on('change', function(e) {
        $(billingClientSize).val($(this).val())
    });
    $("#cf_billing_client_industry").on('change', function(e) {
        $(billingClientIndustry).val($(this).val())
    });
    $("#cf_billing_client_experience").on('change', function(e) {
        $(billingClientExperience).val($(this).val())
    });
    $(wooFormBtn).on('click',function(e){
        //e.preventDefault()
        if(billingClientRole.val() != '' && billingClientSize.val() != '' && billingClientIndustry.val() != '' &&  billingClientExperience.val() !== '' ) {

            console.log(billingClientRole.val())
            //alert ('test')
            $(defaultWooForm).find('button').click();
            //$(wooForm).submit()
        }

    });


}

} )( jQuery );