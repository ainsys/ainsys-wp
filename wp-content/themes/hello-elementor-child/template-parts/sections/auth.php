<?php
if ( have_posts() ) : ?>
<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

    <section class="auth">
        <div class="u-columns col2-set" id="customer_login">
            <div class="u-column1 col-1 tab js-auth-tab active">

<?php endif; ?>


        <h2 class="auth__title"><?php esc_html_e( 'Вход в личный кабинет', 'woocommerce' ); ?></h2>
        <h3 class="auth__subtitle">Добро пожаловать! Пожалуйста, введите свои данные.</h3>

		<form class="woocommerce-form woocommerce-form-login login " method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="username"><?php esc_html_e( 'Email или Логин', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input placeholder="Email или Логин" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password"><?php esc_html_e( 'Пароль', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input placeholder="••••••••" class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
			</p>


                <div class="auth-form__bot">
                    <div class="auth__remember">
                    <label class="custom-checkbox">
                        <input class="woocommerce-form__input woocommerce-form__input-checkbox custom-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" checked="checked" />
                        <span>Запомнить меня</span>
                    </label>

                    </div>
                    <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="auth__lostpass"><?php esc_html_e( 'Забыли пароль?', 'woocommerce' ); ?></a>
				</div>
			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
				</label>
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
			</p>


			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>
		<nav class="auth-nav">
		    <span>Нет учетной записи?</span><a href="#" class="js-auth-link">Зарегистрироваться</a>
		</nav>
<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

	</div>
	<div class="u-column2 col-2 tab js-auth-tab">
	<?= do_shortcode('[wppb-register]');?>

		<h2 class="auth__title"><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>

		<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input placeholder="Ваше имя" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide ">
				<label for="reg_email"><?php esc_html_e( 'Email', 'woocommerce' ); ?></label>
				<span class="auth__email">
				    <input type="email" placeholder="Введите email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
		        </span>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?></label>
					<input placeholder="••••••••" type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
				    <span class="auth__signature">Минимум 6 символов (букв, цифр и спец. знаков)</span>
				</p>

			<?php else : ?>

				<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

			<?php endif; ?>


			<p class="woocommerce-form-row form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Зарегистрироваться', 'woocommerce' ); ?></button>
			</p>

			<?php do_action( 'woocommerce_register_form' ); ?>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

        <nav class="auth-nav">
		    <span>Уже есть аккаунт?</span><a href="#" class="js-auth-link">Войдите</a>
		</nav>
	</div>


</div>
</section>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>



<?php endif;?>