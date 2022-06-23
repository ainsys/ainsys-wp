<?php
/**
 * 404 en.
 *
 * Template Name: 404 en
 *
 * @package ainsys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }

get_header( 'us' );

the_post();

the_content();

get_footer( 'us' );