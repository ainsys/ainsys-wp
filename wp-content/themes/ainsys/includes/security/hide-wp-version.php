<?php
/**
 *  Hiding WP version from being displayed in html.
 *
 * @package ainsys
 */

remove_action( 'wp_head', 'wp_generator' );
