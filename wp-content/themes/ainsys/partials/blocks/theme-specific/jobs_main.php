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

<section class="jobs">
    <div class="container">
        <div class="jobs_wrapper">
            <div class="jobs_wrapper_content col-md-6 col-12">

			<div class="jobs_wrapper_content_title">
				<h1>
                    <?php the_field( 'jobs_title' ); ?>
					&gt;<span id="Ticker"><?php the_field( 'jobs_title_span' ); ?></span>&lt;
				</h1>
			</div>
			<p class="jobs_wrapper_content_text"><?php the_field( 'jobs_text' ); ?></p>
            <button class="btn btn-primary jobs_wrapper_content_btn"><?php the_field( 'jobs_btn' ); ?></button>

            </div>
            <div class="jobs_wrapper_bg  col-md-6 col-12">
                <img class="jobs_wrapper_bg_img" src="<?= get_field('jobs_bg');?>" alt="jobs">
            </div>
        </div>
    </div>
</section>