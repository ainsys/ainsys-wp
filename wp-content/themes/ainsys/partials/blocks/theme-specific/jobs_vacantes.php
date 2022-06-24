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

<section class="jobs_vacantes">
    <div class="container">
    <p class="page__podtitle"><?php the_field( 'podtitle' ); ?></p>
    <h3 class="jobs_title"><?php the_field( 'title' ); ?></h3>


    <div class="jobs_vacantes_slider">
			<?php if ( have_rows( 'vacantes__slide' ) ) : ?>				
				<?php while ( have_rows( 'vacantes__slide' ) ) :
					the_row();?>

					<div class="vacantes_slide">
                        <?php if ( get_sub_field( 'slide_vacant' ) ) { ?>
                            <p class="vacantes_slide_vacant">
                                <?php the_sub_field( 'slide_vacant' ); ?>
                            </p>
                        <?php } ?>
                        <?php if ( get_sub_field( 'slide_title' ) ) { ?>
                            <p class="vacantes_slide_title">
                                <?php the_sub_field( 'slide_title' ); ?>
                            </p>
                        <?php } ?>
                        <div class="vacantes_slide_terms">
                            <?php if ( get_sub_field( 'slide_terms_place' ) ) { ?>
                                <p class="vacantes_slide_terms_text">
                                    <?php the_sub_field( 'slide_terms_place' ); ?>
                                </p>
                            <?php } ?>
                            <span>|</span>
                            <?php if ( get_sub_field( 'slide_terms_city' ) ) { ?>
                                <p class="vacantes_slide_terms_text">
                                    <?php the_sub_field( 'slide_terms_city' ); ?>
                                </p>
                            <?php } ?>
                        </div>
					</div>	
				<?php endwhile; ?>
			<?php endif; ?>
		</div>

    </div>
</section>



