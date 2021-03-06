<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if(0 == WC()->cart->get_cart_contents_count()){
  wp_safe_redirect( '/test/' );
}
do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set check" id="customer_details"></div>
		    <div class="integration_flex">
				<div class="col-8">
					<?php do_action( 'woocommerce_checkout_billing' );?>
				</div>
				<!-- <div class="basket__right terms">
					<div class="term_item">
						<div class="basket-info term_item_header">
							<div class="term_item_header_info_bottom">
								<h3 class="term_item_header_title"><?php esc_html_e( 'Стоимость ', 'woocommerce' ); ?></h3>
							</div>
							<table class="shop_table woocommerce-checkout-review-order-table">
								<tfoot>
								<tr class="order-total">
									<td><?php wc_cart_totals_order_total_html(); ?></td>
								</tr>
								</tfoot>
							</table>
							<div class="basket-info__text">
								Окончательную стоимость заказа вы сможете узнать у менеджера.
							</div>
						</div>  
					</div>
				</div> -->
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>
<!--
	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
	

	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
-->
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
