<?php
/**
 * Template Name: Регистрация v2
 *
 * @package ainsys
 */

if ( is_user_logged_in() ) {
	wp_redirect( '/my-account/' );
}

get_header('clear');

if (isset($_SERVER['HTTP_REFERER'])) {
    $prev_page =  $_SERVER['HTTP_REFERER'];
}
if (isset($prev_page)) {
    $backlink = $prev_page;
} else {
    $backlink = get_home_url();
}
//var_dump($prev_page);
//$handle = 'wc-country-select';
//wp_enqueue_script($handle, get_site_url().'/wp-content/plugins/woocommerce/assets/js/frontend/country-select.min.js', array('jquery'), true);
?>
    <section class="registration">
        <div class="registration__form js-auth-tab auth">

            <?php wc_print_notices(); ?>
            <?php do_action( 'woocommerce_before_customer_login_form' ); ?>

            <div class="woocommerce">
                <form method="post" class="woocommerce-form woocommerce-form-register register ">
                    <a href="<?= $backlink; ?>" class="registration__backlink"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/components/arrow-back.svg"><?php _e('Back','ainsys'); ?></a>
                    <h2 class="registration__title"><?php the_title(); ?></h2>
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
                        <button type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register for Free', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
                    </p>
                    <?php do_action( 'woocommerce_register_form_end' ); ?>
                </form>
            </div>

            <?php the_content(); ?>

            <nav class="auth-nav">
                <span>Уже есть аккаунт?</span><a href="/auth/">Авторизироваться</a>
            </nav>
        </div>
        <div class="registration__content">
            <div class="registration__notice">
                <div class="registration__notice__icon">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/components/icon-alert.svg">
                </div>
                <div class="registration__notice__content">
                    <p class="registration__notice__title">Сервис находится в Beta-тестировании</p>
                    <p>Обращаем ваше внимание, что система находится на этапе Бета-тестирования. Получить доступ к продукту вы сможете, подав заявку на участие в личном кабинете после регистрации. </p>
                </div>

            </div>
            <div  class="slick-slider__wrapper slider">
                <div class="slick-slider-register">
                    <div class="slick-slider__item">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/components/icon-light.svg">
                        <p class="slick-slider__item__subtitle">
                            Преимущества регистрации
                        </p>
                        <h3 class="slick-slider__item__title">Клиентам</h3>
                        <p >После регистрации вам станут доступны:</p>
                        <ul>
                            <li>Доступ к публичной Бета-версии продукта</li>
                            <li>Возможность подключать коннекторы для оценки времени и стоимости одной интеграции</li>
                            <li>Доступ к дополнительной документации</li>
                            <li>Доступ к базе программистов, специализирующихся в создании коннекторов</li>
                        </ul>
                    </div>
                    <div class="slick-slider__item">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/components/icon-light.svg">
                        <p class="slick-slider__item__subtitle">
                            Преимущества регистрации
                        </p>
                        <h3  class="slick-slider__item__title">Партнерам</h3>
                        <p>После регистрации вам станут доступны:</p>
                        <ul>
                            <li>Доступ к публичной Бета-версии продукта</li>
                            <li>Возможность подключать коннекторы для оценки времени и стоимости одной интеграции</li>
                            <li>Доступ к дополнительной документации</li>
                            <li>Доступ к базе программистов, специализирующихся в создании коннекторов</li>
                        </ul>
                    </div>
                    <div class="slick-slider__item">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/components/icon-light.svg">
                        <p class="slick-slider__item__subtitle">
                            Преимущества регистрации
                        </p>
                        <h3  class="slick-slider__item__title">Сотрудникам</h3>
                        <p>После регистрации вам станут доступны:</p>
                        <ul>
                            <li>Доступ к публичной Бета-версии продукта</li>
                            <li>Возможность подключать коннекторы для оценки времени и стоимости одной интеграции</li>
                            <li>Доступ к дополнительной документации</li>
                            <li>Доступ к базе программистов, специализирующихся в создании коннекторов</li>
                        </ul>
                    </div>
                </div>
                <div class="slick-controls">
                    <div class="slick-prev"></div>
                    <div class="slick-next"></div>
                </div>
            </div>
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
