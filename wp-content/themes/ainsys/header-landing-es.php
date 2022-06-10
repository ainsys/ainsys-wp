<?php
/**
 * Header template for landing.
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

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<?php do_action( 'body_top' ); ?>
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

					<header class="header-landing">

						<!-- <div id="counrty" class="counrty">
							<div class="container">
								<div class="counrty_content">
									<p class="counrty_text">
									Choose another country or region to see content specific to your location.
									</p>
									<div class="country_select">
										<a href="/ru-ru/" class="submenu__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/lang__ru.svg" class="lang__img me-sm-2" alt="">Русский</a>
										<ul class="country__lang__submenu">
											<li>
												<a href="/ua/" class="submenu__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/lang__urk.svg" class="lang__img me-sm-2" alt="">Українська</a>
											</li>
											<li>
												<a href="/ua-ru/" class="submenu__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/lang__urk.svg" class="lang__img me-sm-2" alt="">Русский</a>
											</li>
											<li>
												<a href="/en-us/" class="submenu__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/lang__usa.svg" class="lang__img me-sm-2" alt="">English</a>
											</li>
											<li>
												<a href="/en-us/" class="submenu__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/lang__usa.svg" class="lang__img me-sm-2" alt="">English</a>
											</li>
											<li>
												<a href="/en-gb/" class="submenu__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/333.svg" class="lang__img me-sm-2" alt="">English</a>
											</li>
											<li>
												<a href="/en-ca/" class="submenu__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/222.svg" class="lang__img me-sm-2" alt="">English</a>
											</li>
											<li>
												<a href="/en-eu/" class="submenu__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/444.svg" class="lang__img me-sm-2" alt="">English</a>
											</li>
										</ul>
									</div>
									<button class="btn counrty_btn">
										Continue
									</button>
									<div class="country_close"></div>
								</div>
							</div>
						</div> -->

						<div class="container">
							<div class="header-landing__content">
								<a href="/" class="header-landing__logo"></a>

								<div class="header__toggler" aria-expanded="false" aria-label="Toggle Navigation" role="button">
									<div class="header__toggler__bars">
										<span class="bar"></span>
										<span class="bar"></span>
										<span class="bar"></span>
									</div>
								</div>

								<div class="socials">
									<div class="socials__wrapper">
										<div class="header-landing__btn">
											<a class="btn btn-main" href="https://es.ainsys.com/my-account/" onclick="gtag( 'event', 'buttom_1', {   'event_category' : 'ain',   'event_label' : 'b_1' }); ym(86987238,'reachGoal','button_1'); return true;">Solicitud de baja</a>
										</div>
										<ul class="socials__links">
											<li  class="numbers__phone numbers__phone-disabled">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/header__phones.svg" alt="phone">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/lang__es.svg" alt="uk">
												<a href="tel: +34960730530" class="soc_href disabled">+34960730530
													<div class="disabled__block"></div>
												</a>
											</li>
											<li  class="numbers__phone numbers__email numbers__phone-disabled">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/header__mail.svg" alt="usa">
												<a href="email: info@ainsys.com" class="soc_href disabled">info@ainsys.com
												<div class="disabled__block" onclick="ym(86987238,'reachGoal','email'); return true;"></div>
												</a>
											</li>
											<li class="numbers__map">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/header__map.svg" alt="usa">
											    <a href="" class="socials__addres">Palladuim House, London, United Kingdom</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="header-landing__lang text-end">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/header__lang.svg" alt="usa">
									<a href="#" class="header-landing__lang__current text-decoration-none">ES</a>
									<ul class="header-landing__lang__submenu">
                                        <li>
                                            <a href="https://ainsys.com/en/" class="submenu__item"><span class="header__lang__img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/components/lang__usa.svg" alt=""></span>English</a>
                                        </li>
                                        <li>
                                            <a href="https://ainsys.com/" class="submenu__item"><span class="header__lang__img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/components/333.svg" alt=""></span>English</a>
                                        </li>
                                        <li>
                                            <a href="https://ainsys.com/ca/" class="submenu__item"><span class="header__lang__img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/components/222.svg" alt=""></span>English</a>
                                        </li>
                                        <li>
                                            <a href="https://ainsys.com/eu/" class="submenu__item"><span class="header__lang__img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/components/444.svg" alt=""></span>English</a>
                                        </li>
									</ul>
								</div>
							</div>
						</div>

					</header>    
