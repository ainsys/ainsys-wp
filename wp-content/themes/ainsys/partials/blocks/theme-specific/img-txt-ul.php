<?php
/**
 * Image & Text with UL block.
 *
 * @package ainsys
 */

$block_id = 'img-txt-ul' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

$class_name = 'img-txt-ul';
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
		<?php if ( get_field( 'block_title' ) ) { ?>
			<h2 class="img-txt-ul__block-title animBlock"><?php the_field( 'block_title' ); ?></h2>
		<?php } ?>
		<div class="row">
			<div class="col-lg-6 animBlock">
				<div class="img-txt-ul__img">
					<?php echo wp_get_attachment_image( get_field( 'image' ), 'large', false, array( 'class' => '' ) ); ?>
				</div>
			</div>
			<div class="col-lg-6 animBlock">
				<div class="img-txt-ul__txt">
					<?php if ( get_field( 'title' ) ) { ?>
						<h3 class="img-txt-ul__title"><?php the_field( 'title' ); ?></h3>
					<?php } ?>
					<?php if ( get_field( 'description' ) ) { ?>
						<div class="img-txt-ul__description"><?php the_field( 'description' ); ?></div>
					<?php } ?>
					<?php if ( have_rows( 'list' ) ) : ?>
						<div class="img-txt-ul__list">
							<?php
							while ( have_rows( 'list' ) ) :
								the_row();
								?>
								<div class="img-txt-ul__item">
									<?php if ( get_sub_field( 'icon' ) ) { ?>
										<div class="img-txt-ul__item__icon">
											<?php echo wp_get_attachment_image( get_sub_field( 'icon' ), 'large', false, array( 'class' => '' ) ); ?>
										</div>
									<?php } ?>
									<?php if ( get_sub_field( 'text' ) ) { ?>
										<div class="img-txt-ul__item__text">
											<?php the_sub_field( 'text' ); ?>
										</div>
									<?php } ?>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
