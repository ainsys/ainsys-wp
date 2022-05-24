<?php

//FAQ
add_action( 'init', 'true_register_post_type_init' ); // Использовать функцию только внутри хука init

function true_register_post_type_init() {
	$labels = array(
		'name' => 'Компетенция',
		'singular_name' => 'Компетенция', // админ панель Добавить->Функцию
		'add_new' => 'Добавить компетенцию',
		'add_new_item' => 'Добавить новую компетенцию', // заголовок тега <title>
		'edit_item' => 'Редактировать компетенцию',
		'new_item' => 'Новая компетенция',
		'all_items' => 'Все компетенции',
		'view_item' => 'Просмотр компетенции на сайте',
		'search_items' => 'Искать компетенции',
		'not_found' =>  'Компетенций не найдено.',
		'not_found_in_trash' => 'На сайте нет компетенций.',
		'menu_name' => 'COMP' // ссылка в меню в админке
	);
	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'show_ui'       => true, // показывать интерфейс в админке
		'menu_icon'     => get_stylesheet_directory_uri() .'/img/cpu.svg', // иконка в меню
		'menu_position' => 60,
		'taxonomies'    => array(),// 'category', 'category-comp' 
		'supports' => array( 'title')//, 'editor', 'comments', 'author', 'trackbacks','custom-fields','revisions','page-attributes','post-formats'
	);
	register_post_type('comp', $args);
}

add_filter( 'post_updated_messages', 'true_post_type_messages' );

function true_post_type_messages( $messages ) {
	global $post, $post_ID;

	$messages['faq'] = array( // functions - название созданного нами типа записей
		0 => '', // Данный индекс не используется.
		1 => sprintf( 'Компетенция обновлена. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
		2 => 'Компетенция обновлена.',
		3 => 'Компетенция удалена.',
		4 => 'Компетенция обновлена',
		5 => isset($_GET['revision']) ? sprintf( 'Компетенция восстановлена из редакции: %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( 'Компетенция опубликована на сайте. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
		7 => 'Компетенция сохранена.',
		8 => sprintf( 'Отправлено на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( 'Запланировано на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( 'Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);

	return $messages;
}
function true_post_type_help_tab() {

	$screen = get_current_screen();

	// Прекращаем выполнение функции, если находимся на страницах других типов постов
	if ( 'faq' != $screen->post_type )
		return;

	// Массив параметров для первой вкладки
	$args = array(
		'id'      => 'tab_1',
		'title'   => 'Обзор',
		'content' => '<h3>Обзор</h3><p>Содержимое первой вкладки.</p>'
	);

	// Добавляем вкладку
	$screen->add_help_tab( $args );

	// Массив параметров для второй вкладки
	$args = array(
		'id'      => 'tab_2',
		'title'   => 'Доступные действия',
		'content' => '<h3>Доступные действия с типом постов «' . $screen->post_type . '»</h3><p>Содержимое второй вкладки</p>'
	);

	// Добавляем вторую вкладку
	$screen->add_help_tab( $args );

}

add_action('admin_head', 'true_post_type_help_tab');

