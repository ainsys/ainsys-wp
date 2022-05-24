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


<section class="main__landing">
          <div class="container">
              <h1>
			  <?= get_field('title');?>
              </h1>
              <div class="page__content">
                  <div class="page__info">
                      <ul class="list">
					  <?php if ( have_rows( 'list_item' ) ) : ?>
						<?php
							while ( have_rows( 'list_item' ) ) :
								the_row();?>
						<li class="list_item">

							<?php if ( get_sub_field( 'list_item_text' ) ) { ?>
								<span>
									<?php the_sub_field( 'list_item_text' ); ?>
								</span>
							<?php } ?>

						  </li>
						  <?php endwhile; ?>
						<?php endif; ?>
                      </ul>
                  </div>
                  <div class="page__form">
                      <form class="form">
                          <p class="form__title">
						    <?= get_field('form__title');?>
                          </p>
                          <div class="form__inputs">
                              <input class="form__input" name="name" type="text" placeholder="Ваше имя">
                              <input class="form__input" name="last_name" type="text" placeholder="Ваша фамилия">
                              <input class="form__input" name="email" type="email" placeholder="E-mail">
                              <input class="form__input" name="phone" type="phone" placeholder="+7 (___) ___-__-__">
                          </div>
                          <button class="btn form__btn">Получить бесплатный месяц работы</button>
                          <div class="form__accept">
                              <input id="form_acc" type="checkbox" class="form__checkbox">
                              <label for="form_acc"></label>
                              <span>Я принимаю условия политики конфиденциальности</span>
                          </div>
                      </form>
                  </div>
              </div>

              <div class="main__bottom">
                <ul class="benefits">
				<?php if ( have_rows( 'advantages' ) ) : ?>
					<?php
							while ( have_rows( 'advantages' ) ) :
								the_row();
								?>
					<li class="benefits__item col-lg-4 col-6">

						  <?php if ( get_sub_field( 'image' ) ) { ?>
							    <div class="adv__img">
									<img src="<?= the_sub_field('image');?>" alt="">
								</div>
							<?php } ?>
							<?php if ( get_sub_field( 'text' ) ) { ?>
							    <p class="advantages__text">
									<?php the_sub_field( 'text' ); ?>
							    </p>
							<?php } ?>
							<div class="advantages__item__dop">
							<ul>
							<?php if ( get_sub_field( 'tooltip' ) ) { ?>
							    <li>
							    	<?= get_sub_field('tooltip');?>
								</li>
							<?php } ?>
							</ul>
						  </div>
						  </li>
						  <?php endwhile; ?>
						<?php endif; ?>
                  </ul>
              </div>
          </div>
      </section>