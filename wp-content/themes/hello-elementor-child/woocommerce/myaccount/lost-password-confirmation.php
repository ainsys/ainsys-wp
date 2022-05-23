<?php
/**
 * Lost password confirmation text.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/lost-password-confirmation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.9.0
 */

defined( 'ABSPATH' ) || exit;

wc_print_notice( esc_html__( 'Password reset email has been sent.', 'woocommerce' ) );
?>

<section class="auth">
 <div class="auth__img">
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/succes.svg"/>
 </div>
 <h2 class="title title-black title-center">Пароль успешно изменен</h2>
 <a href="/auth/" class="btn-blue auth__btn">Войти на сайт</a>
</section>

<?php get_template_part( 'template-parts/sections/form');
