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

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?>"<?php echo $style; //phpcs:ignore ?>>
	<div class="container">
		<?php if ( get_field( 'title' ) ) { ?>
			<h2 class="animBlock"><?php the_field( 'title' ); ?></h2>
		<?php } ?>
		<?php if ( get_field( 'description' ) ) { ?>
			<div class="toggler__desc animBlock"><?php the_field( 'description' ); ?></div>
		<?php } ?>

		<div class="toggler__switch animBlock">
			<div class="toggler__switch__label active"><?php the_field( 'label_without' ); ?></div>
			<div class="form-check form-switch">
				<input class="form-check-input form-check-input-content" type="checkbox" onclick="gtag( 'event', 'tumb_1', {   'event_category' : 'ain',   'event_label' : 't' });ym(86987238,'reachGoal','tumb_1'); return true;">
			</div>
			<div class="toggler__switch__label"><?php the_field( 'label_with' ); ?></div>
		</div>

		<?php
		$reverse_order = get_field( 'order' ) === true ? ' reverse' : '';
		?>
		<div class="toggler__screens<?php echo $reverse_order; //phpcs:ignore ?> animBlock">
			<div class="toggler__screen active">
				<div class="toggler__screen__img">
					<?php echo wp_get_attachment_image( get_field( 'image__without' ), 'large', false, array( 'class' => '' ) ); ?>
				</div>
				<div class="toggler__screen__txt">
					<?php the_field( 'txt_without' ); ?>
				</div>
			</div>
			<div class="toggler__screen">
				<div class="toggler__screen__img">
					<?php echo wp_get_attachment_image( get_field( 'image__with' ), 'large', false, array( 'class' => '' ) ); ?>
				</div>
				<div class="toggler__screen__txt">
					<?php the_field( 'txt_with' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>
