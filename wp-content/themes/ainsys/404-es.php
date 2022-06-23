<?php
/**
 * 404 es.
 *
 * Template Name: 404 es
 *
 * @package ainsys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }

get_header( 'es' );

the_post();

the_content();

get_footer( 'es' );