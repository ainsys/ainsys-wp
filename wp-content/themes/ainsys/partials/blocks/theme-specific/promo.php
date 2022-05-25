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


<section id="<?php echo esc_attr( $block_id ); ?>" class="newsletter">
	<div class="container">
		<div class="newsletter__content">
			<div class="newsletter__content_info">
				<h3 class="newsletter__title">
					<?= get_field('title');?>
				</h3>
				<div class="newsletter__important">
					<?= get_field('important_text');?>
				</div>
				<div>
                    <?php echo do_shortcode(get_field('form')); ?>
                    </div>
			</div>
			<div class="newsletter__img">
				<img src="<?= get_field('newsletter__img');?>" alt="">
			</div>
		</div>
	</div>	
</section>