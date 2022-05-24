<?php
/**
 * Search customization.
 *
 * @package ainsys
 */

// ajax поиск по сайту.
add_action( 'wp_ajax_nopriv_codyshop_ajax_search', 'codyshop_ajax_search' );
add_action( 'wp_ajax_codyshop_ajax_search', 'codyshop_ajax_search' );
function codyshop_ajax_search() {
	$args  = array(
		'post_type'      => 'product',
		'post_status'    => 'publish',
		'order'          => 'DESC',
		'orderby'        => 'date',
		's'              => $_POST['term'],
		'posts_per_page' => 5,
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			global $product
			?>
<li class="js-item-search-reg-form">
			<?php
			if ( ! empty( $codyshop_url ) ) {
					the_post_thumbnail( 'cart-thumb' );
			} else {
				?>
		<?php } ?>
			<?php the_post_thumbnail( 'cart-thumb' ); ?>
<a href="#"><?php the_title(); ?><span class="plus">+</span></a>
</li>
			<?php
		}
	} else {
		?>
<li><a href="#">Ничего не найдено, попробуйте другой запрос</a></li>
		<?php
	} exit;
}


add_action( 'pre_get_posts', 'cody_search_filter' );
function cody_search_filter( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		if ( $query->is_search ) {
			$query->set( 'sentence', 1 );
		}
	}
}


add_filter( 'posts_search', 'cody_search_only_in_title', 500, 2 );
function cody_search_only_in_title( $search, $wp_query ) {
	global $wpdb;
	if ( empty( $search ) ) {
		return $search;
	}
	$q      = $wp_query->query_vars;
	$n      = ! empty( $q['exact'] ) ? '' : '%';
	$search = $searchand = '';
	foreach ( (array) $q['search_terms'] as $term ) {
		$term      = esc_sql( $wpdb->esc_like( $term ) );
		$search   .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
		$searchand = ' AND ';
	}
	if ( ! empty( $search ) ) {
		$search = " AND ({$search}) ";
		if ( ! is_user_logged_in() ) {
			$search .= " AND ($wpdb->posts.post_password = '') ";
		}
	}
	return $search;
}


add_filter( 'posts_results', 'cody_search_cir_lat', 10, 2 );
function cody_search_cir_lat( $posts, $query ) {

	if ( is_admin() || ! $query->is_search ) {
		return $posts;
	}

	global $wp_query;

	if ( $wp_query->found_posts == 0 ) {

		// замена латиницы на кириллицу
		$letters = array(
			'f'  => 'а',
			','  => 'б',
			'd'  => 'в',
			'u'  => 'г',
			'l'  => 'д',
			't'  => 'е',
			'`'  => 'ё',
			';'  => 'ж',
			'p'  => 'з',
			'b'  => 'и',
			'q'  => 'й',
			'r'  => 'к',
			'k'  => 'л',
			'v'  => 'м',
			'y'  => 'н',
			'j'  => 'о',
			'g'  => 'п',
			'h'  => 'р',
			'c'  => 'с',
			'n'  => 'т',
			'e'  => 'у',
			'a'  => 'ф',
			'['  => 'х',
			'w'  => 'ц',
			'x'  => 'ч',
			'i'  => 'ш',
			'o'  => 'щ',
			']'  => 'ъ',
			's'  => 'ы',
			'm'  => 'ь',
			'\'' => 'э',
			'.'  => 'ю',
			'z'  => 'я',
		);

		$cir        = array( 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', 'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я' );
		$lat        = array( 'f', ',', 'd', 'u', 'l', 't', '`', ';', 'p', 'b', 'q', 'r', 'k', 'v', 'y', 'j', 'g', 'h', 'c', 'n', 'e', 'a', '[', 'w', 'x', 'i', 'o', ']', 's', 'm', '\'', '.', 'z', 'F', ',', 'D', 'U', 'L', 'T', '`', ';', 'P', 'B', 'Q', 'R', 'K', 'V', 'Y', 'J', 'G', 'H', 'C', 'N', 'E', 'A', '[', 'W', 'X', 'I', 'O', ']', 'S', 'M', '\'', '.', 'Z' );
		$new_search = str_replace( $lat, $cir, $wp_query->query_vars['s'] );

		// производим выборку из базы данных
		global $wpdb;
		$request = $wpdb->get_results( str_replace( $wp_query->query_vars['s'], $new_search, $query->request ) );

		if ( $request ) {
			$new_posts = array();
			foreach ( $request as $post ) {
				$new_posts[] = get_post( $post->ID );
			}
			if ( count( $new_posts ) > 0 ) {
				$posts = $new_posts;
			}
		}
	}
	// возвращаем массив найденных постов
	return $posts;
}

add_action( 'wp_ajax_nopriv_codyshop_ajax_search_comp', 'codyshop_ajax_search_comp' );
add_action( 'wp_ajax_codyshop_ajax_search_comp', 'codyshop_ajax_search_comp' );
function codyshop_ajax_search_comp() {
	$args  = array(
		'post_type'      => 'comp',
		'post_status'    => 'publish',
		'order'          => 'DESC',
		'orderby'        => 'date',
		's'              => $_POST['term'],
		'posts_per_page' => 5,
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			global $post
			?>
<li class="js-item-search-reg-form-comp">
			<?php
			if ( ! empty( $codyshop_url ) ) {
					the_post_thumbnail( 'cart-thumb' );
			} else {
				?>
		<?php } ?>
<div class="comp"><?php echo get_the_title()[0]; ?></div>
<a href="#"><?php the_title(); ?><span class="plus">+</span></a>
</li>
			<?php
		}
	} else {
		?>
<li><a href="#">Ничего не найдено, попробуйте другой запрос</a></li>
		<?php
	} exit;
}

//Поиск по конкурентам
add_action( 'wp_ajax_nopriv_codyshop_ajax_search_tarifsconc', 'codyshop_ajax_search_tarifsconc' );
add_action( 'wp_ajax_codyshop_ajax_search_tarifsconc', 'codyshop_ajax_search_tarifsconc' );
function codyshop_ajax_search_tarifsconc() {
	$args  = array(
		'post_type'      => 'product',
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => 'ASC',
		'tax_query'      => array(
			array(
				'taxonomy' => 'product_cat',
				'field'    => 'slug',
				'terms'    => 'tarifs-concurent',
			),
		),
		's'              => $_POST['term'],
		'posts_per_page' => 5,
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			global $product;
			?>
<li class="js-item-search-tarifsconc">
<div class="comp"><?php echo get_the_title()[0]; ?></div>
<a href="#"><?php the_title(); ?><span class="plus">+</span></a>
<div class="js-item-search-tarifsconc-hidden">
	<span class="js-item-search_tarifsconc__price"><?php echo wc_price( $product->get_price() ); ?></span>
	<span class="js-item-search_tarifsconc__name"><?php the_title(); ?></span>

	<span class="js-item-search-tarifsconc__attr"><?php echo wc_price( $product->get_price() ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'price-and-ogr-1' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'price-and-ogr-2' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'price-and-ogr-3' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'price-and-ogr-4' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'price-and-ogr-5' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'price-and-ogr-6' ); ?></span>

	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'limit-count-user' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'com-roles-user' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'save-user-data' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'zadach-comments' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'log-users' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'online-communication' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'learn-fast-support' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'premium-support' ); ?></span>

	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'automatization-1' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'automatization-2' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'automatization-3' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'automatization-4' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'automatization-5' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'automatization-6' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'automatization-7' ); ?></span>

	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'connect-1' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'connect-2' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'connect-3' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'connect-4' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'connect-5' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'connect-6' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'connect-7' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'connect-8' ); ?></span>

	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'security-1' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'security-2' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'security-3' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'security-4' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'security-5' ); ?></span>

	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'logistick-1' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'logistick-2' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'logistick-3' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'logistick-4' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'logistick-5' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'logistick-6' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'logistick-7' ); ?></span>

	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'features-1' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'features-2' ); ?></span>

	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'dopservices-1' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'dopservices-2' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'dopservices-3' ); ?></span>
	<span class="js-item-search-tarifsconc__attr"><?php echo $product->get_attribute( 'dopservices-4' ); ?></span>
	</div>

</li>
			<?php
		}
	} else {
		?>
<li><a href="#">Ничего не найдено, попробуйте другой запрос</a></li>
		<?php
	} exit;
}
