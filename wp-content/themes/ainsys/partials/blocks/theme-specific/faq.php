<?php
/**
 * FAQ block.
 *
 * @package ainsys
 */

$block_id = 'toggler-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'toggler full-width';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}
if ( get_field( 'bg_color' ) ) {
	$class_name .= ' bg-color-' . get_field( 'bg_color' );
}
$style       = '';
$style_bg    = '';
$style_align = '';
if ( get_field( 'bg_img' ) ) {
	$style_bg = 'background-image: url(' . wp_get_attachment_image_url( get_field( 'bg_img' ), 'full' ) . '); ';
}
if ( get_field( 'bg_alignment' ) ) {
	$style_align = 'background-position: ' . get_field( 'bg_alignment' ) . ';';
}
if ( get_field( 'bg_img' ) || get_field( 'bg_alignment' ) ) {
	$style = ' style="' . $style_bg . $style_align . '"';
}

?>

<section class="faq">
	<div class="container">
        <h2 class="faq_title">
            <?= get_field('title');?>
        </h2>
        <form role="search" method="get" id="searchform" class="faq_form" action="<?php echo home_url( '/' ) ?>">
          <input id="s" class="faq_input" type="search" value="<?php echo get_search_query() ?>"  placeholder="<?= get_field('input_placeholder');?>" name="s">
          <input class="hide" type="submit" value="Найти" />
        </form>
        <?php  ?>

        <div class="faq_items">

                <div class="faq_article">
                    <div class="faq_article_head">
                        <p class="faq_article_title">
                        Ваше решение дорогое?
                        </p>
                    </div>
                    <div class="faq_article_info">
                        <p class="faq_article_text">
                        Какие движки используют успешные форумы? На каких серверах они работают? В какой кодировке хранят написанные пользователями сообщен...
                        </p>
                        <a class="faq_article_more" href="">
                            Перейти к статье
                        </a>
                    </div>
                </div>

                <div class="faq_article">
                    <p class="faq_article_title">
                    Что используете в качестве теплоносителя?
                    </p>
                    <p class="faq_article_text">
                    Какие движки используют успешные форумы? На каких серверах они работают? В какой кодировке хранят написанные пользователями сообщен...
                    </p>
                    <a class="faq_article_more" href="">
                        Перейти к статье
                    </a>
                </div>

            <?php if ( have_posts() ) :
                while ( have_posts() ) :
                the_post();?>

                <div class="faq_article">
                    <div class="faq_article__info">
                        <p class="faq_article__title">
                            <?php echo '<a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a>';?>
                        </p>
                        <p class="faq_article__text">
                            <?php  echo get_the_excerpt( $post->ID ) ?>
                        </p>
                        <a class="copyright__article__fl" href="<?php echo get_permalink( $post->ID )?>">
                            <?= get_field('read_more');?>
                        </a>
                    </div>
                </div>


                <?php
                    endwhile;

                else :

                    echo "<span>К сожалению, по Вашему запросу ничего найдено.</span>
                    <br /> Попробуйте ввести другой поисковый запрос
                    <br /><aside></aside>";

                endif;
                ?>
	    </div>
</section>