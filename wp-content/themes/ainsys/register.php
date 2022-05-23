<?php
/**
 * Full width page.
 *
 * Template Name: Регистрация
 *
 * @package ainsys
 */

if(is_user_logged_in()) {
   wp_redirect( '/my-account/' );
}

get_header();
?>
<section class="auth">
  <div class="u-columns col2-set" id="customer_login">
    <div class="u-column1 col-1 tab js-auth-tab active">
      <h2 class="auth__title"><?php the_title(); ?></h2>
      <?php the_content(); ?>
      <nav class="auth-nav">
        <span>Уже есть аккаунт?</span><a href="/auth/">Войдите</a>
      </nav>
	  </div>
  </div>
</section>
<?php


get_footer();