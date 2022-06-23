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
	$class_name .= ' benefits-' . get_field( 'align' );
}
?>


<section id="<?php echo esc_attr( $block_id ); ?>" class="benefits benefits_block <?php echo esc_attr( $class_name ); ?>">
    <div class="container">
	            <?php if ( get_field( 'podtitle' ) ) { ?>
	              	<p class="page__podtitle">
				       <?= get_field('podtitle');?>
				    </p>
				<?php } ?>
				<?php if ( get_field( 'title' ) ) { ?>
					<h2 class="landing__title">
			    	<?= get_field('title');?>
			    </h2>
				<?php } ?>
              <div class="page__content">
				<div class="page__info">
						<p class="benefits__quest">
						  <?= get_field('benefits__quest');?>
						</p>
						<p class="benefits__title">
						  <?= get_field('benefits__title');?>
						</p>
						<p class="benefits__text">
						  <?= get_field('benefits__text');?>
						</p>

					<ul class="benefits__list">
					<?php if ( have_rows( 'benefits__item' ) ) : ?>				
                      <?php while ( have_rows( 'benefits__item' ) ) :
                          the_row();?>
						 <li class="benefits__item">	 
                            <?php if ( get_sub_field( 'toggler_item_img' ) ) { ?>
						      <img src="<?= the_sub_field('toggler_item_img');?>" alt="">
                            <?php } ?>
						   <?php if ( get_sub_field( 'toggler_item_text' ) ) { ?>
							<p class="toggler_text">
							  <?php the_sub_field( 'toggler_item_text' ); ?>
							</p>
                            <?php } ?>
                            </li>
						<?php endwhile; ?>
					<?php endif; ?>
				    </ul>
					<?php if ( get_field( 'bentfits_important' ) ) { ?>
						<div class="bentfits_important">
						  <?= get_field('bentfits_important');?>
					</div>
					<?php } ?>
					<?php if ( get_field( 'bentfits_btn' ) ) { ?>
						<a href="=<?= get_field('bentfits_btn_url');?>" class=" btn wp-block-button__link bentfits_btn">
						  <?= get_field('bentfits_btn');?>
					    </a>
					<?php } ?>
                 </div>
			<div class="page__img">
			    	<img src="<?= get_field('toggler_image');?>" alt="">
				</div>
        </div>
    </div>
</section>
