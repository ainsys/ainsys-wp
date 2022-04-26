<?php
/**
 * Full width page.
 *
 * Template Name: Home: English
 *
 * @package ainsys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }

get_header( 'us' );

the_post();

the_content();

get_footer( 'us' );
