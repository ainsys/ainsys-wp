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


<section id="<?php echo esc_attr( $block_id ); ?>" class="main__landing">
	<div class="container">
	<?php if ( get_field( 'podtitle' ) ) { ?>
		<p class="podtitle">
			<?= get_field('podtitle');?>
		</p>
	<?php } ?>
		<h1>
		<?= get_field('title');?>
		</h1>
		<div class="page__content">
			<div class="page__info">
				<ul class="list">
				<?php if ( have_rows( 'list_item' ) ) : ?>
				<?php
					while ( have_rows( 'list_item' ) ) :
						the_row();?>
				<li class="list_item">

					<?php if ( get_sub_field( 'list_item_text' ) ) { ?>
						<span>
							<?php the_sub_field( 'list_item_text' ); ?>
						</span>
					<?php } ?>

					</li>
					<?php endwhile; ?>
				<?php endif; ?>
				</ul>
			</div>
			<div class="page__form">
					<p class="form__title">
					<?= get_field('form__title');?>
					</p>
					<div class="form_demonstration">
		<?php echo do_shortcode(get_field('form')); ?>
	</div>
			</div>
		</div>

		<div class="main__bottom">
		<ul class="benefits">
		<?php if ( have_rows( 'advantages' ) ) : ?>
			<?php while ( have_rows( 'advantages' ) ) :
				the_row();
				?>
			<li class="benefits__item tooltips__item">

					<?php if ( get_sub_field( 'image' ) ) { ?>
						<div class="adv__img">
						<?= the_sub_field('image');?>
						</div>
					<?php } ?>
					<?php if ( get_sub_field( 'text' ) ) { ?>
						<p class="advantages__text">
							<?php the_sub_field( 'text' ); ?>
						</p>
					<?php } ?>
					<?php if ( get_sub_field( 'tooltip' ) ) { ?>
					<div class="tooltips">
					<ul>
						<li>
							<?= get_sub_field('tooltip');?>
						</li>
					</ul>
					</div>
					<?php } ?>
					</li>
					<?php endwhile; ?>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</section>
