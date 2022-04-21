<?php
/**
 * CTA block.
 *
 * @package ainsys
 */

$block_id = 'main-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'main full-width';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}
if ( get_field( 'bg' ) ) {
	$class_name .= ' bg-color-' . get_field( 'bg' );
}
?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?>>
	<div class="container">
		<div class="main__info">
			<div class="main__title">
				<h1>
					<?php if ( get_field( 'title_top' ) ) { ?>
						&gt;<span><?php the_field( 'title_top' ); ?></span>&lt;
					<?php } ?>
					<?php if ( get_field( 'title_bottom' ) ) { ?>
						<br><?php the_field( 'title_bottom' ); ?>
					<?php } ?>   
				</h1>
			</div>
			<?php if ( get_field( 'text' ) ) { ?>
				<p class="main__text"><?php the_field( 'text' ); ?></p>
			<?php } ?> 

			<div class="page__switch d-flex flex-wrap align-items-center justify-content-center">
				<div class="page__switch__after label_active">Без AINSYS</div>
				<div class="form-check form-switch">
					<input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
				</div>
				<div class="page__switch__before">C AINSYS</div>
			</div>
		</div>

		<div class="main__video">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/main__bg.jpg">
		</div>
	</div>
</section>
