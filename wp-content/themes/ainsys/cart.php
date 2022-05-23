<?php
/**
 * The main template file
 * Template Name: Cart
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

wp_head();

$pageId = get_queried_object()->ID;

get_header()
?>

<h1 align="center">Ваша корзина</h1>

<?php
if($_SESSION['cart'] != '0')
{   
?>

<form action="" method="post" id="cart-form">

<table id="mycart" align="center" cellspacing="0" border="0">
    <tr>
        <th> Товар </th>
            <th> Цена </th> 
            <th> Количество </th>
            <th> Всего </th>
    </tr>


    <?php foreach ($_SESSION['cart'] as $kod_biskvita => $quantity): 
        $product = get_product($kod_biskvita);
        ?>

    <tr>
        <td align="center"><?=$product['nazvanie']; ?></td> 
        <td align="center"><?=$product['price']; ?></td>
        <td align="center"><input type="text" size="2" name="<?=$kod_biskvita;?>" maxlength="2" value="<?=$quantity;?>" /></td> 
        <td align="center"><?=$product['price'] * $quantity; ?></td>
    </tr>

    <?endforeach;?>

</table>
    <p class="total" align="center">Общая сумма заказа: <span class="product-price">руб.</span></p>

</form>     

<?php
}
else
{
    echo "Ваша корзина пуста!";
}
?>

<?php



get_footer();