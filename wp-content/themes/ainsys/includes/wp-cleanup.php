<?php
/**
 * WP clean up.
 *
 * @package ainsys
 */

/**
 * Remove Emoji
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Remove script type="text/javascript" for validator.w3.org
 *
 * @param string $tag    The `<script>` tag for the enqueued script.
 * @param string $handle The script's registered handle.
 *
 * @return string;
 */
function ainsys_remove_type_attr( $tag, $handle ) {
	return preg_replace( "/ type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}
add_filter( 'style_loader_tag', 'ainsys_remove_type_attr', 10, 2 );
add_filter( 'script_loader_tag', 'ainsys_remove_type_attr', 10, 2 );

add_action(
	'template_redirect',
	function() {
		ob_start(
			function( $buffer ) {
				$buffer = str_replace( array( ' type="text/javascript"', " type='text/javascript'" ), '', $buffer );
				$buffer = str_replace( array( ' type="text/css"', " type='text/css'" ), '', $buffer );
				return $buffer;
			}
		);
	}
);

