<?php
/**
 * Default page template.
 *
 * @package ainsys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }
$lang = get_bloginfo("language");
//var_dump($lang);
if($lang = 'ru-RU') {
    get_header();
} elseif ($lang = 'es_ES') {
    get_header('es');
} elseif ($lang = 'uk') {
    get_header('ua');
} else {
    get_header('us');
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
