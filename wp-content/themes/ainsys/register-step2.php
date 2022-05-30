<?php
/**
 * Template Name: Регистрация шаг 2
 *
 * @package ainsys
 */

/*if ( is_user_logged_in() ) {
	wp_redirect( '/my-account/' );
}*/
//acf_form_head();
get_header('clear');
$user = wp_get_current_user();
$user_id = $user->ID;
//$user_role = $user->roles[0];

/*if ( in_array( 'author', (array) $user->roles ) ) {
    //The user has the "author" role
}*/

?>
    <section class="registration registration--step2">
        <div class="registration__aside">
            <div class="registration__logo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/components/logo.svg">
            </div>
            <ul class="registration__steps">
                <li class="finished">
                    <p>Ваши данные</p>
                    <p>Пожалуйста, укажите свои основные данные</p>
                </li>
                <li class="active">
                    <p>Ответьте на вопросы</p>
                    <p>Это поможет познакомиться с вами и предложить выгодные вам условия</p>
                </li>
                <li>
                    <p>Вход в личный кабинет</p>

                </li>
            </ul>
        </div>
        <div class="registration__form js-auth-tab auth">
            <h2 class="auth__title"><?php the_title(); ?></h2>
            <?php wc_print_notices(); ?>
            <?php do_action( 'woocommerce_before_customer_login_form' ); ?>

            <div class="woocommerce">
                <form method="post" class="woocommerce-form woocommerce-form-register register ">



                <?php



                $field_role = [
                    'type'         => 'select',
                    'options' => array(
                        'founder' => __( 'Founder / Executive Director','ainsys' ),
                        'freelancer' => __( 'Freelancer / Consultant' ,'ainsys'),
                        'development' => __( 'Development / Engineering','ainsys' ),
                        'sales' => __( 'Sales / Business Development' ,'ainsys'),
                        'management' => __( 'Product / project manager','ainsys' ),
                        'student' => __( 'Student/Professor','ainsys' ),
                        'other' => __( 'Other' )
                    ),
                    'label'        => __('Choose your role','ainsys'),
                    'required'     => true,
                    'class'        => array( 'form-row-wide' ),
                ];
                $field_size = [
                    'type'         => 'select',
                    'options' => array(
                        '1' => __( 'Only me' ,'ainsys'),
                        '2-50' => __( '2-50' ),
                        '51-200' => __( '51-200' ),
                        '201-500' => __( '201-500'),
                        '500+' => __( '500+' ),

                    ),
                    'label'        => __('What is the size of your organization?','ainsys'),
                    'required'     => true,
                    'class'        => array( 'form-row-wide' ),
                ];
                $field_industry = [
                    'type'         => 'select',
                    'options' => array(
                        'ecommerce' => __( 'Electronic commerce' ,'ainsys'),
                        'saas' => __( 'Saas' ,'ainsys'),
                        'agency' => __( 'Agency / Consulting' ,'ainsys'),
                        'education' => __( 'Education' ,'ainsys'),
                        'non-profit' => __( 'Non-profit organization' ,'ainsys'),
                        'personal-performance' => __( 'Personal performance' ,'ainsys'),
                        'other' => __( 'Other' ,'ainsys'),
                    ),
                    'label'        => __('What industry do you work in?','ainsys'),
                    'required'     => true,
                    'class'        => array( 'form-row-wide' ),
                ];
                $field_experience = [
                    'type'         => 'select',
                    'options' => array(
                        'no-experience' => __( 'No experience with automation' ,'ainsys'),
                        'other-platforms' => __( 'I have used other integration platforms' ,'ainsys'),
                        'custom' => __( 'I built custom integrations myself' ,'ainsys'),

                    ),
                    'label'        => __('Choose your experience in automation','ainsys'),
                    'required'     => true,
                    'class'        => array( 'form-row-wide' ),
                ];


                woocommerce_form_field( 'billing_client_role', $field_role, '' );
                woocommerce_form_field( 'billing_client_size', $field_size, '' );
                woocommerce_form_field( 'billing_client_industry', $field_industry, '' );
                woocommerce_form_field( 'billing_client_experience', $field_experience, '' );

                ?>

                    <p class="woocommerce-FormRow form-row">
                        <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                        <button type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
                    </p>

                </form>
            </div>

            <?php the_content(); ?>

            <div class="registration__step-indicators">
                <span></span>
                <span class="active"></span>
                <span></span>
            </div>
        </div>

    </section>

 <?php

/**
 *
 *
 * @package ainsys
 */



function ainsys_save_usermeta($user_id)  {
    $metas = array();
    if( ! empty( $_POST[ 'billing_client_role' ] ) ) {
        $metas['billing_client_role'] = $_POST[ 'billing_client_role' ];
    }
    if( ! empty( $_POST[ 'billing_client_size' ] ) ) {
        $metas['billing_client_size'] = $_POST[ 'billing_client_size' ];
    }
    if( ! empty( $_POST[ 'billing_client_industry' ] ) ) {
        $metas['billing_client_industry'] = $_POST[ 'billing_client_industry' ];
    }
    if( ! empty( $_POST[ 'billing_client_experience' ] ) ) {
        $metas['billing_client_experience'] = $_POST[ 'billing_client_experience' ];
    }

    foreach($metas as $key => $value) {
        update_user_meta( $user_id, $key, $value );
    }
}
if (isset($_POST['billing_client_role']) || isset($_POST['billing_client_size']) || isset($_POST['billing_client_industry']) || isset($_POST['billing_client_experience'])) {
    ainsys_save_usermeta($user_id);
    wp_redirect( '/my-account/' );
}


get_footer('clear');
