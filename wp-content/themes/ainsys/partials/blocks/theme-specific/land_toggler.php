<?php
/**
 * Land toggler.
 *
 * @package ainsys
 */

$block_id = 'img-txt-ul' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

$class_name = 'img-txt-ul';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}
if ( get_field( 'bg' ) ) {
	$class_name .= ' bg-color-' . get_field( 'bg' );
}
if ( get_field( 'align' ) ) {
	$class_name .= ' img-align-' . get_field( 'align' );
}
?>

<section class="benefits">
    <div class="container">
				<p class="page__podtitle">
				  <?= get_field('podtitle');?>
				</p>
				<h2 class="landing__title">
			    	<?= get_field('title');?>
			    </h2>
              <div class="page__content">
				<div class="page__img">
			    	<img src="<?= get_field('toggler_image');?>" alt="">
				</div>
				<div class="page__info">
					<?php if ( get_sub_field( 'quest' ) ) { ?>
						<p class="benefits__quest">
						<?php the_sub_field( 'quest' ); ?>
						</p>
					<?php } ?>
					<?php if ( get_sub_field( 'toggler__title' ) ) { ?>
						<p class="benefits__title">
					    	<?php the_sub_field( 'toggler__title' ); ?>
						</p>
					<?php } ?>
					<?php if ( get_sub_field( 'toggler__text' ) ) { ?>
						<p class="benefits__text">
						    <?php the_sub_field( 'toggler__text' ); ?>
						</p>
					<?php } ?>

					<ul class="benefits__list">
					<?php if ( have_rows( 'toggler__item' ) ) : ?>
						<li class="benefits__item">						
                      <?php while ( have_rows( 'toggler__item' ) ) :
                          the_row();?>

						   <?php if ( get_sub_field( 'toggler_item_text' ) ) { ?>
							<p class="toggler_text">
							  <?php the_sub_field( 'toggler_item_text' ); ?>
							</p>
                            <?php } ?>

                            <?php if ( get_sub_field( 'toggler_item_img' ) ) { ?>
						      <img src="<?= the_sub_field('toggler_item_img');?>" alt="">
                            <?php } ?>
                            </li>
						<?php endwhile; ?>
					<?php endif; ?>
				</ul>
            </div>
        </div>
    </div>
</section>
