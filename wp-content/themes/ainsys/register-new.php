<?php
/**
 * Template Name: Регистрация v2
 *
 * @package ainsys
 */

if ( is_user_logged_in() ) {
	wp_redirect( '/my-account/' );
}

get_header();
//global $woocommerce;
/*$countries_obj   = new WC_Countries();
$countries   = $countries_obj->__get('countries');*/
$handle = 'wc-country-select';
//wp_enqueue_script($handle, get_site_url().'/wp-content/plugins/woocommerce/assets/js/frontend/country-select.min.js', array('jquery'), true);
?>
    <section class="registration">
        <div class="registration__form js-auth-tab auth">
            <h2 class="auth__title"><?php the_title(); ?></h2>
            <?php wc_print_notices(); ?>
            <?php do_action( 'woocommerce_before_customer_login_form' ); ?>

            <div class="woocommerce">
                <form method="post" class="woocommerce-form woocommerce-form-register register ">
                    <?php do_action( 'woocommerce_register_form_start' ); ?>
                    <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                        </p>
                    <?php endif; ?>
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
                        <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                        <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
                        <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
                    </p>

                        <?php
                        $field = [
                            'type' => 'country',
                            'label' => 'Country',
                            'required' => 1,
                            'class' => ['address-field']
                        ];
                        woocommerce_form_field( 'billing_country', $field, '' );

                        ?>
                    <p class="form-row form-row-wide">
                        <label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?> <span class="required">*</span></label>
                        <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />
                    </p>


                <?php endif; ?>
                    <?php do_action( 'woocommerce_register_form' ); ?>
                    <p class="woocommerce-FormRow form-row">
                        <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                        <button type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
                    </p>
                    <?php do_action( 'woocommerce_register_form_end' ); ?>
                </form>
            </div>

            <?php the_content(); ?>

            <nav class="auth-nav">
                <span>Уже есть аккаунт?</span><a href="/auth/">Войдите</a>
            </nav>
        </div>
        <div class="registration__content">

        </div>
    </section>
<!--<section class="auth">
	<div class="u-columns col2-set" id="customer_login">
		<div class="u-column1 col-1 tab js-auth-tab active">

		</div>
	</div>
</section>-->
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

//--------------
// Custom function to save Usermeta or Billing Address of registered user
/*function zk_save_billing_address($user_id){
    global $woocommerce;
    $address = $_POST;
    foreach ($address as $key => $field){
        if(startsWith($key,'billing_')){
            // Condition to add firstname and last name to user meta table
            if($key == 'billing_first_name' || $key == 'billing_last_name'){
                $new_key = explode('billing_',$key);
                update_user_meta( $user_id, $new_key[1], $_POST[$key] );
            }
            update_user_meta( $user_id, $key, $_POST[$key] );
        }
    }

}
add_action('woocommerce_created_customer','zk_save_billing_address');*/

get_footer();
