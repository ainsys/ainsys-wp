<?php
/**
 * Register partner page.
 *
 * @package ainsys
 */

if ( ! current_user_can( 'integrator' ) ) {
	/**
	 * Adds menu items.
	 *
	 * @param array $menu_links - menu links.
	 *
	 * @package ainsys
	 */
	function ainsys_add_menu_items_partner( $menu_links ) {

		$menu_links = array_slice( $menu_links, 0, 15, true )
		+ array( 'reg-part' => __('Become a Partner AINSYS','ainsys') )
		+ array_slice( $menu_links, 15, null, true );

		return $menu_links;

	}
	add_filter( 'woocommerce_account_menu_items', 'ainsys_add_menu_items_partner', 30 );

	/**
	 * Adds new endpoint.
	 *
	 * @package ainsys
	 */
	function ainsys_add_endpoint_partner() {
		add_rewrite_endpoint( 'reg-part', EP_PAGES );
	}
	add_action( 'init', 'ainsys_add_endpoint_partner' );

	/**
	 * Adds account content.
	 *
	 * @package ainsys
	 */
	function ainsys_reg_partner_content() {
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

				<h1 class="my-acc__title">Форма для регистрации партнёра</h1>

			<div class="my-acc-reg-form my-acc-reg-form-partner">
				<?php
				if ( get_field( 'register_partner_shortcode', 'option' ) ) {
					echo do_shortcode( get_field( 'register_partner_shortcode', 'option' ) );
				}
				?>
			</div>

			<div class="my-acc-reg-cart">
				<div class="my-acc-reg-cart__wrapper">

				<div class="my-acc-reg-cart-anons">
					В поисках амбициозных разработчиков, которые готовы помочь в реализации нового функционала интеграции систем.
				</div>

				<div class="my-acc-reg-cart__img">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets-woo/images/partner.jpg" alt="">
				</div>

				<div class="my-acc-reg-cart__name">
					Иванов Иван Иваныч
				</div>

				<div class="my-acc-reg-cart__status">
					Компания “IKEA”
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
					Последнее обновление 12.01.2022	18:54
				</div>


				</div>
			</div>



			</div>
		</section>

		<?php
	}
	add_action( 'woocommerce_account_reg-part_endpoint', 'ainsys_reg_partner_content' );
}
