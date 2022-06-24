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

<section class="jobs_reasosns">
    <div class="container">
        <h3 class="has-text-align-center">
            <strong><?php the_field( 'reasosns_title' ); ?></strong>
        </h3>

        <?php if ( have_rows( 'reasosns_item' ) ) : ?>
            <div class="row jobs_reasosns_wrapper">
                <?php
                $i = 0;
                while ( have_rows( 'reasosns_item' ) ) :
                    the_row();
                    $i++;
                    ?>
                    <div class="jobs_reasosns_item_block col-sm-6 col-12">
                        <div class="jobs_reasosns_item">
                            <div class="jobs_reasosns_item_head">
                                <img class="jobs_reasosns_item_head_img" src="<?= the_sub_field('item_img');?>" alt="jobs">
                                <p class="jobs_reasosns_item_head_title">
                                    <?= the_sub_field('item_title');?>
                                </p>
                            </div>
                            <p class="jobs_reasosns_item_text">
                                <?= the_sub_field('item_text');?>
                            </p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>



