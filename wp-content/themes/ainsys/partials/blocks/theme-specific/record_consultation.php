<?php
/**
 * Toggler block.
 *
 * @package ainsys
 */

$block_id = 'toggler-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'toggler full-width';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}
if ( get_field( 'bg_color' ) ) {
	$class_name .= ' bg-color-' . get_field( 'bg_color' );
}
$style       = '';
$style_bg    = '';
$style_align = '';
if ( get_field( 'bg_img' ) ) {
	$style_bg = 'background-image: url(' . wp_get_attachment_image_url( get_field( 'bg_img' ), 'full' ) . '); ';
}
if ( get_field( 'bg_alignment' ) ) {
	$style_align = 'background-position: ' . get_field( 'bg_alignment' ) . ';';
}
if ( get_field( 'bg_img' ) || get_field( 'bg_alignment' ) ) {
	$style = ' style="' . $style_bg . $style_align . '"';
}

?>

<section class="record">
    <div class="container">
        <div class="record_wrapper">
            <div class="record_wrapper_info">
                <h1 class="record_wrapper_info_title">
                    <?= get_field('title');?>
                </h1>
                <p class="record_wrapper_info_text">
                    <?= get_field('text');?>
                </p>
                <div class="record_wrapper_info_form">
                <?= get_field('form');?>
                </div>
                <a href="<?= get_field('btn_href');?>" class="btn btn_record">
                    <?= get_field('btns_href_text');?>
                </a>
            </div>
            <div class="record_wrapper_img">
                <img src="<?= get_field('img_bg');?>" alt="record">
            </div>
        </div>
    </div>
</section>