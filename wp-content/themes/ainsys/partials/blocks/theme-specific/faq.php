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
        <div class="faq_tags">
            <div class="faq_tag faq_tag-active">
                коннектор
            </div>
            <div class="faq_tag">
                внедрение
            </div>
            <div class="faq_tag">
                интеграция
            </div>
            <div class="faq_tag">
                workflow
            </div>
            <div class="faq_tag">
                dataflow
            </div>
            <div class="faq_tag">
                внедрение
            </div>
            <div class="faq_tag">
                интеграция
            </div>
        </div>
        <div class="faq_articles">
            <h5 class="faq_articles_title">
            <?= get_field('faq_articles_title');?>
                Статьи
            </h5>
            <p class="faq_articles_text">
            <?= get_field('faq_articles_text');?>
                Популярные статьи за последнее время
            </p>
            <div class="faq_articles_content">
                <div class="faq_article_wrapper col-lg-4 col-md-2 col-12">
                    <div class="faq_article">
                        <img src="<?= get_field('faq_article_img');?>" class="faq_article_img" alt="">
                        <h6 class="faq_article_title">
                            <?= get_field('faq_article_title');?>
                            Форумы: движки, серверы и все-все-все
                        </h6>
                        <p class="faq_article_text">
                            <?= get_field('faq_article_text');?>
                            Какие движки используют успешные форумы? На каких серверах они работают? В какой кодировке хранят написанные пользователями сообщен...
                        </p>
                        <a href="/" class="faq_article_more">
                            <?= get_field('faq_article_more');?>
                            Читать
                        </a>
                    </div>
                </div>
                <div class="faq_article_wrapper col-lg-4 col-md-2 col-12">
                    <div class="faq_article">
                        <img src="<?= get_field('faq_article_img');?>" class="faq_article_img" alt="">
                        <h6 class="faq_article_title">
                            <?= get_field('faq_article_title');?>
                            Форумы: движки, серверы и все-все-все
                        </h6>
                        <p class="faq_article_text">
                            <?= get_field('faq_article_text');?>
                            Какие движки используют успешные форумы? На каких серверах они работают? В какой кодировке хранят написанные пользователями сообщен...
                        </p>
                        <a href="/" class="faq_article_more">
                            <?= get_field('faq_article_more');?>
                            Читать
                        </a>
                    </div>
                </div>
                <div class="faq_article_wrapper col-lg-4 col-md-2 col-12">
                    <div class="faq_article">
                        <img src="<?= get_field('faq_article_img');?>" class="faq_article_img" alt="">
                        <h6 class="faq_article_title">
                            <?= get_field('faq_article_title');?>
                            Форумы: движки, серверы и все-все-все
                        </h6>
                        <p class="faq_article_text">
                            <?= get_field('faq_article_text');?>
                            Какие движки используют успешные форумы? На каких серверах они работают? В какой кодировке хранят написанные пользователями сообщен...
                        </p>
                        <a href="/" class="faq_article_more">
                            <?= get_field('faq_article_more');?>
                            Читать
                        </a>
                    </div>
                </div>
                <div class="faq_article_wrapper col-lg-4 col-md-2 col-12">
                    <div class="faq_article">
                        <img src="<?= get_field('faq_article_img');?>" class="faq_article_img" alt="">
                        <h6 class="faq_article_title">
                            <?= get_field('faq_article_title');?>
                            Форумы: движки, серверы и все-все-все
                        </h6>
                        <p class="faq_article_text">
                            <?= get_field('faq_article_text');?>
                            Какие движки используют успешные форумы? На каких серверах они работают? В какой кодировке хранят написанные пользователями сообщен...
                        </p>
                        <a href="/" class="faq_article_more">
                            <?= get_field('faq_article_more');?>
                            Читать
                        </a>
                    </div>
                </div>
                <div class="faq_article_wrapper col-lg-4 col-md-2 col-12">
                    <div class="faq_article">
                        <img src="<?= get_field('faq_article_img');?>" class="faq_article_img" alt="">
                        <h6 class="faq_article_title">
                            <?= get_field('faq_article_title');?>
                            Форумы: движки, серверы и все-все-все
                        </h6>
                        <p class="faq_article_text">
                            <?= get_field('faq_article_text');?>
                            Какие движки используют успешные форумы? На каких серверах они работают? В какой кодировке хранят написанные пользователями сообщен...
                        </p>
                        <a href="/" class="faq_article_more">
                            <?= get_field('faq_article_more');?>
                            Читать
                        </a>
                    </div>
                </div>
                <div class="faq_article_wrapper col-lg-4 col-md-2 col-12">
                    <div class="faq_article">
                        <img src="<?= get_field('faq_article_img');?>" class="faq_article_img" alt="">
                        <h6 class="faq_article_title">
                            <?= get_field('faq_article_title');?>
                            Форумы: движки, серверы и все-все-все
                        </h6>
                        <p class="faq_article_text">
                            <?= get_field('faq_article_text');?>
                            Какие движки используют успешные форумы? На каких серверах они работают? В какой кодировке хранят написанные пользователями сообщен...
                        </p>
                        <a href="/" class="faq_article_more">
                            <?= get_field('faq_article_more');?>
                            Читать
                        </a>
                    </div>
                </div>
            </div>


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

            <!-- <?php if ( have_posts() ) :
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
                ?> -->
	    </div>
</section>