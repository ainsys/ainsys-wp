<?php
/**
 * The template for displaying product content within loops
 *
 * @package ainsys
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<?php
$product_id       = $product->get_id();
$product_cats_ids = $product->get_category_ids();
$color_1 = '#3d0043';
$color_2 = '#931e9f';
$logo = get_field('logo');
$anons = get_field('prod-info-text');
if(!empty(get_field('color_1'))) {
    $color_1 = get_field('color_1');
}
if(!empty(get_field('color_2'))) {
    $color_2 = get_field('color_2');
}

//$product_cat_list = wc_get_product_category_list( $product_id );
?>
<li class="product" style="background: linear-gradient(105.3deg, <?= $color_1; ?>  0%, <?= $color_2; ?> 97.63%)" >
	<div class="top-row row">
		<div class="img">
			<?// echo $product->get_image(); ?>

               <?php echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/logo/'.strtolower($logo).'">';?>

		</div>
		<div class="title">
			<h3><?php echo $product->get_title(); ?></h3>
			<p class="prduct-categories">
				<?php
				/*foreach ( $product_cats_ids as $product_cat ) {
					echo '<span>' . get_the_category_by_ID( $product_cat ) . '</span>';
				}*/
                echo '<span>' . get_the_category_by_ID( $product_cats_ids[0] ) . '</span>';
				?>
			</p>
		</div>

		<?php
		$quantity = 0;
		foreach ( WC()->cart->get_cart() as $cart_item ) {
			if ( $product_id === $cart_item['product_id'] ) {
				$quantity = intval( $cart_item['quantity'] );
			}
		}
		?>
		<div class="product__qnt-buttons">
			<!--<button type="button" class="minus-btn btn-qnty">-</button>-->
			<input type="number" value="<?php echo $quantity; ?>" class="product__qnt" data-product-id="<?php echo esc_attr( $product->get_id() ); ?>">   
			<button type="button" class="plus-btn btn-qnty <?php if ( false === is_user_logged_in() ) {echo 'not-authorized';} ?>">+</button>
		</div>
	</div>
	<div class="bottom-row row">
		<div class="description">
			<p class='anons'> <?php echo $anons; ?> </p>    
			<?php echo $product->get_description(); ?>
		</div>
	</div>
</li>