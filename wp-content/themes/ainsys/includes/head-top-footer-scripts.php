<?php
/**
 *  Injects scripts\html to head\body_top and footer.
 *
 * @package ainsys
 */

/**
 * Adds output to html head
 *
 * @return void
 */
function ainsys_wp_head() {

	if ( ! defined( 'ENV_DEV' ) ) {
		if ( get_field( 'header_scripts_production', 'options' ) ) {
			the_field( 'header_scripts_production', 'options' );
		}
	} elseif ( get_field( 'header_scripts_staging', 'options' ) ) {
		the_field( 'header_scripts_staging', 'options' );
	}
}
add_action( 'wp_head', 'ainsys_wp_head' );


/**
 * Outputs code after opening body tag.
 *
 * @return void
 */
function ainsys_body_top() {

	if ( ! defined( 'ENV_DEV' ) ) {
		if ( get_field( 'body_top_scripts_production', 'options' ) ) {
			the_field( 'body_top_scripts_production', 'options' );
		}
	} elseif ( get_field( 'body_top_scripts_staging', 'options' ) ) {
		the_field( 'body_top_scripts_staging', 'options' );
	}
}
add_action( 'body_top', 'ainsys_body_top' );


/**
 * Adds output to html footer
 *
 * @return void
 */
function ainsys_wp_footer() {

	if ( ! defined( 'ENV_DEV' ) ) {
		if ( get_field( 'footer_scripts_production', 'options' ) ) {
			the_field( 'footer_scripts_production', 'options' );
		}
	} elseif ( get_field( 'footer_scripts_staging', 'options' ) ) {
		the_field( 'footer_scripts_staging', 'options' );
	}

}
add_action( 'wp_footer', 'ainsys_wp_footer' );
