<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="category-row">  
    <div class="left-block">
       <div class="left-block-title">Integrations</div>
       <div class="search-block">
        <input type="text" placeholder="Search" class="search-input">
       <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M16.5 16.5L12.875 12.875M14.8333 8.16667C14.8333 11.8486 11.8486 14.8333 8.16667 14.8333C4.48477 14.8333 1.5 11.8486 1.5 8.16667C1.5 4.48477 4.48477 1.5 8.16667 1.5C11.8486 1.5 14.8333 4.48477 14.8333 8.16667Z" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

       </div>
       <div class="categories-block">
          <?php
           $taxonomy     = 'product_cat';
              $orderby      = 'name';  
              $show_count   = 0;      
              $pad_counts   = 0;      
              $hierarchical = 1;        
              $title        = '';  
              $empty        = 0;

              $args = array(
                     'taxonomy'     => $taxonomy,
                     'orderby'      => $orderby,
                     'show_count'   => $show_count,
                     'pad_counts'   => $pad_counts,
                     'hierarchical' => $hierarchical,
                     'title_li'     => $title,
                     'hide_empty'   => $empty
              );
             $all_categories = get_categories( $args );
             foreach ($all_categories as $cat) {
                if($cat->category_parent == 0) {
                    $category_id = $cat->term_id;       
                    

                    $args2 = array(
                            'taxonomy'     => $taxonomy,
                            'child_of'     => 0,
                            'parent'       => $category_id,
                            'orderby'      => $orderby,
                            'show_count'   => $show_count,
                            'pad_counts'   => $pad_counts,
                            'hierarchical' => $hierarchical,
                            'title_li'     => $title,
                            'hide_empty'   => $empty
                    );
                    $sub_cats = get_categories( $args2 );
                    
                    if($sub_cats) {
                       if($cat->description != 'hide'){
                            echo '<a class="has-child"><span>'. $cat->name .'</span>';
                            echo '<svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M1 1L5 5L9 1" stroke="#101828" stroke-width="1.44" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>';
                            echo '<ul class="dropdown">';
                            foreach($sub_cats as $sub_category) {
                                echo '<li>';
                                echo  $sub_category->name ;
                                echo '</li>';
                            }   
                            echo '</ul></a>';
                       }
                    }else{
                       if($cat->description != 'hide'){  
                          if($cat->name == 'Connector'){
                             echo '<a class="no-child active">'. $cat->name .'</a>';
                          }else{
                               echo '<a class="no-child">'. $cat->name .'</a>';
                          }
                       }
                           
                    }
                    
                }       
            }
            ?>
       </div>
    </div>
    <div class="right-block">
    <ul class="products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">