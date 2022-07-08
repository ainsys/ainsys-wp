<?php
/**
 * Jobs ua.
 *
 * Template Name: Jobs ua
 *
 * @package ainsys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }

get_header( 'ua' );

the_post();

the_content();

get_footer( 'ua' );