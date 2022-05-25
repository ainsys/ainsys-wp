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


<section class="newsletter land_newsletter">
	<div class="container">
		<div class="newsletter__content">
		<div class="newsletter__important newsletter__important_wrapper">
			<p class="important_text">
		    	<?= get_field('important_text');?>
			</p>
		</div>
		<h3 class="newsletter__title">
		  <?= get_field('newsletter__title');?>
		</h3>
		<div class="newsletter__tags">
		    <?php if ( have_rows( 'tags_block' ) ) : ?>				
				<?php while ( have_rows( 'tags_block' ) ) :
					the_row();?>
					<div class="tags_block">
					<?php if ( get_sub_field( 'tag' ) ) { ?>
					<p class="tags">
						<?php the_sub_field( 'tag' ); ?>
					</p>
					<?php } ?>
				</div>	
				<?php endwhile; ?>
			<?php endif; ?>
		</div>

		<div class="form_demonstration">
		    	<?php echo do_shortcode(get_field('form')); ?>
			</div>
		</div>
	</div>
</section>