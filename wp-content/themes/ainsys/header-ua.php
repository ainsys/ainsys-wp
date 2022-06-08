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

		<!-- Yandex.Metrika counter -->
		<script type="text/javascript" >
			(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
									m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
			(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

			ym(86987238, "init", {
				clickmap:true,
				trackLinks:true,
				accurateTrackBounce:true,
				webvisor:true
			});
		</script>
		<noscript><div><img src="https://mc.yandex.ru/watch/86987238" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
		<!-- /Yandex.Metrika counter -->

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-205692206-3"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'UA-205692206-3');
		</script>
		<script>
			(function(w,d,u){
					var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
					var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
			})(window,document,'https://cdn-ru.bitrix24.ru/b16591156/crm/site_button/loader_9_cjas9a.js');
		</script>
		<script type="text/javascript">
		document.addEventListener( 'wpcf7mailsent', function( event ) {
			if ( '7989' == event.detail.contactFormId ) {
				ym(86987238,'reachGoal','form_1'); return true;
			}
			if ( '7988' == event.detail.contactFormId ) {
				ym(86987238,'reachGoal','form_2'); return true;
			}
		});
		</script>

		<script>
			(function(w, d, s, h, id) {
				w.roistatProjectId = id; w.roistatHost = h;
				var p = d.location.protocol == "https:" ? "https://" : "http://";
				var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init?referrer="+encodeURIComponent(d.location.href);
				var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
			})(window, document, 'script', 'cloud.roistat.com', '687af597c04143baddf7137bcaa63754');
		</script>


		<div id="page" class="site">
			<div class="site-content-contain">
				<div id="content" class="site-content">

					<header class="header">
						<div id="counrty" class="counrty" style="display: none;">
							<div class="container">
								<div class="counrty_content">
								<p class="counrty_text">
								Choose another country or region to see content specific to your location.
								</p>
								<div class="country_select">
									<a href="/ru-ru/" class="submenu__item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/components/lang__ru.svg" class="lang__img" alt="">Русский</a>
									<ul class="country__lang__submenu">
										<li>
											<a href="/ua/" class="submenu__item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/components/lang__urk.svg" class="lang__img" alt="">Українська</a>
										</li>
										<li>
											<a href="/ua-ru/" class="submenu__item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/components/lang__urk.svg" class="lang__img" alt="">Русский</a>
										</li>
                                        
										<li>
											<a href="/en-us/" class="submenu__item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/components/lang__usa.svg" class="lang__img" alt="">English</a>
										</li>
										<li>
											<a href="/en-us/" class="submenu__item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/components/lang__usa.svg" class="lang__img" alt="">English</a>
										</li>
										<li>
											<a href="/en-gb/" class="submenu__item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/components/333.svg" class="lang__img" alt="">English</a>
										</li>
										<li>
											<a href="/en-ca/" class="submenu__item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/components/222.svg" class="lang__img" alt="">English</a>
										</li>
										<li>
											<a href="/en-eu/" class="submenu__item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/components/444.svg" class="lang__img" alt="">English</a>
										</li>
									</ul>
								</div>
								<button class="btn counrty_btn">
									Continue
								</button>
								<div class="country_close"></div>
								</div>
							</div>
						</div>

						<div class="container">
							<div class="header__content">
								<a href="/" class="header__logo"></a>

								<div class="header__menu">
									<ul class="header__menu__ul menu">
										<?php
										wp_nav_menu(
											array(
												'theme_location' => 'ua',
												'container' => '',
												'menu_class' => '',
												'menu_id' => '',
												'walker'  => new Clean_Walker(),
												'tab_space' => 8,
												'items_wrap' => '%3$s',
											)
										);
										?>
									</ul>
								</div>
								<div class="header__toggler" aria-expanded="false" aria-label="Toggle Navigation" role="button">
									<div class="header__toggler__bars">
										<span class="bar"></span>
										<span class="bar"></span>
										<span class="bar"></span>
									</div>
								</div>

								<?php if ( is_user_logged_in() ) { ?>
									<?php
									$url = get_avatar_url(
										get_current_user_id(),
										array(
											'size'    => 58,
											'default' => 'mystery',
										)
									);
									?>
									<div class="header__account_block">
									<a class="header__account">
										<span class="header__account__shadow"></span>
										<span class="header__account__img">
											<img src="http://1.gravatar.com/avatar/d3efc5e52da40d5267661055ec57a34d?s=58&amp;d=mm&amp;r=g" alt="">
										</span>
								    </a>
									<ul class="menu__submenu_settings">
										<li class="menu__item">
											<div class="menu_item_content">		
												<img class="menu__item_img" src="http://ainsyswp/wp-content/themes/ainsys/assets/images/components/account.svg" alt="">
												<a class="menu__link" href="#">temirbayev.nail</a>
											</div>	
										</li>
										<li class="menu__item">
											<div class="menu_item_content">	
												<img class="menu__item_img" src="http://ainsyswp/wp-content/themes/ainsys/assets/images/components/profile.svg" alt="">
												<a class="menu__link" href="/my-account/">Мій профіль</a>
								            </div>	
										</li>
										<li class="menu__item">
											<div class="menu_item_content">	
												<img class="menu__item_img" src="http://ainsyswp/wp-content/themes/ainsys/assets/images/components/plan.svg" alt="">
												<a class="menu__link" href="#">Мій план</a>
											</div>	
										</li>
										<li class="menu__item">
											<div class="menu_item_content">	
												<img class="menu__item_img" src="http://ainsyswp/wp-content/themes/ainsys/assets/images/components/projects.svg" alt="">
												<a class="menu__link" href="#">Проекты</a>
											</div>	
										</li>
										<li class="menu__item">
										    <div class="menu_item_content">	
												<img class="menu__item_img" src="http://ainsyswp/wp-content/themes/ainsys/assets/images/components/exit.svg" alt="">
												<a class="menu__link" href="#">Вихід</a>
											</div>	
										</li>
									</ul>
								</div>
								<?php } else { ?>
										<a href="/auth/" class="header__login"><span>Увійти</span></a>
								<?php } ?>
							</div>
						</div>

						<?php
						if ( 'pp' === get_field( 'show_menu', 'option' ) ) {
							?>
							<div class="header__bottom">
								<div class="container">
									<?php if ( function_exists( 'woocommerce_mini_cart' ) ) : ?>
										<div class="header__cart">
											<?php echo do_shortcode( '[customminicart]' ); ?>
										</div>
									<?php endif; ?>
									<div class="header__menu">
										<ul class="header__menu__ul menu">
											<?php
											wp_nav_menu(
												array(
													'theme_location' => 'ua',
													'container'      => '',
													'menu_class'     => '',
													'menu_id'        => '',
													'walker'         => new Clean_Walker(),
													'tab_space'      => 8,
													'items_wrap'     => '%3$s',
												)
											);
											?>
										</ul>
									</div>
									<div class="header__toggler" aria-expanded="false" aria-label="Toggle Navigation" role="button">
										<div class="header__toggler__bars">
											<span class="bar"></span>
											<span class="bar"></span>
											<span class="bar"></span>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>

					</header>