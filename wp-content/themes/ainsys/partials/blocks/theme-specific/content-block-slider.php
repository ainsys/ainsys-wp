<?php
/**
 * Posts Slider block.
 *
 * @package ainsys
 */

$block_id = 'content-block-slider-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
    $block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'content-block-slider';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}


if(have_rows('slider_item')):?>
<div class="slick-slider__wrapper slider">

    <div class="slick-slider-register">

        <?php while(have_rows('slider_item')): the_row();

           $title = get_sub_field( 'title' );
           $subtitle = get_sub_field( 'subtitle' );
           $content = get_sub_field('content');
           $img = get_sub_field('img');

           if(!empty($img)) {
               $icon_url = $img['url'];
           } else {
               $icon_url = get_stylesheet_directory_uri().'/assets/images/components/icon-light.svg';
           }
        ?>
            <div class="slick-slider__item">

                <img src="<?php echo $icon_url; ?>">

                <?php if($subtitle) {
                    echo '<p class="slick-slider__item__subtitle">'.$subtitle.'</p>';
                }

                if($title) {
                    echo '<h3 class="slick-slider__item__title">'.$title.'</h3>';
                }

                if($content) {
                    echo $content;
                }
                ?>

            </div>
        <?php endwhile; ?>
    </div>
    <div class="slick-controls">
        <div class="slick-prev"></div>
        <div class="slick-next"></div>
    </div>
</div>

<?php endif; ?>
