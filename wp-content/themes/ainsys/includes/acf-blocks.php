<?php
/**
 *  Place all ACF powered blocks definitions here.
 *
 * @package ainsys
 */

/**
 * Registers ACF blocks.
 */
function ainsys_register_acf_block_types() {

	acf_register_block_type(
		array(
			'name'            => 'fixed-width',
			'title'           => __( 'Fixed Width' ),
			'description'     => __( 'Fixed width content (wysiwyg)' ),
			'render_template' => 'partials/blocks/common/fixed-width.php',
			'category'        => 'formatting',
			'keywords'        => array( 'common', 'content', 'fixed', 'width' ),
			'icon'            => 'fullscreen-exit-alt',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'full-width',
			'title'           => __( 'Full Width' ),
			'description'     => __( 'Full width content for posts.' ),
			'render_template' => 'partials/blocks/common/full-width.php',
			'category'        => 'formatting',
			'keywords'        => array( 'common', 'content', 'full', 'width' ),
			'icon'            => 'fullscreen-alt',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'pre-heading',
			'title'           => __( 'Pre-heading' ),
			'description'     => __( 'Text above a Heading' ),
			'render_template' => 'partials/blocks/common/pre-heading.php',
			'category'        => 'formatting',
			'keywords'        => array( 'pre-heading', 'preheading' ),
			'mode'            => 'auto',
			'icon'            => 'heading',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'hero',
			'title'           => __( 'Hero' ),
			'description'     => __( 'Hero' ),
			'render_template' => 'partials/blocks/common/hero.php',
			'category'        => 'customgb',
			'keywords'        => array( 'hero' ),
			'mode'            => 'preview',
			'icon'            => 'cover-image',
			'supports'        => array(
				'mode'            => false,
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'page-header',
			'title'           => __( 'Page Header' ),
			'description'     => __( 'Page Header' ),
			'render_template' => 'partials/blocks/common/page-header.php',
			'category'        => 'customgb',
			'keywords'        => array( 'page header', 'header' ),
			'icon'            => 'heading',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'cta',
			'title'           => __( 'CTA' ),
			'description'     => __( 'CTA' ),
			'render_template' => 'partials/blocks/common/cta.php',
			'category'        => 'customgb',
			'keywords'        => array( 'cta' ),
			'icon'            => 'megaphone',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'audio',
			'title'           => __( 'Audio Button' ),
			'description'     => __( 'Audio Button' ),
			'render_template' => 'partials/blocks/common/audio.php',
			'category'        => 'customgb',
			'keywords'        => array( 'autio' ),
			'icon'            => 'embed-audio',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'accordion',
			'title'           => __( 'Accordion' ),
			'description'     => __( 'Accordion' ),
			'render_template' => 'partials/blocks/common/accordion.php',
			'category'        => 'customgb',
			'keywords'        => array( 'accordion' ),
			'icon'            => 'menu-alt',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'tabs',
			'title'           => __( 'Tabs' ),
			'description'     => __( 'Tabs' ),
			'render_template' => 'partials/blocks/common/tabs.php',
			'category'        => 'customgb',
			'keywords'        => array( 'tabs' ),
			'icon'            => 'admin-page',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'tab',
			'title'           => __( 'Tab' ),
			'description'     => __( 'Tab' ),
			'render_template' => 'partials/blocks/common/tab.php',
			'category'        => 'customgb',
			'keywords'        => array( 'tab' ),
			'parent'          => array(
				'acf/tabs',
			),
			'icon'            => 'media-default',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'slider',
			'title'           => __( 'Slider' ),
			'description'     => __( 'Slider' ),
			'render_template' => 'partials/blocks/common/slider.php',
			'category'        => 'customgb',
			'keywords'        => array( 'slider' ),
			'icon'            => 'format-gallery',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'slider-slide',
			'title'           => __( 'Slide' ),
			'description'     => __( 'Slide used inside slider block' ),
			'render_template' => 'partials/blocks/common/slider-slide.php',
			'category'        => 'customgb',
			'keywords'        => array( 'slide' ),
			'mode'            => 'preview',
			'parent'          => array(
				'acf/slider',
			),
			'icon'            => 'images-alt2',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'video-text',
			'title'           => __( 'Video & Text' ),
			'description'     => __( 'Video & Text' ),
			'render_template' => 'partials/blocks/common/video-text.php',
			'category'        => 'customgb',
			'keywords'        => array( 'video', 'text' ),
			'icon'            => 'video-alt3',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'video',
			'title'           => __( 'Custom Video' ),
			'description'     => __( 'Video' ),
			'render_template' => 'partials/blocks/common/video.php',
			'category'        => 'customgb',
			'keywords'        => array( 'video', 'text' ),
			'icon'            => 'video-alt3',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'img-txt',
			'title'           => __( 'Image & Text' ),
			'description'     => __( 'Image & Text' ),
			'render_template' => 'partials/blocks/common/img-txt.php',
			'category'        => 'customgb',
			'keywords'        => array( 'image', 'text' ),
			'icon'            => 'align-right',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'full-width-img-txt',
			'title'           => __( 'Full-Width Image&Text' ),
			'description'     => __( 'Full-Width Image&Text' ),
			'render_template' => 'partials/blocks/common/full-width-img-txt.php',
			'category'        => 'customgb',
			'keywords'        => array( 'image', 'text' ),
			'icon'            => 'align-right',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'text-bg',
			'title'           => __( 'Text Block' ),
			'description'     => __( 'Text on Colored Background' ),
			'render_template' => 'partials/blocks/common/text-bg.php',
			'category'        => 'customgb',
			'keywords'        => array( 'image', 'text' ),
			'icon'            => 'align-right',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'page-nav',
			'title'           => __( 'In-Page Navigation' ),
			'description'     => __( 'In-Page Navigation' ),
			'render_template' => 'partials/blocks/common/page-nav.php',
			'category'        => 'customgb',
			'keywords'        => array( 'navigation', 'menu' ),
			'icon'            => 'editor-ul',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'hero-video',
			'title'           => __( 'Hero Video' ),
			'description'     => __( 'Hero block with video' ),
			'render_template' => 'partials/blocks/theme-specific/hero-video.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'hero', 'video' ),
			'icon'            => 'cover-image',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'advantages',
			'title'           => __( 'Advantages' ),
			'description'     => __( 'Advantages' ),
			'render_template' => 'partials/blocks/theme-specific/advantages.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'advantages' ),
			'icon'            => 'cover-image',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'servises',
			'title'           => __( 'Servises' ),
			'description'     => __( 'Servises' ),
			'render_template' => 'partials/blocks/theme-specific/servises.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'servises' ),
			'icon'            => 'cover-image',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'toggler',
			'title'           => __( 'Toggler' ),
			'description'     => __( 'Toggler' ),
			'render_template' => 'partials/blocks/theme-specific/toggler.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'toggler' ),
			'icon'            => 'cover-image',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'rates',
			'title'           => __( 'Rates' ),
			'description'     => __( 'Rates' ),
			'render_template' => 'partials/blocks/theme-specific/rates.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'rates' ),
			'icon'            => 'cover-image',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'rate_page',
			'title'           => __( 'Rate_page' ),
			'description'     => __( 'Rate_page' ),
			'render_template' => 'partials/blocks/theme-specific/rate_page.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'rate_page' ),
			'icon'            => 'cover-image',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);
	

	acf_register_block_type(
		array(
			'name'            => 'img-txt-ul',
			'title'           => __( 'Image & Text with ul' ),
			'description'     => __( 'Image & Text with ul' ),
			'render_template' => 'partials/blocks/theme-specific/img-txt-ul.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'image', 'text' ),
			'icon'            => 'cover-image',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);
	acf_register_block_type(
		array(
			'name'            => 'possibility',
			'title'           => __( 'Possibility Block' ),
			'description'     => __( 'Possibility Block' ),
			'render_template' => 'partials/blocks/theme-specific/possibility.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'subscribe', 'text' ),
			'icon'            => 'bell',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);
	
	acf_register_block_type(
		array(
			'name'            => 'contact',
			'title'           => __( 'Contact Block' ),
			'description'     => __( 'Contact Block' ),
			'render_template' => 'partials/blocks/theme-specific/contact.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'contact' ),
			'icon'            => 'bell',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'coockie',
			'title'           => __( 'Coockie Block' ),
			'description'     => __( 'Coockie Block' ),
			'render_template' => 'partials/blocks/theme-specific/coockie.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'coockie' ),
			'icon'            => 'bell',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'Docs block',
			'title'           => __( 'Docs block' ),
			'description'     => __( 'Docs block' ),
			'render_template' => 'partials/blocks/theme-specific/documentation.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'documentation' ),
			'icon'            => 'bell',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'Landing main',
			'title'           => __( 'Landing main' ),
			'description'     => __( 'Landing main' ),
			'render_template' => 'partials/blocks/theme-specific/land_main.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'land_main' ),
			'icon'            => 'bell',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'Landing promo',
			'title'           => __( 'Landing promo' ),
			'description'     => __( 'Landing promo' ),
			'render_template' => 'partials/blocks/theme-specific/land_promo.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'land_promo' ),
			'icon'            => 'bell',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'Landing toggler',
			'title'           => __( 'Landing toggler' ),
			'description'     => __( 'Landing toggler' ),
			'render_template' => 'partials/blocks/theme-specific/land_toggler.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'land_toggler' ),
			'icon'            => 'bell',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'Landing newsletter',
			'title'           => __( 'Landing newsletter' ),
			'description'     => __( 'Landing newsletter' ),
			'render_template' => 'partials/blocks/theme-specific/land_newsletter.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'land_newsletter' ),
			'icon'            => 'bell',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'Landing slider',
			'title'           => __( 'Landing slider' ),
			'description'     => __( 'Landing slider' ),
			'render_template' => 'partials/blocks/theme-specific/land_slider.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'land_slider' ),
			'icon'            => 'bell',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'Promo',
			'title'           => __( 'Promo' ),
			'description'     => __( 'Promo' ),
			'render_template' => 'partials/blocks/theme-specific/promo.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'promo' ),
			'icon'            => 'bell',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

    acf_register_block_type(
        array(
            'name'            => 'Post Slider',
            'title'           => __( 'Post Slider' ),
            'description'     => __( 'Post Slider' ),
            'render_template' => 'partials/blocks/theme-specific/post-slider.php',
            'mode'            => 'edit',
            'category'        => 'customgb',
            'keywords'        => array( 'post, slider, post-slider' ),
            'icon'            => 'images-alt',
            'supports'        => array(
                'align'           => false,
                'anchor'          => true,
                'customClassName' => true,
                'jsx'             => false,
            ),
        )
    );

    acf_register_block_type(
        array(
            'name'            => 'Content-blocks Slider',
            'title'           => __( 'Content Blocks Slider' ),
            'description'     => __( 'Content Blocks Slider' ),
            'render_template' => 'partials/blocks/theme-specific/content-block-slider.php',
            'mode'            => 'edit',
            'category'        => 'customgb',
            'keywords'        => array( 'post, slider, post-slider' ),
            'icon'            => 'images',
            'supports'        => array(
                'align'           => false,
                'anchor'          => true,
                'customClassName' => true,
                'jsx'             => false,
            ),
        )
    );

	acf_register_block_type(
        array(
            'name'            => 'Error block',
            'title'           => __( 'Error block' ),
            'description'     => __( 'Error block' ),
            'render_template' => 'partials/blocks/theme-specific/error.php',
            'mode'            => 'edit',
            'category'        => 'customgb',
            'keywords'        => array( 'error, block' ),
            'icon'            => 'images',
            'supports'        => array(
                'align'           => false,
                'anchor'          => true,
                'customClassName' => true,
                'jsx'             => false,
            ),
        )
    );

	acf_register_block_type(
        array(
            'name'            => 'Jobs main',
            'title'           => __( 'Jobs main' ),
            'description'     => __( 'Jobs main' ),
            'render_template' => 'partials/blocks/theme-specific/jobs_main.php',
            'mode'            => 'edit',
            'category'        => 'customgb',
            'keywords'        => array( 'jobs, main' ),
            'icon'            => 'images',
            'supports'        => array(
                'align'           => false,
                'anchor'          => true,
                'customClassName' => true,
                'jsx'             => false,
            ),
        )
    );

	acf_register_block_type(
        array(
            'name'            => 'Jobs reasosns',
            'title'           => __( 'Jobs reasosns' ),
            'description'     => __( 'Jobs reasosns' ),
            'render_template' => 'partials/blocks/theme-specific/jobs_reasons.php',
            'mode'            => 'edit',
            'category'        => 'customgb',
            'keywords'        => array( 'jobs, reasosns' ),
            'icon'            => 'images',
            'supports'        => array(
                'align'           => false,
                'anchor'          => true,
                'customClassName' => true,
                'jsx'             => false,
            ),
        )
    );

	acf_register_block_type(
        array(
            'name'            => 'Jobs vacantes',
            'title'           => __( 'Jobs vacantes' ),
            'description'     => __( 'Jobs vacantes' ),
            'render_template' => 'partials/blocks/theme-specific/jobs_vacantes.php',
            'mode'            => 'edit',
            'category'        => 'customgb',
            'keywords'        => array( 'jobs, vacantes' ),
            'icon'            => 'images',
            'supports'        => array(
                'align'           => false,
                'anchor'          => true,
                'customClassName' => true,
                'jsx'             => false,
            ),
        )
    );

	acf_register_block_type(
        array(
            'name'            => 'Beta',
            'title'           => __( 'Beta' ),
            'description'     => __( 'Beta' ),
            'render_template' => 'partials/blocks/theme-specific/beta.php',
            'mode'            => 'edit',
            'category'        => 'customgb',
            'keywords'        => array( 'beta' ),
            'icon'            => 'images',
            'supports'        => array(
                'align'           => false,
                'anchor'          => true,
                'customClassName' => true,
                'jsx'             => false,
            ),
        )
    );
		
	acf_register_block_type(
		array(
			'name'            => 'developers',
			'title'           => __( 'developers' ),
			'description'     => __( 'developers' ),
			'render_template' => 'partials/blocks/theme-specific/developers.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'developers' ),
			'icon'            => 'images',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'partners',
			'title'           => __( 'partners' ),
			'description'     => __( 'partners' ),
			'render_template' => 'partials/blocks/theme-specific/partners.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'partners' ),
			'icon'            => 'images',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'first',
			'title'           => __( 'first' ),
			'description'     => __( 'first' ),
			'render_template' => 'partials/blocks/theme-specific/first.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'first' ),
			'icon'            => 'images',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'Scroll services',
			'title'           => __( 'Scroll services' ),
			'description'     => __( 'Scroll services' ),
			'render_template' => 'partials/blocks/theme-specific/scroll_services.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'Scroll services' ),
			'icon'            => 'images',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'Scroll bundles',
			'title'           => __( 'Scroll bundles' ),
			'description'     => __( 'Scroll bundles' ),
			'render_template' => 'partials/blocks/theme-specific/scroll_bundles.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'Scroll bundles' ),
			'icon'            => 'images',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'Reviews',
			'title'           => __( 'Reviews' ),
			'description'     => __( 'Reviews' ),
			'render_template' => 'partials/blocks/theme-specific/reviews.php',
			'mode'            => 'edit',
			'category'        => 'customgb',
			'keywords'        => array( 'reviews' ),
			'icon'            => 'images',
			'supports'        => array(
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => false,
			),
		)
	);

}

// Check if function exists and hook into setup.
if ( function_exists( 'acf_register_block_type' ) ) {
	add_action( 'acf/init', 'ainsys_register_acf_block_types' );
}