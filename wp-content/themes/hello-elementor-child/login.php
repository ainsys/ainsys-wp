<?php
/**
 * The main template file
 * Template Name: Авторизация
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

if(is_user_logged_in()) {
   wp_redirect( '/my-account/' );
}

get_header();
?>
<section class="auth auth-short">
  <div class="u-columns col2-set" id="customer_login">
    <div class="u-column1 col-1 tab js-auth-tab active">
      <h2 class="auth__title"><?php the_title(); ?></h2>
      <?php the_content(); ?>
      <nav class="auth-nav">
        <span>Нет учетной записи?</span><a href="/register/">Зарегистрироваться</a>
      </nav>
	  </div>
  </div>
</section>
<?php


get_footer();