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
    get_header();
}



the_post();
?>

<div class="content">
	<div class="container">
		<?php the_content(); ?>
	</div>
</div>

<?php

get_footer();
