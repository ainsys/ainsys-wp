<?php
/**
 * Header template for theme.
 *
 * @package ainsys
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'body_top' ); ?>

<div id="page" class="site">
	<div class="site-content-contain">
		<div id="content" class="site-content">

		<?php if ( get_field( 'announcement_on', 'option' ) ) { ?>
			<div class="announcement-bar" role="region">
				<div class="container">
					<div class="announcement-bar--inner"><?php the_field( 'announcement_text', 'option' ); ?></div>
					<div class="announcement-bar__close" id="announcement-close"></div>
				</div>
			</div>
		<?php } ?>

		<header class="p-3 mb-3 border-bottom">
			<div class="container">
				<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
					<a href="/" class="header_logo d-flex align-items-center mb-2 me-sm-5 mb-lg-0 text-dark text-decoration-none"></a>

					<ul class="main-menu d-flex mx-auto">
						<li class="me-sm-4 menu_li d-flex align-items-center menu-item-has-children"><a class="menu__item" href="#">Клиентам</a>
						<ul class="submenu">
							<li><a href="#" class="submenu__item">Как это работает?</a></li>
							<li><a href="#" class="submenu__item submenu_dis">Все Решения</a></li>
							<li><a href="#" class="submenu__item">Найти интегратора</a></li>
							<li><a href="#" class="submenu__item">Найти разработчика</a></li>
							</ul>
						</li>
						<li class="me-sm-4 menu_li d-flex align-items-center menu-item-has-children"><a class="menu__item" href="#">Партнерам</a>
							<ul class="submenu">
							<li><a href="#" class="submenu__item">Как это работает?</a></li>
							<li><a href="#" class="submenu__item submenu_dis">Все Решения</a></li>
							<li><a href="#" class="submenu__item">Найти интегратора</a></li>
							<li><a href="#" class="submenu__item">Найти разработчика</a></li>
							</ul>
						</li>
						<li class="me-sm-4 menu_li d-flex align-items-center menu-item-has-children"><a class="menu__item" href="#">Разработчикам</a>
							<ul class="submenu">
							<li><a href="#" class="submenu__item">Как это работает?</a></li>
							<li><a href="#" class="submenu__item submenu_dis">Все Решения</a></li>
							<li><a href="#" class="submenu__item">Найти интегратора</a></li>
							<li><a href="#" class="submenu__item">Найти разработчика</a></li>
							</ul>
						</li>
						<li class="menu_li d-flex align-items-center menu-item-has-children"><a class="menu__item" href="#">О компании</a>
							<ul class="submenu">
							<li><a href="#" class="submenu__item">Как это работает?</a></li>
							<li><a href="#" class="submenu__item submenu_dis">Все Решения</a></li>
							<li><a href="#" class="submenu__item">Найти интегратора</a></li>
							<li><a href="#" class="submenu__item">Найти разработчика</a></li>
							</ul>
						</li>
					
					</ul>

					<div class="header__user text-end me-sm-5">
						<a href="#" class="user__img d-flex align-items-center justify-content-center link-light text-decoration-none">
							<span class="account d-flex align-items-center justify-content-center">
								<img src="./assets/img/persona.png" alt="mdo" width="54" height="54" class="rounded-circle">
							</span>
						</a>
						<ul class="submenu">
							<li><a href="#" class="submenu__item">New project...</a></li>
							<li><a href="#" class="submenu__item">Settings</a></li>
							<li><a href="#" class="submenu__item">Profile</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a href="#" class="submenu__item">Sign out</a></li>
						</ul>
					</div>

					<div class="dropdown__lang text-end">
						<a href="#" class="dropdown__lang__item d-block d-flex align-items-center link-light text-decoration-none">
							<p class="header__user__text">RU</p>
						</a>
						<ul class="submenu">
							<li>
								<a href="#" class="submenu__item">
									<img src="./assets/img/lang__urk.svg" class="lang__img me-sm-2">
							Українська</a>
							</a></li>
							<li><a href="#" class="submenu__item">
							<img src="./assets/img/lang__ru.svg" class="lang__img me-sm-2">
							Русский
							</a></li>
							<li><a href="#" class="submenu__item">
							<img src="./assets/img/lang__usa.svg" class="lang__img me-sm-2">
							English</a>
							</a></li>
						</ul>
					</div>

					<div class="dropdown_burger ms-sm-4 text-end tablet">
						<div class="burger">
						<span></span>
					</div>

				</div>
			</div>
		</header>
