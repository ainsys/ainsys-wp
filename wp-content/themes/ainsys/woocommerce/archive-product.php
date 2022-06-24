<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

$lang = get_locale();
global $wp_query;

if($lang == 'en_US') {
    get_header('us');
} elseif ($lang == 'es_ES') {
    get_header('es');
} elseif ($lang == 'uk') {
    get_header('ua');
} elseif($lang == 'ru_RU') {
    get_header();
} else {
    get_header('us');
}

$current_category = $wp_query->get_queried_object()->term_id;
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
// do_action( 'woocommerce_before_main_content' ) - remove breadcrumbs.

?>
<div class="container">
	<header class="woocommerce-products-header">
		<!--<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
		<?php endif; ?>
        -->
		<?php
		/**
		 * Hook: woocommerce_archive_description.
		 *
		 * @hooked woocommerce_taxonomy_archive_description - 10
		 * @hooked woocommerce_product_archive_description - 10
		 */
		//do_action( 'woocommerce_archive_description' );
		?>

	</header>

	<div class="products__container">
        <?php if ( false === is_user_logged_in() ): ?>
        <div class="woocommerce__header__notice">
            <p>Log in to create your integration plan and make a preliminary calculation of the timing and budget for implementation</p>
            <button type="button" data-target="#authModal" class="woocommerce-Button button button--notice button--auth" id="noticeAuthorize"><?php _e('Login','ainsys') ?></button>
        </div>
    <?php else:?>
            <div class="woocommerce__header__notice woocommerce__header__notice--authorized">
                <p>The AINSYS Integration Plan will help you calculate the timing and budget for your automation project, as well as make it easier to find contractors among our community of competent partners and developers. In our catalog you will find any system you need.</p>
                     <a href="/ainsys-404-en"  class="woocommerce-Button button button--notice button--cart" >
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/components/icon-techno.svg" alt="button-icon">
                    <?php _e('Integration plan','ainsys'); ?>
                    <!--<span class="button-info "><?php echo WC()->cart->get_cart_contents_count(); ?></span>-->
                </a>
               

            </div>
    <?php endif; ?>

		<div class="products__left">
			<div class="products__left__title"><?php _e('Integrations','ainsys'); ?></div>


			<div class="products__search">
                <form action="<?php echo admin_url( 'admin-ajax.php' ) ?>" method="POST" id="filter">
                    <input type="text" name="search" placeholder="Search" class="search-input">
                    <input type="hidden" name="action" value="taxonomyFilter">
                    <input type="hidden" name="filter-category" id="categoryFilter">
                    <input type="hidden" name = "category" value="<?= $current_category; ?>">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.5 16.5L12.875 12.875M14.8333 8.16667C14.8333 11.8486 11.8486 14.8333 8.16667 14.8333C4.48477 14.8333 1.5 11.8486 1.5 8.16667C1.5 4.48477 4.48477 1.5 8.16667 1.5C11.8486 1.5 14.8333 4.48477 14.8333 8.16667Z" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </form>
			</div>


			<div class="products__categories">

				<?php
				$exclude = get_field( 'exclude_categories', 'option' ) ? implode( ',', get_field( 'exclude_categories', 'option' ) ) : '';

				$args = array(
					'taxonomy'     => 'product_cat',
					'orderby'      => 'name',
					'order'        => 'ASC',
					'child_of'     => (int)$current_category,
					//'heirarchical' => true,
					'hide_empty'   => true,
					'title_li'     => '',
					'exclude'      => $exclude,
				);
				$categories = get_categories( $args );
                $html='';
				?>
				<ul class="products__category-list">

					<?php
                    //wp_list_categories( $args );
                    foreach ( $categories as $category ) {
                        $tag_link = get_tag_link( $category->term_id );

                        $html .= "<li title='{$category->name}' class='{$category->slug} cat-item  current-cat-parent current-cat-ancestor ' data-filter = '{$category->slug}'>  ";
                        $html .= "<span>{$category->name}</span></li>";
                    }
                    $html .= '<li class="cat-item reset-filter" data-filter="clear">  <span>'.__("Reset Filters", 'ainsys').'</span></li>';
                    echo $html;
                    ?>
				</ul>
                <?php if ( is_user_logged_in() ): ?>
                    <div class="products__addsystem">
                        <p>If the application you need is not found, please leave a request to add a new application</p>
                        <button id="modalAddBtn"  class="woocommerce-Button button button--notice button--add" ><?php _e('Add System','ainsys'); ?></button>
                    </div>
                <?php endif; ?>

			</div>

		</div>

		<div class="products__right ">
			<?php
			if ( woocommerce_product_loop() ) {

				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked woocommerce_output_all_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );

				woocommerce_product_loop_start();

				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 */
						do_action( 'woocommerce_shop_loop' );

						wc_get_template_part( 'content', 'product' );
					}
				}

				woocommerce_product_loop_end();

				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			}
			?>
            <?php if($wp_query->max_num_pages > 1):  ?>
                <div class="" id="loadedElements">
                    <button class="catalogList__loadmore__btn btn" id="loadmore_btn">Load More</button>
                    <div class="loader loadmore-loader" style="display: none">   </div>
                </div>
            <?php endif; ?>
            <?php

			/**
			 * Hook: woocommerce_after_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );

			?>

	</div>
</div>
<?php
if($lang == 'en_US') {

    get_footer('us');
} elseif ($lang == 'es_ES') {

    get_footer('es');
} elseif ($lang == 'uk') {

    get_footer('ua');
} elseif($lang == 'ru_RU') {

    get_footer();
} else {

    get_footer('us');
}