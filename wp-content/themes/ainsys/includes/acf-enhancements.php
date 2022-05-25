<?php
/**
 *  Functions to enhance ACF flexible content layouts.
 *
 * @package ainsys
 */

/**
 * Custom ACF JSON save point.
 *
 * @param string $path - path to json acf files.
 */
function ainsys_acf_json_save_point( $path ) {
	return get_template_directory() . '/includes/acf-fields';
}
add_filter( 'acf/settings/save_json', 'ainsys_acf_json_save_point' );

/**
 * Custom ACF JSON load point.
 *
 * @param string $paths - path to json acf files.
 */
function ainsys_acf_json_load_point( $paths ) {
	unset( $paths[0] );
	$paths[] = get_template_directory() . '/includes/acf-fields';
	return $paths;
}
add_filter( 'acf/settings/load_json', 'ainsys_acf_json_load_point' );

/**
 * Adds current Flexible Content's Row field as descriptor to the layout
 * label. An analogue to "Collapsed" field for Repeaters. Useful to
 * identify an item in a large list of rows.
 *
 * @param string $title  Title of flexible content section.
 * @param array  $field  Field Definition.
 * @param array  $layout Layout data.
 * @param int    $i      I think it's row index.
 *
 * @return mixed
 */
function ainsys_acf_layout_title( $title, $field, $layout, $i ) {
	// Use only for certain layouts.

	// phpcs:ignore
	/* if ( 'simple_content' == $layout['name'] ) {

		// Get field content to expand default layout label
		$name = get_sub_field('title');

		if ( $name ) {
			$title .= ': ' . $name;
		}
	}
	*/

	return $title;
}
add_filter( 'acf/fields/flexible_content/layout_title', 'ainsys_acf_layout_title', 10, 4 );

/**
 * Adds Custom GB block's category.
 */
add_filter(
	'block_categories_all',
	function ( $categories, $post ) {

		$custom_categories = array(
			array(
				'slug'  => 'customgb',
				'title' => __( 'Custom GB', 'ainsys' ),
			),
		);

		$categories_slugs = array_reduce(
			$categories,
			function ( $res, $cat ) {
				if ( ! empty( $cat['slug'] ) ) {
					$res[] = $cat['slug'];
				}

				return $res;
			},
			array()
		);

		foreach ( $custom_categories as $custom_category ) {
			if ( false === array_search( $custom_category['slug'], $categories_slugs, true ) ) {
				$categories[] = $custom_category;
			}
		}

		return $categories;
	},
	10,
	2
);

/**
 * Adds Custom GB block's category.
 *
 * @param array $field - select field.
 */
function ainsys_select_category_choices( $field ) {
	$field['choices'] = array();

	$args = array(
		'taxonomy'     => 'product_cat',
		'orderby'      => 'name',
		'order'        => 'ASC',
		'heirarchical' => true,
		'hide_empty'   => true,
	);

	$product_categories = get_terms( $args );

	if ( ! empty( $product_categories ) ) {
		foreach ( $product_categories as $cat ) {
			$field['choices'][ $cat->term_id ] = $cat->name;
		}
	}
	return $field;
}

add_filter( 'acf/load_field/name=exclude_categories', 'ainsys_select_category_choices' );
