<?php
/**
 * Template Name: Авторизация
 *
 * @package ainsys
 */

if ( is_user_logged_in() ) {
	wp_redirect( '/my-account/' );
}

get_header();
?>

<section class="auth auth-short">
	<div class="u-columns col2-set" id="customer_login">
		<div class="u-column1 col-1 tab js-auth-tab active">
			<h2 class="auth__title"><?php the_title(); ?></h2>
			<form method="post" class="wc-auth-login">
				<p class="form-row form-row-wide">
					<label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="input-text" name="username" id="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" /><?php //@codingStandardsIgnoreLine ?>
				</p>
				<p class="form-row form-row-wide">
					<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input class="input-text" type="password" name="password" id="password" />
				</p>
				<p class="wc-auth-actions">
					<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
					<button type="submit" class="button button-large button-primary wc-auth-login-button" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'Login', 'woocommerce' ); ?></button>
					<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect_url ); ?>" />
				</p>
			</form>
			<?php the_content(); ?>
			<nav class="auth-nav">
				<span>Нет учетной записи?</span><a href="/register/">Зарегистрироваться</a>
			</nav>
		</div>
	</div>
</section>

<?php
get_footer();
