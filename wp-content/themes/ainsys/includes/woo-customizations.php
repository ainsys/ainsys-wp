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

// Support woocommerce templates.
add_theme_support( 'woocommerce' );

/**
 * Redirects to homepage after logout.
 *
 * @package ainsys
 */
function auto_redirect_after_logout() {
	wp_safe_redirect( home_url() );
	exit();
}
add_action( 'wp_logout', 'auto_redirect_after_logout' );

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
			'edit-account'  => __( 'My profile', 'ainsys' ),
			// 'login-security'  => __( 'Мой профиль', 'woocommerce' ),
			'orders'          => __( 'Your orders', 'ainsys' ),
			'reg-dev'         => __( 'Become a Developer AINSYS', 'ainsys' ),
			'reg-part'        => __( 'Become a Partner AINSYS', 'ainsys' ),
			'customer-logout' => __( 'Log Out', 'ainsys' ),
		);
	} elseif ( current_user_can( 'patnerdevelopers' ) || current_user_can( 'developer' ) ) {
		$myorder = array(
			'edit-account'  => __( 'My profile', 'ainsys' ),
			// 'login-security'  => __( 'Мой профиль', 'woocommerce' ),
			'orders'          => __( 'Your orders', 'ainsys' ),
			'reg-part'        => __( 'Become a Partner AINSYS', 'ainsys' ),
			'customer-logout' => __( 'Log Out', 'ainsys' ),
		);
	} elseif ( current_user_can( 'integrator' ) ) {
		$myorder = array(
			'edit-account'  => __( 'My profile', 'ainsys' ),
			// 'login-security'  => __( 'Мой профиль', 'woocommerce' ),
			'orders'          => __( 'Your orders', 'ainsys' ),
			'reg-dev'         => __( 'Become a Developer AINSYS', 'ainsys' ),
			'customer-logout' => __( 'Log Out', 'ainsys' ),
		);
	}

	return $myorder;
}
add_filter( 'woocommerce_account_menu_items', 'woo_change_account_order' );

/****
 * My Account add description of items
 *
 * @package Ainsys
 */
add_action( 'woocommerce_account_menu_items', 'ainsys_filter_account_items' );
function ainsys_filter_account_items($items) {

   $content_orders = __('Track the status of your orders or edit the current one','ainsys');
   $content_profile = __('View and edit your personal information','ainsys');
   $content_developer = __('Get access to orders from customers, complete them and earn money with AINSYS','ainsys');
   $content_partner = __('Become an AINSYS partner and get the opportunity to place requests for integration on our platform','ainsys');
   $content_logout = __('Sign out of account','ainsys');
   $items['orders'] = $items['orders'].'<br><span>'.$content_orders.'</span>';
   $items['edit-account'] = $items['edit-account'].'<br><span>'.$content_profile.'</span>';
   $items['reg-dev'] = $items['reg-dev'].'<br><span>'.$content_developer.'</span>';
   $items['reg-part'] = $items['reg-part'].'<br><span>'.$content_partner.'</span>';
   $items['customer-logout'] = $items['customer-logout'].'<br><span>'.$content_logout.'</span>';
   return $items;
}




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
 * @param bool $display_cart - true/false.
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
				wp_safe_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( 'partners-integrators' ) ) {
				wp_safe_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( 'developers-2' ) ) {
				wp_safe_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( 'ainsys-rest-api' ) ) {
				wp_safe_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( 'connector-sdk' ) ) {
				wp_safe_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( 'support-dev' ) ) {
				wp_safe_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( 'partners-qa' ) ) {
				wp_safe_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( 'support-partners' ) ) {
				wp_safe_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( 'new-partner' ) ) {
				wp_safe_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( '%d1%81ustomer-orders' ) ) {
				wp_safe_redirect( 'https://ainsys.com/auth/', 301 );
				exit;
			} elseif ( is_page( '%d1%81ustomer-orders' ) ) {
				wp_safe_redirect( 'https://ainsys.com/auth/', 301 );
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
				wp_safe_redirect( 'https://ainsys.com/only-partners', 301 );
				exit;
			} elseif ( is_page( 'support-partners' ) ) {
				wp_safe_redirect( 'https://ainsys.com/support-clients', 301 );
				exit;
			} elseif ( is_page( 'support-dev' ) ) {
				wp_safe_redirect( 'https://ainsys.com/support-dev', 301 );
				exit;
			} elseif ( is_page( 'partners-qa' ) ) {
				wp_safe_redirect( 'https://ainsys.com/only-partners', 301 );
				exit;
			} elseif ( is_page( 'connector-sdk' ) ) {
				wp_safe_redirect( 'https://ainsys.com/only-dev', 301 );
				exit;
			} elseif ( is_page( 'ainsys-rest-api' ) ) {
				wp_safe_redirect( 'https://ainsys.com/only-dev', 301 );
				exit;
			} elseif ( is_page( 'sdk-qa' ) ) {
				wp_safe_redirect( 'https://ainsys.com/only-dev', 301 );
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
				wp_safe_redirect( 'https://ainsys.com/only-partners', 301 );
				exit;
			} elseif ( is_page( 'support-partners' ) ) {
				wp_safe_redirect( 'https://ainsys.com/only-partners', 301 );
				exit;
			} elseif ( is_page( 'support-clients' ) ) {
				wp_safe_redirect( 'https://ainsys.com/support-dev', 301 );
				exit;
			} elseif ( is_page( '%d1%81ustomer-orders' ) ) {
				wp_safe_redirect( 'https://ainsys.com/only-partners', 301 );
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
				wp_safe_redirect( 'https://ainsys.com/support-partners', 301 );
				exit;
			} elseif ( is_page( 'sdk-qa' ) ) {
				wp_safe_redirect( 'https://ainsys.com/only-dev', 301 );
				exit;
			} elseif ( is_page( 'ainsys-rest-api' ) ) {
				wp_safe_redirect( 'https://ainsys.com/only-dev', 301 );
				exit;
			} elseif ( is_page( 'connector-sdk' ) ) {
				wp_safe_redirect( 'https://ainsys.com/only-dev', 301 );
				exit;
			} elseif ( is_page( 'support-dev' ) ) {
				wp_safe_redirect( 'https://ainsys.com/support-partners', 301 );
				exit;
			}
		}
	);
}

/**
 * Custom function that display minicart span with count.
 *
 * @package ainsys
 */
function ainsys_minicartcount() {
	$html_output = '<i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="count">' . WC()->cart->get_cart_contents_count() . '</span>';
	// return '<a class="wcminicart" href="' . wc_get_cart_url() . '">' . $html_output . '</a>';
	return '<a class="wcminicart dropdown-toggle" id="cart-dropdown" data-bs-toggle="dropdown" aria-expanded="false" href="' . wc_get_cart_url() . '" style="color: #fff;">' . $html_output . '</a>';
}
/**
 * Custom mini cart shortcode.
 *
 * @package ainsys
 */
function ainsys_mini_cart() {
	?>
	<div class="dropdown widget_shopping_cart">
		<?php echo ainsys_minicartcount(); //phpcs:ignore ?>
		<div class="dropdown-menu" aria-labelledby="cart-dropdown">
			<div class="widget_shopping_cart_content">
				<?php woocommerce_mini_cart(); ?>
			</div>
		</div>
	</div>
	<?php
}
add_shortcode( 'customminicart', 'ainsys_mini_cart' );

/**
 * Refresh minicart data on Ajax cart events.
 *
 * @param array $fragments - cart fragments.
 *
 * @package ainsys
 */
function ainsys_ajax_refreshed_minicart_data( $fragments ) {
	$fragments['a.wcminicart'] = ainsys_minicartcount();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'ainsys_ajax_refreshed_minicart_data' );

/**
 * Ajax update cart.
 *
 * @package ainsys
 */
function ainsys_update_cart() {
	$product_id = isset( $_POST['cart_item_key'] ) ? sanitize_text_field( wp_unslash( $_POST['cart_item_key'] ) ) : null;
	$quantity   = isset( $_POST['qty'] ) ? wp_unslash( $_POST['qty'] ) : null;

	if ( $product_id && isset( $quantity ) ) {
		$cart         = WC()->cart;
		$cart_id      = $cart->generate_cart_id( $product_id );
		$cart_item_id = $cart->find_product_in_cart( $cart_id );

		if ( ! empty( $cart_item_id ) ) {
			$cart->set_quantity( $cart_item_id, $quantity, true ); // true = refresh totals.
		} else {
			$new_product_id    = apply_filters( 'woocommerce_add_to_cart_product_id', $product_id );
			$passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $new_product_id, $quantity );
			$product_status    = get_post_status( $new_product_id );

			$add_to_cart = WC()->cart->add_to_cart( $new_product_id, $quantity ); // returns true/false.

			if ( $passed_validation && $add_to_cart && 'publish' === $product_status ) {
				do_action( 'woocommerce_ajax_added_to_cart', $new_product_id );

				WC()->cart->calculate_totals();
				WC()->cart->maybe_set_cart_cookies();
				WC_AJAX::get_refreshed_fragments();
			} else {
				wc_print_notices();
			}
		}
		wp_die();
	}
}
add_action( 'wp_ajax_ainsys_update_cart', 'ainsys_update_cart' );
add_action( 'wp_ajax_nopriv_ainsys_update_cart', 'ainsys_update_cart' );

/**
 * Update Custom Registration Fields
 *
 * @package ainsys
 */
add_action( 'user_register', 'my_account_saving_billing_phone', 10, 1 );
function my_account_saving_billing_phone( $user_id ) {
    $billing_phone = $_POST['billing_phone'];
    $billing_country = $_POST['billing_country'];
    if( ! empty( $billing_phone ) ) {
        update_user_meta( $user_id, 'billing_phone', sanitize_text_field( $billing_phone ) );
    }
    if( ! empty( $billing_country ) ) {
        update_user_meta( $user_id, 'billing_country', sanitize_text_field( $billing_country ) );
    }

}



/**
 * Redirect to registration step 2
 *
 * @package ainsys
 */
add_filter( 'woocommerce_registration_redirect', 'custom_redirection_after_registration', 10, 1 );
function custom_redirection_after_registration( $redirection_url ){
    // Change the redirection Url
    $redirection_url = get_field('step_2_page','option'); // Home page

    return $redirection_url; // Always return something
}

/**
 * Custom Registration Billing Fields
 *
 * @package ainsys
 */

add_filter( 'woocommerce_billing_fields ', 'ainsys_add_field' );

function ainsys_add_field( $fields ) {

    $fields['billing_client_role']   = array(
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
        'priority'     => 20,

    );
    $fields['billing_client_size']   = array(
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
        'priority'     => 20,

    );
    $fields['billing_client_industry']   = array(
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
        'priority'     => 20,

    );
    $fields['billing_client_experience']   = array(
        'type'         => 'select',
        'options' => array(
            'no-experience' => __( 'No experience with automation' ,'ainsys'),
            'other-platforms' => __( 'I have used other integration platforms' ,'ainsys'),
            'custom' => __( 'I built custom integrations myself' ,'ainsys'),

        ),
        'label'        => __('Choose your experience in automation','ainsys'),
        'required'     => true,
        'class'        => array( 'form-row-wide' ),
        'priority'     => 20,

    );

    return $fields;

}
add_filter( 'woocommerce_customer_meta_fields', 'ainsys_admin_address_field' );

function ainsys_admin_address_field( $admin_fields ) {

    $admin_fields['billing']['fields']['billing_client_role'] = array(
        'label' => 'Роль в организации',
        'description' => 'Роль в организации',
    );
    $admin_fields['billing']['fields']['billing_client_size'] = array(
        'label' => 'Размер организации',
        'description' => 'Размер организации',
    );
    $admin_fields['billing']['fields']['billing_client_industry'] = array(
        'label' => 'Отрасль',
        'description' => 'Отрасль',
    );
    $admin_fields['billing']['fields']['billing_client_experience'] = array(
        'label' => 'Опыт в автоматизации',
        'description' => 'Опыт в автоматизации',
    );


    return $admin_fields;

}
// Remove "order by" field on catalog page.
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

/**
 * email о регистрации пользователя
 *
 * @package Ainsys
 */
function woocommerce_created_customer_admin_notification( $customer_id ) {
    wp_send_new_user_notifications( $customer_id, 'admin' );
}
add_action( 'woocommerce_created_customer', 'woocommerce_created_customer_admin_notification' );

/**
 *
 *
 */
//add_filter( 'woocommerce_add_to_cart_fragments', 'cart_count_fragments', 10, 1 );

function cart_count_fragments( $fragments ) {
    $fragments['div.basket-item-count'] = '<div class="basket-item-count"><span class="cart-items-count">' . WC()->cart->get_cart_contents_count() . '</span></div>';
    return $fragments;
}

/**
 * Ajax search in catalog
 */
add_action('wp_ajax_nopriv_taxonomyFilter', 'taxonomyFilter');
add_action('wp_ajax_taxonomyFilter', 'taxonomyFilter');

add_action('wp_ajax_nopriv_infiniteScroll', 'taxonomyFilter');
add_action('wp_ajax_infiniteScroll', 'taxonomyFilter');
//global $wp_query;
function taxonomyFilter($args = []) {

    /**
     * Ajax
     *
     * Данная секция кода выполняется при условии что это Ajax запрос
     * в противном случае она игнорируется
     *
     */
    if( wp_doing_ajax() ) :
        //$default_posts_per_page = $wp_query->query_vars['posts_per_page'];
        //_e('<pre>' . var_dump($default_posts_per_page). '</pre>');
        /**
         * Type
         */

        $term_id = (int)$_POST['category'];
        $defaults = [
            'posts_per_page' => 10,
            //'order'          => 'ASC',
            'post_status'    => 'publish',
            'post_type'      => 'product',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => $term_id,
                )
            ),
            'paged' => $_POST['paged']
        ];

        $args = wp_parse_args( $args, $defaults );

        /**
         * Search Input
         */

        if (isset( $_POST['search'] )&& !empty($_POST['search'])):

             $args['s'] = $_POST['search'];

        endif;

        if (isset( $_POST['filter-category'] )&& !empty($_POST['filter-category'])):

            $args['tax_query'] = [
                [
                    'taxonomy' => 'product_tag',
                    'field'    => 'slug',
                    'terms'    => $_POST['filter-category'],
                ]
            ];

        endif;

        $query = new WP_Query($args);


        if( $query->have_posts() ) :
            $max_num_pages = $query->max_num_pages;
            echo '<div id="max-pages" data-maxpages="'.$max_num_pages.'" style="display: none"></div>';
            while( $query->have_posts() ): $query->the_post();
                global $product;
                $product_id       = $product->get_id();
                $product_cats_ids = $product->get_category_ids();
                $color_1 = '#3d0043';
                $color_2 = '#931e9f';
                //$logo = get_field('logo');
                if(!empty(get_field('color_1'))) {
                $color_1 = get_field('color_1');
                }
                if(!empty(get_field('color_2'))) {
                $color_2 = get_field('color_2');
                }

                //$product_cat_list = wc_get_product_category_list( $product_id ); ?>
                <li class="product" style="background: linear-gradient(105.3deg, <?= $color_1; ?>  0%, <?= $color_2; ?> 97.63%)" >
                    <div class="top-row row">
                        <div class="img">
                            <?// echo $product->get_image(); ?>

                            <?php echo '<img src="/logo/'.$product->get_slug().'.png">';?>

                        </div>
                        <div class="title">
                            <h3><?php echo $product->get_title(); ?></h3>
                            <p class="prduct-categories">
                                <?php
                                /*foreach ( $product_cats_ids as $product_cat ) {
                                    echo '<span>' . get_the_category_by_ID( $product_cat ) . '</span>';
                                }*/
                                echo '<span>' . get_the_category_by_ID( $product_cats_ids[0] ) . '</span>';
                                ?>
                            </p>
                        </div>

                        <?php
                        $quantity = 0;
                        foreach ( WC()->cart->get_cart() as $cart_item ) {
                            if ( $product_id === $cart_item['product_id'] ) {
                                $quantity = intval( $cart_item['quantity'] );
                            }
                        }
                        ?>
                        <div class="product__qnt-buttons">
                            <!--<button type="button" class="minus-btn btn-qnty">-</button>-->
                            <input type="number" value="<?php echo $quantity; ?>" class="product__qnt" data-product-id="<?php echo esc_attr( $product->get_id() ); ?>">
                            <button type="button" class="plus-btn btn-qnty <?php if ( false === is_user_logged_in() ) {echo 'not-authorized';} ?>">+</button>
                        </div>
                    </div>
                    <div class="bottom-row row">
                        <div class="description">
                            <?php echo $product->get_description(); ?>
                        </div>
                    </div>
                </li>


            <?php endwhile;
            wp_reset_postdata();
        else :
            echo '<div class="no-results">No posts found</div>';
        endif;

        die();

    endif;

}