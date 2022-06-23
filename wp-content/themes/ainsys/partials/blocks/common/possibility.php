<?php
/**
 * Possibility Block.
 *
 * @package ainsys
 */

$block_id = 'img-txt-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'possibility full-width';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}
if ( get_field( 'bg' ) ) {
	$class_name .= ' bg-color-' . get_field( 'bg' );
}
if ( get_field( 'align' ) ) {
	$class_name .= ' img-align-' . get_field( 'align' );
}
?>

<section  id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
	<div class="container">
		<div class="row">
		<h4 class="animBlock">
					<?php if ( get_field( 'title' ) ) { ?>
						<?php the_field( 'title' ); ?>
					<?php } ?>
				</h4>
				<p class="page__text animBlock">
				<?php if ( get_field( 'top_subtitle' ) ) { ?>
					<?php the_field( 'top_subtitle' ); ?>
				<?php } ?>
			</p>
		</div>
	</div>
</section>
