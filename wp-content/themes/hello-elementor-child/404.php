<?php
/**
 * The main template file
 * Template Name: 404
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

wp_head();

$pageId = get_queried_object()->ID;

get_header()
?>

<section class="page404">
  <div class="page404__container">

    <div class="page404-text">
      <h1 class="page404-text__title">
        <?= get_field('404-title'); ?>
      </h1>
      <h2 class="page404-text__subtitle">
        <?= get_field('404-subtitle'); ?>
      </h2>
      <a href="<?= get_home_url();?>" class="btn-blue page404__btn">Вернуться на главную</a>
    </div>

    <div class="page404-img">
      <?php

      $image = get_field('404-img');

      if( !empty($image) ): ?>

      	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

      <?php endif; ?>
    </div>

  </div>
</section>

<?php



get_footer();