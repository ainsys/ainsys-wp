<?php
/**
 * Landing ru
 *
 * Template Name: Registration partner
 *
 * @package ainsys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }

    get_header( 'header' );
?>
<section class="integration">
    <div class="container">
        <a href="#" class="nav_back">
          <p class="nav_back_text">Вернуться в каталог</p>
        </a>

        <div class="integration_content">
            <div class="integration_block col-12 col-lg-9">
                <div class="integration_head">
                    <h2 class="integration_head_title">Форма для регистрации партнера</h2>   
                </div>
                <div class="reg">
                    <div class="reg_data">
                        <div class="col-md-4 col-6">
                            <p class="reg_data_name">
                                Имя
                            </p>
                            <p class="reg_data_value">
                                Иван
                            </p>
                        </div>
                        <div class="col-md-4 col-6">
                            <p class="reg_data_name">
                                Фамилия
                            </p>
                            <p class="reg_data_value">
                                Иванов
                            </p>
                        </div>
                        <div class="col-md-4 col-6">
                            <p class="reg_data_name">
                                Отчество
                            </p>
                            <p class="reg_data_value">
                                Иванович
                            </p>
                        </div>
                        <div class="col-md-4 col-6">
                            <p class="reg_data_name">
                                E-mail
                            </p>
                            <p class="reg_data_value">
                                ivanov.i@gmail.com
                            </p>
                        </div>
                        <div class="col-md-4 col-6">
                            <p class="reg_data_name">
                                Номер телефона
                            </p>
                            <p class="reg_data_value">
                                +7 (745) 746-46-42
                            </p>
                        </div>
                        <div class="col-md-4 col-6">
                            <p class="reg_data_podtitle">
                                Для изменения данных перейдите в личный кабинет
                            </p>
                            <button class="reg_data_btn">Редактировать</button>
                        </div>
                    </div>
                </div>

                











                <div class="integration_form">
                    
                    <div class="integration_form_options integration_form_data">
                        <div class="integration_form_options_head">
                            <h6 class="integration_form_options_head_title">
                                Данные организации (опционально)
                            </h6>
                            <span class="tooltips__item">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                <div class="tooltips">
                                    test
                                </div> 
                            </span>
                        </div>

                        <div class="integration_form_fields">

                            <div class="integration_form_field col-md-12 col-12">
                                <div class="integration_form_budget_field_head">
                                    <p class="integration_form_budget_field_head_text">
                                        Выберите кем Вы являетесь, чтобы продолжить
                                    </p>
                                    <span class="tooltips__item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                        <div class="tooltips">
                                            test
                                        </div> 
                                    </span>
                                </div>
                                <div class="form_radio_btns">
                                    <div class="form_radio_btn">
                                        <input id="radio-fiz" type="radio" name="radio" value="Физическое лицо">
                                        <label for="radio-fiz">Физическое лицо</label>
                                    </div>
                                    
                                    <div class="form_radio_btn">
                                        <input id="radio-ur" type="radio" name="radio" value="Юридическое лицо" checked>
                                        <label for="radio-ur">Юридическое лицо</label>
                                    </div>
                                </div>
                            </div>

                            <div class="integration_form_field_role integration_form_field_fiz disabl">

                            
                            <div class="integration_form_field col-md-12 col-12">
                                <div class="integration_form_budget_field_head">
                                    <p class="integration_form_budget_field_head_text">
                                        Имя
                                    </p>
                                    <span class="tooltips__item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                        <div class="tooltips">
                                            test
                                        </div> 
                                    </span>
                                </div>
                                <input class="integration_form_budget_field_input input_long" type="text" placeholder="Введите имя">
                            </div>

                            </div>

                            <div class="integration_form_field_role integration_form_field_ur">

                            <div class="integration_form_field col-md-12 col-12">
                                <div class="integration_form_budget_field_head">
                                    <p class="integration_form_budget_field_head_text">
                                        Название организации
                                    </p>
                                    <span class="tooltips__item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                        <div class="tooltips">
                                            test
                                        </div> 
                                    </span>
                                </div>
                                <input class="integration_form_budget_field_input input_long" type="text" placeholder="Введите название организации ">
                            </div>

                            <div class="integration_form_field col-md-6 col-12">
                                <div class="integration_form_budget_field_head">
                                    <p class="integration_form_budget_field_head_text">
                                        Название банка
                                    </p>
                                    <span class="tooltips__item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                        <div class="tooltips">
                                            test
                                        </div> 
                                    </span>
                                </div>
                                <input class="integration_form_budget_field_input input_long" type="text" placeholder="Введите название банка">
                            </div>

                            <div class="integration_form_field col-md-6 col-12">
                                <div class="integration_form_budget_field_head">
                                    <p class="integration_form_budget_field_head_text">
                                        БИК
                                    </p>
                                    <span class="tooltips__item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                        <div class="tooltips">
                                            test
                                        </div> 
                                    </span>
                                </div>
                                <input class="integration_form_budget_field_input input_long" type="text" placeholder="Введите БИК">
                            </div>

                            <div class="integration_form_field col-md-6 col-12">
                                <div class="integration_form_budget_field_head">
                                    <p class="integration_form_budget_field_head_text">
                                        ИИН
                                    </p>
                                    <span class="tooltips__item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                        <div class="tooltips">
                                            test
                                        </div> 
                                    </span>
                                </div>
                                <input class="integration_form_budget_field_input input_long" type="text" placeholder="Введите ИИН">
                            </div>

                            <div class="integration_form_field col-md-6 col-12">
                                <div class="integration_form_budget_field_head">
                                    <p class="integration_form_budget_field_head_text">
                                        КПП
                                    </p>
                                    <span class="tooltips__item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                        <div class="tooltips">
                                            test
                                        </div> 
                                    </span>
                                </div>
                                <input class="integration_form_budget_field_input input_long" type="text" placeholder="Введите КПП">
                            </div>

                            <div class="integration_form_field col-md-12 col-12">
                                <div class="integration_form_budget_field_head">
                                    <p class="integration_form_budget_field_head_text">
                                        Номер счета (IBAN)
                                    </p>
                                    <span class="tooltips__item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                        <div class="tooltips">
                                            test
                                        </div> 
                                    </span>
                                </div>
                                <input class="integration_form_budget_field_input input_full" type="text" placeholder="Введите номер счета">
                            </div>

                            <div class="integration_form_field col-md-12 col-12">
                                <div class="integration_form_budget_field_head">
                                    <p class="integration_form_budget_field_head_text">
                                        Адрес
                                    </p>
                                    <span class="tooltips__item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                        <div class="tooltips">
                                            test
                                        </div> 
                                    </span>
                                </div>
                                <div class="integration_form_input_psevdo">
                                    <input class="integration_form_budget_field_input input_full" type="text" placeholder="Поиск на Google Картах">
                                </div>    
                            </div>


                            </div>

                            
                        </div>

                    </div>
                </div>
            </div>




















            <div class="integration_block col-12 col-lg-3">
                <div class="terms">
                    <div class="term_item">
                        <div class="term_item_header">
                            <p class="term_item_header_title">
                                Временные затраты на внедрение
                            </p>
                            <div class="term_item_header_info">
                                <img class="term_item_header_info_img" src="<?php echo get_template_directory_uri(); ?>/assets/images/components/time.svg" alt="cancel">
                                <p class="term_item_header_info_value">
                                    от 15 ч 30 м
                                </p>
                                <span class="tooltips__item">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="cancel">
                                    <div class="tooltips">
                                        test
                                    </div> 
                                </span>
                            </div>
                        </div>
                        <div class="term_item_content disabl">
                            <ul class="term_item_content_list">
                                <li class="term_item_content_list_link">
                                    <p class="term_item_content_list_link_name">
                                        1. Freshbooks
                                    </p>
                                    <p class="term_item_content_list_link_value">
                                        2 ч 40 м
                                    </p>
                                </li>
                                <li class="term_item_content_list_link">
                                    <p class="term_item_content_list_link_name">
                                        2. Asana
                                    </p>
                                    <p class="term_item_content_list_link_value">
                                        3 ч 50 м
                                    </p>
                                </li>
                                <li class="term_item_content_list_link">
                                    <p class="term_item_content_list_link_name">
                                        3. Freshbooks
                                    </p>
                                    <p class="term_item_content_list_link_value">
                                        8 ч 10 м
                                    </p>
                                </li>
                                <li class="term_item_content_list_link">
                                    <p class="term_item_content_list_link_name">
                                        4. Microsoft
                                    </p>
                                    <p class="term_item_content_list_link_value">
                                        1 ч 20 м
                                    </p>
                                </li>

                            </ul>
                        </div>
                        <div class="term_item_toggler">
                            <p class="term_item_toggler_text term_item_toggler_more">
                                Подробнее
                            </p>
                            <p class="term_item_toggler_text term_item_toggler_less disabl">
                                Скрыть
                            </p>
                        </div>
                    </div>


                    <div class="term_item">
                        <div class="term_item_header">
                            <p class="term_item_header_title">
                            Сроки на внедрение по дням
                            </p>
                            <div class="term_item_header_info">
                                <img class="term_item_header_info_img" src="<?php echo get_template_directory_uri(); ?>/assets/images/components/time.svg" alt="cancel">
                                <p class="term_item_header_info_value">
                                    от 14 дней
                                </p>
                                <span class="tooltips__item">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="cancel">
                                    <div class="tooltips">
                                        test
                                    </div> 
                                </span>
                            </div>
                        </div>
                        <div class="term_item_content disabl">
                            <ul class="term_item_content_list">
                                <li class="term_item_content_list_link">
                                    <p class="term_item_content_list_link_name">
                                        1. Freshbooks
                                    </p>
                                    <p class="term_item_content_list_link_value">
                                        2 дня
                                    </p>
                                </li>
                                <li class="term_item_content_list_link">
                                    <p class="term_item_content_list_link_name">
                                        2. Asana
                                    </p>
                                    <p class="term_item_content_list_link_value">
                                        14 дней
                                    </p>
                                </li>
                                <li class="term_item_content_list_link">
                                    <p class="term_item_content_list_link_name">
                                        3. Freshbooks
                                    </p>
                                    <p class="term_item_content_list_link_value term_item_content_list_link_rdy">
                                        Готов
                                    </p>
                                </li>
                                <li class="term_item_content_list_link">
                                    <p class="term_item_content_list_link_name">
                                        4. Microsoft
                                    </p>
                                    <p class="term_item_content_list_link_value">
                                        1 ч 20 м
                                    </p>
                                </li>

                            </ul>
                        </div>
                        <div class="term_item_toggler">
                            <p class="term_item_toggler_text term_item_toggler_more">
                                Подробнее
                            </p>
                            <p class="term_item_toggler_text term_item_toggler_less disabl">
                                Скрыть
                            </p>
                        </div>
                    </div>



                    <div class="term_item">
                        <div class="term_item_header">
                            <p class="term_item_header_title">
                                Ориентировочная стоимость
                            </p>
                            <div class="term_item_header_info">
                                <p class="term_item_header_info_value">
                                    От 50 $ / Мес
                                </p>
                            </div>
                            <ul class="term_item_content_list">
                                <li class="term_item_content_list_link">
                                    <p class="term_item_content_list_link_name term_item_content_list_link_rdy">
                                        Минимальный рекомендуемый тариф “Стандарт”
                                    </p>
                                    <span class="tooltips__item">
                                        <img class="tooltips_img" src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="cancel">
                                        <div class="tooltips">
                                            test
                                        </div> 
                                    </span>
                                </li>
                            </ul>    
                        </div>
                        <div class="term_item_content disabl">
                            <ul class="term_item_content_list">
                                <li class="term_item_content_list_link">
                                    <p class="term_item_content_list_link_name">
                                        1. Freshbooks
                                    </p>
                                    <p class="term_item_content_list_link_value term_item_content_list_link_operations">
                                        1000 операций
                                    </p>
                                </li>
                                <li class="term_item_content_list_link">
                                    <p class="term_item_content_list_link_name">
                                        2. Asana
                                    </p>
                                    <p class="term_item_content_list_link_value term_item_content_list_link_operations">
                                        2000 операций
                                    </p>
                                </li>
                                <li class="term_item_content_list_link">
                                    <p class="term_item_content_list_link_name">
                                        3. Freshbooks
                                    </p>
                                    <p class="term_item_content_list_link_value term_item_content_list_link_operations">
                                        5000 операций
                                    </p>
                                </li>
                                <li class="term_item_content_list_link">
                                    <p class="term_item_content_list_link_name">
                                        4. Microsoft
                                    </p>
                                    <p class="term_item_content_list_link_value term_item_content_list_link_operations">
                                        9000 операций
                                    </p>
                                </li>

                            </ul>
                        </div>
                        <div class="term_item_toggler">
                            <p class="term_item_toggler_text term_item_toggler_more">
                                Подробнее
                            </p>
                            <p class="term_item_toggler_text term_item_toggler_less disabl">
                                Скрыть
                            </p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="integration_form_accept">
            <input type="checkbox" name="accept_data" value="">
            <span class="">Даю согласие на сбор и обработку персональных данных</span>
        </div>

        <button class="btn btn-primary">Сохранить проект</button>
    </div>
</section>







<?php
get_footer( 'footer' );
?>


