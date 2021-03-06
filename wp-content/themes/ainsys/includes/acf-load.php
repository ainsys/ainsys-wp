<?php
/**
 *  Loads ACF if it's not installed as a plugin, and loads ACF field's definitions from php if necessary.
 *
 * @package ainsys
 */

if ( ! defined( 'ACF_SHOW_ADMIN' ) || ACF_SHOW_ADMIN !== true ) {
	add_filter( 'acf/settings/show_admin', '__return_false' );
}

// Load in-theme acf if it's not loaded via plugin in wp-content/plugins/.
if ( ! function_exists( 'acf_add_options_page' ) ) {

	include_once __DIR__ . '/acf/acf.php';

	add_filter(
		'acf/settings/path',
		function ( $path ) {
			return __DIR__ . '/acf/';
		}
	);

	add_filter(
		'acf/settings/url',
		function ( $url ) {
			return get_template_directory_uri() . '/includes/acf/';
		}
	);

}

require_once __DIR__ . '/acf-options.php';

require_once __DIR__ . '/acf-blocks.php';
