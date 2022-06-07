<?php
/**
 * Default page template.
 *
 * @package ainsys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }

get_header();

the_post();
?>

<div class="content">
	<div class="container">
		<?php the_content(); ?>
	</div>
</div>

<?php

if($lang == 'en_US') {

    get_footer('us');
} elseif ($lang == 'es_ES') {

    get_footer('es');
} elseif ($lang == 'uk') {

    get_footer('ua');
} elseif($lang == 'ru_RU') {

    get_footer();
} else {

    get_footer();
}



