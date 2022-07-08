<?php
/**
 * Reg dev
 *
 * Template Name: Reg dev
 *
 * @package ainsys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }

get_header( 'us' );

the_post();

the_content();

get_footer( 'us' );