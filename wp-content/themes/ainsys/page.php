<?php
/**
 * Default page template.
 *
 * @package ainsys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }
$lang = get_locale();
//var_dump($lang);
if($lang == 'en_US') {
    get_header('us');
} elseif ($lang == 'es_ES') {
    get_header('es');
} elseif ($lang == 'uk') {
    get_header('ua');
} elseif($lang == 'ru_RU') {
    get_header();
} else {
    get_header('us');
}




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

    get_footer('us');
}



