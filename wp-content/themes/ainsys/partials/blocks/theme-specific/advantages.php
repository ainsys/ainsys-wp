<?php
/**
 * Advantages block.
 *
 * @package ainsys
 */

$block_id = 'advantages-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'advantages full-width';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}
?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
	<div class="container">
		<?php if ( have_rows( 'advantages' ) ) : ?>
			<div class="row advantages__list animBlock">
				<?php
				while ( have_rows( 'advantages' ) ) :
					the_row();
					$class = get_sub_field( 'class' ) ? get_sub_field( 'class' ) : 'col-lg-4';
					?>
					<div class="<?php echo ' ' . esc_attr( $class ); ?>">
						<div class="advantages__item">
							<?php if ( get_sub_field( 'image' ) ) { ?>
								<div class="advantages__item__img">
								<?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'large', false, array( 'class' => '' ) ); ?>
								</div>
							<?php } ?>
							<?php if ( get_sub_field( 'title' ) ) { ?>
								<h3 class="advantages__item__title"><?php the_sub_field( 'title' ); ?></h3>
							<?php } ?>
							<?php if ( get_sub_field( 'text' ) ) { ?>
								<div class="advantages__item__text">
									<?php the_sub_field( 'text' ); ?>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
