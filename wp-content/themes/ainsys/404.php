<?php
/**
 *  404 page template
 *
 * @package sues
 */

$subtitle404 = get_field( 'error404_subtitle', 'option' ) ? get_field( 'error404_subtitle', 'option' ) : '404 error';
$title404    = get_field( 'error404_title', 'option' ) ? get_field( 'error404_title', 'option' ) : 'Page Not Found';

get_header(); ?>

<div class="error-404__wrapper">
	<div class="container">
		<div class="error-404">
			<div class="error-404__subtitle"><?php echo esc_html( $subtitle404 ); ?></div>
			<h1 class="error-404__title"><?php echo esc_html( $title404 ); ?></h1>

		</div>
	</div>
</div>

<?php get_footer(); ?>
