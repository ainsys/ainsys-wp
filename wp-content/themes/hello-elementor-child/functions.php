<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:
wp_enqueue_script('jquery');

define('AINSYS_DIR_CSS', get_template_directory_uri() . '/assets/css/');
define('AINSYS_DIR_IMG', get_template_directory_uri() . '/assets/images/');
define('AINSYS_DIR_JS', get_template_directory_uri() . '/assets/js/');
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('page404_css', AINSYS_DIR_CSS . 'page404.css');
	wp_enqueue_style('ion_min_css', AINSYS_DIR_CSS . 'ion.min.css');
	wp_enqueue_style('useful-article_css', AINSYS_DIR_CSS . 'useful-article.css');
	wp_enqueue_style('login_css', AINSYS_DIR_CSS . 'login.css');
	wp_enqueue_style('land_css', AINSYS_DIR_CSS . 'land.css');
	wp_enqueue_style('tab_css', AINSYS_DIR_CSS . 'tab.css');
	wp_enqueue_style('forum_css', AINSYS_DIR_CSS . 'forum.css');
	wp_enqueue_style('acc_css', AINSYS_DIR_CSS . 'acc.css');
	wp_enqueue_style('main_css', AINSYS_DIR_CSS . 'main.css');
	wp_enqueue_style('maindop_css', AINSYS_DIR_CSS . 'maindop.css');
	wp_enqueue_style('cart_css', AINSYS_DIR_CSS . 'cart.css');
	wp_enqueue_style('dadata_css', AINSYS_DIR_CSS . 'dadata.css');
	wp_enqueue_style('fonts_css', AINSYS_DIR_CSS . 'fonts/fonts.css');
	wp_enqueue_style('main-page_css', AINSYS_DIR_CSS . 'main-page.css');
	if (is_single()){
		wp_enqueue_script('forum_js', AINSYS_DIR_JS . 'forum.js');
	}
	wp_enqueue_script('swiper_js', AINSYS_DIR_JS . 'swiper.js');
	wp_enqueue_script('ion_min_js', AINSYS_DIR_JS . 'ion.min.js');
	wp_enqueue_script('tabs_js', AINSYS_DIR_JS . 'tabs.js');
	wp_enqueue_script('main_js', AINSYS_DIR_JS . 'main.js');
	wp_enqueue_script('main-page_js', AINSYS_DIR_JS . 'main-page.js');
});

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
function chld_thm_cfg_locale_css( $uri ){
	if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
		$uri = get_template_directory_uri() . '/rtl.css';
	return $uri;
}
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'child_theme_configurator_css' ) ):
function child_theme_configurator_css() {
	wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'hello-elementor','hello-elementor','hello-elementor-theme-style' ) );
}
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 11 );

// END ENQUEUE PARENT ACTION

add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
	wp_redirect( home_url() );
	exit();
}


// Карточка товара
if ( class_exists( 'WooCommerce' ) ) {
	require get_stylesheet_directory() . '/woocommerce/includes/wc-functions-product.php';
}

//ЛК
function my_woocommerce_account_menu_items($items) {
	unset($items['dashboard']);         // убрать вкладку Консоль
	// unset($items['orders']);             // убрать вкладку Заказы
	unset($items['downloads']);         // убрать вкладку Загрузки
	//unset($items['edit-address']);         // убрать вкладку Адреса
	unset($items['edit-account']);         // убрать вкладку Детали учетной записи
	// unset($items['customer-logout']);     // убрать вкладку Выйти
	return $items;
}
function woo_change_account_order() {
	$myorder = array();

	if(!current_user_can('patnerdevelopers') && !current_user_can('developer')  && !current_user_can('integrator') ){
		$myorder = array(
			'login-security'     => __( 'Мой профиль', 'woocommerce' ),
			'orders'             => __( 'Ваши заказы', 'woocommerce' ),
			'reg-dev'            => __( 'Стать разработчиком AINSYS', 'woocommerce' ),
			'reg-part'           => __( 'Стать партнёром AINSYS', 'woocommerce' ),
			'customer-logout'    => __( 'Выйти', 'woocommerce' ),
		);
	} else if(current_user_can('patnerdevelopers') || current_user_can('developer')){
		$myorder = array(
			'login-security'     => __( 'Мой профиль', 'woocommerce' ),
			'orders'             => __( 'Ваши заказы', 'woocommerce' ),
			'reg-part'           => __( 'Стать партнёром AINSYS', 'woocommerce' ),
			'customer-logout'    => __( 'Выйти', 'woocommerce' ),
		);
	} else if(current_user_can('integrator')){
		$myorder = array(
			'login-security'     => __( 'Мой профиль', 'woocommerce' ),
			'orders'             => __( 'Ваши заказы', 'woocommerce' ),
			'reg-dev'            => __( 'Стать разработчиком AINSYS', 'woocommerce' ),
			'customer-logout'    => __( 'Выйти', 'woocommerce' ),
		);
	}

	return $myorder;
}
add_filter ( 'woocommerce_account_menu_items', 'woo_change_account_order' );

add_filter( 'woocommerce_account_menu_items', 'my_woocommerce_account_menu_items', 10 );


// Кастомные поля для ЛК
require( 'inc/carbon-fields.php' );

//Вход и безопасность
require( 'template-parts/login-and-security.php' );
require( 'template-parts/reg-dev.php' );
require( 'template-parts/reg-part.php' );

add_action('hello_elementor_page_title', 'gokama', 10, 1);
function gokama(){
	if (is_checkout() || is_account_page()){
		the_title( '<h1 class="entry-title">', '</h1>' );
	}
	return $hide;
}


//Размер миниатюр в корзине
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'cart-thumb', 52, 52 );
}
add_filter( 'woocommerce_cart_item_thumbnail', 'change_image_size_in_cart', 10, 2 );

function change_image_size_in_cart( $product_image, $cart_item ) {

	if( is_cart() ) {
		$product = $cart_item['data'];

		$product_image = $product->get_image( 'cart-thumb' );
	}

	return $product_image;
}


//fix Бага корзины на странице благодарности
add_filter( 'woocommerce_output_cart_shortcode_content', 'true_cart_shortcode', 25 );

function true_cart_shortcode( $display_cart ) {

	if( is_wc_endpoint_url( 'order-received' ) ) {
		$display_cart = false;
	}
	return $display_cart;

}

//Редирект с пустой корзины
add_action( 'template_redirect', 'true_redirect_empty_cart', 25 );

function true_redirect_empty_cart() {

	if(
		is_cart()
		&& is_checkout()
		&& 0 == WC()->cart->get_cart_contents_count()
		&& ! is_wc_endpoint_url( 'order-pay' )
		&& ! is_wc_endpoint_url( 'order-received' )
	) {

		wp_safe_redirect( '/test/' );
		exit;
	}
}


// Массовое добавление товаров в корзину
function woocommerce_maybe_add_multiple_products_to_cart() {
	// Make sure WC is installed, and add-to-cart qauery arg exists, and contains at least one comma.
	if ( ! class_exists( 'WC_Form_Handler' ) || empty( $_REQUEST['add-to-cart'] ) || false === strpos( $_REQUEST['add-to-cart'], ',' ) ) {
		return;
	}

	// Remove WooCommerce's hook, as it's useless (doesn't handle multiple products).
	remove_action( 'wp_loaded', array( 'WC_Form_Handler', 'add_to_cart_action' ), 20 );

	$product_ids = explode( ',', $_REQUEST['add-to-cart'] );
	$count       = count( $product_ids );
	$number      = 0;

	foreach ( $product_ids as $product_id ) {
		if ( ++ $number === $count ) {
			// Ok, final item, let's send it back to woocommerce's add_to_cart_action method for handling.
			$_REQUEST['add-to-cart'] = $product_id;

			return WC_Form_Handler::add_to_cart_action();
		}

		$product_id        = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $product_id ) );
		$was_added_to_cart = false;
		$adding_to_cart    = wc_get_product( $product_id );

		if ( ! $adding_to_cart ) {
			continue;
		}

		$add_to_cart_handler = apply_filters( 'woocommerce_add_to_cart_handler', $adding_to_cart->product_type, $adding_to_cart );


		if ( 'simple' !== $add_to_cart_handler ) {
			continue;
		}

		$quantity          = empty( $_REQUEST['quantity'] ) ? 1 : wc_stock_amount( $_REQUEST['quantity'] );
		$passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );

		if ( $passed_validation && false !== WC()->cart->add_to_cart( $product_id, $quantity ) ) {
			wc_add_to_cart_message( array( $product_id => $quantity ), true );
		}
	}
}

add_action( 'wp_loaded', 'woocommerce_maybe_add_multiple_products_to_cart', 15 );





//Инфо в карточку товара
function show_description_in_cart() {?>
<div class="card__descr">
	<?php the_excerpt();?>
</div>
<? }
add_action( 'woocommerce_after_shop_loop_item_title', 'show_description_in_cart', 20);



// Форма регистрации
/*
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );
function my_custom_checkout_field_update_order_meta( $order_id ) {
	update_post_meta( $order_id, 'name', sanitize_text_field( $_POST['billing_first_name'] ) );
	update_post_meta( $order_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
	update_post_meta( $order_id, 'telephone', sanitize_text_field( $_POST['billing_phone'] ) );
	update_post_meta( $order_id, 'email', sanitize_text_field( $_POST['billing_email'] ) );


	update_post_meta( $order_id, 'budget', sanitize_text_field( $_POST['shipping_wooccm11'] ) );
	update_post_meta( $order_id, 'currency', sanitize_text_field( $_POST['shipping_wooccm12'] ) );

	update_post_meta( $order_id, 'desired_date', sanitize_event_time( $_POST['shipping_wooccm13'] ) );
	update_post_meta( $order_id, 'limited_date', sanitize_event_time( $_POST['shipping_wooccm14'] ) );

	update_post_meta( $order_id, 'comment_order_1', sanitize_textarea_field( $_POST['shipping_wooccm10'] ) );

	update_post_meta( $order_id, 'inn', sanitize_text_field( $_POST['shipping_wooccm16'] ) );
	update_post_meta( $order_id, 'kpp', sanitize_text_field( $_POST['shipping_wooccm17'] ) );
	update_post_meta( $order_id, 'address_org', sanitize_text_field( $_POST['shipping_address_1'] ) );

	update_post_meta( $order_id, 'alt_comm_val', sanitize_text_field( $_POST['shipping_wooccm19'] ) );
	update_post_meta( $order_id, 'alt_comm_name', sanitize_text_field( $_POST['shipping_wooccm20'] ) );

  update_post_meta( $order_id, 'order_comments', sanitize_textarea_field( $_POST['order_comments'] ) );
}


Display field value on the order edit page

add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta( $order ) {
	echo '<p><strong>' . __( 'name' ) . ':</strong> ' . get_post_meta( $order->id, 'name', true ) . '</p>';
	echo '<p><strong>' . __( 'last_name' ) . ':</strong> ' . get_post_meta( $order->id, 'last_name', true ) . '</p>';
	echo '<p><strong>' . __( 'telephone' ) . ':</strong> ' . get_post_meta( $order->id, 'telephone', true ) . '</p>';
	echo '<p><strong>' . __( 'email' ) . ':</strong> ' . get_post_meta( $order->id, 'email', true ) . '</p>';

	echo '<p><strong>' . __( 'budget' ) . ':</strong> ' . get_post_meta( $order->id, 'budget', true ) . '</p>';
	echo '<p><strong>' . __( 'currency' ) . ':</strong> ' . get_post_meta( $order->id, 'currency', true ) . '</p>';

	echo '<p><strong>' . __( 'desired_date' ) . ':</strong> ' . get_post_meta( $order->id, 'desired_date', true ) . '</p>';
	echo '<p><strong>' . __( 'limited_date' ) . ':</strong> ' . get_post_meta( $order->id, 'currency', true ) . '</p>';

	echo '<p><strong>' . __( 'comment_order_1' ) . ':</strong> ' . get_post_meta( $order->id, 'comment_order_1', true ) . '</p>';

	echo '<p><strong>' . __( 'inn' ) . ':</strong> ' . get_post_meta( $order->id, 'inn', true ) . '</p>';
	echo '<p><strong>' . __( 'kpp' ) . ':</strong> ' . get_post_meta( $order->id, 'kpp', true ) . '</p>';
	echo '<p><strong>' . __( 'address_org ' ) . ':</strong> ' . get_post_meta( $order->id, 'address_org', true ) . '</p>';

	echo '<p><strong>' . __( 'alt_comm_val' ) . ':</strong> ' . get_post_meta( $order->id, 'alt_comm_val', true ) . '</p>';
	echo '<p><strong>' . __( 'alt_comm_name' ) . ':</strong> ' . get_post_meta( $order->id, 'alt_comm_name', true ) . '</p>';

  echo '<p><strong>' . __( 'order_comments' ) . ':</strong> ' . get_post_meta( $order->id, 'order_comments', true ) . '</p>';
}

add_filter( 'ainsys_new_order_fields', 'add_fields_to_checkout', 10, 2 );

function add_fields_to_checkout( $order_data, $order ) {
	$variables = array(
		'name'                => get_post_meta( $order->id, 'name', true ),
		'last_name'           => get_post_meta( $order->id, 'last_name', true ),
		'telephone'           => get_post_meta( $order->id, 'telephone', true ),
		'email'               => get_post_meta( $order->id, 'email', true ),

		'budget'              => get_post_meta( $order->id, 'budget', true ),
		'currency'            => get_post_meta( $order->id, 'currency', true ),

		'desired_date'        => get_post_meta( $order->id, 'desired_date', true ),
		'limited_date'        => get_post_meta( $order->id, 'limited_date', true ),

		'comment_order_1'     => get_post_meta( $order->id, 'comment_order_1', true ),

		'inn'                 => get_post_meta( $order->id, 'inn', true ),
		'kpp'                 => get_post_meta( $order->id, 'kpp', true ),
		'address_org'         => get_post_meta( $order->id, 'address_org', true ),

		'alt_comm_val'        => get_post_meta( $order->id, 'alt_comm_val', true ),
		'alt_comm_name'       => get_post_meta( $order->id, 'alt_comm_name', true ),

		'order_comments'      => get_post_meta( $order->id, 'order_comments', true ),
	);

	foreach ( $variables as $lable => $value ) {
		$order_data[ $lable ] = $value;
	}

	return $order_data;
}
 */
// ajax поиск по сайту
add_action( 'wp_ajax_nopriv_codyshop_ajax_search', 'codyshop_ajax_search' );
add_action( 'wp_ajax_codyshop_ajax_search', 'codyshop_ajax_search' );
function codyshop_ajax_search(){
	$args = array(
		'post_type'      => 'product',
		'post_status'    => 'publish',
		'order'          => 'DESC',
		'orderby'        => 'date',
		's'              => $_POST['term'],
		'posts_per_page' => 5
	);
	$query = new WP_Query( $args );
	if($query->have_posts()){
		while ($query->have_posts()) { $query->the_post();
									  global $product?>
<li class="js-item-search-reg-form">
	<?php if(!empty($codyshop_url)) {
										  the_post_thumbnail('cart-thumb');
									  } else { ?>
	<?php } ?>
	<?php the_post_thumbnail('cart-thumb'); ?>
	<a href="#"><?php the_title(); ?><span class="plus">+</span></a>
</li>
<?php } }else{ ?>
<li><a href="#">Ничего не найдено, попробуйте другой запрос</a></li>
<?php } exit;
}


add_action( 'pre_get_posts', 'cody_search_filter' );
function cody_search_filter( $query ){
	if( ! is_admin() && $query->is_main_query() ){
		if( $query->is_search ){
			$query->set( 'sentence', 1 );
		}
	}
}


add_filter( 'posts_search', 'cody_search_only_in_title', 500, 2 );
function cody_search_only_in_title( $search, $wp_query ) {
	global $wpdb;
	if (empty($search))
		return $search;
	$q = $wp_query->query_vars;
	$n = !empty($q['exact']) ? '' : '%';
	$search = $searchand = '';
	foreach ((array) $q['search_terms'] as $term) {
		$term = esc_sql( $wpdb->esc_like( $term ) );
		$search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
		$searchand = ' AND ';
	}
	if (!empty($search)) {
		$search = " AND ({$search}) ";
		if (!is_user_logged_in())
			$search .= " AND ($wpdb->posts.post_password = '') ";
	}
	return $search;
}


add_filter( 'posts_results', 'cody_search_cir_lat', 10, 2 );
function cody_search_cir_lat( $posts, $query ) {

	if ( is_admin() || !$query->is_search ) return $posts;

	global $wp_query;

	if ( $wp_query->found_posts == 0 ) {

		// замена латиницы на кириллицу
		$letters = array( 'f' => 'а', ',' => 'б', 'd' => 'в', 'u' => 'г', 'l' => 'д', 't' => 'е', '`' => 'ё', ';' => 'ж', 'p' => 'з', 'b' => 'и', 'q' => 'й', 'r' => 'к', 'k' => 'л', 'v' => 'м', 'y' => 'н', 'j' => 'о', 'g' => 'п', 'h' => 'р', 'c' => 'с', 'n' => 'т', 'e' => 'у', 'a' => 'ф', '[' => 'х', 'w' => 'ц', 'x' => 'ч', 'i' => 'ш', 'o' => 'щ', ']' => 'ъ', 's' => 'ы', 'm' => 'ь', '\'' => 'э', '.' => 'ю', 'z' => 'я' );

		$cir = array( 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', 'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я' );
		$lat = array( 'f', ',', 'd', 'u', 'l', 't', '`', ';', 'p', 'b', 'q', 'r', 'k', 'v', 'y', 'j', 'g', 'h', 'c', 'n', 'e', 'a', '[', 'w', 'x', 'i', 'o', ']', 's', 'm', '\'', '.', 'z', 'F', ',', 'D', 'U', 'L', 'T', '`', ';', 'P', 'B', 'Q', 'R', 'K', 'V', 'Y', 'J', 'G', 'H', 'C', 'N', 'E', 'A', '[', 'W', 'X', 'I', 'O', ']', 'S', 'M', '\'', '.', 'Z' );
		$new_search = str_replace( $lat, $cir, $wp_query->query_vars['s'] );

		// производим выборку из базы данных
		global $wpdb;
		$request = $wpdb->get_results( str_replace( $wp_query->query_vars['s'], $new_search, $query->request ) );

		if ( $request ) {
			$new_posts = array();
			foreach ( $request as $post ) {
				$new_posts[] = get_post( $post->ID );
			}
			if ( count( $new_posts ) > 0 ) {
				$posts = $new_posts;
			}
		}
	}
	// возвращаем массив найденных постов
	return $posts;
}


//Компетенции разработчиков и поиск по ним
require( 'template-parts/comp-settings.php' );

add_action( 'wp_ajax_nopriv_codyshop_ajax_search_comp', 'codyshop_ajax_search_comp' );
add_action( 'wp_ajax_codyshop_ajax_search_comp', 'codyshop_ajax_search_comp' );
function codyshop_ajax_search_comp(){
	$args = array(
		'post_type'      => 'comp',
		'post_status'    => 'publish',
		'order'          => 'DESC',
		'orderby'        => 'date',
		's'              => $_POST['term'],
		'posts_per_page' => 5
	);
	$query = new WP_Query( $args );
	if($query->have_posts()){
		while ($query->have_posts()) { $query->the_post();
									  global $post?>
<li class="js-item-search-reg-form-comp">
	<?php if(!empty($codyshop_url)) {
										  the_post_thumbnail('cart-thumb');
									  } else { ?>
	<?php } ?>
	<div class="comp"><?php echo get_the_title()[0];?></div>
	<a href="#"><?php the_title(); ?><span class="plus">+</span></a>
</li>
<?php } }else{ ?>
<li><a href="#">Ничего не найдено, попробуйте другой запрос</a></li>
<?php } exit;
}



//Поиск по конкурентам


add_action( 'wp_ajax_nopriv_codyshop_ajax_search_tarifsconc', 'codyshop_ajax_search_tarifsconc' );
add_action( 'wp_ajax_codyshop_ajax_search_tarifsconc', 'codyshop_ajax_search_tarifsconc' );
function codyshop_ajax_search_tarifsconc(){
	$args = array(
		'post_type'      => 'product',
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => 'ASC',
		'tax_query'      => array( array(
			'taxonomy' => 'product_cat',
			'field' => 'slug',
			'terms' => 'tarifs-concurent',
		)
								 ),
		's'              => $_POST['term'],
		'posts_per_page' => 5
	);
	$query = new WP_Query( $args );
	if($query->have_posts()){
		while ($query->have_posts()) { $query->the_post();
									  global $product;
?>
<li class="js-item-search-tarifsconc">
	<div class="comp"><?php echo get_the_title()[0];?></div>
	<a href="#"><?php the_title(); ?><span class="plus">+</span></a>
	<div class="js-item-search-tarifsconc-hidden">
		<span class="js-item-search_tarifsconc__price"><?= wc_price($product->get_price()) ?></span>
		<span class="js-item-search_tarifsconc__name"><?php the_title(); ?></span>

		<span class="js-item-search-tarifsconc__attr"><?= wc_price($product->get_price()) ?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'price-and-ogr-1' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'price-and-ogr-2' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'price-and-ogr-3' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'price-and-ogr-4' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'price-and-ogr-5' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'price-and-ogr-6' );?></span>




		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'limit-count-user' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'com-roles-user' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'save-user-data' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'zadach-comments' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'log-users' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'online-communication' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'learn-fast-support' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'premium-support' );?></span>


		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'automatization-1' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'automatization-2' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'automatization-3' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'automatization-4' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'automatization-5' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'automatization-6' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'automatization-7' );?></span>



		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'connect-1' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'connect-2' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'connect-3' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'connect-4' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'connect-5' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'connect-6' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'connect-7' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'connect-8' );?></span>



		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'security-1' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'security-2' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'security-3' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'security-4' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'security-5' );?></span>



		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'logistick-1' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'logistick-2' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'logistick-3' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'logistick-4' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'logistick-5' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'logistick-6' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'logistick-7' );?></span>



		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'features-1' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'features-2' );?></span>



		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'dopservices-1' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'dopservices-2' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'dopservices-3' );?></span>
		<span class="js-item-search-tarifsconc__attr"><?=$product->get_attribute( 'dopservices-4' );?></span>
	</div>


</li>
<?php } }else{ ?>
<li><a href="#">Ничего не найдено, попробуйте другой запрос</a></li>
<?php } exit;
}

// ЗАКРЫТЫЕ СТРАНИЦЫ РОЛЕЙ

//Если ты не Авторизирован
if(!is_user_logged_in()){
	add_action( 'template_redirect', function() {
		if(is_page('support-clients')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('partners-integrators')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('developers-2')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('ainsys-rest-api')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('connector-sdk')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('support-dev')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('partners-qa')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('support-partners')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('new-partner')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('%d1%81ustomer-orders')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('%d1%81ustomer-orders')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}
	} );
}
//Если ты Пользователь
if(current_user_can('bbp_participant')){
	add_action( 'template_redirect', function() {
		if( is_page('%d1%81ustomer-orders') ){
			wp_redirect( 'https://ainsys.com/only-partners', 301 );
			exit;
		}elseif(is_page('support-partners')){
			wp_redirect('https://ainsys.com/support-clients', 301);
			exit;
		}elseif(is_page('support-dev')){
			wp_redirect('https://ainsys.com/support-dev', 301);
			exit;
		}elseif(is_page('partners-qa')){
			wp_redirect('https://ainsys.com/only-partners', 301);
			exit;
		}elseif(is_page('connector-sdk')){
			wp_redirect('https://ainsys.com/only-dev', 301);
			exit;
		}elseif(is_page('ainsys-rest-api')){
			wp_redirect('https://ainsys.com/only-dev', 301);
			exit;
		}elseif(is_page('sdk-qa')){
			wp_redirect('https://ainsys.com/only-dev', 301);
			exit;
		}
	} );
}
//Если ты Разработчик
if(current_user_can('developer')){
	add_action( 'template_redirect', function() {
		if( is_page('partners-qa') ){
			wp_redirect( 'https://ainsys.com/only-partners', 301 );
			exit;
		}elseif(is_page('support-partners')){
			wp_redirect('https://ainsys.com/only-partners', 301);
			exit;
		}elseif(is_page('support-clients')){
			wp_redirect('https://ainsys.com/support-dev', 301);
			exit;
		}elseif(is_page('%d1%81ustomer-orders')){
			wp_redirect('https://ainsys.com/only-partners', 301);
			exit;
		}
	} );
}

//Если ты Партнер
if(current_user_can('partner')){
	add_action( 'template_redirect', function() {
		if( is_page('support-clients') ){
			wp_redirect( 'https://ainsys.com/support-partners', 301 );
			exit;
		}elseif(is_page('sdk-qa')){
			wp_redirect('https://ainsys.com/only-dev', 301);
			exit;
		}elseif(is_page('ainsys-rest-api')){
			wp_redirect('https://ainsys.com/only-dev', 301);
			exit;
		}elseif(is_page('connector-sdk')){
			wp_redirect('https://ainsys.com/only-dev', 301);
			exit;
		}elseif(is_page('support-dev')){
			wp_redirect('https://ainsys.com/support-partners', 301);
			exit;
		}
	} );
}  
/*
//
if(current_user_can('administrator')){
    add_action( 'template_redirect', function() {
        if( is_page('landing') ){
                wp_redirect( 'https://ainsys.com/landing2/', 301 );
                exit;
        }elseif(is_page('ainsys-rest-api')){
            wp_redirect('https://ainsys.com/landing/', 301);
            exit;
        }
} );
}   */  

