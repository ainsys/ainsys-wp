<?php
defined( 'ABSPATH' ) || exit;
// Удаление заголовка на странице магазина
add_filter('woocommerce_show_page_title', 'store_hide_title_shop');
add_filter('woocommerce_result_count', 'store_hide_title_shop');
function store_hide_title_shop($hide){
    if (is_shop() || is_product_category()){
        $hide = false;
    }
    return $hide;
}
//Описание категории
add_action( 'woocommerce_archive_description', 'store_add_breadcrumb', 1);


remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);



add_action( 'woocommerce_archive_description', 'out_category_description', 10);
function out_category_description(){
if(is_product_category()){
?>

<div class="shop-category-descr">
<h1 class="title shop-category__title title-icon"> <?php echo get_queried_object()->name;?></h1>
    <div class="shop-category-descr__wrapper">


        <div class="shop-category-descr__img">
<?php
    global $wp_query;

    // get the query object
    $cat = $wp_query->get_queried_object();

    // get the thumbnail id using the queried category term_id
    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );

    // get the image URL
    $image = wp_get_attachment_url( $thumbnail_id );

    // print the IMG HTML
?>
<?php echo wp_get_attachment_image($thumbnail_id, 'shop_single', false, ); ?>
        </div>

        <div class="shop-category-descr__text">
<?php echo category_description(); ?>
        </div>
    </div>
</div>
<?php
}
}

// Открывающие теги магазина
add_action( 'woocommerce_archive_description', 'store_archive_wrapper_start', 5);
function store_archive_wrapper_start(){
?>
    <section class="shop">
        <div class="container">
            <div class="row">
                <div class="col-12">
<?php
}



// Закрывающие теги магазина
add_action( 'woocommerce_after_shop_loop', 'store_archive_wrapper_end', 20);
function store_archive_wrapper_end(){
?>
               </div>
            </div>
       </div>
    </section>
<?php
}


// Вывод категорий

add_action( 'woocommerce_archive_description', 'out_category', 20);
function out_category(){
if(!is_product_category()){
?>
<div class="shop-category">
    <header class="shop-category__header">
        <h2 class="title shop-category__title title-icon"> Популярные категории </h2>
        <nav class="shop-category__nav">

            <a href="#" class="shop-category-btn shop-category-btn__prev">
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.5 8H1.5M1.5 8L8.5 15M1.5 8L8.5 1" stroke="#838589" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>

            <a href="#" class="shop-category-btn shop-category-btn__next">
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 8H15.5M15.5 8L8.5 1M15.5 8L8.5 15" stroke="#838589" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>

        </nav>
    </header>

    <div class="swiper-container shop-category-slider">
        <div class="swiper-wrapper">
<?php
	$prod_cat_args = array(
         'taxonomy'    => 'product_cat',
         'orderby'     => 'id', // здесь по какому полю сортировать
         'hide_empty'  => false, // скрывать категории без товаров или нет
         'parent'      => 0 // id родительской категории
       );

    $woo_categories = get_categories( $prod_cat_args );
    foreach ( $woo_categories as $woo_cat ) {
           $woo_cat_id = $woo_cat->term_id;
           $woo_cat_name = $woo_cat->name;
           $woo_cat_slug = $woo_cat->slug;
           $woo_cat_descr = $woo_cat->description;
           $category_thumbnail_id = get_woocommerce_term_meta($woo_cat_id, 'thumbnail_id', true);
           ?>

            <div class="swiper-slide">
                <div class="shop-category-item">
                    <h3 class="shop-category-item__name"> <?php echo $woo_cat_name; ?></h3>
                    <header class="shop-category-item__img">
                        <?php echo wp_get_attachment_image($category_thumbnail_id, 'shop_catalog', false, ); ?>
                    </header>

                    <p class="shop-category-item__text"> <?php echo $woo_cat_descr; ?></p>
                    <footer class="shop-category-item__btns">
                        <a href="<?php echo get_term_link( $woo_cat_id, 'product_cat' );?>" class="shop-category-item__btn shop-category-item__btn-blue">Информация</a>
                        <a href="<?php echo get_term_link( $woo_cat_id, 'product_cat' );?>" class="shop-category-item__btn shop-category-item__btn-white">Смотреть</a>
                    </footer>

                </div>
            </div>
    <?php } ?>
        </div>
    </div>
</div>


<?php }
}

add_action( 'woocommerce_archive_description', 'out_case', 20);
function out_case(){
?>
<div class="case">
    <header class="case__header">
    <h2 class="title shop-category__title title-icon"> Варианты использования</h2>
        <nav class="swiper-container case-nav">
            <div class="swiper-wrapper">
                <?php if ( have_rows( 'case', 'option' ) ): ?>
                <?php while ( have_rows( 'case', 'option' ) ): the_row();?>

                    <div class="swiper-slide">
                        <div class="case-nav__item">
                        <?php
                                $image     = get_sub_field( 'case-img' );

                        if( !empty($image) ): ?>
                            <?php echo wp_get_attachment_image($image['id'], 'shop_catalog', false, ); ?>
                            <div class="case-nav__text">
                                <?= get_sub_field('case-name');?>
                            </div>
                        <?php endif; ?>
                        </div>
                    </div>
                  <?php endwhile; ?>
                  <?php endif; ?>


            </div>
        </nav>
    </header>

    <div class="swiper-container case__content">
        <div class="swiper-wrapper">

                <?php if ( have_rows( 'case', 'option' ) ): ?>
                <?php while ( have_rows( 'case', 'option' ) ): the_row();?>

            <div class="swiper-slide">
                <div class="case-item">
                    <div class="case-item__img">
                        <?php

                                $image     = get_sub_field( 'case-img' );
                                $name      = get_sub_field( 'case-name' );
                                $descr      = get_sub_field( 'case-descr' );

                        if( !empty($image) ): ?>
                            <?php echo wp_get_attachment_image($image['id'], 'shop_catalog', false, ); ?>
                        <?php endif; ?>
                    </div>
                    <div class="case-item__text">
                        <h2 class="case-item__title"><?= $name;?> </h2>
                        <?= $descr;?>
                    </div>
                    <div class="swiper-container case-item__slider">
                        <div class="swiper-wrapper">

                            <?php if ( have_rows( 'case-repeat', 'option' ) ): ?>
                            <?php $ids = array();?>
                            <?php while ( have_rows( 'case-repeat', 'option' ) ): the_row();?>

                                <div class="swiper-slide">

                                    <?php

                                    $post_object = get_sub_field('case-item');
                                    $id = $post_object->ID;
                                    array_push($ids, $id);

                                    if( $post_object ):


                                        ?>

                                        <div class="product-cart__wrapper">
                                        <?php echo do_shortcode( '[woosc id="'.$id.'"]' );?>
                                            <a href="<?=  get_the_permalink($id);?>" class="product-cart__img">
                                                <?php  $thumbnail_id = get_woocommerce_term_meta( $post_object->ID, 'shop_catalog', true );
                                                echo wp_get_attachment_image( $id, 'shop_catalog'); ?>

                                            <?php echo get_the_post_thumbnail( $post_object->ID, 'shop_catalog', array('class' => 'alignleft') ); ?>
                                            </a>
                                            <?php echo '<a href="' . get_the_permalink($id) . '" class="product-cart__name">' . get_the_title($id) . '</a>'; ?>
                                            <div class="product-cart__header">

                                                <?php echo do_shortcode( '[add_to_cart id='.$id.']' ); ?>

                                            </div>
                                        <div class="product-cart-attr">
                                        <div class="product-cart-attr__item"> Категория кабеля —  <span><?php $statevalues = get_the_terms( $id, 'pa_category-cabel');
                                                                                            if(is_array($statevalues)) {
                                                                                                foreach ( $statevalues as $statevalue ) {
                                                                                                    echo $statevalue->name;}
                                                                                                }
                                                                                            ?></span></div>

                                        <div class="product-cart-attr__item"> Разрешение —  <span><?php $statevalues = get_the_terms( $id, 'pa_razreshenie');
                                                                                            if(is_array($statevalues)) {
                                                                                                foreach ( $statevalues as $statevalue ) {
                                                                                                    echo $statevalue->name;}
                                                                                                }
                                                                                            ?></span></div>

                                        <div class="product-cart-attr__item"> Дальность передачи —  <span><?php $statevalues = get_the_terms( $id, 'pa_dalnost-peredachi');
                                                                                            if(is_array($statevalues)) {
                                                                                                foreach ( $statevalues as $statevalue ) {
                                                                                                    echo $statevalue->name;}
                                                                                                }
                                                                                            ?></span></div>
</div>
                                        	        </div>
                                        <?php wp_reset_postdata(); ?>
                                    <?php endif; ?>

                                </div>

                            <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                               <?php $ids_atc = implode(",", $ids);?>
                                    <a href="?add-to-cart=<?= $ids_atc;?>" class="case__btn"> ДОБАВИТЬ ВСЁ</a>
                </div>

                </div>



                  <?php endwhile; ?>
                  <?php endif; ?>




        </div>

    </div>
</div>

<?php
}


add_action( 'woocommerce_archive_description', 'out_filter', 20);
function out_filter(){
?>
<div class="shop-filter">
    <div class="shop-filter__wrapper">

        <div class="shop-filter__left">
            <h2 class="shop-filter__title">
                Выберите параметры поиска
            </h2>
            <div class="shop-filter__type">
                <button class="shop-filter__btn active"><img src="<?php echo LENKENG_DIR_IMG ?>/slide.svg" alt="btn">
                <button class="shop-filter__btn"><img src="<?php echo LENKENG_DIR_IMG ?>/grid.svg" alt="btn">
            </div>
        </div>

        <div class="shop-filter__right">
        <?php
        if( is_product_category(15)){
            dynamic_sidebar( 'sidebar-udliniteli' );
        }
        else if( is_product_category(75)){
            dynamic_sidebar( 'sidebar-kommutatory' );
        }
        else if( is_product_category(73)){
            dynamic_sidebar( 'sidebar-konvertery' );
        }
        else if( is_product_category(76)){
            dynamic_sidebar( 'sidebar-razvetviteli' );
        }
        else if( is_product_category(74)){
            dynamic_sidebar( 'sidebar-splittery' );
        }
        else if( is_product_category(77)){
            dynamic_sidebar( 'sidebar-besprovodnye-udliniteli' );
        }
        else if( is_product_category(119)){
            dynamic_sidebar( 'sidebar-dopolnitelnyj-priemnik' );
        }else{
            dynamic_sidebar( 'sidebar-shop' );
        }
            ?>
        </div>

    </div>
</div>
<?php
}


// Карточка товара в магазине
add_filter( 'post_class', 'store_add_class_loop_item' );
function store_add_class_loop_item($clasess){
    if(is_shop() || is_product_taxonomy()){
        $clasess[] = 'product-cart';
    }
    return $clasess;
}


remove_action ('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action ('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

add_action('woocommerce_before_shop_loop_item', 'shop_product_grid_div_open', 5);
add_action('woocommerce_after_shop_loop_item', 'shop_product_grid_div_close', 30);

add_action('woocommerce_before_shop_loop_item_title', 'shop_product_div_open', 5);
add_action('woocommerce_before_shop_loop_item_title', 'shop_product_div_close', 30);
function shop_product_grid_div_open() {
    ?>
        <div class="product-cart__wrapper">
    <?php
}


function shop_product_div_open() {
    ?>
        <a href="<?php echo get_the_permalink();?>" class="product-cart__img">
    <?php
}


function shop_product_div_close() {
    ?>
        </a>
    <?php
}
function shop_product_grid_div_close() {
    ?>
        </div>
    <?php
}

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', 'store_template_loop_product_title', 10);
function store_template_loop_product_title(){
    echo '<a href="' . get_the_permalink() . '" class="product-cart__name">' . get_the_title() . '</a>';
}
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

add_action('woocommerce_after_shop_loop_item_title', 'shop_product_header_div_open', 7);
add_action('woocommerce_after_shop_loop_item', 'shop_product_header_div_close', 15);
add_action('woocommerce_after_shop_loop_item', 'shop_product_attribute', 20);
function shop_product_attribute() {
?>
<div class="product-cart-attr">
<?php

	global $product;
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
		if($counter > 3) {
			break;
			};


	$terms = wp_get_post_terms( $product->id, $attribute[ 'name' ], 'all' );
	$taxonomy = $terms[ 0 ]->taxonomy;


	$taxonomy_object = get_taxonomy( $taxonomy );


	$attribute_label = $taxonomy_object->labels->name;
	$attribute_label = str_replace('Товар', '', $attribute_label);


	echo get_the_term_list( $post->ID, $attribute[ 'name' ] , '<div class="product-cart-attr__item"><span class="product-cart-attr__name">' . $attribute_label . ' <span class="delete"> - </span> </span><span class="product-cart-attr__value"> ' , ', ', '</span></div>' );
	}
	?>
	</div>

	<?php
}
function shop_product_header_div_open(){
?>
    <div class="product-cart__header">

<?php

}
function shop_product_header_div_close(){
?>
    </div>
<?php
}






