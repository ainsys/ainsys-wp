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
<a href="<?php echo get_home_url( null, 'my-account/orders/', 'https' ); ?>" class="my-acc__back">Вернуться к заказам</a>
<?php $order = new WC_Order( $order_id );

$order_data = $order->get_data();
$item_count = $order->get_item_count() - $order->get_item_count_refunded();
$order_id = $order_data['id'];
$order_status = $order_data['status'];

## BILLING INFORMATION:

$order_billing_first_name = $order_data['billing']['first_name'];
$order_billing_email      = $order_data['billing']['email'];
$order_billing_phone      = $order_data['billing']['phone'];
$order_total              = $order_data['total'];

do_action( 'woocommerce_before_thankyou', $order->get_id() );
?>
<section class="pay">
<header class="pay-header">
  <div class="pay-header__container">

    <div class="pay-header__img">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/suc.svg"/>
    </div>

    <h1 class="pay-header__title">
      <?php echo 'Просмотрите детали заказа #' . esc_html( $order->get_order_number()) . '.'; ?>
    </h1>

    <p class="pay-header__text">
      <?php esc_html_e( 'Если у вас остались вопросы, вы можете связаться с нами по любому удобному для вас номеру телефона, которые расположены в подвале сайта .', 'woocommerce' ); ?>
    </p>

    <a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class='btn btn-pink pay-header__btn'>Перейти в каталог</a>

  </div>
</header>

<div class="pay-content">
<div class="pay-content__container">



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
                  Что выводим???
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


</section>

<?php do_action( 'woocommerce_receipt_' . $order->get_payment_method(), $order->get_id() ); ?>