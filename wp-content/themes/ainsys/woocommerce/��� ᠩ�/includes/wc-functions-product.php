<?php
defined( 'ABSPATH' ) || exit;

add_action( 'woocommerce_before_single_product', 'store_add_breadcrumb', 5);
add_action( 'woocommerce_before_single_product', 'store_start_wrapper_product', 5);
add_action( 'woocommerce_after_single_product', 'store_end_wrapper_product', 5);
function store_add_breadcrumb() {
    if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs('>');
}
function store_start_wrapper_product() {
    ?>
    <div>
    <?php
}
function store_end_wrapper_product() {
    ?>
        </div>
    <?php
}

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
add_action('woocommerce_before_single_product_summary', 'store_product_img', 20);
function store_product_img(){
global $product;
?>
<div class="product__wrapper">
<div class="product-img">
<?php $attachment_ids = $product->get_gallery_image_ids();?>
    <div class="product-slider">
      <div class="swiper-container gallery-top">
        <div class="swiper-wrapper">

          <?php foreach ( $attachment_ids as $attachment_id ) { ?>
          <div class="swiper-slide">
            <a href="<?php echo wp_get_attachment_url( $attachment_id ); ?>" class="product-img__item glightbox" data-gallery="product">
                <?php echo wp_get_attachment_image( $attachment_id, 'woocommerce_single'  ); ?>
            </a>
          </div>
          <?php } ?>

        </div>
      </div>
    </div>

    <div class="product-slider">
      <div class="swiper-container gallery-thumbs">
        <div class="swiper-wrapper">

          <?php foreach ( $attachment_ids as $attachment_id ) { ?>
          <div class="swiper-slide">
            <div class="product-img__item">
                <?php echo wp_get_attachment_image( $attachment_id, 'shop_thumbnail'  ); ?>
            </div>
          </div>
          <?php } ?>

      </div>
      <div class="product__prev"><img src="img/arr.svg" alt=""></div>
      <div class="product__next"><img src="img/arr.svg" alt=""></div>
    </div>
  </div>


</div>
<?php
}

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_action('woocommerce_single_product_summary', 'store_product_descr', 20);



function store_product_descr(){
global $product;
$product_content = $product->post->post_content;
$product_title = $product->get_title();
$product_price = $product->get_price_html();
?>
 <h1 class="product-info__title">
    <?= $product_title ?>
 </h1>
 <p class="product-info__description">
    <?= $product_content; ?>
 </p>
 <div class="product-info-attr">
    <h3 class="product-info-attr__title">
        Характеристики
    </h3>

        <?php

        	global $post;

        	$attributes = $product->get_attributes();

        	if ( ! $attributes ) {
        	?> </div>
            	<?php
        		return;
        		}

        	$counter = 0;
        	foreach ( $attributes as $attribute ) {
        		$counter++;
        		if($counter > 4) {
        			break;
        			};


        	$terms = wp_get_post_terms( $product->id, $attribute[ 'name' ], 'all' );
        	$taxonomy = $terms[ 0 ]->taxonomy;


        	$taxonomy_object = get_taxonomy( $taxonomy );


        	$attribute_label = $taxonomy_object->labels->name;
        	$attribute_label = str_replace('Товар', '', $attribute_label);


        	echo get_the_term_list( $post->ID, $attribute[ 'name' ] , '<div class="product-info-attr__item">' . $attribute_label . ' — ' , ', ', '</div>' );
        	}
        	?>
 </div>

 <p class="product-info__price">
    <?= $product_price;?>
 </p>
<?php
}
// Переименование табов
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

	$tabs['description']['title'] = __( 'Описание' );		// Rename the description tab
	$tabs['additional_information']['title'] = __( 'Характеристики' );	// Rename the additional information tab

	return $tabs;

}
// Табы
    //Описание
add_filter( 'woocommerce_product_tabs', 'woo_custom_description_tab', 98 );
function woo_custom_description_tab( $tabs ) {

	$tabs['description']['callback'] = 'woo_custom_description_tab_content';	// Custom description callback

	return $tabs;
}

function woo_custom_description_tab_content() {
global $product;
$product_content = $product->post->post_content;
$product_title = $product->get_title();
$product_price = $product->get_price_html();
	?>
	    <div class="tab-content">
            <div class="tab-content__left">
                <h2 class="tab-content__title">Описание</h2>
            </div>

            <div class="tab-content__right">
                <p class="tab-content__text">
                    <?= $product_content; ?>
                </p>
            </div>
	    </div>
	<?php
}




    //Характеристики
add_filter( 'woocommerce_product_tabs', 'woo_custom_attr_tab', 100 );
function woo_custom_attr_tab( $tabs ) {

	$tabs['additional_information']['callback'] = 'woo_custom_attr_tab_content';	// Custom description callback

	return $tabs;
}

function woo_custom_attr_tab_content() {
global $product;
	?>
	    <div class="tab-content">
            <div class="tab-content__left">
                <h2 class="tab-content__title">Характеристики</h2>
            </div>

            <div class="tab-content__right">
                <p class="tab-content__text">
                    <?php

                            	global $post;

                            	$attributes = $product->get_attributes();

                            	if ( ! $attributes ) {
                            	?> </div>
                                	<?php
                            		return;
                            		}

                            	foreach ( $attributes as $attribute ) {



                            	$terms = wp_get_post_terms( $product->id, $attribute[ 'name' ], 'all' );
                            	$taxonomy = $terms[ 0 ]->taxonomy;


                            	$taxonomy_object = get_taxonomy( $taxonomy );


                            	$attribute_label = $taxonomy_object->labels->name;
                            	$attribute_label = str_replace('Товар', '', $attribute_label);


                            	echo get_the_term_list( $post->ID, $attribute[ 'name' ] , '<div class="product-info-attr__item">' . $attribute_label . ' — ' , ', ', '</div>' );
                            	}
                            	?>
                </p>
            </div>
	    </div>
	<?php
}




    //Отзывы
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab_reviews' );
function woo_new_product_tab_reviews( $tabs ) {
	$tabs['reviews'] = array(
		'title' 	=> __( 'Отзывы', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'woo_new_product_tab_content_reviews'
	);
	return $tabs;
}

function woo_new_product_tab_content_reviews() {
  ?>
    <div class="tab-content">

    <?php

       /**
        * Display single product reviews (comments)
        *
        * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
        *
        * HOWEVER, on occasion WooCommerce will need to update template files and you
        * (the theme developer) will need to copy the new files to your theme to
        * maintain compatibility. We try to do this as little as possible, but it does
        * happen. When this occurs the version of the template file will be bumped and
        * the readme will list any important changes.
        *
        * @see     https://docs.woocommerce.com/document/template-structure/
        * @package WooCommerce\Templates
        * @version 4.3.0
        */

       defined( 'ABSPATH' ) || exit;

       global $product;

       if ( ! comments_open() ) {
       	return;
       }

       ?>
       <div class="tab-content__reviews">

       <?php
          $idpage =  get_the_ID();
          echo do_shortcode(' [cusrev_reviews] ');
                   ?>
       </div>
       </div>
<?php
}

 //Комплект поставки
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab_komplekt' );
function woo_new_product_tab_komplekt( $tabs ) {
	$tabs['komplekt'] = array(
		'title' 	=> __( 'Комплект поставки', 'woocommerce' ),
		'priority' 	=> 40,
		'callback' 	=> 'woo_new_product_tab_content_komplekt'
	);
	return $tabs;
}

function woo_new_product_tab_content_komplekt() {
  ?>
    <div class="tab-content">
                <div class="tab-content__left">
                    <h2 class="tab-content__title">Комплект поставки</h2>
                </div>

                <div class="tab-content__right">
                    <p class="tab-content__text">
                        <?php if( get_field('product-complekt') ){
                         echo get_field('product-complekt');
                        }else{
                          echo 'Для данного товара еще не добавлен комплект поставки.';
                        }?>
                    </p>
                </div>
    	    </div>
<?php
}


    //Обзоры
    /*
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab_overview' );
function woo_new_product_tab_overview( $tabs ) {
	$tabs['overview'] = array(
		'title' 	=> __( 'Обзоры', 'woocommerce' ),
		'priority' 	=> 60,
		'callback' 	=> 'woo_new_product_tab_content_overview'
	);
	return $tabs;
}
function woo_new_product_tab_content_overview() {
	echo '<h2>Обзоры</h2>';
	echo '<p>ОбзорыОбзорыОбзоры</p>';
}
*/


    //Сравнение
    /*
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab_comparison' );
function woo_new_product_tab_comparison( $tabs ) {
	$tabs['comparison'] = array(
		'title' 	=> __( 'Сравнение', 'woocommerce' ),
		'priority' 	=> 60,
		'callback' 	=> 'woo_new_product_tab_content_comparison'
	);
	return $tabs;
}
function woo_new_product_tab_content_comparison() {

	?>
	<div class="tab-content">
<?php echo do_shortcode( '[woosc_list]');?>
	</div>
	<?php
}
*/