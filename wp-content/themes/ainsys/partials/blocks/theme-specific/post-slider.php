<?php
/**
 * Posts Slider block.
 *
 * @package ainsys
 */

$block_id = 'post-slider-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
    $block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'posts-slider';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

$slider_posts = get_field('slider_posts');
if($slider_posts):?>
<div class="slick-slider__wrapper slider">
    <div class="slick-slider-posts">
        <?php foreach( $slider_posts as $slider_post  ):
        //setup_postdata($post);
        $author_avatar_url = get_avatar_url( $slider_post, array(
                'size' => 40,
                'default'=>'identicon',
        ) );
        $permalink = get_permalink( $slider_post->ID );
        $title = get_the_title( $slider_post->ID );
        $excerpt = get_the_excerpt( $slider_post->ID );
        $author_id=$slider_post->post_author;
        $post_image = get_the_post_thumbnail_url( $slider_post->ID, 'slider-thumb' );
        ?>
            <div class="slick-slider__item">
                <div class="slick-slider__item__left">
                    <img src = "<?php echo $post_image ?>" alt="post image">
                </div>
                <div class="slick-slider__item__right">
                    <span class="slick-slider__item__time">
                        8 минут чтения
                    </span>
                    <a class="slick-slider__item__title" href="<?php echo $permalink; ?>"><?php echo $title; ?></a>
                    <div class="slick-slider__item__excerpt">
                        <?php the_excerpt_max_charlength(70,$excerpt) ?>
                    </div>
                    <div class="slick-slider__item__meta">
                        <div class="slick-slider__author__avatar">
                            <img src="<?php echo $author_avatar_url; ?>" alt="author avatar">
                        </div>
                        <div class="slick-slider__author__right">
                            <p class="slick-slider__author__name"><?php echo get_the_author_meta('display_name', $author_id); ?></p>
                            <p class="slick-slider__author__date"><?php the_time('j M Y'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="slick-controls">
        <div class="slick-prev"></div>
        <div class="slick-next"></div>
    </div>
</div>

<?php endif; ?>
