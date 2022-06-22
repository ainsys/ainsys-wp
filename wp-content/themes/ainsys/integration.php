<?php
/**
 * Integration
 *
 * Template Name: Integration
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
                    <h2 class="integration_head_title">План интеграции /</h2>
                    <div class="integration_head_fl">
                        <input type="text" class="integration_head_input integration_head_title" value="Название проекта" disabled>
                        <div class="integration_head_item integration_head_correct">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/correct.svg" alt="correct">
                        </div>
                    </div>    
                    <div class="integration_head_item integration_head_switch">
                        <img class="switch_img" src="<?php echo get_template_directory_uri(); ?>/assets/images/components/switch.svg" alt="switch">
                        <div class="switch_popup disabl">
                            <p class="switch_popup_text">Выберите из списка проект, на который вы хотите переключиться</p>
                            <ul class="switch_popup_list">
                                <li class="switch_popup_list_link">
                                    Новый проект
                                </li>
                                <li class="switch_popup_list_link">
                                    Проект №1
                                </li>
                                <li class="switch_popup_list_link">
                                    Проект интеграция Битрикс
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="connectors">
                    <div class="connectors_head">
                        <div class="col-md-5 col-12">
                            <p class="connectors_head_text">
                                Выбор коннектора
                            </p>
                        </div>
                        <div class="col-md-6 col-12">
                            <p class="connectors_head_text">
                                Опишите ваши требования по интеграции системы
                            </p>
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <div class="connector">
                        <div class="connector_content"> 
                            <div class="col-md-5 col-12">
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
                                    <div class="connector_item_operations">
                                        <p class="connector_item_operations_text">
                                            Количество транзакций
                                        </p>
                                        <input class="connector_item_operations_input" type="text" value="1000">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="connector_requirements">
                                    <div class="connector_requirements_preview">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/correct.svg" alt="correct">
                                        <p class="connector_requirements_preview_text">
                                            Введите требования
                                        </p>
                                    </div>
                                    <div class="connector_requirements_main disabl">
                                        <textarea class="connector_requirements_main_content main_content" disabled>Всё из минимального и в добавок:- можно выкупать "пакеты" транзакций для большого количества - можно выкупать "пакеты" транзакций для боль...</textarea>
                                        <div class="connector_requirements_main_settings main_settings">
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
                            </div>
                            <div class="col-1 connector_delete_block">
                                <div class="connector_delete">
                                    <img class="connector_delete_btn" src="<?php echo get_template_directory_uri(); ?>/assets/images/components/delete_con.svg" alt="delete">
                                </div>
                            </div>   
                        </div>
                    </div>

                    <div class="connector">
                        <div class="connector_content">
                            <div class="col-md-5 col-12">
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
                                    <div class="connector_item_operations">
                                        <p class="connector_item_operations_text">
                                            Количество транзакций
                                        </p>
                                        <input class="connector_item_operations_input" type="text" value="1000">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="connector_requirements">
                                    <div class="connector_requirements_preview">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/correct.svg" alt="correct">
                                        <p class="connector_requirements_preview_text">
                                            Введите требования
                                        </p>
                                    </div>
                                    <div class="connector_requirements_main disabl">
                                        <textarea class="connector_requirements_main_content main_content" disabled>Всё из минимального и в добавок:- можно выкупать "пакеты" транзакций для большого количества - можно выкупать "пакеты" транзакций для боль...</textarea>
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
                            </div>
                            <div class="col-1 connector_delete_block">
                                <div class="connector_delete">
                                    <img class="connector_delete_btn" src="<?php echo get_template_directory_uri(); ?>/assets/images/components/delete_con.svg" alt="delete">
                                </div>
                            </div>    
                        </div>
                    </div>

                    <div class="connector">
                        <div class="connector_content">
                            <div class="col-md-5 col-12">
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
                                    <div class="connector_item_operations">
                                        <p class="connector_item_operations_text">
                                            Количество транзакций
                                        </p>
                                        <input class="connector_item_operations_input" type="text" value="1000">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="connector_requirements">
                                    <div class="connector_requirements_preview">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/correct.svg" alt="correct">
                                        <p class="connector_requirements_preview_text">
                                            Введите требования
                                        </p>
                                    </div>
                                    <div class="connector_requirements_main disabl">
                                        <textarea class="connector_requirements_main_content main_content" disabled>Всё из минимального и в добавок:- можно выкупать "пакеты" транзакций для большого количества - можно выкупать "пакеты" транзакций для боль...</textarea>
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
                            </div>
                            <div class="col-md-1 connector_delete_block">
                                <div class="connector_delete">
                                    <img class="connector_delete_btn" src="<?php echo get_template_directory_uri(); ?>/assets/images/components/delete_con.svg" alt="delete">
                                </div>
                            </div>    
                        </div>
                    </div>

                    <div class="connectors_footer">
                        <div class="col-md-5 col-12">
                            <div class="connectors_search">
                              <input type="search" class="connectors_search_input" placeholder="Введите название системы">
                            </div>
                        </div>
                        <div class="col-md-6 col-12"></div>
                        <div class="col-1">
                        </div>
                    </div>
                </div>

                <div class="integration_form">
                    <div class="integration_form_budget">

                        <div class="integration_form_budget_field col-lg-6 col-12">
                            <div class="integration_form_field_head">
                                <p class="integration_form_field_head_text">
                                    Бюджет на интеграцию
                                </p>
                                <span class="tooltips__item">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                    <div class="tooltips">
                                        test
                                    </div> 
                                </span>
                            </div>
                            <input class="integration_form_field_input" type="text" placeholder="Введите бюджет">
                        </div>

                        <div class="integration_form_budget_field col-lg-6 col-12">
                            <div class="integration_form_field_head">
                                <p class="integration_form_field_head_text">
                                    Валюта
                                </p>
                                <span class="tooltips__item">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                    <div class="tooltips">
                                        test
                                    </div> 
                                </span>
                            </div>
                            <div class="select">
                                <input class="select__input" type="hidden" name="">
                                <div class="select__head">Выберите валюту</div>
                                <ul class="select__list" style="display: none;">
                                    <li class="select__item">Российский рубль</li>
                                    <li class="select__item">$</li>
                                    <li class="select__item">Гривна</li>
                                </ul>
                            </div>
                        </div>

                        <div class="integration_form_budget_field col-lg-6 col-12">
                            <div class="integration_form_field_head">
                                <p class="integration_form_field_head_text">
                                    Дата начала
                                </p>
                                <span class="tooltips__item">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                    <div class="tooltips">
                                        test
                                    </div> 
                                </span>
                            </div>
                            <input type='date' class="integration_form_budget_field_date data_input" />
                        </div>

                        <div class="integration_form_budget_field col-lg-6 col-12">
                            <div class="integration_form_field_head">
                                <p class="integration_form_field_head_text">
                                    Дата окончания
                                </p>
                                <span class="tooltips__item">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                    <div class="tooltips">
                                        test
                                    </div> 
                                </span>
                            </div>
                            <input type='date' class="integration_form_budget_field_date data_input" />
                        </div>
                    </div>
                    <div class="integration_form_options">
                        <div class="integration_form_options_head">
                            <div class="integration_form_options_head_fl">
                                <h6 class="integration_form_options_head_title">
                                    Дополнительные данные проекта
                                </h6>
                                <span class="tooltips__item">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                    <div class="tooltips">
                                        test
                                    </div> 
                                </span>
                            </div>
                            <button class="integration_form_options_head_upload integration_upload">Подгрузить множественные файлы ТЗ</button>
                            <div class="field__wrapper disabl">
                                <input name="file" type="file" name="file" id="field__file-2" class="field field__file" multiple> 
                                <label class="field__file-wrapper" for="field__file-2">
                                    <div class="field__file-fake">Файл не выбран</div>
                                    <div class="field__file-button">Выбрать</div>
                                </label>
                            </div>
                        </div>
                        <textarea class="integration_form_options_textarea" disabled="">ТЗ по проекту в свободной форме</textarea>
                        <div class="integration_form_options_settings">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/panel.png" alt="panel">
                            <div class="integration_form_options_settings_correct options_settings_correct">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/correct.svg" alt="correct">
                            </div>
                        </div>
                        <div class="integration_form_options_fl">
                            <div class="integration_form_options_rows">

                            <div class="integration_form_options_inputs integration_form_options_inputs_start">
                                    <div class="integration_form_field">
                                        <div class="integration_form_field_head">
                                            <p class="integration_form_field_head_text">
                                                Альтернативные способы связи
                                            </p>
                                            <span class="tooltips__item">
                                                <div class="tooltips">
                                                    test
                                                </div> 
                                            </span>
                                        </div>
                                    </div>

                                    <div class="integration_form_field integration_form_field_desk">
                                        <div class="integration_form_field_head">
                                            <p class="integration_form_field_head_text">
                                                Выберите тип данных
                                            </p>
                                            <span class="tooltips__item">
                                                <div class="tooltips">
                                                    test
                                                </div> 
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="integration_form_options_inputs">
                                    <div class="integration_form_field">
                                        <input class="integration_form_field_input" type="text" placeholder="www.google.ru">
                                    </div>

                                    <div class="integration_form_field">
                                        <div class="select">
                                            <input class="select__input" type="hidden" name="">
                                            <div class="select__head">Web site</div>
                                            <ul class="select__list" style="display: none;">
                                                <li class="select__item">Web site</li>
                                                <li class="select__item">Whatsapp</li>
                                                <li class="select__item">Facebook</li>
                                                <li class="select__item">Instagram</li>
                                                <li class="select__item">Telegram</li>
                                                <li class="select__item">Linkedin</li>
                                                <li class="select__item">Другое</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="integration_form_field_remove">
                                        <div class="integration_form_remove settings_remove">
                                        </div>
                                    </div>
                                </div>
                            </div>    


                            <div class="integration_form_field_add col-2">
                                <div class="integration_form_add settings_add">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/add.svg" alt="add">
                                </div>
                            </div>
                        </div>
                    </div>

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
                                <div class="integration_form_field_head">
                                    <p class="integration_form_field_head_text">
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
                                <div class="integration_form_field_head">
                                    <p class="integration_form_field_head_text">
                                        Имя
                                    </p>
                                    <span class="tooltips__item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                        <div class="tooltips">
                                            test
                                        </div> 
                                    </span>
                                </div>
                                <input class="integration_form_field_input input_long" type="text" placeholder="Введите имя">
                            </div>

                            </div>

                            <div class="integration_form_field_role integration_form_field_ur">

                            <div class="integration_form_field col-md-12 col-12">
                                <div class="integration_form_field_head">
                                    <p class="integration_form_field_head_text">
                                        Название организации
                                    </p>
                                    <span class="tooltips__item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                        <div class="tooltips">
                                            test
                                        </div> 
                                    </span>
                                </div>
                                <input class="integration_form_field_input input_long" type="text" placeholder="Введите название организации ">
                            </div>

                            <div class="integration_form_field col-md-6 col-12">
                                <div class="integration_form_field_head">
                                    <p class="integration_form_field_head_text">
                                        Название банка
                                    </p>
                                    <span class="tooltips__item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                        <div class="tooltips">
                                            test
                                        </div> 
                                    </span>
                                </div>
                                <input class="integration_form_field_input input_long" type="text" placeholder="Введите название банка">
                            </div>

                            <div class="integration_form_field col-md-6 col-12">
                                <div class="integration_form_field_head">
                                    <p class="integration_form_field_head_text">
                                        БИК
                                    </p>
                                    <span class="tooltips__item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                        <div class="tooltips">
                                            test
                                        </div> 
                                    </span>
                                </div>
                                <input class="integration_form_field_input input_long" type="text" placeholder="Введите БИК">
                            </div>

                            <div class="integration_form_field col-md-6 col-12">
                                <div class="integration_form_field_head">
                                    <p class="integration_form_field_head_text">
                                        ИИН
                                    </p>
                                    <span class="tooltips__item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                        <div class="tooltips">
                                            test
                                        </div> 
                                    </span>
                                </div>
                                <input class="integration_form_field_input input_long" type="text" placeholder="Введите ИИН">
                            </div>

                            <div class="integration_form_field col-md-6 col-12">
                                <div class="integration_form_field_head">
                                    <p class="integration_form_field_head_text">
                                        КПП
                                    </p>
                                    <span class="tooltips__item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                        <div class="tooltips">
                                            test
                                        </div> 
                                    </span>
                                </div>
                                <input class="integration_form_field_input input_long" type="text" placeholder="Введите КПП">
                            </div>

                            <div class="integration_form_field col-md-12 col-12">
                                <div class="integration_form_field_head">
                                    <p class="integration_form_field_head_text">
                                        Номер счета (IBAN)
                                    </p>
                                    <span class="tooltips__item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                        <div class="tooltips">
                                            test
                                        </div> 
                                    </span>
                                </div>
                                <input class="integration_form_field_input input_full" type="text" placeholder="Введите номер счета">
                            </div>

                            <div class="integration_form_field col-md-12 col-12">
                                <div class="integration_form_field_head">
                                    <p class="integration_form_field_head_text">
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
                                    <input class="integration_form_field_input input_full" type="text" placeholder="Поиск на Google Картах">
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


