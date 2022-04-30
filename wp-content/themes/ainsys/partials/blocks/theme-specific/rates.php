<?php
/**
 * Rates block.
 *
 * @package ainsys
 */

$block_id = 'rates-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'rates';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
	<div class="container">
		<?php if ( get_field( 'title' ) ) { ?>
			<h2 class="rates__title"><?php the_field( 'title' ); ?></h2>
		<?php } ?>
		<?php if ( get_field( 'bottom_text' ) ) { ?>
			<div class="rates__bottom"><?php the_field( 'bottom_text' ); ?></div>
		<?php } ?>
		<?php if ( have_rows( 'rates' ) ) : ?>
			<div class="row rates__list">
				<?php
				while ( have_rows( 'rates' ) ) :
					the_row();
					?>
					<div class="col-md-6 col-lg-3">
						<div class="rates__item">
							<?php if ( get_sub_field( 'name' ) ) { ?>
								<?php
								$name_bg = get_sub_field( 'name_bg' ) ? get_sub_field( 'name_bg' ) : 'light';
								?>
								<div class="rates__item__name rates__item__name--<?php echo esc_attr( $name_bg ); ?>"><?php the_sub_field( 'name' ); ?></div>
							<?php } ?>
							<?php if ( get_sub_field( 'price' ) ) { ?>
								<?php
								$sale = get_sub_field( 'sale' ) ? ' rates__item__price--sale' : '';
								?>
								<div class="rates__item__price<?php echo esc_attr( $sale ); ?>">
									<span><?php the_sub_field( 'price' ); ?></span>
									<?php if ( get_sub_field( 'period' ) ) { ?>
										/ <?php the_sub_field( 'period' ); ?>
									<?php } ?>
								</div>
							<?php } ?>
							<?php if ( get_sub_field( 'users' ) ) { ?>
								<div class="rates__item__users">
									<?php the_sub_field( 'users' ); ?>
								</div>
							<?php } ?>
							<?php if ( get_sub_field( 'title' ) ) { ?>
								<div class="rates__item__title">
									<?php the_sub_field( 'title' ); ?>
								</div>
							<?php } ?>
							<?php if ( get_sub_field( 'text' ) ) { ?>
								<div class="rates__item__text">
									<?php the_sub_field( 'text' ); ?>
								</div>
							<?php } ?>
							<?php if ( get_sub_field( 'link' ) ) { ?>
								<?php
								$button        = get_sub_field( 'link' );
								$button_url    = $button['url'] ? $button['url'] : '#';
								$button_title  = $button['title'] ? $button['title'] : '';
								$button_target = $button['target'] ? $button['target'] : '_self';
								?>
								<div class="rates__item__link">
									<a href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>" onclick="gtag( 'event', 't_1', {   'event_category' : 'ain',   'event_label' : 'p' });ym(86987238,'reachGoal','t_1'); return true;"><?php echo esc_html( $button_title ); ?></a>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
