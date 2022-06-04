<?php
/**
 *  Main Theme Functions - link and implement all theme specific functionality here.
 *
 * @package ainsys
 */

/**
 * Include modules for the theme, order matters!
 */
require_once __DIR__ . '/includes/acf-load.php';
require_once __DIR__ . '/includes/acf-enhancements.php';
require_once __DIR__ . '/includes/security/hide-wp-version.php';
require_once __DIR__ . '/includes/head-top-footer-scripts.php';
require_once __DIR__ . '/includes/wp-cleanup.php';
require_once __DIR__ . '/includes/gutenberg-customizations.php';
require_once __DIR__ . '/includes/theme-customizations.php';
require_once __DIR__ . '/includes/styles-scripts.php';
require_once __DIR__ . '/includes/class-clean-walker.php';
require_once __DIR__ . '/includes/theme-installer.php';
require_once __DIR__ . '/includes/connector.php';
require_once __DIR__ . '/includes/woo-customizations.php';
require_once __DIR__ . '/includes/search-customization.php';

// Вход и безопасность.
require 'template-parts/login-and-security.php';
require 'template-parts/reg-dev.php';
require 'template-parts/reg-part.php';

// Компетенции разработчиков и поиск по ним.
require 'template-parts/comp-settings.php';

/**
 * Theme setup hooks
 */
function ainsys_after_setup_theme() {

	if ( ! defined( 'WP_DEBUG' ) || ( defined( 'WP_DEBUG' ) && ! WP_DEBUG ) ) {
		show_admin_bar( false );
	}

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'wp-block-styles' ); // required for blocks editor styles in Gutenberg.

	register_nav_menus(
		array(
			'en'   => 'Header Menu-en',
            'ru'   => 'Header Menu-ru',
            'es'   => 'Header Menu-es',
            'ua'   => 'Header Menu-ua',
            'secondary' => 'Footer Menu',
            )
	);

	add_editor_style(
		array(
			get_template_directory_uri() . '/assets/css/editor-style.css?ver=' . _get_asset_version(),
			_get_fonts_loading_url(),
		)
	);

    add_image_size( 'slider-thumb', 280, 240, [ 'center', 'center' ] );

}

add_action( 'after_setup_theme', 'ainsys_after_setup_theme' );


/**
 * Hides theme editor item in the menu.
 */
function remove_admin_menu() {
	remove_submenu_page( 'themes.php', 'theme-editor.php' );
}
add_action( 'admin_menu', 'remove_admin_menu', 999 );

$result = add_role( 'partner', __(
'Partner' ),
array(

    'read' => true, //просмотр сайта 

)
);

$result = add_role( 'developer', __(
'Developer' ),
array(

    'read' => true, //просмотр сайта 

)
);

$result = add_role( 'client', __(
'Client' ),
array(

    'read' => true, //просмотр сайта 

)
);


// ЗАКРЫТЫЕ СТРАНИЦЫ РОЛЕЙ

//Если ты не Авторизирован
if(!is_user_logged_in()){
	add_action( 'template_redirect', function() {
		if(is_page('support-clients')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('partners-integrators')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('developers-2')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('ainsys-rest-api')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('connector-sdk')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('support-dev')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('partners-qa')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('support-partners')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('new-partner')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('%d1%81ustomer-orders')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}elseif(is_page('%d1%81ustomer-orders')){
			wp_redirect('https://ainsys.com/auth/', 301);
			exit;
		}
	} );
}
//Если ты Пользователь
if(current_user_can('bbp_participant')){
	add_action( 'template_redirect', function() {
		if( is_page('%d1%81ustomer-orders') ){
			wp_redirect( 'https://ainsys.com/only-partners', 301 );
			exit;
		}elseif(is_page('support-partners')){
			wp_redirect('https://ainsys.com/support-clients', 301);
			exit;
		}elseif(is_page('support-dev')){
			wp_redirect('https://ainsys.com/support-dev', 301);
			exit;
		}elseif(is_page('partners-qa')){
			wp_redirect('https://ainsys.com/only-partners', 301);
			exit;
		}elseif(is_page('connector-sdk')){
			wp_redirect('https://ainsys.com/only-dev', 301);
			exit;
		}elseif(is_page('ainsys-rest-api')){
			wp_redirect('https://ainsys.com/only-dev', 301);
			exit;
		}elseif(is_page('sdk-qa')){
			wp_redirect('https://ainsys.com/only-dev', 301);
			exit;
		}
	} );
}
//Если ты Разработчик
if(current_user_can('developer')){
	add_action( 'template_redirect', function() {
		if( is_page('partners-qa') ){
			wp_redirect( 'https://ainsys.com/only-partners', 301 );
			exit;
		}elseif(is_page('support-partners')){
			wp_redirect('https://ainsys.com/only-partners', 301);
			exit;
		}elseif(is_page('support-clients')){
			wp_redirect('https://ainsys.com/support-dev', 301);
			exit;
		}elseif(is_page('%d1%81ustomer-orders')){
			wp_redirect('https://ainsys.com/only-partners', 301);
			exit;
		}
	} );
}

//Если ты Партнер
if(current_user_can('partner')){
	add_action( 'template_redirect', function() {
		if( is_page('support-clients') ){
			wp_redirect( 'https://ainsys.com/support-partners', 301 );
			exit;
		}elseif(is_page('sdk-qa')){
			wp_redirect('https://ainsys.com/only-dev', 301);
			exit;
		}elseif(is_page('ainsys-rest-api')){
			wp_redirect('https://ainsys.com/only-dev', 301);
			exit;
		}elseif(is_page('connector-sdk')){
			wp_redirect('https://ainsys.com/only-dev', 301);
			exit;
		}elseif(is_page('support-dev')){
			wp_redirect('https://ainsys.com/support-partners', 301);
			exit;
		}
	} );
}

/**
 * remove disabled class depending on the current user role
 *
 * @package ainsys
 */

add_filter('nav_menu_css_class', 'ainsys_enable_menu_items', 10, 2 );

function ainsys_enable_menu_items($classes) {

    if(current_user_can('customer')) {

        if ( false !== array_search( 'client', $classes, true ) ) {

            $classes = array_filter($classes, static function ($element) {

                return $element !== "disabled";

            });
        }

    } elseif (current_user_can('administrator') || current_user_can('developer') || current_user_can('partner')) {

        $classes = array_filter($classes, static function ($element) {

            return $element !== "disabled";

        });
    }

    return $classes;
}

