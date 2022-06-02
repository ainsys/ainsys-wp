( function( $ ) {

	$('.numbers__phone-disabled').click(function() {
		$( this )
		  .removeClass('numbers__phone-disabled')
		  .find( '.soc_href' )
		  .removeClass('disabled');
	});
    
} )( jQuery ); 