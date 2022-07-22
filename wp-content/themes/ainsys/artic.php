<?php
/**
 * Template Name: Home: FAQ article
 * 
 * Template Post Type: post
 *
 * @package ainsys
 */

get_header(); ?>

<section class="artic">
  <div class="container">
    <a href="/" class="nav_back">
        Назад
    </a>
    <div class="artic_fl">
        <div class="faq_article">
            <h2 class="faq_article_title">
                <?= get_field('faq_article_title');?>
            </h2>
            <p class="faq_article_text">
                <?= get_field('faq_article_text');?>
            </p>
            <img src="<?= get_field('faq_article_img');?>" class="faq_article_img" alt="">
            <?php if ( get_sub_field( 'faq_article_more' ) ) { ?>
            <a href="/" class="faq_article_more">
                <?= the_sub_field('faq_article_more');?>
            </a>
            <?php } ?>
            <?= get_field('faq_article_text_two');?>
        </div>
        <div class="artic_info">
            <div class="artic_author artic_info_item">
                <div class="artic_info_item_header">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/author1.png" class="artic_info_item_img" alt="">
                    <p class="artic_info_item_author">
                        <?php the_post();?>
                        <?= get_the_author(); ?>
                    </p>
                </div>
                <div class="artic_author_item">
                    <p class="artic_author_item_text">
                        Опубликовано:
                    </p>
                    <p class="artic_author_item_val">
                        <?php the_time('d.m.Y H:i') ?>
                    </p>
                </div>
                <div class="artic_author_item">
                    <p class="artic_author_item_text">
                        Редактировано:
                    </p>
                    <p class="artic_author_item_val">
                    <?php
                        $u_time = get_the_time('U');
                        $u_modified_time = get_the_modified_time('U');
                        if ($u_modified_time >= $u_time + 86400) {
                            the_modified_time('d.m.Y H:i');
                        } 
                    ?>
                    </p>
                </div>
                <div class="artic_author_item">
                    <p class="artic_author_item_text">
                        Просмотры:
                    </p>
                    <p class="artic_author_item_val">
                    <?php setPostViews(get_the_ID()); ?>
                    <?php echo getPostViews(get_the_ID()); ?>
                    </p>
                </div>
            </div>
            <div class="artic_content artic_info_item">
                <p class="artic_content_title">
                    Быстрые ссылки
                </p>
                <div class="artic_content_hrefs">
                    <a href="/" class="artic_content_href artic_content_href-active">
                        Ссылки
                    </a>
                    <a href="/" class="artic_content_href">
                        Протокол HTTP
                    </a>
                    <a href="/" class="artic_content_href">
                        Сервера
                    </a>
                    <a href="/" class="artic_content_href">
                        Статистика
                    </a>
                    <a href="/" class="artic_content_href">
                        Рейтинг
                    </a>
                    <a href="/" class="artic_content_href">
                        Версии
                    </a>
                </div>
                <p class="artic_content_title">
                    Теги
                </p>
                <div class="artic_content_tags">
                    <div class="artic_content_tag artic_content_tag-active">
                        коннектор
                    </div>
                    <div class="artic_content_tag">
                        внедрение
                    </div>
                    <div class="artic_content_tag">
                        интеграция
                    </div>
                    <div class="artic_content_tag">
                        workflow
                    </div>
                    <div class="artic_content_tag">
                        dataflow
                    </div>
                </div>
            </div>
            <div class="artic_socials artic_info_item">
                <p class="artic_socials_title">
                    Поделиться
                </p>
                <div class="artic_socials_items">
                    <a href="/" class="artic_socials_item">
                        <img class="artic_socials_item_img" src="<?php echo get_template_directory_uri(); ?>/assets/images/components/fb.svg" alt="fb">
                    </a>
                    <a href="/" class="artic_socials_item">
                        <img class="artic_socials_item_img" src="<?php echo get_template_directory_uri(); ?>/assets/images/components/twitter.svg" alt="twitter">
                    </a>
                    <a href="/" class="artic_socials_item">
                        <img class="artic_socials_item_img" src="<?php echo get_template_directory_uri(); ?>/assets/images/components/gmail.svg" alt="gmail">
                    </a>
                    <a href="/" class="artic_socials_item">
                        <img class="artic_socials_item_img" src="<?php echo get_template_directory_uri(); ?>/assets/images/components/arroba.svg" alt="arroba">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="faq_article_comments">
        <p class="faq_article_comments_title">
            Комментарии
        </p>
        <?php comments_template(); ?>
    </div>

    </div>
</section >

<?php get_footer(); ?>