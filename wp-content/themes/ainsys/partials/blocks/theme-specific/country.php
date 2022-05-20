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

<div id="counrty" class="counrty">
	<div class="container">
		<div class="counrty_content">
		<p class="counrty_text">
			<?= get_field('counrty_text');?>
		</p>
		<div class="country_select">
			<a href="/en-us/" class="submenu__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/lang__usa.svg" class="lang__img me-sm-2" alt="">English</a>
			<ul class="country__lang__submenu">
				<li>
					<a href="/ua/" class="submenu__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/lang__urk.svg" class="lang__img me-sm-2" alt="">Українська</a>
				</li>
				<li>
					<a href="/ua-ru/" class="submenu__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/lang__urk.svg" class="lang__img me-sm-2" alt="">Русский</a>
				</li>
				<li>
					<a href="/ru-ru/" class="submenu__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/lang__ru.svg" class="lang__img me-sm-2" alt="">Русский</a>
				</li>
				<li>
					<a href="/en-us/" class="submenu__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/lang__usa.svg" class="lang__img me-sm-2" alt="">English</a>
				</li>
				<li>
					<a href="/en-gb/" class="submenu__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/333.svg" class="lang__img me-sm-2" alt="">English</a>
				</li>
				<li>
					<a href="/en-ca/" class="submenu__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/222.svg" class="lang__img me-sm-2" alt="">English</a>
				</li>
				<li>
					<a href="/en-eu/" class="submenu__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/444.svg" class="lang__img me-sm-2" alt="">English</a>
				</li>
			</ul>
		</div>
		<button class="btn counrty_btn">
		<?= get_field('counrty_btn');?>
		</button>
		<div class="country_close"></div>
		</div>
    </div>
</div>