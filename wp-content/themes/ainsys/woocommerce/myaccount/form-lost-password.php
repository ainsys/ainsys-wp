<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.2
 */
 if ( function_exists( 'kama_breadcrumbs' ) ) {
	kama_breadcrumbs( '' );
}
defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>
<section class="auth auth-short">
    <div class="auth__img">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/authPass.svg"/>
    </div>
    <h2 class="title title-black title-center">Потеряли пароль?</h2>
    <h3 class="auth__subtitle">Не беспокойтесь, мы вышлем вам инструкции по сбросу.</h3>
<form method="post" class="woocommerce-ResetPassword lost_reset_password">


	<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
		<label for="user_login"><?php esc_html_e( 'Логин или Email', 'woocommerce' ); ?></label>
		<input placeholder="Введите Логин или Email" class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" autocomplete="username" />
	</p>

	<div class="clear"></div>

	<?php do_action( 'woocommerce_lostpassword_form' ); ?>

	<p class="woocommerce-form-row form-row">
		<input type="hidden" name="wc_reset_password" value="true" />
		<button type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( 'Восстановить', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
	</p>

	<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

</form>
</section>
<?php
do_action( 'woocommerce_after_lost_password_form' );
get_template_part( 'template-parts/sections/form');