<?php
/**
 * Error.
 *
 * @package ainsys
 */

$block_id = 'error-' . $block['id'];
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

?>

<section id="error" class="error 404">
    <div class="container">
        <div class="error_wrapper">
            <div class="error_wrapper_info">
                <img class="error_wrapper_info_img" src="<?= get_field('error_image');?>" alt="error">
                <h1 class="error_wrapper_info_title">
                    <?= get_field('info_title');?>
                </h1>
                <p class="error_wrapper_info_text">
                    <?= get_field('info_text');?> <a href="<?= get_field('info_href');?>"><?= get_field('info_href_text');?></a>
                </p>
            </div>
            <div class="error_wrapper_img">
                <img src="<?= get_field('error_bg');?>" alt="error">
            </div>
        </div>
    </div>
</section>