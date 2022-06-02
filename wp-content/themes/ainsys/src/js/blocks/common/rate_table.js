( function( $ ) {

	$('.tbody_list').click(function() {
		$('.tbody_list').addClass('tbody_list-disabled');
		$('.tbody_list-1').removeClass('tbody_list-disabled');
		$( this ).toggleClass('tbody_list-disabled');
	});
	$('.rate_delete_first').click(function() {
		$('.rate_first')
		.addClass('rate-disabled');
	});
	$('.rate_delete_second').click(function() {
		$('.rate_second')
		.addClass('rate-disabled');
	});
	$('.rate_delete_third').click(function() {
		$('.rate_third')
		.addClass('rate-disabled');
	});
	$('.rate_delete_fourth').click(function() {
		$('.rate_fourth')
		.addClass('rate-disabled');
	});

} )( jQuery );    