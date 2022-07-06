<?php
/**
 * Toggler block.
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

<section class="integration integration_partners integration_dev">
    <div class="container">
        <a href="#" class="nav_back">
            <p class="nav_back_text"><?= get_field('nav_back');?></p>
        </a>

        <div class="integration_content">
            <div class="integration_block col-12 col-lg-9">
                <div class="integration_head">
                    <h2 class="integration_head_title"><?= get_field('title');?></h2>   
                </div>
                <div class="reg">
                    <?php echo do_shortcode(get_field('form')); ?>
                </div>
            </div>     
            <div class="integration_block col-12 col-lg-3">
                <div class="terms terms_partners">
                    <p class="terms_title">
                        <?= get_field('terms_title');?>
                    </p>
                    <?php if ( have_rows( 'term_item' ) ) : ?>
                        <?php
                        while ( have_rows( 'term_item' ) ) :
                            the_row();
                            ?>
                            <div class="term_item">
                                <div class="term_item_header">
                                    <div class="term_item_header_avatar">
                                        <span class="term_item_header_avatar_shadow"></span>
                                        <span class="term_item_header_avatar_img">
                                            <img src="<?= the_sub_field('term_item_img');?>" alt="">
                                        </span>
                                    </div>
                                    <div class="term_item_header_info">
                                        <p class="term_item_header_info_name">
                                            <?= the_sub_field('term_item_name');?>
                                        </p>
                                        <p class="term_item_header_info_company">
                                            <?= the_sub_field('term_item_company');?>
                                        </p>
                                        <p class="term_item_header_info_projects">
                                            <?= the_sub_field('term_item_projects');?>
                                        </p>
                                        <?php if ( have_rows( 'term_rating_star' ) ) : ?>
                                            <div class="term_item_header_info_rating">
                                                <?php
                                                    while ( have_rows( 'term_rating_star' ) ) :
                                                        the_row();
                                                        $class = get_sub_field( 'class' ) ? get_sub_field( 'class' ) : 'col-lg-4';
                                                        ?>
                                                    <div class="term_item_header_info_rating_star <?php echo ' ' . esc_attr( $class ); ?>"></div>
                                                <?php endwhile; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="term_item_content">
                                    <p class="term_item_content_title">
                                        <?= the_sub_field('term_level');?>
                                    </p>
                                    <?php if ( have_rows( 'term_system' ) ) : ?>
                                    <ul class="term_item_content_list">
                                        <?php
                                        while ( have_rows( 'term_system' ) ) :
                                            the_row();
                                            ?>
                                            <li class="term_item_content_list_link">
                                                <div class="term_item_content_list_link_system">
                                                    <img src="<?= the_sub_field('term_item_img');?>" alt="system">
                                                    <div class="term_item_content_list_link_system_level">
                                                        <?= the_sub_field('term_system_text');?>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                    <?php endif; ?>
                                </div>
                                <div class="term_item_content term_item_content_skills">
                                    <p class="term_item_content_title">
                                        <?= the_sub_field('term_skills');?>
                                    </p>
                                    <?php if ( have_rows( 'term_skills_item' ) ) : ?>
                                    <ul class="term_item_content_list">
                                    <?php
                                        while ( have_rows( 'term_skills_item' ) ) :
                                            the_row();
                                            ?>
                                            <li class="term_item_content_list_link">
                                                <span>
                                                    <?= the_sub_field('term_skills_text');?>
                                                </span>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        
    </div>
</section>




























<!-- <div class="connectors skills">
    <div class="integration_form_field_head">
        <p class="integration_form_field_head_text">
            Умения и компетенции разработчика
        </p>
        <span class="tooltips__item">
            <div class="tooltips">
                test
            </div> 
        </span>
    </div>
    <div class="connectors_head">
        <div class="col-lg-3 col-12">
            <p class="connectors_head_text">
                Выбор компетенций
            </p>
        </div>
        <div class="col-lg-3 col-6 connectors_head_desk">
            <p class="connectors_head_text text-center">
                Уровень компетенции
            </p>
        </div>
        <div class="col-lg-2 col-6 connectors_head_desk">
            <p class="connectors_head_text text-center">
                Коммерческий опыт
            </p>
        </div>
        <div class="col-lg-3 col-6 connectors_head_desk">
            <p class="connectors_head_text text-center">
                Последний опыт с системой
            </p>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="connector">
        <div class="connector_content"> 
            <div class="col-lg-3 col-12 connectors_connnector">
                <div class="connector_item connector_blue">
                    <div class="connector_item_logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/con_logo1.svg" alt="con_logo1">
                    </div>
                    <div class="connector_item_info">
                        <p class="connector_item_info_title">
                            FreshBooks
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12 connectors_input">
                <p class="connectors_head_text connectors_head_text_mob text-center">
                    Уровень компетенции
                </p>
                <div class="select">
                    <input class="select__input" type="hidden" name="">
                    <div class="select__head">Junior</div>
                    <ul class="select__list" style="display: none;">
                        <li class="select__item">Junior</li>
                        <li class="select__item">Middle</li>
                        <li class="select__item">Middle+</li>
                        <li class="select__item">Senior</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6 col-12 connectors_input">
                <p class="connectors_head_text connectors_head_text_mob text-center">
                    Коммерческий опыт
                </p>
                <input class="integration_form_field_input integration_form_field_input_connector" type="text" placeholder="1 год">
            </div>
            <div class="col-lg-3 col-sm-6 col-12 connectors_input">
                <p class="connectors_head_text connectors_head_text_mob text-center">
                    Последний опыт с системой
                </p>
                <input class="integration_form_field_input integration_form_field_input_connector" type="date" placeholder="01.02.2022">
            </div>
            
            <div class="col-lg-1 connector_delete_block">
                <div class="connector_delete">
                    <img class="connector_delete_btn" src="<?php echo get_template_directory_uri(); ?>/assets/images/components/delete_con.svg" alt="delete">
                </div>
            </div>   
        </div>
    </div>

    <div class="connector">
        <div class="connector_content"> 
            <div class="col-lg-3 col-12 connectors_connnector">
            <div class="connector_item connector_blue">
                    <div class="connector_item_logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/con_logo1.svg" alt="con_logo1">
                    </div>
                    <div class="connector_item_info">
                        <p class="connector_item_info_title">
                            FreshBooks
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12 connectors_input">
                <p class="connectors_head_text connectors_head_text_mob text-center">
                    Уровень компетенции
                </p>
                <div class="select">
                    <input class="select__input" type="hidden" name="">
                    <div class="select__head">Junior</div>
                    <ul class="select__list" style="display: none;">
                        <li class="select__item">Junior</li>
                        <li class="select__item">Middle</li>
                        <li class="select__item">Middle+</li>
                        <li class="select__item">Senior</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6 col-12 connectors_input">
                <p class="connectors_head_text connectors_head_text_mob text-center">
                    Коммерческий опыт
                </p>
                <input class="integration_form_field_input integration_form_field_input_connector" type="text" placeholder="1 год">
            </div>
            <div class="col-lg-3 col-sm-6 col-12 connectors_input">
                <p class="connectors_head_text connectors_head_text_mob text-center">
                    Последний опыт с системой
                </p>
                <input class="integration_form_field_input integration_form_field_input_connector" type="date" placeholder="01.02.2022">
            </div>
            
            <div class="col-lg-1 connector_delete_block">
                <div class="connector_delete">
                    <img class="connector_delete_btn" src="<?php echo get_template_directory_uri(); ?>/assets/images/components/delete_con.svg" alt="delete">
                </div>
            </div>   
        </div>
    </div>


    
    <div class="connectors_footer">
        <div class="col-lg-5 col-12">
            <div class="connectors_search">
                <input type="search" class="connectors_search_input" placeholder="Введите название системы">
            </div>
        </div>
        <div class="col-lg-6 col-12"></div>
        <div class="col-lg-1">
        </div>
    </div>
</div> 

<div class="connectors">
    <div class="integration_form_field_head">
        <p class="integration_form_field_head_text">
            Количество разработчиков по интеграциям
        </p>
        <span class="tooltips__item">
            <div class="tooltips">
                test
            </div> 
        </span>
    </div>
    <div class="connectors_head">
        <div class="col-lg-3 col-12">
            <p class="connectors_head_text">
                Выбор коннектора
            </p>
        </div>
        <div class="col-lg-3 col-6 connectors_head_desk">
            <p class="connectors_head_text text-center">
                Уровень компетенции
            </p>
        </div>
        <div class="col-lg-2 col-6 connectors_head_desk">
            <p class="connectors_head_text text-center">
                Коммерческий опыт
            </p>
        </div>
        <div class="col-lg-3 col-6 connectors_head_desk">
            <p class="connectors_head_text text-center">
                Последний опыт с системой
            </p>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="connector">
        <div class="connector_content"> 
            <div class="col-lg-3 col-12 connectors_connnector">
                <div class="connector_item connector_blue">
                    <div class="connector_item_logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/con_logo1.svg" alt="con_logo1">
                        <div class="connector_item_logo_index">
                            1
                        </div>
                    </div>
                    <div class="connector_item_info">
                        <p class="connector_item_info_title">
                            FreshBooks
                        </p>
                        <p class="connector_item_info_text">
                            CRM
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12 connectors_input">
                <p class="connectors_head_text connectors_head_text_mob text-center">
                    Уровень компетенции
                </p>
                <div class="select">
                    <input class="select__input" type="hidden" name="">
                    <div class="select__head">Junior</div>
                    <ul class="select__list" style="display: none;">
                        <li class="select__item">Junior</li>
                        <li class="select__item">Middle</li>
                        <li class="select__item">Middle+</li>
                        <li class="select__item">Senior</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6 col-12 connectors_input">
                <p class="connectors_head_text connectors_head_text_mob text-center">
                    Коммерческий опыт
                </p>
                <input class="integration_form_field_input integration_form_field_input_connector" type="text" placeholder="1 год">
            </div>
            <div class="col-lg-3 col-sm-6 col-12 connectors_input">
                <p class="connectors_head_text connectors_head_text_mob text-center">
                    Последний опыт с системой
                </p>
                <input class="integration_form_field_input integration_form_field_input_connector" type="date" placeholder="01.02.2022">
            </div>

            <div class="col-lg-1 connector_delete_block">
                <div class="connector_delete">
                    <img class="connector_delete_btn" src="<?php echo get_template_directory_uri(); ?>/assets/images/components/delete_con.svg" alt="delete">
                </div>
            </div>   
        </div>
        <div class="connector_requirements_main">
            <textarea class="connector_requirements_main_content main_content" disabled>Расскажите какой именно у вас был опыт с данной системой</textarea>
            <div class="connector_requirements_main_settings">
                <div class="connector_requirements_main_settings_correct settings_correct">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/correct.svg" alt="correct">
                </div>
                <div class="connector_requirements_main_settings_accept settings_accept">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/accept.svg" alt="accept">
                </div>
                <div class="connector_requirements_main_settings_cancel settings_cancel">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/cancel.svg" alt="cancel">
                </div>
            </div>
        </div>
    </div>

    <div class="connector">
        <div class="connector_content">
            <div class="col-lg-3 col-12 connectors_connnector">
                <div class="connector_item connector_blue">
                    <div class="connector_item_logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/con_logo1.svg" alt="con_logo1">
                        <div class="connector_item_logo_index">
                            2
                        </div>
                    </div>
                    <div class="connector_item_info">
                        <p class="connector_item_info_title">
                            FreshBooks
                        </p>
                        <p class="connector_item_info_text">
                            CRM
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12 connectors_input">
                <p class="connectors_head_text connectors_head_text_mob text-center">
                    Уровень компетенции
                </p>
                <div class="select">
                    <input class="select__input" type="hidden" name="">
                    <div class="select__head">Junior</div>
                    <ul class="select__list" style="display: none;">
                        <li class="select__item">Junior</li>
                        <li class="select__item">Middle</li>
                        <li class="select__item">Middle+</li>
                        <li class="select__item">Senior</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6 col-12 connectors_input">
                <p class="connectors_head_text connectors_head_text_mob text-center">
                    Коммерческий опыт
                </p>
                <input class="integration_form_field_input integration_form_field_input_connector" type="text" placeholder="1 год">
            </div>
            <div class="col-lg-3 col-sm-6 col-12 connectors_input">
                <p class="connectors_head_text connectors_head_text_mob text-center">
                    Последний опыт с системой
                </p>
                <input class="integration_form_field_input integration_form_field_input_connector" type="date" placeholder="01.02.2022">
            </div>

            <div class="col-lg-1 connector_delete_block">
                <div class="connector_delete">
                    <img class="connector_delete_btn" src="<?php echo get_template_directory_uri(); ?>/assets/images/components/delete_con.svg" alt="delete">
                </div>
            </div>    
        </div>
        <div class="connector_requirements_main">
            <textarea class="connector_requirements_main_content main_content" disabled>Расскажите какой именно у вас был опыт с данной системой</textarea>
            <div class="connector_requirements_main_settings">
                <div class="connector_requirements_main_settings_correct settings_correct">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/correct.svg" alt="correct">
                </div>
                <div class="connector_requirements_main_settings_accept settings_accept">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/accept.svg" alt="accept">
                </div>
                <div class="connector_requirements_main_settings_cancel settings_cancel">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/cancel.svg" alt="cancel">
                </div>
            </div>
        </div>
    </div>

    <div class="connector">
        <div class="connector_content">
            <div class="col-lg-3 col-12 connectors_connnector">
                <div class="connector_item connector_yellow">
                    <div class="connector_item_logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/con_logo2.svg" alt="con_logo2">
                    </div>
                    <div class="connector_item_info">
                        <p class="connector_item_info_title">
                            Asana
                        </p>
                        <p class="connector_item_info_text">
                            CRM
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12 connectors_input">
                <p class="connectors_head_text connectors_head_text_mob text-center">
                    Уровень компетенции
                </p>
                <div class="select">
                    <input class="select__input" type="hidden" name="">
                    <div class="select__head">Junior</div>
                    <ul class="select__list" style="display: none;">
                        <li class="select__item">Junior</li>
                        <li class="select__item">Middle</li>
                        <li class="select__item">Middle+</li>
                        <li class="select__item">Senior</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6 col-12 connectors_input">
                <p class="connectors_head_text connectors_head_text_mob text-center">
                    Коммерческий опыт
                </p>
                <input class="integration_form_field_input integration_form_field_input_connector" type="text" placeholder="1 год">
            </div>
            <div class="col-lg-3 col-sm-6 col-12 connectors_input">
                <p class="connectors_head_text connectors_head_text_mob text-center">
                    Последний опыт с системой
                </p>
                <input class="integration_form_field_input integration_form_field_input_connector" type="date" placeholder="01.02.2022">
            </div>

            <div class="col-lg-1 connector_delete_block">
                <div class="connector_delete">
                    <img class="connector_delete_btn" src="<?php echo get_template_directory_uri(); ?>/assets/images/components/delete_con.svg" alt="delete">
                </div>
            </div>    
        </div>
        <div class="connector_requirements_main">
            <textarea class="connector_requirements_main_content main_content" disabled>Расскажите какой именно у вас был опыт с данной системой</textarea>
            <div class="connector_requirements_main_settings">
                <div class="connector_requirements_main_settings_correct settings_correct">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/correct.svg" alt="correct">
                </div>
                <div class="connector_requirements_main_settings_accept settings_accept">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/accept.svg" alt="accept">
                </div>
                <div class="connector_requirements_main_settings_cancel settings_cancel">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/cancel.svg" alt="cancel">
                </div>
            </div>
        </div>
    </div>

    <div class="connectors_footer">
        <div class="col-lg-5 col-12">
            <div class="connectors_search">
                <input type="search" class="connectors_search_input" placeholder="Введите название системы">
            </div>
        </div>
        <div class="col-lg-6 col-12"></div>
        <div class="col-lg-1">
        </div>
    </div>
</div>
</div>-->