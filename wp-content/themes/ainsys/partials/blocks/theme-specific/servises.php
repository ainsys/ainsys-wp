<?php
/**
 * Advantages block.
 *
 * @package ainsys
 */

$block_id = 'services-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'services full-width';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}
if ( get_field( 'bg' ) ) {
	$class_name .= ' bg-color-' . get_field( 'bg' );
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
<?php // echo $style; //phpcs:ignore ?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
	<div class="services__top">
		<div class="container">
			<h4 class="animBlock">
				<?php if ( get_field( 'top_title' ) ) { ?>
					<?php the_field( 'top_title' ); ?>
				<?php } ?>
			</h4>
			<p class="page__text animBlock">
				<?php if ( get_field( 'top_subtitle' ) ) { ?>
					<?php the_field( 'top_subtitle' ); ?>
				<?php } ?>
			</p>
		</div>
	</div>
	<div class="services__main">
		<div class="container">
			<div class="services__info">
				<h4 class="animBlock">
					<?php if ( get_field( 'title' ) ) { ?>
						<?php the_field( 'title' ); ?>
					<?php } ?>
				</h4>
				<p class="page__text animBlock">
					<?php if ( get_field( 'subtitle' ) ) { ?>
						<?php the_field( 'subtitle' ); ?>
					<?php } ?>
				</p>
			</div>

			<?php if ( have_rows( 'services' ) ) : ?>
				<div class="accordion accordion-flush animBlock" id="accordionFlushExample">
					<?php
					$i = 0;
					while ( have_rows( 'services' ) ) :
						the_row();
						$i++;
						?>
						<div id="accordion-item-<?php echo $i; //phpcs:ignore ?>" class="accordion-item col-lg-4 col-md-12 col-sm-12 collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $i; //phpcs:ignore ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $i; //phpcs:ignore ?>">
							<h4 class="accordion-header" id="flush-heading<?php echo $i; //phpcs:ignore ?>">
								<button class="accordion-button" type="button">
									<?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'thumbnail', false, array( 'class' => '' ) ); ?>
									<p class="accordion__title">
										<?php the_sub_field( 'title' ); ?>
									</p>
									<p class="accordion__text">
										<?php the_sub_field( 'description' ); ?>
									</p>
								</button>
							</h4>
							<div id="flush-collapse<?php echo $i; //phpcs:ignore ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $i; //phpcs:ignore ?>" data-bs-parent="#accordionFlushExample">
								<div class="accordion-body">
									<?php the_sub_field( 'details' ); ?>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<p class="page__doptext">
				<?php if ( get_field( 'bottom_text' ) ) { ?>
					<?php the_field( 'bottom_text' ); ?>
				<?php } ?>
			</p>
		</div>
	</div>

	<div class="services__banner animBlock">
		<div class="services__banner__wrapper">
			<h4>
				<?php if ( get_field( 'bottom_title' ) ) { ?>
					<?php the_field( 'bottom_title' ); ?>
				<?php } ?>
			</h4>
			<p class="page__doptext">
				<?php if ( get_field( 'bottom_title' ) ) { ?>
					<?php the_field( 'bottom_title' ); ?>
				<?php } ?>
			</p>
			<?php if ( get_field( 'button' ) ) { ?>
				<?php
				$button        = get_field( 'button' );
				$button_url    = $button['url'] ? $button['url'] : '#';
				$button_title  = $button['title'] ? $button['title'] : '';
				$button_target = $button['target'] ? $button['target'] : '_self';
				?>
				<a class="btn btn-primary" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>" onclick="gtag( 'event', 'button_2', {   'event_category' : 'ain',   'event_label' : 't' });ym(86987238,'reachGoal','button_2'); return true;"><?php echo esc_html( $button_title ); ?></a>
			<?php } ?>
		</div>
	</div>
</section>  
