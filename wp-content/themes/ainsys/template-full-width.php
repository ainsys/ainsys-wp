<?php
/**
 * Full width page.
 *
 * Template Name: Full-width Page
 *
 * @package ainsys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }

get_header( 'landing' );

the_post();

the_content();

get_footer();
