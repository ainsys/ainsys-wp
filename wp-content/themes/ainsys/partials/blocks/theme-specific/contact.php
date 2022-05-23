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

<section class="contacts">
	<div class="container">
		<p class="page__podtitle">
		    <?= get_field('podtitle');?>
		</p>
		<h2 class="contacts__title">
			<?= get_field('title');?>
		</h2>

		<div class='page__content'>
			<div class="page__info">
				<ul class="contacts__list">
					<li class="contacts__item">
						<div class="contacts__img">
						<img src="<?= get_field('image__email');?>" alt="email">
						</div>
						<div class="contacts__item__info">
							<p class="contacts__title">
								<?= get_field('email__title');?>
							</p>
							<p class="contacts__text">
								<?= get_field('email__text');?>
							</p>
							<div class="numbers__phone numbers__phone-disabled">
						<img src="<?= get_field('email__icon');?>" alt="usa">

						<a href="email: info@ainsys.com" class="numbers__email"><?= get_field('email_contact');?>
							<div class="disabled__block"></div>
						</a>
					</div>
						</div>
					</li>
					<li class="contacts__item">
						<div class="contacts__img">
							<img src="<?= get_field('image__office');?>" alt="office">
						</div>
						<div class="contacts__item__info">
							<p class="contacts__title">
							    <?= get_field('office__title');?>
							</p>
							<a class="contacts__button btn-primary" href='https://ainsys.com/order-ainsys/' onclick="ym(86987238,'reachGoal','button_4'); return true;"
> <?= get_field('button');?> </a>
							<div class="numbers__map">
								<img src="<?= get_field('office__icon');?>" alt="usa">
								<a href="" class="socails__addres"><?= get_field('office_contact');?></a>
							</div>
						</div>
					</li>
					<li class="contacts__item">
						<div class="contacts__img">
							<img src="<?= get_field('image__phone');?>" alt="phone">
						</div>
						<div class="contacts__item__info">
							<p class="contacts__title">
								<?= get_field('phone__title');?>
							</p>
							<p class="contacts__text">
								<?= get_field('phone__text');?>
							</p>
					<div class="numbers__phone numbers__phone-disabled">
						<img src="<?= get_field('img');?>" alt="ru">
						<a href="tel: +78126027880" class="soc_href disabled"><?= get_field('phone');?>
						<div class="disabled__block"></div>
						</a>
					</div> 
					
						</div>
					</li>
				</ul>
			</div>	
			
			<div class="map">
			<div class="contacts__map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2245.5373182321127!2d37.6805551160886!3d55.74916769973951!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54abe4351e149%3A0xbbd53e7baa61975!2z0YPQuy4g0JfQvtC70L7RgtC-0YDQvtC20YHQutC40Lkg0JLQsNC7LCAzNCDRgdGC0YDQvtC10L3QuNC1IDYsINCc0L7RgdC60LLQsCwg0KDQvtGB0YHQuNGPLCAxMTEwMzM!5e0!3m2!1sru!2ses!4v1652391776313!5m2!1sru!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			</div>

		</div>
	</div>
</section>