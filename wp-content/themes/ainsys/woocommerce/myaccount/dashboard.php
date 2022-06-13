<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>

<?php
do_action( 'woocommerce_before_account_navigation' );
$current_user = wp_get_current_user();
$userid = $current_user->ID;
$name = $current_user->user_firstname;
?>

<h1 class="acc-nav__title"><?php _e('Welcome','ainsys') ?>, <?=$name;?></h1>

<!-- СПИСОК ВЫВОДИМЫХ ПУНКТОВ МЕНЮ. ПУНКТЫ ФИЛЬТРУЮТСЯ В ФАЙЛЕ FUNCTIONS.PHP -->
<!-- Картинки и дополнительный текст через acc.css -->
	<ul class="acc-nav">
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?> acc-nav__item">
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" class="acc-nav__link"><?php echo ( $label ); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
