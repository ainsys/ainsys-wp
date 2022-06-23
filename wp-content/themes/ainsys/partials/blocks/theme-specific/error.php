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

<section id="error" class="error 404">
    <div class="container">
        <div class="error_wrapper">
            <div class="error_wrapper_info">
                <img class="error_wrapper_info_img" src="<?= get_field('error_image');?>" alt="error">
                <h1 class="error_wrapper_info_title">
                    <?= get_field('info_title');?>
                </h1>
                <p class="error_wrapper_info_text">
                    <?= get_field('info_text');?> <a href="<?= get_field('info_href');?>"><?= get_field('info_href_text');?></a>
                </p>
                <div class="error_wrapper_info_btns">
                    <a href="<?= get_field('btns_href_reg');?>" class="btn btn-primary error_wrapper_info_btns_href"><?= get_field('btns_href_text');?></a>
                    <a href="<?= get_field('btns_href_main');?>" class="btn error_wrapper_info_btns_href_main"><?= get_field('btns_href_main_text');?></a>
                </div>
            </div>
            <div class="error_wrapper_img">
                <img src="<?= get_field('error_bg');?>" alt="error">
            </div>
        </div>
    </div>
</section>