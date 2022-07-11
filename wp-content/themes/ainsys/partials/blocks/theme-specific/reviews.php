<?php
/**
 * Reviews block.
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

<section class="reviews">
    <div class="container">
        <h4>
            <?= get_field('title');?>							
        </h4>
        <div class="reviews_wrapper">
            <div class="col-lg-4 col-md-6 col-12">
                <?php if ( have_rows( 'reviews_item' ) ) : ?>
                    <?php while ( have_rows( 'reviews_item' ) ) :
                    the_row();?>
                        <div class="reviews_item">
                            <div class="reviews_item_content">
                                <?php if ( get_sub_field( 'reviews_avatar' ) ) { ?>
                                    <img src="<?= the_sub_field('reviews_avatar');?>" class="reviews_item_content_img" alt="">
                                <?php } ?>
                            </div>
                            <div class="reviews_item_info">
                                <div class="reviews_item_info_head">
                                    <?php if ( get_sub_field( 'reviews_name' ) ) { ?>
                                        <p class="reviews_item_info_head_name">
                                            <?php the_sub_field( 'reviews_name' ); ?>
                                        </p>
                                    <?php } ?>
                                    <?php if ( get_sub_field( 'reviews_data' ) ) { ?>
                                        <p class="reviews_item_info_head_data">
                                            <?php the_sub_field( 'reviews_data' ); ?>
                                        </p>
                                    <?php } ?>
                                </div>
                                <div class="reviews_item_info_massage">
                                    <?php if ( get_sub_field( 'reviews_massage' ) ) { ?>
                                        <p class="bundles_item_massage_text">
                                            <?php the_sub_field( 'reviews_massage' ); ?>
                                        </p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>    
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <?php if ( have_rows( 'reviews_item_two' ) ) : ?>
                    <?php while ( have_rows( 'reviews_item_two' ) ) :
                    the_row();?>
                        <div class="reviews_item">
                            <div class="reviews_item_content">
                                <?php if ( get_sub_field( 'reviews_avatar' ) ) { ?>
                                    <img src="<?= the_sub_field('reviews_avatar');?>" class="reviews_item_content_img" alt="">
                                <?php } ?>
                            </div>
                            <div class="reviews_item_info">
                                <div class="reviews_item_info_head">
                                    <?php if ( get_sub_field( 'reviews_name' ) ) { ?>
                                        <p class="reviews_item_info_head_name">
                                            <?php the_sub_field( 'reviews_name' ); ?>
                                        </p>
                                    <?php } ?>
                                    <?php if ( get_sub_field( 'reviews_data' ) ) { ?>
                                        <p class="reviews_item_info_head_data">
                                            <?php the_sub_field( 'reviews_data' ); ?>
                                        </p>
                                    <?php } ?>
                                </div>
                                <div class="reviews_item_info_massage">
                                    <?php if ( get_sub_field( 'reviews_massage' ) ) { ?>
                                        <p class="bundles_item_massage_text">
                                            <?php the_sub_field( 'reviews_massage' ); ?>
                                        </p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>    
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <?php if ( have_rows( 'reviews_item_three' ) ) : ?>
                    <?php while ( have_rows( 'reviews_item_three' ) ) :
                    the_row();?>
                        <div class="reviews_item">
                            <div class="reviews_item_content">
                                <?php if ( get_sub_field( 'reviews_avatar' ) ) { ?>
                                    <img src="<?= the_sub_field('reviews_avatar');?>" class="reviews_item_content_img" alt="">
                                <?php } ?>
                            </div>
                            <div class="reviews_item_info">
                                <div class="reviews_item_info_head">
                                    <?php if ( get_sub_field( 'reviews_name' ) ) { ?>
                                        <p class="reviews_item_info_head_name">
                                            <?php the_sub_field( 'reviews_name' ); ?>
                                        </p>
                                    <?php } ?>
                                    <?php if ( get_sub_field( 'reviews_data' ) ) { ?>
                                        <p class="reviews_item_info_head_data">
                                            <?php the_sub_field( 'reviews_data' ); ?>
                                        </p>
                                    <?php } ?>
                                </div>
                                <div class="reviews_item_info_massage">
                                    <?php if ( get_sub_field( 'reviews_massage' ) ) { ?>
                                        <p class="bundles_item_massage_text">
                                            <?php the_sub_field( 'reviews_massage' ); ?>
                                        </p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>    
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>