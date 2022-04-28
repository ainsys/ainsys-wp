<?php
/**
 * Theme customizations.
 *
 * @package ainsys
 */

/**
 * Add custom classes to body
 *
 * @param array $class Body Class.
 * @return array
 */
function ainsys_body_class( $class ) {
	// ...
	return $class;
}
//add_filter( 'body_class', 'ainsys_body_class', 10, 1 );

/**
 * Search among blog posts only
 *
 * @param object $query - wp query result.
 */
/*
function get_posts_search_filter( $query ) {
	if ( ! is_admin() && $query->is_main_query() && $query->is_search ) {
		$query->set( 'post_type', array( 'post' ) );
	}
}
add_action( 'pre_get_posts', 'get_posts_search_filter' );
*/
/**
 * Disable default Related Posts for WordPress output.
 */
// add_filter( 'rp4wp_append_content', '__return_false' );

/**
 * Modifies wp-spacer block
 *
 * @param string $block_content - the block content.
 * @param object $block - the block object.
 *
 * @return string;
 */
function ainsys_spacer_block( $block_content, $block ) {
	if ( 'core/spacer' !== $block['blockName'] ) {
		return $block_content;
	}
	$pattern = '/\sstyle="height:(\d+)px"/i';
	preg_match( $pattern, $block_content, $matches );
	$height  = $matches[1];
	$return  = '<div aria-hidden="true" class="wp-block-spacer">';
	$return .= '<div class="d-none d-lg-block" style="height:' . $height . 'px"></div>';
	$return .= '<div class="d-lg-none" style="height:' . $height / 2 . 'px"></div>';
	$return .= '</div>';
	return $return;
}
add_filter( 'render_block', 'ainsys_spacer_block', 10, 2 );

/**
 * Change excerpt length
 *
 * @package ainsys
 */
add_filter(
	'excerpt_length',
	function() {
		return 20;
	}
);

/**
 * Change excerpt read more text
 *
 * @package ainsys
 */
function new_excerpt_more() {
	global $post;
	return ' ...';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );
