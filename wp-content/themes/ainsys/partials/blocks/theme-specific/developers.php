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
				<p class="nav_back_text">Вернуться в каталог</p>
			</a>

			<div class="integration_content">
					<div class="integration_block col-12 col-lg-9">
							<div class="integration_head">
									<h2 class="integration_head_title">Форма для регистрации разработчика</h2>   
							</div>
							<div class="reg">
									<div class="reg_data">

										<?php echo do_shortcode('[contact-form-7 id="11039" title="Register developers"]'); ?>
      




            <div class="integration_block col-12 col-lg-3">
                <div class="terms terms_partners">
                    <p class="terms_title">
                        Примеры карточек партнера
                    </p>
                    <div class="term_item">
                        <div class="term_item_header">
                            <div class="term_item_header_avatar">
                                <span class="term_item_header_avatar_shadow"></span>
                                <span class="term_item_header_avatar_img">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/avatar.png" alt="avatar">
                                </span>
                            </div>
                            <div class="term_item_header_info">
                                <p class="term_item_header_info_name">
                                    Борисов Моисей
                                </p>
                                <p class="term_item_header_info_company">
                                    IKEA 
                                </p>
                                <p class="term_item_header_info_projects">
                                    3 успешных проекта
                                </p>
                                <div class="term_item_header_info_rating">
                                    <div class="term_item_header_info_rating_star term_item_header_info_rating_star-active"></div>
                                    <div class="term_item_header_info_rating_star term_item_header_info_rating_star-active"></div>
                                    <div class="term_item_header_info_rating_star term_item_header_info_rating_star-active"></div>
                                    <div class="term_item_header_info_rating_star term_item_header_info_rating_star-active"></div>
                                    <div class="term_item_header_info_rating_star"></div>
                                </div>
                            </div>
                        </div>
                        <div class="term_item_content">
                            <p class="term_item_content_title">
                                Уровень разработчиков по системам
                            </p>
                            <ul class="term_item_content_list">
                                <li class="term_item_content_list_link">
                                    <div class="term_item_content_list_link_system">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_b24.svg" alt="b24">
                                        <div class="term_item_content_list_link_system_level">
                                            J
                                        </div>
                                    </div>
                                </li>
                                <li class="term_item_content_list_link">
                                    <div class="term_item_content_list_link_system">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_vk.svg" alt="b24">
                                        <div class="term_item_content_list_link_system_level">
                                            J
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="term_item_content term_item_content_skills">
                            <p class="term_item_content_title">
                                Навыки и умения
                            </p>
                            <ul class="term_item_content_list">
                                <li class="term_item_content_list_link">
                                    <span>Python</span>
                                </li>
                                <li class="term_item_content_list_link">
                                    <span>Web</span>
                                </li>
                                <li class="term_item_content_list_link">
                                    <span>C++</span>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="term_item">
                        <div class="term_item_header">
                            <div class="term_item_header_avatar">
                                <span class="term_item_header_avatar_shadow"></span>
                                <span class="term_item_header_avatar_img">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/avatar_2.svg" alt="avatar">
                                </span>
                            </div>
                            <div class="term_item_header_info">
                                <p class="term_item_header_info_name">
                                    Архипенко Олег
                                </p>
                                <p class="term_item_header_info_company">
                                    Arcellor Mitall
                                </p>
                                <p class="term_item_header_info_projects">
                                    82 успешных проекта
                                </p>
                                <div class="term_item_header_info_rating">
                                    <div class="term_item_header_info_rating_star term_item_header_info_rating_star-active"></div>
                                    <div class="term_item_header_info_rating_star term_item_header_info_rating_star-active"></div>
                                    <div class="term_item_header_info_rating_star term_item_header_info_rating_star-active"></div>
                                    <div class="term_item_header_info_rating_star term_item_header_info_rating_star-active"></div>
                                    <div class="term_item_header_info_rating_star term_item_header_info_rating_star-active"></div>
                                </div>
                            </div>
                        </div>
                        <div class="term_item_content">
                            <p class="term_item_content_title">
                                Уровень разработчиков по системам
                            </p>
                            <ul class="term_item_content_list">
                                <li class="term_item_content_list_link">
                                    <div class="term_item_content_list_link_system">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_vk.svg" alt="b24">
                                        <div class="term_item_content_list_link_system_level">
                                            S
                                        </div>
                                    </div>
                                </li>
                                <li class="term_item_content_list_link">
                                    <div class="term_item_content_list_link_system">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_tg.svg" alt="b24">
                                        <div class="term_item_content_list_link_system_level">
                                            S
                                        </div>
                                    </div>
                                </li>
                                <li class="term_item_content_list_link">
                                    <div class="term_item_content_list_link_system">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_woo.svg" alt="b24">
                                        <div class="term_item_content_list_link_system_level">
                                            S
                                        </div>
                                    </div>
                                </li>
                                <li class="term_item_content_list_link">
                                    <div class="term_item_content_list_link_system">
                                        <div class="term_item_content_list_link_system_more system_more">
                                            <p>+7</p>
                                        </div>
                                    </div>
                                </li>
                                <div class="term_item_content_systems disabl">
                                    <li class="term_item_content_list_link">
                                        <div class="term_item_content_list_link_system">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_woo.svg" alt="b24">
                                            <div class="term_item_content_list_link_system_level">
                                                S
                                            </div>
                                        </div>
                                    </li>
                                    <li class="term_item_content_list_link">
                                        <div class="term_item_content_list_link_system">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_woo.svg" alt="b24">
                                            <div class="term_item_content_list_link_system_level">
                                                S
                                            </div>
                                        </div>
                                    </li>
                                    <li class="term_item_content_list_link">
                                        <div class="term_item_content_list_link_system">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_woo.svg" alt="b24">
                                            <div class="term_item_content_list_link_system_level">
                                                S
                                            </div>
                                        </div>
                                    </li>
                                    <li class="term_item_content_list_link">
                                        <div class="term_item_content_list_link_system">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_woo.svg" alt="b24">
                                            <div class="term_item_content_list_link_system_level">
                                                S
                                            </div>
                                        </div>
                                    </li>
                                    <li class="term_item_content_list_link">
                                        <div class="term_item_content_list_link_system">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_woo.svg" alt="b24">
                                            <div class="term_item_content_list_link_system_level">
                                                S
                                            </div>
                                        </div>
                                    </li>
                                    <li class="term_item_content_list_link">
                                        <div class="term_item_content_list_link_system">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_woo.svg" alt="b24">
                                            <div class="term_item_content_list_link_system_level">
                                                S
                                            </div>
                                        </div>
                                    </li>
                                    <li class="term_item_content_list_link">
                                        <div class="term_item_content_list_link_system">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_woo.svg" alt="b24">
                                            <div class="term_item_content_list_link_system_level">
                                                S
                                            </div>
                                        </div>
                                    </li>
                                </div>
                            </ul>
                        </div>
                        <div class="term_item_content term_item_content_skills">
                            <p class="term_item_content_title">
                                Навыки и умения
                            </p>
                            <ul class="term_item_content_list">
                                <li class="term_item_content_list_link">
                                    <span>Python</span>
                                </li>
                                <li class="term_item_content_list_link">
                                    <span>Web</span>
                                </li>
                                <li class="term_item_content_list_link">
                                    <span>C++</span>
                                </li>
                                <li class="term_item_content_list_link">
                                    <span>Frontend</span>
                                </li>
                                <li class="term_item_content_list_link">
                                    <span>Back end</span>
                                </li>
                                <li class="term_item_content_list_link">
                                    <span>Php</span>
                                </li>
                            </ul>
                        </div>
                    </div>






                    <div class="term_item">
                        <div class="term_item_header">
                            <div class="term_item_header_avatar">
                                <span class="term_item_header_avatar_shadow"></span>
                                <span class="term_item_header_avatar_img">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/avatar_3.svg" alt="avatar">
                                </span>
                            </div>
                            <div class="term_item_header_info">
                                <p class="term_item_header_info_name">
                                    Семенчук Юлия
                                </p>
                                <p class="term_item_header_info_company">
                                    Компания “IKEA” 
                                </p>
                                <p class="term_item_header_info_projects">
                                    3 успешных проекта
                                </p>
                                <div class="term_item_header_info_rating">
                                    <div class="term_item_header_info_rating_star term_item_header_info_rating_star-active"></div>
                                    <div class="term_item_header_info_rating_star term_item_header_info_rating_star-active"></div>
                                    <div class="term_item_header_info_rating_star term_item_header_info_rating_star-active"></div>
                                    <div class="term_item_header_info_rating_star"></div>
                                    <div class="term_item_header_info_rating_star"></div>
                                </div>
                            </div>
                        </div>
                        <div class="term_item_content">
                            <p class="term_item_content_title">
                                Уровень разработчиков по системам
                            </p>
                            <ul class="term_item_content_list">
                            <li class="term_item_content_list_link">
                                    <div class="term_item_content_list_link_system">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_vk.svg" alt="b24">
                                        <div class="term_item_content_list_link_system_level">
                                            S
                                        </div>
                                    </div>
                                </li>
                                <li class="term_item_content_list_link">
                                    <div class="term_item_content_list_link_system">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_tg.svg" alt="b24">
                                        <div class="term_item_content_list_link_system_level">
                                            S
                                        </div>
                                    </div>
                                </li>
                                <li class="term_item_content_list_link">
                                    <div class="term_item_content_list_link_system">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_woo.svg" alt="b24">
                                        <div class="term_item_content_list_link_system_level">
                                            S
                                        </div>
                                    </div>
                                </li>
                                <li class="term_item_content_list_link">
                                    <div class="term_item_content_list_link_system">
                                        <div class="term_item_content_list_link_system_more system_more">
                                            <p>+5</p>
                                        </div>
                                    </div>
                                </li>
                                <div class="term_item_content_systems disabl">
                                    <li class="term_item_content_list_link">
                                        <div class="term_item_content_list_link_system">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_woo.svg" alt="b24">
                                            <div class="term_item_content_list_link_system_level">
                                                S
                                            </div>
                                        </div>
                                    </li>
                                    <li class="term_item_content_list_link">
                                        <div class="term_item_content_list_link_system">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_woo.svg" alt="b24">
                                            <div class="term_item_content_list_link_system_level">
                                                S
                                            </div>
                                        </div>
                                    </li>
                                    <li class="term_item_content_list_link">
                                        <div class="term_item_content_list_link_system">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_woo.svg" alt="b24">
                                            <div class="term_item_content_list_link_system_level">
                                                S
                                            </div>
                                        </div>
                                    </li>
                                    <li class="term_item_content_list_link">
                                        <div class="term_item_content_list_link_system">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_woo.svg" alt="b24">
                                            <div class="term_item_content_list_link_system_level">
                                                S
                                            </div>
                                        </div>
                                    </li>
                                    <li class="term_item_content_list_link">
                                        <div class="term_item_content_list_link_system">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/system_woo.svg" alt="b24">
                                            <div class="term_item_content_list_link_system_level">
                                                S
                                            </div>
                                        </div>
                                    </li>
                                </div>

                            </ul>
                        </div>
                        <div class="term_item_content term_item_content_skills">
                            <p class="term_item_content_title">
                                Навыки и умения
                            </p>
                            <ul class="term_item_content_list">
                                <li class="term_item_content_list_link">
                                    <span>Web</span>
                                </li>
                                <li class="term_item_content_list_link">
                                    <span>Frontend</span>
                                </li>
                                <li class="term_item_content_list_link">
                                    <span>Back end</span>
                                </li>
                            </ul>
                        </div>
                    </div>




                </div>
            </div>
        </div>
        
    </div>
</section>