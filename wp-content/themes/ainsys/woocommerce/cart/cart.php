<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;
if(0 == WC()->cart->get_cart_contents_count()){
  wp_safe_redirect( '/test/' );
}
 ?>
<div class="basket integration">
<a href="#" onclick="history.back();" class="btn-back nav_back_text">Вернуться назад</a>
<h1 class="integration_title basket__title"><?php esc_html_e( 'План интеграции', 'woocommerce' ); ?></h1>

<div class="integration_fl">
<div class="basket__left">
<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>

	<div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			$counter = 0;
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'connector', $cart_item, $cart_item_key ) ); ?>">
          
          <div class="connector_wrapper">
            <div class="connector_item">
              <div class="connector_item_block" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                <div class="basket-item__img">
                  <?php
                  $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                  if ( ! $product_permalink ) {
                    echo $thumbnail; // PHPCS: XSS ok.
                  } else {
                    printf( '<a href="%s" target="_blank">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                  }
                  ?>
                </div>

                <div class="basket-item__name">
                  <?php
                  if ( ! $product_permalink ) {
                    echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                  } else {
                    echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s" target="_blank">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                  }

                  do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                  // Meta data.
                  echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                  // Backorder notification.
                  if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                    echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                  }
                  ?>
                  <div class="basket-item__category">
                  <?php
                    $terms = get_the_terms( $product_id, 'product_cat' );
                    foreach ($terms as $term) {
                        $product_cat_id = $term->name;
                        echo $product_cat_id;
                        break;
                    }
                    ?>
                  </div>
                </div>
              </div>

              <div class="connector_item_block connector_item_operations" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
              <p class="connector_item_operations_text">
                  Количество транзакций
              </p>
                <?php
                if ( $_product->is_sold_individually() ) {
                  $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                } else {
                  $product_quantity = woocommerce_quantity_input(
                    array(
                      'input_name'   => "cart[{$cart_item_key}][qty]",
                      'input_value'  => $cart_item['quantity'],
                      'max_value'    => $_product->get_max_purchase_quantity(),
                      'min_value'    => '0',
                      'product_name' => $_product->get_name(),
                    ),
                    $_product,
                    false
                  );
                }

                echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                ?>

              </div>
            </div> 

              <!-- <div class="product-state js-product-state-<?=$counter;?>" data-title="<?php esc_attr_e( 'Состояние коннектора', 'woocommerce' ); ?>">
                <span>Редактировать</span>
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M24.168 12.4999C24.3868 12.2811 24.6467 12.1074 24.9326 11.989C25.2186 11.8705 25.5251 11.8096 25.8346 11.8096C26.1442 11.8096 26.4507 11.8705 26.7366 11.989C27.0226 12.1074 27.2824 12.2811 27.5013 12.4999C27.7202 12.7188 27.8938 12.9786 28.0122 13.2646C28.1307 13.5506 28.1917 13.8571 28.1917 14.1666C28.1917 14.4761 28.1307 14.7826 28.0122 15.0686C27.8938 15.3546 27.7202 15.6144 27.5013 15.8333L16.2513 27.0833L11.668 28.3333L12.918 23.7499L24.168 12.4999Z" stroke="#667085" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div> -->

              <div class="product-remove">
                <?php
                  echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    'woocommerce_cart_item_remove_link',
                    sprintf(
                      '<div class="connector_delete">
                          <img class="connector_delete_btn" src="http://ainsyswp/wp-content/themes/ainsys/assets/images/components/delete_con.svg" alt="delete">
                      </div>',
                      esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                      esc_html__( 'Remove this item', 'woocommerce' ),
                      esc_attr( $product_id ),
                      esc_attr( $_product->get_sku() )
                    ),
                    $cart_item_key
                  );
                ?>
              </div>

            </div>

            <div class="modal-sidebar modal-sidebar-<?=$counter;?>">
              <div class="modal modal-center modal-basket-item js-modal-basket-item-<?=$counter;?>">
                <div class="modal__wrapper modal-basket-item__wrapper">

                  <a class="modal-center__exit modal-center__exit-<?=$counter;?>">
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1 1L20 20" stroke="#667085" stroke-width="2" stroke-linecap="round"/>
                      <path d="M20 1L1 20" stroke="#667085" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                  </a>

                  <div class="modal-basket-item__img">
                    <?php
                    //Img
                    $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                    if ( ! $product_permalink ) {
                      echo $thumbnail; // PHPCS: XSS ok.
                    } else {
                      printf( '<a href="%s" target="_blank">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                    }
                    //Name
                    if ( ! $product_permalink ) {
                      echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                    } else {
                      echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s" target="_blank" class="modal-basket-item__name-'. $counter .'">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                    }

                    do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                    // Meta data.
                    echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                    // Backorder notification.
                    if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                      echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                    }
                    ?>
                  </div>

                  <div class="modal-basket-item__info">
                    <h3 class="modal__title modal-basket-item__title">
                      Опишите детальную информацию о коннекторе
                    </h3>
                    <div class="modal-basket-item__form">
                       <textarea class="modal-basket-item__text modal-basket-item__text-<?=$counter;?>" placeholder="Например..."></textarea>
                       <button class="btn btn-pink modal-form__btn modal-basket-item__btn modal-basket-item__btn-<?=$counter;?>">Сохранить</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>

					</tr>
					<?php
					$counter++;
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<div style="display:none!important">
				<td colspan="6" class="actions">

					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="coupon">
							<label for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button btn-primary" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						</div>
					<?php } ?>

					<button type="submit" class="button btn btn-primary" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
				</td>
        </div>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
    </div>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>
</div><!-- //.basket__left -->

<div class="basket__right terms">
  <div class="term_item">
    <div class="term_item_header">
      <h3 class="term_item_header_title">
        Временные затраты на внедрение
      </h3>
      <div class="term_item_header_info">
        <img class="term_item_header_info_img" src="<?php echo get_template_directory_uri(); ?>/assets/images/components/time.svg" alt="cancel">
        <div class="term_item_header_info_value">
          2 дня
        </div>
        <span class="tooltips__item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="cancel">
            <div class="tooltips">
                test
            </div> 
        </span>
      </div>
    </div>
  </div>
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

</div><!-- //.basket__right -->

</div>
</div><!-- //.basket -->

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

<div class="cart-collaterals">
	<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		do_action( 'woocommerce_cart_collaterals' );
	?>
</div>

