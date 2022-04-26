<?php
/**
 * Header template for theme.
 *
 * @package ainsys
 */

?>
<!DOCTYPE html>
<html  lang="en-US">
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
	<style>@media (max-width: 800px) {
  .footer__links {display: none !important;}
}</style>


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

		<header class="header">
			<div class="container">
				<div class="header__content">
					<a href="/" class="header__logo"></a>
					<ul class="footer__links">
							<li><a href="mailto:info@ainsys.com">info@ainsys.com</a></li>
							<li><a href="tel:+34961163197" onclick="gtag( 'event', 'number', {   'event_category' : 'ain',   'event_label' : 'n_1' });ym(86987238,'reachGoal','number'); return true;">+3496....</a></li>
							<li><a href="tel:+16469804846" onclick="gtag( 'event', 'number', {   'event_category' : 'ain',   'event_label' : 'n_1' }); ym(86987238,'reachGoal','number'); return true;">+1646....</a></li>
							<li><a href="tel:+78126027880" onclick="gtag( 'event', 'number', {   'event_category' : 'ain',   'event_label' : 'n_1' });ym(86987238,'reachGoal','number'); return true;">+7812....</a></li>
							<li><a href="tel:+447441426027" onclick="gtag( 'event', 'number', {   'event_category' : 'ain',   'event_label' : 'n_1' });ym(86987238,'reachGoal','number'); return true;">+4474....</a></li>
						</ul>
					<div class="header__btns">
						<div class="header__btn">
							<a class="btn btn-primary" href="/order-ainsys/" onclick="gtag( 'event', 'buttom_1', {   'event_category' : 'ain',   'event_label' : 'b_1' }); ym(86987238,'reachGoal','button_1'); return true;">Order</a>
						</div>

						<div class="header__lang text-end">
							<a href="#" class="header__lang__current text-decoration-none">EN</a>
							<ul class="header__lang__submenu">
								<li>
									<a href="/ainsys-ua/" class="submenu__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/lang__urk.svg" class="lang__img me-sm-2" alt="">Українська</a>
								</li>
								<li>
									<a href="/home/" class="submenu__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/lang__ru.svg" class="lang__img me-sm-2" alt="">Русский</a>
								</li>
								<li>
									<a href="/ainsys-us/" class="submenu__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/lang__usa.svg" class="lang__img me-sm-2" alt="">English</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<script>
(function(w, d, s, h, id) {
    w.roistatProjectId = id; w.roistatHost = h;
    var p = d.location.protocol == "https:" ? "https://" : "http://";
    var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init?referrer="+encodeURIComponent(d.location.href);
    var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
})(window, document, 'script', 'cloud.roistat.com', '687af597c04143baddf7137bcaa63754');
</script>
		</header>
