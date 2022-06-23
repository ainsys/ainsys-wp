<?php
/**
 * No access ua.
 *
 * Template Name: No access ua
 *
 * @package ainsys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }

get_header( 'ua' );

the_post();

the_content();

get_footer( 'ua' );