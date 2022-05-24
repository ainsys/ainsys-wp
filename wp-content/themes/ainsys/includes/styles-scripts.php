<?php
/**
 * Theme scripts and styles.
 *
 * @package ainsys
 */

/**
 * Returns version string for assets.
 *
 * @return null|string
 */
function _get_asset_version() {
	return defined( 'ENV_DEV' ) ? gmdate( 'YmdHis' ) : wp_get_theme()->get( 'Version' );
}

/**
 * Returns a google fonts url to be used in stylesheets
 *
 * @return string
 */
function _get_fonts_loading_url() {
	return 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap';
}

/**
 * Enqueue scripts and styles
 *
 * @return void
 */
function ainsys_enqueue_scripts() {
	$asset_version = _get_asset_version();

	// it loads only necessary polyfills depending on browser.
	wp_enqueue_script( 'polyfill', 'https://polyfill.io/v3/polyfill.min.js', array(), '3.0', true );

	wp_enqueue_script(
		'bootstrap-js',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js',
		array( 'jquery' ),
		'5.0.0',
		true
	);

	wp_enqueue_script(
		'fancybox',
		'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js',
		array( 'jquery' ),
		'3.5.7',
		true
	);

	// phpcs:ignore
	// wp_enqueue_script('popper-js', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js', array('jquery'), '1.16.0', true );

	/**
	 * Optimization Hints:
	 *  - make sure you really need fontawesome and bootstrap.
	 *  - bootstrap.scss can be linked to main.scss,
	 *  - can prepare single fonts linking file,
	 *  - self host google fonts font files.
	 */
	// phpcs:ignore
	// wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fonts/fontawesome/css/fontawesome-all.min.css', null, $asset_version );
	wp_enqueue_style( 'fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css', null, '3.5.7' );

	//phpcs:ignore
	wp_enqueue_style( 'googlefonts', _get_fonts_loading_url(), null, $asset_version );
	wp_enqueue_style( 'ainsys-bs-style', get_template_directory_uri() . '/assets/style/bootstrap.min.css', null, $asset_version );
	wp_enqueue_style( 'ainsys-style', get_template_directory_uri() . '/assets/css/main.css', array( 'ainsys-bs-style' ), $asset_version );

	wp_enqueue_style( 'ainsys-woo-account', get_template_directory_uri() . '/assets-woo/css/acc.css', array( 'ainsys-bs-style' ), $asset_version );
	wp_enqueue_style( 'ainsys-woo-login', get_template_directory_uri() . '/assets-woo/css/login.css', array( 'ainsys-bs-style' ), $asset_version );
	wp_enqueue_style( 'ainsys-woo-cart', get_template_directory_uri() . '/assets-woo/css/cart.css', array( 'ainsys-bs-style' ), $asset_version );

	wp_enqueue_style( 'ainsys-woocommerce', get_template_directory_uri() . '/woocommerce/styles/styles.css', array( 'ainsys-bs-style' ), $asset_version );

	wp_enqueue_style( 'ainsys-custom-style', get_template_directory_uri() . '/assets/style/newstyles.css', array( 'ainsys-style' ), $asset_version );
	wp_enqueue_style( 'ainsys-forum', get_template_directory_uri() . '/assets/style/forum.css', array( 'ainsys-style' ), $asset_version );
	wp_enqueue_style( 'ainsys-custom-style-two', get_template_directory_uri() . '/assets/style/landstyles.css', array( 'ainsys-style' ), $asset_version );

	wp_enqueue_script(
		'ainsys-main-scripts',
		get_template_directory_uri() . '/assets/js/main/main.js',
		array( 'jquery' ),
		$asset_version,
		true
	);

	wp_enqueue_script(
		'ainsys-scripts',
		get_template_directory_uri() . '/assets/js/scripts/main.js',
		array( 'jquery' ),
		$asset_version,
		true
	);

	wp_enqueue_script(
		'ainsys-scripts',
		get_template_directory_uri() . '/assets-woo/js/main.js',
		array( 'jquery' ),
		$asset_version,
		true
	);

}

add_action( 'wp_enqueue_scripts', 'ainsys_enqueue_scripts' );

/**
 * Renders `<link rel="preload" href="">` tags for registered css files, for better performance.
 *
 * See:
 * https://web.dev/uses-rel-preload/
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Preloading_content
 *
 * @return void
 */
function ainsys_preload_styles() {

	/**
	 * NB: you can also preconnect to font's server in case they are not self hosted. `preconnect` or `dns-prefetch` - NOT BOTH!
	 * and they should be listed before preloading fonts, and css.
	 */
	//phpcs:ignore
	// echo '<link rel="preconnect" href="https://hello.myfonts.net" crossorigin>'.

	/**
	 * Also preloading woff2 files of fonts gives good performance gain, and mitigates font flickering.
	 * You need only woff2 file of each font's file
	 */
	// echo '<link rel="preload" href="' . esc_attr( get_template_directory_uri() ) . '/assets/fonts/font-name/font-file.woff2" as="font" type="font/woff2" crossorigin>'.

	$styles = wp_styles();

	foreach ( $styles->queue as $handle ) {

		$obj = $styles->registered[ $handle ];

		if ( null === $obj->ver ) {
			$ver = '';
		} else {
			$ver = $obj->ver ? $obj->ver : $styles->default_version;
		}

		if ( isset( $styles->args[ $handle ] ) ) {
			$ver = $ver ? $ver . '&amp;' . $styles->args[ $handle ] : $styles->args[ $handle ];
		}

		$src  = $obj->src;
		$href = $styles->_css_href( $src, $ver, $handle );
		if ( false !== strpos( $href, 'http' ) ) {
			?>
			<link rel="preload" href="<?php echo esc_attr( $href ); ?>" as="style" type="text/css" crossorigin>
			<?php
		}
	}
}

add_action( 'wp_head', 'ainsys_preload_styles', 3 );

/**
 * Outputs secured bootstrap-js tag with integrity checks, add other CDN loaded scripts here if there are any.
 *
 * @param string $tag The `<script>` tag for the enqueued script.
 * @param string $handle The script's registered handle.
 * @param string $src The script's source URL.
 *
 * @return string;
 */
function ainsys_external_scripts_integrity( $tag, $handle, $src ) {

	// add other script-handle => secured script tag here.
	$scripts = array(
		'bootstrap-js' => '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>', // phpcs:ignore
		'popper-js'    => '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>', // phpcs:ignore
	);

	// it will replace only necessary one.
	if ( isset( $scripts[ $handle ] ) ) {
		$tag = $scripts[ $handle ];
	}

	return $tag;
}

add_filter( 'script_loader_tag', 'ainsys_external_scripts_integrity', 10, 3 );


/**
 * Enqueue block editor style for Gutenberg Blocks
 */
function ainsys_block_editor_styles() {
	$asset_version = _get_asset_version();

	wp_enqueue_style( 'googlefonts', _get_fonts_loading_url(), null, $asset_version );
	wp_enqueue_style( 'sues-blocks-editor-style', get_theme_file_uri( '/assets/css/blocks-editor-style.css' ), false, $asset_version, 'all' );
	wp_enqueue_style( 'forum-style', get_template_directory_uri( '/assets/css/forum.css' ), null, $asset_version );

}

add_action( 'enqueue_block_editor_assets', 'ainsys_block_editor_styles' );
