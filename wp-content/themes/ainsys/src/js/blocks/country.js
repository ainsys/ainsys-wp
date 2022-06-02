( function( $ ) {

	$('.country_close').click(function() {
		$('#counrty').addClass('country-disabled');
	});
	$('.country_select').click(function() {
		$( this )
		.toggleClass('country-active');
	});

} )( jQuery );    