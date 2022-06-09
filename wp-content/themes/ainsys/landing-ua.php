<?php
/**
 * Landing ru
 *
 * Template Name: Landing ua
 *
 * @package ainsys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }

get_header( 'landing-ua' );

the_post();

the_content();

get_footer( 'ua' );



