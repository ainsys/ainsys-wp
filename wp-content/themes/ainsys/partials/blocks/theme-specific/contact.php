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
						<img src="<?= get_field('email__icon');?>" alt="">

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
							<a class="contacts__button btn-primary" href="<?= get_field('url_button');?>" onclick="ym(86987238,'reachGoal','button_4'); return true;"
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
                            <?= get_field('map');?>
			
			</div>
			</div>

		</div>
	</div>
</section>