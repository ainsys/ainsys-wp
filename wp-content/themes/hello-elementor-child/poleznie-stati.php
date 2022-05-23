<?php
/**
 * The main template file
 * Template Name: Полезные статьи
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
?>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php $viewport_content = apply_filters( 'hello_elementor_viewport_content', 'width=device-width, initial-scale=1' ); ?>
    <meta name="viewport" content="<?php echo esc_attr( $viewport_content ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <link rel="stylesheet" type="text/css" href="/wp-content/themes/hello-elementor/assets/css/maindop.css">

    <!-- Шрифт -->
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/hello-elementor/assets/css/fonts/inter/inter.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Shuffle/5.4.1/shuffle.min.js" integrity="sha512-26vtWkj1Yt/eY2Ykb7TO/RzzysOKS7zaD/055jS+2IW4DX89qlH/HziTFqfzMLAxpFVpYhPWgTdCcavzf8Qs8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <?php 
    wp_head(); 
    echo do_shortcode('[wbcr_css_snippet id="3290"]');
    ?>


</head>
<body <?php body_class(); ?>>

<?php

get_header();



$pageId = get_queried_object()->ID;

global $wp_query;

$wp_query = new WP_Query(array(
	'category_name'  => 'articles',
	'post_type'      => 'post',
	'posts_per_page' => 12,
	'orderby'        => 'date',
	'order'          => 'DESC',
	'paged' => get_query_var('paged') ?: 1 // страница пагинации
));
?>
<style type="text/css">
    body{
        background-color: #ffffff !important;
    }
</style>

<div class="wrapper">
    <div class="flex-box">
        <div class="name-page">
            Наш блог
        </div>
        <div class="title-page">
            <?php the_title(); ?>
        </div>
        <div class="text-page">
            Мы искренне заботимся о клиентах. На этой странице вы найдете полезные статьи и ответы на многие вопросы.
        </div>
    </div>
    <div class="cards-sec">
        <div class="sec-title">
            Все посты
        </div>
        <div class="article-cards">
            <?php
                while( have_posts() ){
                the_post();
            ?>
                <div class="art-card">
                    <div class="card-image">
                        <a href="<?php the_permalink( ); ?>">
                            <?= get_the_post_thumbnail( $id, 'post' ); //Изображение?>
                        </a>
                    </div>
                    <div class="card-date">
                        <ul>
                            <li>
                                <?php the_date();//дата поста ?>
                            </li>
                        </ul>

                    </div>
                        <a href="<?php the_permalink( ); ?>" class="card-title">
                            <?php the_title();//это выводит заголовок ?>
                        </a>
                    <div class="card-text">
                        <?php the_excerpt();//это выводит краткое описание ?>
                    </div>
                    <div class="card-tags">
                        <?php the_tags( '<ul><li>','</li><li>','</li></ul>');//этот код выводит метки поста ?>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>

<script src="/wp-content/themes/hello-elementor/assets/js/landing.js"></script>
<?php
posts_nav_link(); // пагинация - echo тут не надо

wp_reset_query(); // сброс $wp_query
 wp_reset_postdata();


get_footer();