<?php
/**
 * No access en.
 *
 * Template Name: No access en
 *
 * @package ainsys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }

get_header( 'us' );

the_post();

the_content();

get_footer( 'us' );