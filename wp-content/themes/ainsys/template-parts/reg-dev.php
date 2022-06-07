<?php
/**
 * Register Developer page.
 *
 * @package ainsys
 */

if ( ! current_user_can( 'patnerdevelopers' ) && ! current_user_can( 'developer' ) ) {
	/**
	 * Adds menu items.
	 *
	 * @param array $menu_links - menu links.
	 *
	 * @package ainsys
	 */
	function ainsys_add_menu_items_dev( $menu_links ) {

		$menu_links = array_slice( $menu_links, 0, 10, true )
		+ array( 'reg-dev' => __('Become a Developer AINSYS','ainsys'))
		+ array_slice( $menu_links, 10, null, true );

		return $menu_links;

	}
	add_filter( 'woocommerce_account_menu_items', 'ainsys_add_menu_items_dev', 20 );

	/**
	 * Adds new endpoint.
	 *
	 * @package ainsys
	 */
	function ainsys_add_endpoint_dev() {
		add_rewrite_endpoint( 'reg-dev', EP_PAGES );
	}
	add_action( 'init', 'ainsys_add_endpoint_dev' );

	/**
	 * Adds account content.
	 *
	 * @package ainsys
	 */
	function ainsys_reg_dev_content() {
		$current_user   = wp_get_current_user();
		$userid         = $current_user->ID;
		$name           = $current_user->user_firstname;
		$country        = get_user_meta( $userid, 'shipping_country', true );
		$tel            = get_user_meta( $userid, 'billing_phone', true );
		$last_name      = $current_user->user_lastname;
		$user_otchestvo = get_the_author_meta( '_otchestvo', $userid );
		$date_roz       = get_the_author_meta( '_date_roz', $userid );
		$gender         = get_the_author_meta( '_gender', $userid );
		$age            = get_the_author_meta( '_age', $userid );
		$more_tel       = get_the_author_meta( '_more_tel', $userid );
		?>

		<section class="my-acc">
			<div class="my-acc__container">
				<a href="<?php echo esc_url( get_home_url( null, 'my-account/', 'https' ) ); ?>" class="my-acc__back">Вернуться в панель управления</a>

				<h1 class="my-acc__title">
				Форма для регистрации разработчика
				</h1>

			<div class="my-acc-reg-form">
				<?php
				if ( get_field( 'register_dev_shortcode', 'option' ) ) {
					echo do_shortcode( get_field( 'register_dev_shortcode', 'option' ) );
				}
				?>
			</div>

			<div class="my-acc-reg-cart">
				<div class="my-acc-reg-cart__wrapper">

				<div class="my-acc-reg-cart-anons">
					Создаю интеграции разных систем, программирование на всех платформах, люблю сложные задачи. Готов к работе.
				</div>

				<div class="my-acc-reg-cart__img">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets-woo/images/razrab.jpg" alt="">
				</div>

				<div class="my-acc-reg-cart__name">
					Сидоров Алексей Анатольевич
				</div>

				<div class="my-acc-reg-cart__status">
					Опыт работы: 3 года
				</div>

				<div class="my-acc-cart-stack">
					<span class="my-acc-cart-stack__item">frontend</span>
					<span class="my-acc-cart-stack__item">C++</span>
					<span class="my-acc-cart-stack__item">Java</span>
					<span class="my-acc-cart-stack__item">python</span>
				</div>

				<div class="my-acc-cart-manager">
					<div class="my-acc-cart-manager__title">Менеджер разработчика</div>
					<div class="my-acc-cart-manager__name">Лариса Анатольевна</div>
					<a href="tel:87954567899" class="my-acc-cart-manager__link">+7 795 456 78 99</a>
					<a href="mailto:larisa.anatolyevna@ainsys.com" class="my-acc-cart-manager__link">larisa.anatolyevna@ainsys.com</a>
				</div>

				<div class="my-acc-cart-status tooltip">
					<span class="tooltiptext">Каждый уровень от компании AINSYS, даёт преимущество разработчику в виде денежного эквивалента и	приглашение на участие в проектах крупных компаний.</span>
					<span class="my-acc-cart-status__text">Уровень AINSYS: Золото</span>
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets-woo/images/gold.svg" alt="">
				</div>

				<div class="my-acc-cart-time">
					Последнее обновление 12.01.2022  18:54
				</div>


				</div>
			</div>



			</div>
		</section>
		<div class="modal-sidebar modal-sidebar-work">
			<div class="modal modal-center modal-add-work">
				<div class="modal__wrapper modal-add-work__wrapper">
					<div class="modal-add-work__exit"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets-woo/images/plus.svg" alt=""></div>

					<h4 class="modal-add-work__title">Опыт работы</h4>

					<div class="modal-add-work-form">
						<div class="modal-add-work-form__item form__input-30w modal-add-work-form__input">
							<label>
								<span>Начало работы</span>
								<input type="date" name="now-date-work" class="form-control form__input" placeholder="Выберите дату">
							</label>
						</div>

						<div class="modal-add-work-form__item form__input-30w modal-add-work-form__input">
							<label>
								<span>Окончание</span>
								<input type="date" name="last-date-work" class="form-control form__input" placeholder="Выберите дату">
							</label>
						</div>

						<div class="modal-add-work-form__item form__input-30w modal-add-work-form__check">
							<label>
								<input type="checkbox" name="now-date-check" class="form-control form__input">
								По настояще время
							</label>
						</div>

						<div class="modal-add-work-form__item form__input-50w modal-add-work-form__input">
							<label>
								<span>Организация</span>
								<input type="text" name="name-work-item" class="form-control form__input" placeholder="Название компании">
							</label>
						</div>

						<div class="modal-add-work-form__item form__input-50w modal-add-work-form__input">
							<label>
								<span>Должность</span>
								<input type="text" name="name-work-dol" class="form-control form__input" placeholder="Должность">
							</label>
						</div>

						<div class="modal-add-work-form__item form__input-100w modal-add-work-form__textarea">
							<label>
								<span>Обязанности на рабочем месте</span>
								<textarea name="text-work-item" class="form-control form__input" resize="none" placeholder="Опишите, что Вы делали на работе"></textarea>
							</label>
						</div>

						<div class="modal-add-work-form__item form__input-100w modal-add-work-form__submit">
							<a href="#" class="btn btn-pink modal-add-work-form__submit-item js-add-work-item">Сохранить</a>
						</div>


					</div>

				</div>
			</div>
		</div>
		<script>
		document.addEventListener( 'wpcf7mailsent', function( event ) {
		ga('send', 'event', 'OTPRAVKA', 'Submit');
		}, false );
		</script>
		<?php
	}
	add_action( 'woocommerce_account_reg-dev_endpoint', 'ainsys_reg_dev_content' );
}
