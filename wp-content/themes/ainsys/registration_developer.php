<?php
/**
 * Landing ru
 *
 * Template Name: Registration developer
 *
 * @package ainsys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }

    get_header( 'header' );
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
                        <div class="reg_data_item col-md-4 col-sm-6 col-12">
                            <p class="reg_data_name">
                                Имя
                            </p>
                            <p class="reg_data_value">
                                Иван
                            </p>
                        </div>
                        <div class="reg_data_item col-md-4 col-sm-6 col-12">
                            <p class="reg_data_name">
                                Фамилия
                            </p>
                            <p class="reg_data_value">
                                Иванов
                            </p>
                        </div>
                        <div class="reg_data_item col-md-4 col-sm-6 col-12">
                            <p class="reg_data_name">
                                Отчество
                            </p>
                            <p class="reg_data_value">
                                Иванович
                            </p>
                        </div>
                        <div class="reg_data_item col-md-4 col-sm-6 col-12">
                            <p class="reg_data_name">
                                E-mail
                            </p>
                            <p class="reg_data_value">
                                ivanov.i@gmail.com
                            </p>
                        </div>
                        <div class="reg_data_item col-md-4 col-sm-6 col-12">
                            <p class="reg_data_name">
                                Номер телефона
                            </p>
                            <p class="reg_data_value">
                                +7 (745) 746-46-42
                            </p>
                        </div>
                        <div class="reg_data_item col-md-4 col-sm-6 col-12">
                            <p class="reg_data_podtitle">
                                Для изменения данных перейдите в личный кабинет
                            </p>
                            <button class="reg_data_btn">Редактировать</button>
                        </div>
                    </div>
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




                <div class="integration_form_options_fl mt-5">
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

                <div class="integration_form_field col-md-12 col-12">
                    <div class="integration_form_field_head">
                        <p class="integration_form_field_head_text">
                            Анонс
                        </p>
                        <span class="tooltips__item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                            <div class="tooltips">
                                test
                            </div> 
                        </span>
                    </div>
                    <textarea class="integration_form_textarea">Введите текст</textarea>
                </div>

                <div class="integration_form_field integration_form_field_logo col-md-12 col-12">
                    <div class="integration_form_field_head">
                        <p class="integration_form_field_head_text">
                            Аватар или логотип компании
                        </p>
                        <span class="tooltips__item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                            <div class="tooltips">
                                test
                            </div> 
                        </span>
                    </div>
                    <div class="integration_form_fl">
                        <button class="integration_form_file integration_file">Выберите файл</button>
                        <div class="field__wrapper field__wrapper_file disabl">
                            <input name="file" type="file" name="file" id="field__file-2" class="field field__file" multiple> 
                            <label class="field__file-wrapper" for="field__file-2">
                                <div class="field__file-fake">Файл не выбран</div>
                                <div class="field__file-button">Выбрать</div>
                            </label>
                        </div>
                        <p class="integration_form_warning">Размер файла не должен<br /> превышать 2 MB</p>
                    </div>
                </div>













                <div class="connectors skills">
                    <div class="integration_form_field_head">
                        <p class="integration_form_field_head_text">
                            Умения и компетенции разработчика
                        </p>
                        <span class="tooltips__item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
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
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
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




                <div class="integration_form_field integration_form_field_experience col-md-12 col-12">
                    <div class="integration_form_field_head">
                        <p class="integration_form_field_head_text">
                            Опыт работы
                        </p>
                        <span class="tooltips__item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                            <div class="tooltips">
                                test
                            </div> 
                        </span>
                    </div>
                    <div class="experience">
                        <div class="experience_item">
                            <div class="experience_block">
                                <div class="experience_wrapper">
                                    <div class="experience_head">
                                        <div class="experience_head_date">
                                            <input class="experience_head_date_text" type="date" value="01.05.2021">
                                            <span>-</span>
                                            <input class="experience_head_date_text" type="date" value="01.08.2021">
                                        </div>
                                        <input type="text" class="experience_head_company" value="Cyber Game Studio">
                                    </div>
                                    <div class="experience_info">
                                        <input type="text"  class="experience_info_profession" value="Разработчик приложения">
                                        <textarea name="description" wrap="" class="experience_info_description">Создавал интерфейсы игрового пространства для игр, внедрял новые фишки для ускорения, создавал програмный код</textarea>
                                    </div>
                                </div>
                                <div class="experience_settings">
                                    <div class="experience_settings_correct"></div>
                                    <div class="experience_settings_cancel"></div>
                                </div>
                            </div>
                        </div>
                        <div class="experience_item_start"></div>
                    </div>

                    <button class="experience_settings_btn">Добавить место работы</button>
    

                </div>












                











                <div class="integration_form">
                    
                    <div class="integration_form_options integration_form_data">
                        <div class="integration_form_options_head">
                            <h6 class="integration_form_options_head_title">
                                Данные разработчика (опционально)
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
                                        <label for="radio-ur">Индивидуальный предприниматель</label>
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
                                        Опишите кратко, почему Вы хотите сотрудничать с нами
                                    </p>
                                    <span class="tooltips__item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/help.svg" alt="help">
                                        <div class="tooltips">
                                            test
                                        </div> 
                                    </span>
                                </div>
                                <textarea class="integration_form_options_textarea" disabled="">Введите текст</textarea>
                                <div class="integration_form_options_settings">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/panel.png" alt="panel">
                                    <div class="integration_form_options_settings_correct options_settings_correct">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/correct.svg" alt="correct">
                                    </div>
                                </div>
                            </div>    


                            </div>

                            
                        </div>

                    </div>
                </div>
            </div>




















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


