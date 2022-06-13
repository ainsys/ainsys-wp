<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>
<a href="<?php echo get_home_url( null, 'my-account/', 'https' ); ?>" class="my-acc__back">Вернуться в панель управления</a>

<?php if ( $has_orders ) : ?>
<nav class="acc-order-nav">
  <a href="#" class="acc-order-nav__item js-acc-order-link">Активные</a>
  <a href="#" class="acc-order-nav__item js-acc-order-link">Выполненные</a>
  <a href="#" class="acc-order-nav__item js-acc-order-link">Отмененные</a>
  <a href="#" class="acc-order-nav__item js-acc-order-link">Возвраты</a>
</nav>
<div class="tab js-acc-order-tab">

	<div class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table acc-order-table">
			<?php foreach ( $customer_orders->orders as $customer_order ) {
				$order                   = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
				$item_count              = $order->get_item_count() - $order->get_item_count_refunded();
				$order_data              = $order->get_data(); // The Order data
        $order_name              = $order_data['billing']['first_name'];
        $order_last_name         = $order_data['billing']['last_name'];
        $order_billing_address_1 = $order_data['billing']['address_1'];
        $order_billing_postcode  = $order_data['billing']['postcode'];
        $order_billing_country   = $order_data['billing']['country'];
        $order_payment_method    = $order_data['payment_method_title'];
        $order_billing_phone     = $order_data['billing']['phone'];

        $poluchatelFam           = get_post_meta( $order->get_id(), 'recipient_last_name', true );
        $poluchatelName          = get_post_meta( $order->get_id(), 'recipient_name', true );
        if(esc_html( wc_get_order_status_name( $order->get_status() ) ) == 'На удержании' || esc_html( wc_get_order_status_name( $order->get_status() ) ) == 'В ожидании оплаты'  || esc_html( wc_get_order_status_name( $order->get_status() ) ) == 'Ожидание' || esc_html( wc_get_order_status_name( $order->get_status() ) ) == 'На удержании'  || esc_html( wc_get_order_status_name( $order->get_status() ) ) == 'Обработка') {

				?>


				<div class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?> order acc-order-item">
				<header class="acc-order-item-header">

				    <div class="acc-order-item-header__left">
              <?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>

                <?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								  <?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>
                <?php elseif ( 'order-date' === $column_id ) : ?>
								<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>">Заказ от <?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>

                <?php elseif ( 'order-number' === $column_id ) : ?>
                  <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
                    <?php echo esc_html( _x( 'Номер заказа ', 'hash before order number', 'woocommerce' ) . $order->get_order_number() ); ?>
                  </a>
                <?php endif; ?>

					    <?php endforeach; ?>
				    </div>

				    

				    <div class="acc-order-item-header__status">
              <?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>

                <?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								  <?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

                <?php elseif ( 'order-total' === $column_id ) : ?>
								<?php echo wp_kses_post( sprintf( $order->get_formatted_order_total(), $item_count ) ); ?>

                <?php elseif ( 'order-status' === $column_id ) : ?>
								  <span class="st">, <?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?></span>

							  <?php endif; ?>
					    <?php endforeach; ?>
                  <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>" class="acc-order-item-header__details">
                    Детали заказа
                  </a>
            </div>

				</header>

					<div class="acc-order-item__content">

					    <div class="acc-order-item__product">
					    <?php $ids = array();?>
                <?php foreach ($order->get_items() as $item_key => $item_values) : ?>
                  <?php $item_data = $item_values->get_data();
                    $product_url   = $item_data['url'];
                    $product_id    = $item_data['product_id'];
                    $pro           = new WC_Product($product_id);
                    array_push($ids, $product_id);
                    echo $product_name ?>
                    <a href="<?php echo get_permalink( $product_id );?>" target="_blank">
                      <?php echo $pro->get_image($size = 'thumbnail'); ?>
                    </a>

                <?php endforeach; ?>
                <div class="acc-order-btn__buy">
                  <?php $ids_atc = implode(",", $ids);?>
                  <a href="?add-to-cart=<?= $ids_atc;?>" class="btn btn-blue acc-order--btn__buy-all">Купить снова</a>
					      </div>
					    </div>



              <div class="acc-order-btn">
                <?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
                  <div class="woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr( $column_id ); ?> " data-title="<?php echo esc_attr( $column_name ); ?>">
                  <?php if ( 'order-actions' === $column_id ) : ?>
                  <?php $actions = wc_get_account_orders_actions( $order );

                  if ( ! empty( $actions ) ) {
                    foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                      echo '<a href="' . esc_url( $action['url'] ) . '" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
                    }
                  }
                  endif; ?>
                </div>
                <?php endforeach; ?>
              </div>



					  </div>
				  </div>
				<?php } ?>
				<?php } ?>
</div>
</div>

<div class="tab js-acc-order-tab">

	<div class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table acc-order-table">
			<?php foreach ( $customer_orders->orders as $customer_order ) {
				$order                   = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
				$item_count              = $order->get_item_count() - $order->get_item_count_refunded();
				$order_data              = $order->get_data(); // The Order data
        $order_name              = $order_data['billing']['first_name'];
        $order_last_name         = $order_data['billing']['last_name'];
        $order_billing_address_1 = $order_data['billing']['address_1'];
        $order_billing_postcode  = $order_data['billing']['postcode'];
        $order_billing_country   = $order_data['billing']['country'];
        $order_payment_method    = $order_data['payment_method_title'];
        $order_billing_phone     = $order_data['billing']['phone'];

        $poluchatelFam           = get_post_meta( $order->get_id(), 'recipient_last_name', true );
        $poluchatelName          = get_post_meta( $order->get_id(), 'recipient_name', true );
        if(esc_html( wc_get_order_status_name( $order->get_status() ) ) == 'Выполнен'){

				?>


				<div class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?> order acc-order-item">
				<header class="acc-order-item-header">

				    <div class="acc-order-item-header__left">
              <?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>

                <?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								  <?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>
                <?php elseif ( 'order-date' === $column_id ) : ?>
								<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>">Заказ от <?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>

                <?php elseif ( 'order-number' === $column_id ) : ?>
                  <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
                    <?php echo esc_html( _x( 'Номер заказа ', 'hash before order number', 'woocommerce' ) . $order->get_order_number() ); ?>
                  </a>
                <?php endif; ?>

					    <?php endforeach; ?>
				    </div>

				    

				    <div class="acc-order-item-header__status">
              <?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>

                <?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								  <?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

                <?php elseif ( 'order-total' === $column_id ) : ?>
								<?php echo wp_kses_post( sprintf( $order->get_formatted_order_total(), $item_count ) ); ?>

                <?php elseif ( 'order-status' === $column_id ) : ?>
								  <span class="st">, <?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?></span>

							  <?php endif; ?>
					    <?php endforeach; ?>
                  <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>" class="acc-order-item-header__details">
                    Детали заказа
                  </a>
            </div>

				</header>

					<div class="acc-order-item__content">

					    <div class="acc-order-item__product">
					    <?php $ids = array();?>
                <?php foreach ($order->get_items() as $item_key => $item_values) : ?>
                  <?php $item_data = $item_values->get_data();
                    $product_url   = $item_data['url'];
                    $product_id    = $item_data['product_id'];
                    $pro           = new WC_Product($product_id);
                    array_push($ids, $product_id);
                    echo $product_name ?>
                    <a href="<?php echo get_permalink( $product_id );?>" target="_blank">
                      <?php echo $pro->get_image($size = 'thumbnail'); ?>
                    </a>

                <?php endforeach; ?>
                <div class="acc-order-btn__buy">
                  <?php $ids_atc = implode(",", $ids);?>
                  <a href="?add-to-cart=<?= $ids_atc;?>" class="btn btn-blue acc-order--btn__buy-all">Купить снова</a>
					      </div>
					    </div>



              <div class="acc-order-btn">
                <?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
                  <div class="woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr( $column_id ); ?> " data-title="<?php echo esc_attr( $column_name ); ?>">
                  <?php if ( 'order-actions' === $column_id ) : ?>
                  <?php $actions = wc_get_account_orders_actions( $order );

                  if ( ! empty( $actions ) ) {
                    foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                      echo '<a href="' . esc_url( $action['url'] ) . '" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
                    }
                  }
                  endif; ?>
                </div>
                <?php endforeach; ?>
              </div>



					  </div>
				  </div>
				<?php } ?>
				<?php } ?>
</div>
</div>

<div class="tab js-acc-order-tab">

	<div class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table acc-order-table">
			<?php foreach ( $customer_orders->orders as $customer_order ) {
				$order                   = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
				$item_count              = $order->get_item_count() - $order->get_item_count_refunded();
				$order_data              = $order->get_data(); // The Order data
        $order_name              = $order_data['billing']['first_name'];
        $order_last_name         = $order_data['billing']['last_name'];
        $order_billing_address_1 = $order_data['billing']['address_1'];
        $order_billing_postcode  = $order_data['billing']['postcode'];
        $order_billing_country   = $order_data['billing']['country'];
        $order_payment_method    = $order_data['payment_method_title'];
        $order_billing_phone     = $order_data['billing']['phone'];

        $poluchatelFam           = get_post_meta( $order->get_id(), 'recipient_last_name', true );
        $poluchatelName          = get_post_meta( $order->get_id(), 'recipient_name', true );
        if(esc_html( wc_get_order_status_name( $order->get_status() ) ) == 'Отменен'){

				?>


				<div class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?> order acc-order-item">
				<header class="acc-order-item-header">

				    <div class="acc-order-item-header__left">
              <?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>

                <?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								  <?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>
                <?php elseif ( 'order-date' === $column_id ) : ?>
								<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>">Заказ от <?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>

                <?php elseif ( 'order-number' === $column_id ) : ?>
                  <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
                    <?php echo esc_html( _x( 'Номер заказа ', 'hash before order number', 'woocommerce' ) . $order->get_order_number() ); ?>
                  </a>
                <?php endif; ?>

					    <?php endforeach; ?>
				    </div>

				    

				    <div class="acc-order-item-header__status">
              <?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>

                <?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								  <?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

                <?php elseif ( 'order-total' === $column_id ) : ?>
								<?php echo wp_kses_post( sprintf( $order->get_formatted_order_total(), $item_count ) ); ?>

                <?php elseif ( 'order-status' === $column_id ) : ?>
								  <span class="st">, <?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?></span>

							  <?php endif; ?>
					    <?php endforeach; ?>
                  <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>" class="acc-order-item-header__details">
                    Детали заказа
                  </a>
            </div>

				</header>

					<div class="acc-order-item__content">

					    <div class="acc-order-item__product">
					    <?php $ids = array();?>
                <?php foreach ($order->get_items() as $item_key => $item_values) : ?>
                  <?php $item_data = $item_values->get_data();
                    $product_url   = $item_data['url'];
                    $product_id    = $item_data['product_id'];
                    $pro           = new WC_Product($product_id);
                    array_push($ids, $product_id);
                    echo $product_name ?>
                    <a href="<?php echo get_permalink( $product_id );?>" target="_blank">
                      <?php echo $pro->get_image($size = 'thumbnail'); ?>
                    </a>

                <?php endforeach; ?>
                <div class="acc-order-btn__buy">
                  <?php $ids_atc = implode(",", $ids);?>
                  <a href="?add-to-cart=<?= $ids_atc;?>" class="btn btn-blue acc-order--btn__buy-all">Купить снова</a>
					      </div>
					    </div>



              <div class="acc-order-btn">
                <?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
                  <div class="woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr( $column_id ); ?> " data-title="<?php echo esc_attr( $column_name ); ?>">
                  <?php if ( 'order-actions' === $column_id ) : ?>
                  <?php $actions = wc_get_account_orders_actions( $order );

                  if ( ! empty( $actions ) ) {
                    foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                      echo '<a href="' . esc_url( $action['url'] ) . '" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
                    }
                  }
                  endif; ?>
                </div>
                <?php endforeach; ?>
              </div>



					  </div>
				  </div>
				<?php } ?>
				<?php } ?>
</div>
</div>

<div class="tab js-acc-order-tab">

	<div class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table acc-order-table">
			<?php foreach ( $customer_orders->orders as $customer_order ) {
				$order                   = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
				$item_count              = $order->get_item_count() - $order->get_item_count_refunded();
				$order_data              = $order->get_data(); // The Order data
        $order_name              = $order_data['billing']['first_name'];
        $order_last_name         = $order_data['billing']['last_name'];
        $order_billing_address_1 = $order_data['billing']['address_1'];
        $order_billing_postcode  = $order_data['billing']['postcode'];
        $order_billing_country   = $order_data['billing']['country'];
        $order_payment_method    = $order_data['payment_method_title'];
        $order_billing_phone     = $order_data['billing']['phone'];

        $poluchatelFam           = get_post_meta( $order->get_id(), 'recipient_last_name', true );
        $poluchatelName          = get_post_meta( $order->get_id(), 'recipient_name', true );
        if(esc_html( wc_get_order_status_name( $order->get_status() ) ) == 'Возвращен'){

				?>


				<div class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?> order acc-order-item">
				<header class="acc-order-item-header">

				    <div class="acc-order-item-header__left">
              <?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>

                <?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								  <?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>
                <?php elseif ( 'order-date' === $column_id ) : ?>
								<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>">Заказ от <?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>

                <?php elseif ( 'order-number' === $column_id ) : ?>
                  <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
                    <?php echo esc_html( _x( 'Номер заказа ', 'hash before order number', 'woocommerce' ) . $order->get_order_number() ); ?>
                  </a>
                <?php endif; ?>

					    <?php endforeach; ?>
				    </div>

				    

				    <div class="acc-order-item-header__status">
              <?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>

                <?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								  <?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

                <?php elseif ( 'order-total' === $column_id ) : ?>
								<?php echo wp_kses_post( sprintf( $order->get_formatted_order_total(), $item_count ) ); ?>

                <?php elseif ( 'order-status' === $column_id ) : ?>
								  <span class="st">, <?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?></span>

							  <?php endif; ?>
					    <?php endforeach; ?>
                  <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>" class="acc-order-item-header__details">
                    Детали заказа
                  </a>
            </div>

				</header>

					<div class="acc-order-item__content">

					    <div class="acc-order-item__product">
					    <?php $ids = array();?>
                <?php foreach ($order->get_items() as $item_key => $item_values) : ?>
                  <?php $item_data = $item_values->get_data();
                    $product_url   = $item_data['url'];
                    $product_id    = $item_data['product_id'];
                    $pro           = new WC_Product($product_id);
                    array_push($ids, $product_id);
                    echo $product_name ?>
                    <a href="<?php echo get_permalink( $product_id );?>" target="_blank">
                      <?php echo $pro->get_image($size = 'thumbnail'); ?>
                    </a>

                <?php endforeach; ?>
                <div class="acc-order-btn__buy">
                  <?php $ids_atc = implode(",", $ids);?>
                  <a href="?add-to-cart=<?= $ids_atc;?>" class="btn btn-blue acc-order--btn__buy-all">Купить снова</a>
					      </div>
					    </div>



              <div class="acc-order-btn">
                <?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
                  <div class="woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr( $column_id ); ?> " data-title="<?php echo esc_attr( $column_name ); ?>">
                  <?php if ( 'order-actions' === $column_id ) : ?>
                  <?php $actions = wc_get_account_orders_actions( $order );

                  if ( ! empty( $actions ) ) {
                    foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                      echo '<a href="' . esc_url( $action['url'] ) . '" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
                    }
                  }
                  endif; ?>
                </div>
                <?php endforeach; ?>
              </div>



					  </div>
				  </div>
				<?php } ?>
				<?php } ?>
</div>
</div>












<!--
        <?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

        <?php if ( 1 < $customer_orders->max_num_pages ) : ?>
          <div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
            <?php if ( 1 !== $current_page ) : ?>
              <a class="acc-order-btn__item woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'woocommerce' ); ?></a>
            <?php endif; ?>

            <?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
              <a class="acc-order-btn__item woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'woocommerce' ); ?></a>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php else : ?>
          <div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
            <a class="acc-order-btn__item woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>"><?php esc_html_e( 'Browse products', 'woocommerce' ); ?></a>
            <?php esc_html_e( 'No order has been made yet.', 'woocommerce' ); ?>
          </div>
        <?php endif; ?>
-->

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
