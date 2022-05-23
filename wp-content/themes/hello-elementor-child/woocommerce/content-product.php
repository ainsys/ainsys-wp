<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?> class="js-product-cart">
<div class="js-product-cart">
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */


	do_action( 'woocommerce_after_shop_loop_item_title' );

  remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
  remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);


	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );

  global $product;
	?>

  <div class="modal-sidebar">
    <div class="modal modal-cart modal-center">
      <div class="modal__wrapper modal-basket-item__wrapper modal-cart__wrapper">

        <a class="modal-center__exit modal-cart__exit">
          <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 1L20 20" stroke="#667085" stroke-width="2" stroke-linecap="round"/>
            <path d="M20 1L1 20" stroke="#667085" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </a>

        <div class="modal-basket-item__img">
          <a href="<?php the_permalink();?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
            <?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
          </a>
        </div>

        <div class="modal-basket-item__info">
          <a href="<?php the_permalink();?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
            <?php the_title(); ?>
          </a>

          <div class="modal-cart__descr">
            <?php the_excerpt();?>
          </div>
        </div>

        <div class="modal-cart-info">
          <?php if(get_field('what-in-sys')) :?>
            <div class="modal-cart-info-text">
              <h4 class="modal-cart-info__title">Общая информация</h4>

              <div class="modal-cart-info-text__content">
                <?= get_field('prod-info-text');?>
              </div>

            </div>
          <?php endif;?>

          <?php if(get_field('what-in-sys')) :?>
            <div class="modal-cart-info-text">
              <h4 class="modal-cart-info__title">Что входит в систему</h4>

              <div class="modal-cart-info-text__content">
                <?= get_field('what-in-sys');?>
              </div>

            </div>
          <?php endif;?>

          <div class="modal-cart-dop">
          <?php if( have_rows('poh-sist-repeat') ): ?>
          <h4 class="modal-cart-info__title">Похожие системы</h4>
            <?php while( have_rows('poh-sist-repeat') ): the_row();
              $post_object = get_sub_field('poh-sist-repeat-item');
              if( $post_object ):
                $post = $post_object;
                setup_postdata( $post );
              ?>
                <div class="modal-cart-dop__item">
                  <div class="modal-cart-dop__img">
                    <?php the_post_thumbnail( 'thumbnail' ); ?>
                  </div>
                	<h3  class="modal-cart-dop__item__name">
                	  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                	</h3>
                	<div class="modal-cart-dop__item__content"><?php the_excerpt();?></div>
                </div>

        		  <?php endif;
            endwhile;
          endif;
          wp_reset_postdata();?>
          </div>
        </div>

      </div>
    </div>
  </div>

</div>
</li>
