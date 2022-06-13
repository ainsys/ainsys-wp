<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
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

$order_data = $order->get_data();
$item_count = $order->get_item_count() - $order->get_item_count_refunded();
$order_id = $order_data['id'];
$order_status = $order_data['status'];

## BILLING INFORMATION:

$order_billing_first_name = $order_data['billing']['first_name'];
$order_billing_email      = $order_data['billing']['email'];
$order_billing_phone      = $order_data['billing']['phone'];
$order_total              = $order_data['total'];
$order_comm               = $order_data['customer_note'];

do_action( 'woocommerce_before_thankyou', $order->get_id() );
?>
<section class="pay">
<header class="pay-header">
  <div class="pay-header__container">

    <?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'К сожалению, ваш заказ не может быть обработан, так как исходный банк/продавец отклонил вашу транзакцию. Пожалуйста, повторите попытку покупки.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="btn btn-pink button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="btn btn-pink button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>


    <div class="pay-header__img">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/suc.svg"/>
    </div>

    <h1 class="pay-header__title">
      <?php echo 'Спасибо, ваша заявка #' . esc_html( $order->get_order_number()) . ' принята!'; ?>
    </h1>

    <p class="pay-header__text">
      <?php esc_html_e( 'В ближайшее время наш менеджер свяжется с вами. Мы выдадим вам личный кабинет, где вы сможете протестировать итеграции.', 'woocommerce' ); ?>
    </p>

    <a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class='btn btn-pink pay-header__btn'>Вернуться в каталог</a>

  </div>
</header>

<div class="pay-content">
<div class="pay-content__container">

  <div class="pay-path">

    <div class="pay-path-item">
      <div class="pay-path-item__num pay-path-item__num-success">
        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9.50016 16.1701L5.33016 12.0001L3.91016 13.4101L9.50016 19.0001L21.5002 7.00009L20.0902 5.59009L9.50016 16.1701Z" fill="white"/>
        </svg>
      </div>

      <div class="pay-path-item__text">
        Оформление заявки
      </div>
    </div>

    <div class="pay-path-item pay-path-item__line">
        <svg width="120" height="1" viewBox="0 0 120 1" fill="none" xmlns="http://www.w3.org/2000/svg">
          <line y1="0.5" x2="120" y2="0.5" stroke="#AB47BC"/>
        </svg>
    </div>

    <div class="pay-path-item">
      <div class="pay-path-item__num">
        2
      </div>

      <div class="pay-path-item__text">
        В течение 24 часов с вами свяжется наш менеджер
      </div>
    </div>

    <div class="pay-path-item pay-path-item__line">
        <svg width="120" height="1" viewBox="0 0 120 1" fill="none" xmlns="http://www.w3.org/2000/svg">
          <line y1="0.5" x2="120" y2="0.5" stroke="#AB47BC"/>
        </svg>
    </div>

    <div class="pay-path-item">
      <div class="pay-path-item__num">
        3
      </div>

      <div class="pay-path-item__text">
        Вам будет создан тестовый личный кабинет
      </div>
    </div>

  </div>

  <div class="pay-block">

    <div class="basket-info">
      <h3 class="basket-info__title basket-info__title-black"><?php esc_html_e( 'Временные затраты на внедрение ', 'woocommerce' ); ?></h3>

      <div class="basket-info__time">
        2 дня
      </div>

      <div class="basket-info__text">
        Ваш заказ при <a href="#" target="_blank">идеальных</a> условиях займет 2 дня
      </div>
    </div>

    <div class="basket-info">
      <h3 class="basket-info__title basket-info__title-black"><?php esc_html_e( 'Стоимость ', 'woocommerce' ); ?></h3>
      <table class="shop_table woocommerce-checkout-review-order-table">

        <tfoot>
          <tr class="order-total">
            <td><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></td>
          </tr>
        </tfoot>

      </table>

      <div class="basket-info__text">
        Окончательную стоимость заказа вы сможете узнать у менеджера.
      </div>
    </div>


    <div class="basket-info">
      <h3 class="basket-info__title basket-info__title-black"><?php esc_html_e( 'Данные регистрации заказа ', 'woocommerce' ); ?></h3>

      <div class="basket-info__data">
        <?= $order_billing_first_name; ?> <br>
        <?= $order_billing_email; ?> <br>
        <?= $order_billing_phone; ?>
      </div>
    </div>

  </div>


  <div class="pay-table">
  <header class="pay-table__header">
    <div class="pay-table__left pay-table__text">
      Коннектор
    </div>

    <div class="pay-table__center pay-table__text">
      Кол-во транзакций, шт
    </div>

    <div class="pay-table__right pay-table__text">
      Время на итеграцию при идеальных условиях
    </div>
  </header>

  <?php foreach ($order->get_items() as $item_key => $item_values) : ?>
    <?php $item_data = $item_values->get_data();
          $product_url = $item_data['url'];
          $product_id = $item_data['product_id'];
          $pro2 = $item_values;
          $pro = new WC_Product($product_id);?>

          <div class="pay-order-item">

            <div class="pay-table__left pay-table-item">
              <span>Коннектор</span>
              <div class="basket-item__img">
                <a href="<?php echo get_permalink( $product_id );?>" target="_blank">
                  <?php echo $pro->get_image($size = 'cart-thumb'); ?>
                </a>
              </div>

              <div class="basket-item__name">
                <a href="<?php echo get_permalink( $product_id );?>" target="_blank" class="pay-order-item__text">
                    <?= $pro->get_name(); ?>
                </a>
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

            <div class="pay-table__center pay-order-item__text pay-table-item">
              <span>Кол-во транзакций, шт</span>
              <?= $pro2['quantity']; ?>
            </div>

            <div class="pay-table__right pay-order-item__text pay-table-item">
            <span>Время на итеграцию при идеальных условиях</span>
              2 дня
            </div>


          </div>


    <?php wp_reset_postdata();
          wp_reset_query();
          endforeach; ?>
  </div>
</div>
</div>


<?php endif; ?>


</section>

<?php do_action( 'woocommerce_receipt_' . $order->get_payment_method(), $order->get_id() ); ?>