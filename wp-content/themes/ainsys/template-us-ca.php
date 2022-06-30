<?php
/**
 * Full width page.
 *
 * Template Name: Home: en-ca
 *
 * @package ainsys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }

get_header( 'us-ca' );

the_post();

the_content();

get_footer( 'us' );