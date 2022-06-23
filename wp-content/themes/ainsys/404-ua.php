<?php
/**
 * 404 ua.
 *
 * Template Name: 404 ua
 *
 * @package ainsys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }

get_header( 'ua' );

the_post();

the_content();

get_footer( 'ua' );