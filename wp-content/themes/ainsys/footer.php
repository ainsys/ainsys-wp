<?php
/**
 * Footer template for theme.
 *
 * @package ainsys
 */

?>

	<footer class="py-5">
		<div class="container">
		<div class="row">
			<div class="col-4">
			<a href="/" class="footer_logo d-flex align-items-center mb-2 me-sm-5 mb-lg-0 text-dark text-decoration-none">
				<!-- <img src="./assets/img/logo__footer.svg" alt="logo">	-->
			</a>
			</div>

			<div class="col-2">
			<h6>Клиентам</h6>
			<ul class="nav flex-column">
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Как это работает?</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Все Решения</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Найти интегратора</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">FAQ Q&A</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Техническа поддержка</a></li>
			</ul>
			</div>
	
			<div class="col-2">
			<h6>Партнерам</h6>
			<ul class="nav flex-column">
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Как с нами работать?</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Стать Партнером</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Техническая поддержка</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Заказы клиентов на интеграцию</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Q&A Партнерам</a></li>
			</ul>
			</div>
	
			<div class="col-2">
			<h6>Разработчикам</h6>
			<ul class="nav flex-column">
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Как у нас работать?</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">AINSYS Rest API</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Конектор SDK</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Developer Q&A</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Техническая поддержка</a></li>
			</ul>
			</div>

				
			<div class="col-2">
			<h6>О компании</h6>
			<ul class="nav flex-column">
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Вакансии</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Корпоративный Блог</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Контакты</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Презентация</a></li>
			</ul>
			</div>
	
		</div>
	
		<div class="d-flex justify-content-between py-4 my-4 border-top">
			<ul class="list-unstyled d-flex me-auto">
			<li class="ms-3"><a class="footer__docs text-white" href="mailto:ainsys@gmail.com">ainsys@gmail.com</a></li>
			<li class="ms-3"><a class="footer__docs text-white" href="#">Cookies</a></li>
			<li class="ms-3"><a class="footer__docs text-white" href="#">Terms & Conditions</a></li>
			<li class="ms-3"><a class="footer__docs text-white" href="#">Privacy</a></li>
			</ul>
			<p class="me-sm-4">&copy; Stanform Europe Ltd., 2022</p>
			<ul class="list-unstyled d-flex me-sm-4">
			<li class="me-3"><a class="" href="#">
				<img src="./assets/img/soc__fb.svg" alt="fb" class="footer__soc__img">
			</a></li>
			<li class="me-3"><a class="" href="#">
				<img src="./assets/img/soc__inst.svg" alt="fb" class="footer__soc__img">
			</a></li>
			<li class="me-3"><a class="" href="#">
				<img src="./assets/img/soc__youtube.svg" alt="fb" class="footer__soc__img">
			</a></li>
			<li class="me-3"><a class="" href="#">
				<img src="./assets/img/soc__tg.svg" alt="fb" class="footer__soc__img">
			</a></li>
			<li class="me-0"><a class="" href="#">
				<img src="./assets/img/soc__vk.svg" alt="fb" class="footer__soc__img">
			</a></li>
			</ul>

			<div class="dropdown dropdown__lang text-end">
			<a href="#" class="d-block d-xl-flex align-items-xl-center link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
				<p class="header__user__text">RU</p>
			</a>
			<ul class="dropdown-menu js-example-basic-single dropdown-menu-lang text-small" aria-labelledby="dropdownUser1">
				<li>
				<a class="dropdown-item" href="#">
					<img src="./assets/img/lang__urk.svg" class="lang__img me-sm-2">
					Українська</a>
				</li>
				<li>
				<a class="dropdown-item" href="#">
					<img src="./assets/img/lang__ru.svg" class="lang__img me-sm-2">
					Русский
				</a>
				</li>
				<li>
				<a class="dropdown-item" href="#">
					<img src="./assets/img/lang__usa.svg" class="lang__img me-sm-2">
					English</a>
				</li>
			</ul>
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
