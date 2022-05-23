<?php
/**
 * Woocommerce customization.
 *
 * @package ainsys
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Redirects to homepage after logout.
 *
 * @package ainsys
 */
function auto_redirect_after_logout() {
	wp_redirect( home_url() );
	exit();
}
add_action( 'wp_logout', 'auto_redirect_after_logout' );

// Карточка товара.
if ( class_exists( 'WooCommerce' ) ) {
	require get_stylesheet_directory() . '/woocommerce/includes/wc-functions-product.php';
}

/**
 * Changes my account page items.
 *
 * @param string $items my account menu items.
 *
 * @package ainsys
 */
function my_woocommerce_account_menu_items( $items ) {
	unset( $items['dashboard'] );
	// unset($items['orders']);
	unset( $items['downloads'] );
	// unset($items['edit-address']);
	unset( $items['edit-account'] );
	// unset($items['customer-logout']);
	return $items;
}
add_filter( 'woocommerce_account_menu_items', 'my_woocommerce_account_menu_items', 10 );

/**
 * Changes my account order page.
 *
 * @package ainsys
 */
function woo_change_account_order() {
	$myorder = array();

	if ( ! current_user_can( 'patnerdevelopers' ) && ! current_user_can( 'developer' ) && ! current_user_can( 'integrator' ) ) {
		$myorder = array(
			'edit-account'  => __( 'Мой профиль', 'woocommerce' ),
			//'login-security'  => __( 'Мой профиль', 'woocommerce' ),
			'orders'          => __( 'Ваши заказы', 'woocommerce' ),
			'reg-dev'         => __( 'Стать разработчиком AINSYS', 'woocommerce' ),
			'reg-part'        => __( 'Стать партнёром AINSYS', 'woocommerce' ),
			'customer-logout' => __( 'Выйти', 'woocommerce' ),
		);
	} elseif ( current_user_can( 'patnerdevelopers' ) || current_user_can( 'developer' ) ) {
		$myorder = array(
			'edit-account'  => __( 'Мой профиль', 'woocommerce' ),
			//'login-security'  => __( 'Мой профиль', 'woocommerce' ),
			'orders'          => __( 'Ваши заказы', 'woocommerce' ),
			'reg-part'        => __( 'Стать партнёром AINSYS', 'woocommerce' ),
			'customer-logout' => __( 'Выйти', 'woocommerce' ),
		);
	} elseif ( current_user_can( 'integrator' ) ) {
		$myorder = array(
			'edit-account'  => __( 'Мой профиль', 'woocommerce' ),
			//'login-security'  => __( 'Мой профиль', 'woocommerce' ),
			'orders'          => __( 'Ваши заказы', 'woocommerce' ),
			'reg-dev'         => __( 'Стать разработчиком AINSYS', 'woocommerce' ),
			'customer-logout' => __( 'Выйти', 'woocommerce' ),
		);
	}

	return $myorder;
}
add_filter( 'woocommerce_account_menu_items', 'woo_change_account_order' );




// Кастомные поля для ЛК.
require( 'inc/carbon-fields.php' );

// Размер миниатюр в корзине.
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'cart-thumb', 52, 52 );
}

/**
 * Changes image size in cart.
 *
 * @param string $product_image - image.
 * @param array  $cart_item - cart object.
 *
 * @package ainsys
 */
function change_image_size_in_cart( $product_image, $cart_item ) {

	if ( is_cart() ) {
		$product = $cart_item['data'];

		$product_image = $product->get_image( 'cart-thumb' );
	}

	return $product_image;
}
add_filter( 'woocommerce_cart_item_thumbnail', 'change_image_size_in_cart', 10, 2 );

/**
 * Fix cart at thank you page.
 *
 * @package ainsys
 */
function true_cart_shortcode( $display_cart ) {

	if ( is_wc_endpoint_url( 'order-received' ) ) {
		$display_cart = false;
	}
	return $display_cart;

}
add_filter( 'woocommerce_output_cart_shortcode_content', 'true_cart_shortcode', 25 );


/**
 * Empty cart redirect.
 *
 * @package ainsys
 */
function true_redirect_empty_cart() {

	if (
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
// add_action( 'template_redirect', 'true_redirect_empty_cart', 25 );


/**
 * Add multiple products.
 *
 * @package ainsys
 */
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

/**
 * Add description to cart.
 *
 * @package ainsys
 */
function show_description_in_cart() {?>
<div class="card__descr">
	<?php the_excerpt(); ?>
</div>
	<?php
}
add_action( 'woocommerce_after_shop_loop_item_title', 'show_description_in_cart', 20 );


// ЗАКРЫТЫЕ СТРАНИЦЫ РОЛЕЙ.

// Если ты не Авторизирован.
if ( ! is_user_logged_in() ) {
	add_action(
		'template_redirect',
		function() {
			if ( is_page( 'support-clients' ) ) {
				wp_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( 'partners-integrators' ) ) {
				wp_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( 'developers-2' ) ) {
				wp_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( 'ainsys-rest-api' ) ) {
				wp_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( 'connector-sdk' ) ) {
				wp_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( 'support-dev' ) ) {
				wp_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( 'partners-qa' ) ) {
				wp_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( 'support-partners' ) ) {
				wp_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( 'new-partner' ) ) {
				wp_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( '%d1%81ustomer-orders' ) ) {
				wp_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( '%d1%81ustomer-orders' ) ) {
				wp_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			}
		}
	);
}
// Если ты Пользователь.
if ( current_user_can( 'bbp_participant' ) ) {
	add_action(
		'template_redirect',
		function() {
			if ( is_page( '%d1%81ustomer-orders' ) ) {
				wp_redirect( 'https://ainsys.com/only-partners', 301 );
				exit;
			} elseif ( is_page( 'support-partners' ) ) {
				wp_redirect( 'https://ainsys.com/support-clients', 301 );
				exit;
			} elseif ( is_page( 'support-dev' ) ) {
				wp_redirect( 'https://ainsys.com/support-dev', 301 );
				exit;
			} elseif ( is_page( 'partners-qa' ) ) {
				wp_redirect( 'https://ainsys.com/only-partners', 301 );
				exit;
			} elseif ( is_page( 'connector-sdk' ) ) {
				wp_redirect( 'https://ainsys.com/only-dev', 301 );
				exit;
			} elseif ( is_page( 'ainsys-rest-api' ) ) {
				wp_redirect( 'https://ainsys.com/only-dev', 301 );
				exit;
			} elseif ( is_page( 'sdk-qa' ) ) {
				wp_redirect( 'https://ainsys.com/only-dev', 301 );
				exit;
			}
		}
	);
}
// Если ты Разработчик.
if ( current_user_can( 'developer' ) ) {
	add_action(
		'template_redirect',
		function() {
			if ( is_page( 'partners-qa' ) ) {
				wp_redirect( 'https://ainsys.com/only-partners', 301 );
				exit;
			} elseif ( is_page( 'support-partners' ) ) {
				wp_redirect( 'https://ainsys.com/only-partners', 301 );
				exit;
			} elseif ( is_page( 'support-clients' ) ) {
				wp_redirect( 'https://ainsys.com/support-dev', 301 );
				exit;
			} elseif ( is_page( '%d1%81ustomer-orders' ) ) {
				wp_redirect( 'https://ainsys.com/only-partners', 301 );
				exit;
			}
		}
	);
}

// Если ты Партнер.
if ( current_user_can( 'partner' ) ) {
	add_action(
		'template_redirect',
		function() {
			if ( is_page( 'support-clients' ) ) {
				wp_redirect( 'https://ainsys.com/support-partners', 301 );
				exit;
			} elseif ( is_page( 'sdk-qa' ) ) {
				wp_redirect( 'https://ainsys.com/only-dev', 301 );
				exit;
			} elseif ( is_page( 'ainsys-rest-api' ) ) {
				wp_redirect( 'https://ainsys.com/only-dev', 301 );
				exit;
			} elseif ( is_page( 'connector-sdk' ) ) {
				wp_redirect( 'https://ainsys.com/only-dev', 301 );
				exit;
			} elseif ( is_page( 'support-dev' ) ) {
				wp_redirect( 'https://ainsys.com/support-partners', 301 );
				exit;
			}
		}
	);
}
