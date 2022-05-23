<?php
/**
 * The main template file
 * Template Name: Страница "Как стать..."
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */



get_header();
?>
<section class="how">
  <div class="how__container">
    <h1 class="how__title">
      <?php the_title();?>
    </h1>
    <div class="how__subtitle">
      <?php the_content();?>
    </div>

    <div class="how__content">
    <?php if( have_rows('how-repeater') ): ?>
        <?php while( have_rows('how-repeater') ): the_row();
            $image = get_sub_field('how-repeater-img');
            $size = get_sub_field('pagehow');
            $title = get_sub_field('how-repeater-title');
            $text = get_sub_field('how-repeater-text');
            ?>
            <div class="how-item">
              <div class="how-item__img">
                <div class="how-item__img-wrapper">
                  <?php if( $image ) {
                      echo wp_get_attachment_image( $image, $size );
                  }?>
                </div>
              </div>

              <div class="how-item__content">
                <h3 class="how-item__title">
                  <?= $title;?>
                </h3>

                <div class="how-item__text">
                  <?= $text;?>
                </div>
              </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    </div>

  </div>
</section>
<?php


get_footer();