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
					  <div class="footer__address">ООО "КАТАЛОГ СЕРВИС" <br>11033, г. Москва,<br> ул. Золоторожский Вал, д. 34, стр. 6 <br>ОГРН: 1097746354474</div>
					</div>
					<div class="footer__content">
					    <ul class="footer__links">
							<li class="footer__link-active"><a href="mailto:info@ainsys.com">info@ainsys.com</a></li>
							<li><a href="/cookies/">Cookies</a></li>
							<li><a href="/offer-license-agreement/">Оферта и лицензионный договор</a></li>
							<li><a href="/privacy-policy/">Политика конфиденциальности</a></li>
						</ul>

						<div class="footer__copyright-social">
							

							<div class="footer__social">
								<a class="" href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/soc__fb.svg" alt="fb" class="footer__soc__img"></a>
								<a class="" href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/soc__inst.svg" alt="instagram" class="footer__soc__img"></a>
								<a class="" href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/soc__youtube.svg" alt="youtube" class="footer__soc__img"></a>
								<a class="" href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/soc__tg.svg" alt="tg" class="footer__soc__img"></a>
								<a class="" href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/components/soc__vk.svg" alt="vk" class="footer__soc__img"></a>
							</div>
							<div class="header__lang">
								<div class="lang_item">
									<img class="header__lang__img" src="<?php echo get_template_directory_uri(); ?>/assets/images/components/header__lang.svg" alt="lang">
									<span class="header__lang__current">RU</span>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</footer>

		</div>
	</div>
</div>

<?php wp_footer(); ?>
<div class="modal__wrapper " id="authModal">
    <div class="modal__body modal__body--authorization">
        <div class="modal__icon">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/components/icon-warning.svg">
        </div>
        <div class="modal__title"><?php _e('Log in to create your integration plan','ainsys');?></div>
        <div class="modal__text"><?php _e('You can make a preliminary calculation of the timing and budget for implementation after authorization','ainsys');?></div>
        <div class="modal__buttons">
            <button class=" modal__button modal__button--close" id="closeBtn"><?php _e('Close', 'ainsys'); ?></button>
            <a href="/auth" class="modal__button" ><?php _e('Login', 'ainsys'); ?></a>
        </div>
    </div>
</div>
<div class="modal__wrapper " id="addModal">
    <div class="modal__body modal__body--authorization">
        <div class="modal__icon">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/components/icon-warning.svg">
        </div>
        <div class="modal__title"><?php _e('Log in to create your integration plan','ainsys');?></div>
        <div class="modal__text">
            <?php echo do_shortcode('[contact-form-7 id="'.get_field('catalog_contact_form_id','option').'" title="Форма  - Заявка на добавление коннектора"]'); ?>
        </div>

    </div>
</div>

</body>
</html>