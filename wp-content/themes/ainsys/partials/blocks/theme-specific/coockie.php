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

<div id="coockie" class="cookie-block">
	<div class="container">
		<div class="coockie_content">
			<p class="coockie_text">
			<?= get_field('coockie_text');?> <a href="<?= get_field('coockie_href_a');?>"><?= get_field('coockie_href');?></a> <?= get_field('coockie_text_two');?> <a href="/privacy-policy/"><?= get_field('coockie_href_two');?></a><?= get_field('coockie_text_three');?>
			</p>
			<div class="coockie_buttons">
			<button class="btn coockie_button coockie_close ok"><?= get_field('coockie_btn_accept');?></button>
			<button class="btn coockie_button-grey coockie_button-disagree coockie_close"><?= get_field('coockie_btn_disagree');?></button>
			<a href="<?= get_field('url');?>" class="btn coockie_button-grey"><?= get_field('coockie_btn_policy');?></a>
			</div>
		</div>
	</div>
</div>
