<?php
/**
 * Landing ru
 *
 * Template Name: Landing ru
 *
 * @package ainsys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }

get_header( 'landing' );

the_post();

the_content();

get_footer();



