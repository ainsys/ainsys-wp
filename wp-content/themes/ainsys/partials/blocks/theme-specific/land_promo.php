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


<section class="promo">
          <div class="container">
              <div class="promo__content">
                  <div class="promo__info">
                      <p class="promo__title">
                      <?= get_field('title');?>
                      </p>
                      <ul class="promo__items">
                      <?php if ( have_rows( 'promo_item' ) ) : ?>
                      <?php while ( have_rows( 'promo_item' ) ) :
                          the_row();?>
                           <li class="promo__item">
                           <?php if ( get_sub_field( 'text' ) ) { ?>
                              <p class="promo__text">
                              <?php the_sub_field( 'text' ); ?>
                              </p>
                            <?php } ?>
                            <?php if ( get_sub_field( 'image' ) ) { ?>
                              <img src="<?= the_sub_field('image');?>" alt="">
                            <?php } ?>
                            </li>
                            <?php endwhile; ?>
                          <?php endif; ?>
                      </ul>
                      <p class="promo__podtext">
                        <?= get_field('text_under');?>
                      </p>
                  </div>
                  <div class="promo__img">
                    <img src="<?= get_field('image_bg');?>" alt="">
                  </div>
              </div>
          </div>
      </section>