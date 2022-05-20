<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;

$notes = $order->get_customer_order_notes();
?>

<?php $order = new WC_Order( $order_id );

        $order_data = $order->get_data(); // The Order data

        $order_id = $order_data['id'];
        $order_parent_id = $order_data['parent_id'];
        $order_status = $order_data['status'];
        $order_currency = $order_data['currency'];
        $order_version = $order_data['version'];
        $order_payment_method = $order_data['payment_method'];
        $order_payment_method_title = $order_data['payment_method_title'];
        $order_payment_method = $order_data['payment_method'];
        $order_payment_method = $order_data['payment_method'];

        ## Creation and modified WC_DateTime Object date string ##

        // Using a formated date ( with php date() function as method)
        $order_date_created = $order_data['date_created']->date('Y-m-d H:i:s');
        $order_date_modified = $order_data['date_modified']->date('Y-m-d H:i:s');

        // Using a timestamp ( with php getTimestamp() function as method)
        $order_timestamp_created = $order_data['date_created']->getTimestamp();
        $order_timestamp_modified = $order_data['date_modified']->getTimestamp();



        ## BILLING INFORMATION:

        $order_billing_first_name = $order_data['billing']['first_name'];
        $order_billing_last_name = $order_data['billing']['last_name'];

        $order_billing_address_1 = $order_data['billing']['address_1'];

        $order_billing_postcode = $order_data['billing']['postcode'];

        $order_billing_email = $order_data['billing']['email'];
        $order_billing_phone = $order_data['billing']['phone'];


                 $line_total_tax = $order_data['total'];

        ?>

<div class="acc-order-one">
    <h1 class="title acc-order-one__title">
        Заказ № <?= $order_id; ?>
    </h1>
    <h2 class="acc-order-one__subtitle">
        от <?= esc_html( wc_format_datetime( $order->get_date_created() ) );?>
    </h2>

    <div class="acc-order-one__item">
        <div class="acc-order-one__left">
            <div class="acc-order-one__block">
                <h3>Доставка по адресу:</h3>
                <p><?= $order_billing_address_1; ?></p>
            </div>

            <div class="acc-order-one__block">
                <h3>Получатель:</h3>
                <p><?= $order_billing_first_name ?>
                    <?= $order_billing_last_name ?>
                </p>
                <p><?=$order_billing_email;?></p>
                <p><?=$order_billing_phone;?></p>
            </div>
        </div>

        <div class="acc-order-one__left">
            <div class="acc-order-one__block">
                <h3>Оплата:</h3>
                <p><?= $order_payment_method_title; ?></p>
            </div>



            <div class="acc-order-one__block">
                <h3>Итого:</h3>
                <p><?= $line_total_tax; ?> <?=$order_currency?></p>
            </div>
        </div>
    </div>

</div>
<?php if ( $notes ) : ?>
	<h2><?php esc_html_e( 'Order updates', 'woocommerce' ); ?></h2>
	<ol class="woocommerce-OrderUpdates commentlist notes">
		<?php foreach ( $notes as $note ) : ?>
		<li class="woocommerce-OrderUpdate comment note">
			<div class="woocommerce-OrderUpdate-inner comment_container">
				<div class="woocommerce-OrderUpdate-text comment-text">
					<p class="woocommerce-OrderUpdate-meta meta"><?php echo date_i18n( esc_html__( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<div class="woocommerce-OrderUpdate-description description">
						<?php echo wpautop( wptexturize( $note->comment_content ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		</li>
		<?php endforeach; ?>
	</ol>
<?php endif; ?>
<!--
<?php do_action( 'woocommerce_view_order', $order_id ); ?>
-->


