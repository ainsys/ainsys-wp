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

