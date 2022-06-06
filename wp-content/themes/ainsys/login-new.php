<?php
/**
 * Template Name: Авторизация v2
 *
 * @package ainsys
 */

if ( is_user_logged_in() ) {
    wp_redirect( '/my-account/' );
}
if (isset($_SERVER['HTTP_REFERER'])) {
    $prev_page =  $_SERVER['HTTP_REFERER'];
}
if (isset($prev_page)) {
    $backlink = $prev_page;
} else {
    $backlink = get_home_url();
}

get_header('clear');

?>
    <section class="registration registration--login">
        <div class="registration__form js-auth-tab auth">

            <?php wc_print_notices(); ?>
            <?php do_action( 'woocommerce_before_customer_login_form' ); ?>

            <div class="woocommerce">
                <form method="post" class="woocommerce-form-register">
                    <a href="<?= $backlink; ?>" class="registration__backlink"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/components/arrow-back.svg" alt="back"><?php _e('Back','ainsys'); ?></a>
                    <div class="registration__image-wrapper">
                        <img class="registration__login-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/components/login-image.png" alt = "login image">
                    </div>
                    <h2 class="registration__title"><?php the_title(); ?></h2>
                    <p class="registration__subtitle"><?php _e('Please enter your details.','ainsys'); ?></p>
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
            </div>



            <nav class="auth-nav">
                <span><?php esc_html_e("Don't have an account?'", 'ainsys');  ?></span><a href="/register/"><?php esc_html_e("Register", 'ainsys');  ?></a>
            </nav>
        </div>
        <div class="registration__content">
            <div class="registration__login-logo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/components/logo.svg">
            </div>
            <?php the_content(); ?>
            <?php if(get_field('beta-version_notice_title','option') || get_field('beta-version_notice_text','option')): ?>
                <div class="registration__notice">
                    <div class="registration__notice__icon">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/components/icon-alert.svg">
                    </div>
                    <div class="registration__notice__content">
                        <p class="registration__notice__title"><?= get_field('beta-version_notice_title','option');?></p>
                        <p><?= get_field('beta-version_notice_text','option');?></p>
                    </div>

                </div>
            <?php endif; ?>
        </div>
    </section>

<?php
// Save extra register fields values
add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );
function wooc_save_extra_register_fields( $customer_id ) {
    foreach( extra_register_fields() as $fkey => $values ) {
        if ( isset($_POST['billing_'.$fkey]) ) {
            $value = in_array($fkey, ['country', 'state']) ? sanitize_text_field($_POST['billing_'.$fkey]) : esc_attr($_POST['billing_'.$fkey]);

            update_user_meta( $customer_id, 'billing_'.$fkey, $value );

            if ( in_array($fkey, ['first_name', 'last_name']) )
                update_user_meta( $customer_id, $fkey, $value );
        }
    }
}



get_footer('clear');
