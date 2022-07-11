<?php
/**
 * Scroll bundles block.
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

<section class="bundles">
    <div class="container">
        <div class="bundles_header">
            <h4>
                <?= get_field('title');?>							
            </h4>
            <p class="page__text">
                <?= get_field('text');?>
            </p>
        </div>
        <div id="bundles_wrapper" class="bundles_wrapper">
            <?php if ( have_rows( 'bundles_item' ) ) : ?>
                <?php while ( have_rows( 'bundles_item' ) ) :
                the_row();?>
                    <div class="bundles_item_wrapper col-lg-4 col-md-6 col-12">
                        <div class="bundles_item">
                            <div class="bundles_item_imgs">
                                <?php if ( get_sub_field( 'systemfirst' ) ) { ?>
                                    <img src="<?= the_sub_field('systemfirst');?>" class="bundles_item_img" alt="">
                                <?php } ?>
                                <?php if ( get_sub_field( 'systemsecond' ) ) { ?>
                                    <img src="<?= the_sub_field('systemsecond');?>" class="bundles_item_img" alt="">
                                <?php } ?>
                            </div>
                            <?php if ( get_sub_field( 'title' ) ) { ?>
                                <p class="bundles_item_title">
                                    <?php the_sub_field( 'title' ); ?>
                                </p>
                            <?php } ?>
                            <?php if ( get_sub_field( 'text' ) ) { ?>
                                <p class="bundles_item_text">
                                    <?php the_sub_field( 'text' ); ?>
                                </p>
                            <?php } ?>
                            <?php if ( get_sub_field( 'btn' ) ) { ?>
                                <a href="<?php the_sub_field( 'btn_href' ); ?>" class="btn btn-primary bundles_item_btn">
                                    <?php the_sub_field( 'btn' ); ?>
                                </a>
                            <?php } ?>
                        </div> 
                    </div>       
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="scroll_more">
            <?= get_field('scroll_more');?>
        </div>
    </div>
</section>