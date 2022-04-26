<?php
/**
 * Full width page.
 *
 * Template Name: Home: Ukrainian
 *
 * @package ainsys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }

get_header( 'ua' );

the_post();

the_content();

get_footer( 'ua' );
