<?php
/**
 * Full width page.
 *
 * Template Name: Home: Spain
 *
 * @package ainsys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }

get_header( 'es' );

the_post();

the_content();

get_footer( 'es' );