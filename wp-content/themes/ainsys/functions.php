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
require_once __DIR__ . '/includes/wp-cli-acf-tools.php';
require_once __DIR__ . '/includes/class-clean-walker.php';
require_once __DIR__ . '/includes/security/hide-wp-version.php';
require_once __DIR__ . '/includes/head-top-footer-scripts.php';
require_once __DIR__ . '/includes/wp-cleanup.php';
require_once __DIR__ . '/includes/gutenberg-customizations.php';
require_once __DIR__ . '/includes/theme-customizations.php';
require_once __DIR__ . '/includes/styles-scripts.php';
require_once __DIR__ . '/includes/theme-installer.php';

/**
 * Theme setup hooks
 */

define('AINSYS_DIR_CSS', get_template_directory_uri() . '/assets/css/');
define('AINSYS_DIR_JS', get_template_directory_uri() . '/assets/js/');
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('forum_css', AINSYS_DIR_CSS . 'forum.css');
	wp_enqueue_style('forum_css', AINSYS_DIR_JS . 'main/main.js');
	if (is_single()){
		wp_enqueue_script('forum_js', AINSYS_DIR_JS . 'forum.js');
	}
});
function ainsys_after_setup_theme() {

	if ( ! defined( 'WP_DEBUG' ) || ( defined( 'WP_DEBUG' ) && ! WP_DEBUG ) ) {
		show_admin_bar( false );
	}

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'wp-block-styles' ); // required for blocks editor styles in Gutenberg.

	register_nav_menus(
		array(
			'primary'   => 'Header Menu',
			'secondary' => 'Footer Menu',
		)
	);

	add_editor_style(
		array(
			get_template_directory_uri() . '/assets/css/editor-style.css?ver=' . _get_asset_version(),
			_get_fonts_loading_url(),
		)
	);

}
	
// function admin_bar(){

//   if(is_user_logged_in()){
//     add_filter( 'show_admin_bar', '__return_true' , 1000 );
//   }
// }
// add_action('init', 'admin_bar' );
add_action( 'after_setup_theme', 'ainsys_after_setup_theme' );

// скрытие пункта меню "редактор кода"

add_action('admin_menu', 'remove_admin_menu', 999);
function remove_admin_menu() {
  	remove_submenu_page( 'themes.php', 'theme-editor.php'); // Редактирование шаблона
}
