<?php
/**
 * Land newsletter.
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

<section class="steps">
          <div class="container">
            <p class="page__podtitle">
			<?= get_field('podtitle');?>
            </p>
            <h2 class="landing__title">
			<?= get_field('title');?>
            </h2>
            <div class="steps__slider">
			<?php if ( have_rows( 'steps__slide' ) ) : ?>				
				<?php while ( have_rows( 'steps__slide' ) ) :
					the_row();?>

					<div class="steps__slide">
						<div class="steps__content">
						    <?php if ( get_sub_field( 'steps__img' ) ) { ?>
							  <div class="steps__img">
						         <img src="<?= the_sub_field('steps__img');?>" alt="">
							  </div>  
                            <?php } ?>
							<div class="steps__info">
								<?php if ( get_sub_field( 'steps__number' ) ) { ?>
									<p class="steps__number">
									    <?php the_sub_field( 'steps__number' ); ?>
									</p>
								<?php } ?>
								<?php if ( get_sub_field( 'steps__title' ) ) { ?>
									<p class="steps__title">
									    <?php the_sub_field( 'steps__title' ); ?>
									</p>
								<?php } ?>
								<?php if ( get_sub_field( 'steps__text' ) ) { ?>
									<p class="steps__text">
									    <?php the_sub_field( 'steps__text' ); ?>
									</p>
								<?php } ?>
							</div>
						</div>
					</div>	
				<?php endwhile; ?>
			<?php endif; ?>
            </div>
              
            </div>
          </div>
      </section>