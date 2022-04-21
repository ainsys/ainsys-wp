<?php
/**
 * Gutenberg Customization.
 *
 * @package ainsys
 */

/**
 * Declare registration of block styles for headings, paragraphs, buttons and other standard blocks.
 *
 * @return void
 */
function ainsys_register_block_styles() {

	if ( function_exists( 'register_block_style' ) ) {

		$theme_block_styles = array(

			'core/paragraph' => array(
				array(
					'name'  => 'lead',
					'label' => __( 'Lead' ),
				),
				array(
					'name'  => 'caption',
					'label' => __( 'Caption' ),
				),
				array(
					'name'  => 'subtitle-1',
					'label' => __( 'Subtitle-1' ),
				),
				array(
					'name'  => 'subtitle-2',
					'label' => __( 'Subtitle-2' ),
				),
				array(
					'name'  => 'overline',
					'label' => __( 'Overline' ),
				),
			),

			'core/button'    => array(
				array(
					'name'  => 'primary',
					'label' => __( 'Primary' ),
				),
				array(
					'name'  => 'secondary',
					'label' => __( 'Secondary' ),
				),
				array(
					'name'  => 'tertiary',
					'label' => __( 'Tertiary (Link)' ),
				),
			),

			'core/list'      => array(
				array(
					'name'  => 'checked',
					'label' => __( 'Checked' ),
				),
			),

		);

		if ( is_array( $theme_block_styles ) ) {
			foreach ( $theme_block_styles as $block_name => $block_styles ) {
				// it's quick short fallback if there's only one style and someone made mistake, forgetting wrapping it into array - we just wrap it.
				if ( ! empty( $block_styles['name'] ) ) {
					$block_styles = array( $block_styles );
				}

				foreach ( $block_styles as $style_properties ) {
					register_block_style( $block_name, $style_properties );
				}
			}
		}
	}
}

add_filter( 'init', 'ainsys_register_block_styles', 10 );
