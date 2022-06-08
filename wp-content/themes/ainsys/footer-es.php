<?php
/**
 * Footer template for theme.
 *
 * @package ainsys
 */

?>

			<footer class="footer">
				<div class="container">

				<div class="footer__head">
				      <div class="footer__logo"></div>
					  <div class="footer__address">Palladium House,<br>1-4 Argyll Street, London, UK</div>
					</div>
					<div class="footer__content">
					    <ul class="footer__links">
							<li class="footer__link-active"><a href="mailto:info@ainsys.com">info@ainsys.com</a></li>
							<li><a href="/cookies-en/">Cookies</a></li>
							<li><a href="/privacy-policy-en/">Privacy Policy</a></li>
						</ul>

						<div class="footer__copyright-social">
							<div class="footer__copyright">&copy; Stanford Europe Ltd., 2022</div>

							<div class="footer__social">
								<a class="" href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/soc__fb.svg" alt="fb" class="footer__soc__img"></a>
								<a class="" href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/soc__inst.svg" alt="instagram" class="footer__soc__img"></a>
								<a class="" href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/soc__youtube.svg" alt="youtube" class="footer__soc__img"></a>
								<a class="" href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/soc__tg.svg" alt="tg" class="footer__soc__img"></a>
								<a class="" href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/soc__vk.svg" alt="vk" class="footer__soc__img"></a>
							</div>

							<div class="header__lang">
							    <ul class="header__lang__submenu">
								    <li>
										<a href="/us/" class="submenu__item"><span class="header__lang__img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/components/lang__usa.svg" alt=""></span>English</a>
									</li>
									<li>
										<a href="/gb-gb/" class="submenu__item"><span class="header__lang__img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/components/333.svg" alt=""></span>English</a>
									</li>
									<li>
										<a href="/ca/" class="submenu__item"><span class="header__lang__img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/components/222.svg" alt=""></span>English</a>
									</li>
									<li>
										<a href="/eu/" class="submenu__item"><span class="header__lang__img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/components/444.svg" alt=""></span>English</a>
									</li>
									<!-- <li>
										<a href="https://es.ainsys.com/" class="submenu__item"><span class="header__lang__img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/components/sp.svg" alt=""></span>Spanish</a>
									</li> -->
								</ul>
								<span class="header__lang__current">EN</span>
							</div>
						</div>
					</div>
				</div>
			</footer>

		</div>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>