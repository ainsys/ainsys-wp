<?php
/**
 * The main template file
 * Template Name: Main Page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

wp_head();
?>
<link rel="stylesheet" type="text/css" href="/wp-content/themes/hello-elementor/assets/css/fonts/Vela Sans/font.css">
<?php
$pageId = get_queried_object()->ID;

get_header()
?>
<section class="white-body">
	<!-- Первый экран -->
	<?php $group_fields = get_field('main-first-screen'); ?>
	<section class="w-video">
		<div class="wrapper wrap-video">
			<div class="flex-box first-screen">
				<div class="big-title">
					<div class="wrap-anim">
						>
						<div id="Ticker">
							<?php echo $group_fields['main-big-title-1']['main-anim-1']; ?>
						</div>
						<
					</div>
						<?php echo $group_fields['main-big-title-1']['main-big-title-end']; ?>
					</div>
					<div class="sub-title first-screen-sub">
						<?php
						echo $group_fields['main-sub-title-1']; 
						?>
					</div>
					<!-- Переключатель -->
					<div class="box-switch">
						<span class="switch-on switch-text"><?php echo $group_fields['tumblery']['s_ainsys']; ?></span>
						<label class="switch">
							<input type="checkbox" id="switch"  onclick="checkSwitch()">
							<span class="slider round"></span>
						</label>
						<span class="switch-off switch-text"><?php echo $group_fields['tumblery']['bez_ainsys']; ?></span>
					</div>
				</div>

				<div class="video">
					<video id="video" autoplay muted loop>
						<source id="ogv" src="/wp-content/themes/hello-elementor/assets/videos/with.ogv" type='video/ogg; codecs="theora, vorbis"'>
						<source id="mp4" src="/wp-content/themes/hello-elementor/assets/videos/with.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
						<source id="webm" src="/wp-content/themes/hello-elementor/assets/videos/with.webm" type='video/webm; codecs="vp8, vorbis"'>
					</video>
				</div>
			</div>
			</section>
		<!-- Второй экран -->
		<section class="purple">
			<div class="wrapper purple">
				<div class="flex-box">
					<div class="title white">
						Узнайте, как AINSYS поможет вам
					</div>
					<div class="sub-title sub-white">
						Обменивайте данные между системами, автоматизируйте рабочие процессы, ускоряйте инновации и внедрения в компании!
					</div>
					<div class="role-cards">

						<div class="role">
							<img class="icon-3" src="/wp-content/themes/hello-elementor/assets/images/Gicon2.png">
							<div class="card-title text-1">
								Разработчикам
							</div>
							<div class="card-desc text-2">
								AINSYS объявляет набор в профессиональное  сообщество разработчиков.    
							</div>
							<div class="card-desc text-3">
								<ul>
									<li>Получай подряды на разработку ПО с открытым кодом - зарабатывай и создавай портфель проектов!</li>
									<li>Создавай свои API или подключи уже готовые API к AINSYS</li>
									<li>У тебя есть свой продукт? Интегрируй его с тысячами других приложений и получи новых пользователей!</li>
									<li>Продемонстрирую свою экспертность как консультант - мы направим к тебе клиентов</li>
									<li>Воспользуйся нашими коннекторами для реализации своих проектов!</li>
									<li>Присоединяйся к нашей команде и развивайся с нами</li>
								</ul>
							</div>
							<a href="#" class="show-more more-oncard">Узнать больше</a>
						</div>



						<div class="role">
							<img class="icon-2" src="/wp-content/themes/hello-elementor/assets/images/Gicon1.png">
							<div class="card-title text-1">
								Пользователям
							</div>
							<div class="card-desc text-2">
								AINSYS разрабатывался как для физ лиц, так и для организаций любого размера.    
							</div>
							<div class="card-desc text-3">
								<ul>
									<li>Навести порядок, организовать и защитить данные</li>
									<li>Обменивать данные между разными системами</li>
									<li>Автоматизировать рабочие процессы - Ваши личные или Вашей организации</li>
									<li>Ускорить инновации и внедрения в компании</li>
									<li>Сэкономить деньги</li>
								</ul>
							</div>
							<a href="#" class="show-more more-oncard">Узнать больше</a>
						</div>


						<div class="role">
							<img class="icon-1" src="/wp-content/themes/hello-elementor/assets/images/Gicon.png">
							<div class="card-title text-1">
								Партнерам
							</div>
							<div class="card-desc text-2">
								Партнёры AINSYS получают доступ к заказам на интеграции от наших клиентов – мы даём и инструмент, и методологию и возможность заработать для:
							</div>
							<div class="card-desc text-3">
								<ul>
									<li>Консультантов и бизнес аналитиков</li>
									<li>Интеграторов ИТ решений любого масштаба</li>
									<li>Разработчиков - как фрилансеров, так и целых команд</li>
									<li>Инженеров и аналитиков данных</li>
									<li>Контент менеджеров и СММ маркетологов</li>
									<li>Дизайн, веб, digital студий</li>
								</ul>
							</div>
							<a href="#" class="show-more more-oncard">Узнать больше</a>
						</div>

					</div>
					<div class="desc-screen">
						Сотрудничайте с нами, чтобы обеспечить полную поддержку ваших проектов. 
						<a href="#" class="show-more">Подробнее</a>
					</div>
				</div>
			</div>
		</section>
		<!-- Третий экран -->
		<section class="pink">
			<div class="wrapper">
				<div class="flex-box white-form">
					<div class="title form-color">
						Хотите поучаствовать в вебинаре и получить доступ к демо?
					</div>
					<div class="sub-title">
						Запишитесь на вебинар с демонстрацией возможностей продукта:
					</div>
					<button class="demo-button" onclick="popUpDemo()">
						Записаться на демонстрацию
					</button>
				</div>
			</div>
		</section>
		<!-- Четвертый экран -->
		<section >
			<div class="wrapper">
				<div class="big-title steps-bt">
					Возможности AINSYS
				</div>
				<div class="flex-box flex-step-box">
					<div class="step">
						<div class="step-info">
							<div class="box-switch step-switch">
								<span class="switch-on switch-text step-switch">C AINSYS</span>
								<label class="switch">
									<input type="checkbox" id="step-1-switch" onclick="checkSwitchStep('step-1')">
									<span class="slider round"></span>
								</label>
								<span class="switch-off switch-text">Без AINSYS</span>
							</div>
							<div class="step-title step-1-title-1">
								Быстрота подключения
							</div>
							<div class="step-title step-1-title-2 visible">
								Быстрота подключения
							</div>
							<div class="step-sub step-1-sub-1">
								Время для настройки подключения
								– от 2 до 10 минут
							</div>
							<div class="step-sub step-1-sub-2 visible">
								Интеграция занимает недели,
								месяц и даже годы!
							</div>
						</div>
						<img class="step-img step-1-img-1" src="/wp-content/uploads/2022/01/shutterstock_1240787746-1-1024x576-1.jpg">
					</div>
					<div class="step">
						<div class="step-info">
							<div class="box-switch step-switch">
								<span class="switch-on switch-text step-switch">C AINSYS</span>
								<label class="switch">
									<input type="checkbox" id="step-2-switch"  onclick="checkSwitchStep('step-2')">
									<span class="slider round"></span>
								</label>
								<span class="switch-off switch-text">Без AINSYS</span>
							</div>
							<div class="step-title step-2-title-1 ">
								Методология для внедрений
							</div>
							<div class="step-title step-2-title-2 visible">
								Методология для внедрений
							</div>
							<div class="step-sub step-2-sub-1">
								Внедрения и системная интеграция это сложно, поэтому вам нужен AINSYS
								<br>
								Организация проекта внедрения по философии AGILE и SCRUM – минимум документации, минимум людей, быстрый результат, тестирование с пользователями, рекомендации партнёров и разработчиков
							</div>
							<div class="step-sub step-2-sub-2 visible">
								<ul>
									<li>Много сложной документации</li>
									<li>Многое длинных совещаний много важных людей</li>
									<li>Больше трата времени</li>
									<li>Неконтролируемая трата денег</li>
									<li>Большая команда разработчик</li>
									<li>Куча подрядчиков и внедренцев</li>
								</ul>
							</div>
						</div>
						<img class="step-img step-2-img-1" src="/wp-content/uploads/2022/01/shutterstock_1240786747-1024x576-1.jpg">
					</div>
					<div class="step">
						<div class="step-info">
							<div class="box-switch step-switch">
								<span class="switch-on switch-text step-switch">C AINSYS</span>
								<label class="switch">
									<input type="checkbox" id="step-3-switch"  onclick="checkSwitchStep('step-3')">
									<span class="slider round"></span>
								</label>
								<span class="switch-off switch-text">Без AINSYS</span>
							</div>
							<div class="step-title step-3-title-1">
								Минимум участников
							</div>
							<div class="step-title step-3-title-2 visible">
								Минимум участников
							</div>
							<div class="step-sub step-3-sub-1">
								Маленькие и гибкие рабочие группы – 2-3 человека, изучаем бизнес-процесс и сразу же настраиваем систему
							</div>
							<div class="step-sub step-3-sub-2 visible">
								Куча участников всех мастей, долгие собрания, Народ в переговорных
							</div>
						</div>
						<img class="step-img step-3-img-1" src="/wp-content/uploads/2022/01/shutterstock_735743386-1-1024x756-1-e1642067938863.jpg">
					</div>
					<div class="step">
						<div class="step-info">
							<div class="box-switch step-switch">
								<span class="switch-on switch-text step-switch">C AINSYS</span>
								<label class="switch">
									<input type="checkbox" id="step-4-switch"  onclick="checkSwitchStep('step-4')">
									<span class="slider round"></span>
								</label>
								<span class="switch-off switch-text">Без AINSYS</span>
							</div>
							<div class="step-title step-4-title-1">
								Безопасность данных
							</div>
							<div class="step-title step-4-title-2 visible">
								Безопасность данных
							</div>
							<div class="step-sub step-4-sub-1">
								Инвентаризация, хранение, упорядочивание данных – 3 уровня (Зеленый обычные, конфиденциальные, секретные) – храним данные как ценный актив

							</div>
							<div class="step-sub step-4-sub-2 visible">
								<ul>
									<li>Данные хранятся где попало</li>
									<li>Кража данных шпионами</li>
									<li>Хакеры, вирусы шифровальщики</li>
								</ul>
							</div>
						</div>
						<img class="step-img step-4-img-1" src="/wp-content/uploads/2022/01/shutterstock_735743386-1-1024x756-1-e1642067938863.jpg">
					</div>
				</div>
			</div>
		</section>
		<!-- Пятый экран -->
		<section>
			<div class="wrapper">
				<!-- <?php include "template-parts/landing-table.php"; ?> -->
			</div>
		</section>       
		<!-- Шестой экран -->
		<section>
			<div class="wrapper">
				<div class="flex-box" style="margin: 0 10%;">
					<div class="title form-color">
						Ответы на популярные вопросы
					</div>
					<?php echo do_shortcode("[ultimate-faqs]") ?>
					<div class="wp-container-1 wp-block-buttons">
						<div class="load-less" id="load-more"><a class="wp-block-button__link">Ещё</a></div>
					</div>
					<!--                 <div class="question">
<div class="que-info" onclick="faqView('1')">
<div class="que-title">
Ваше решение дорогое?
</div>
<div class="que-open">
<img src="/wp-content/themes/hello-elementor/assets/images/que.png">
</div>
</div>
<div class="que-text faq-1">
Для физ лиц с малым количеством запросов – бесплатно. Если вы не тратите наши ресурсы и время – пользуйтесь на здоровье!

Для ИП и малого бизнеса – выгоднее и доступнее любого из конкурентов! Для всех, в т.ч. среднего бизнеса и Enterprise – быстро можно попробовать и по нашим расчётам очень быстро окупается! Если вдруг вам кажется дорого? Сомневаетесь, что окупится? Пишите, аргументируйте и договоримся! Хотите больше информации?
</div>
</div>
<div class="question">
<div class="que-info" onclick="faqView('2')">
<div class="que-title">
Чем вы лучше решения N?
</div>
<div class="que-open">
<img src="/wp-content/themes/hello-elementor/assets/images/que.png">
</div>
</div>
<div class="que-text faq-2">
Мы не хотели сделать просто ещё 1 платформу для интеграций! Есть лидеры и уже даже появилось много подражателей. Все обещают быстро, за 5 минут и без программистов. Но мы видим недостаток в сложности настройки любого внедрения и обмена для простых пользователей – т.к. Системная интеграция это вообще непростая задача и требует системного мышления, опыта. Получается, что “избавление” от программистов и интеграторов приводит людей к ещё большим затратам денег, времени. Страдает качество. Поэтому мы сделали платформу максимально простую, прозрачную и доступную для конечного пользователя при этом максимально гибкую, оптимизированную для работы в группах – для взаимодействия представителей клиентов с партнёрами и разработчиками.
</div>
</div>
<div class="question">
<div class="que-info" onclick="faqView('3')">
<div class="que-title">
Обязательно нужен программист или Ваш партнёр интегратор?
</div>
<div class="que-open">
<img src="/wp-content/themes/hello-elementor/assets/images/que.png">
</div>
</div>
<div class="que-text faq-3">
AINSYS это no code, low code платформа для интеграций, обмена данными. Вы сможете сами настроить обмен без кода, и быстрее, и более гибко – мы приготовили готовые сценарии, рецепты и шаблоны, которые позволят настроить обмен с неограниченным количеством систем буквально за минуты. (см инструмент план интеграций). Но AINSYS это не только обмен данными

Однако часто оптимизация рабочих процессов бизнеса лишь кажется простой и экономически целесообразнее нанять опытных специалистов и консультантов, которые помогут настроить автоматизацию быстрее, качественнее и оптимизировать её под бизнес-процессы Вашей организации. Для этого мы собираем сообщество специалистов индустрии и оптимизируем наш продукт не только как инструмент для конечного пользователя, но и платформу для управления проектом интеграции вместе с нашими партнёрами.
</div>
</div>
<div class="question">
<div class="que-info" onclick="faqView('4')">
<div class="que-title">
А сколько у Вас коннекторов к внешним системам?
</div>
<div class="que-open">
<img src="/wp-content/themes/hello-elementor/assets/images/que.png">
</div>
</div>
<div class="que-text faq-4">
Пока меньше чем у аналогов нашей системы, но мы очень быстро растём. Мы сделали систему, позволяющую нам создать и подключить коннектор меньше чем за 1 рабочий день программиста. Все коннекторы у нас с открытым исходным кодом – т.е, мы предоставляем конструктор ТЗ – чтобы упростить постановку задачи по интеграции и мы предоставляем API & SDK для программистов. Не хватает какого-то коннектора? Оплатите тариф на год и мы вам его сделаем быстрее чем вы соберёте рабочую группу для интеграции.
</div>
</div>
<div class="question">
<div class="que-info" onclick="faqView('5')">
<div class="que-title">
Вы новенькие?
</div>
<div class="que-open">
<img src="/wp-content/themes/hello-elementor/assets/images/que.png">
</div>
</div>
<div class="que-text faq-5">
Проекту уже больше года. Коллективный опыт нашей команды в разработке, системной интеграции и бизнесе – 100+ лет. Мы сами используем свой продукт в других проектам и протестировали всё на кошечках прежде чем предложить попробовать его Вам. И конечно же, как молодой стартап, мы приготовили для Вас несколько сюрпризов, которых, насколько мы знаем, ни у кого из конкурентов пока ещё нет. 

Заметим также, что в ближайшие 5 лет мы точно никуда не денемся, гарантируем поддержку системы. В ближайшие 6 месяцев планируем, что AINSYS будет стремительно развиваться и расти – идей у нас вагон! Не хватает в основном человеческих ресурсов для масштабирования. Если хотите предложить сотрудничество, почитайте про нас в разделе компания или Вакансии.
</div>
</div> -->
				</div>
			</div>
		</section>
		<!-- Седьмой экран -->
		<section class="last-screen">
			<div class="wrapper">
				<div class="flex-box">
					<div class="title white lastT">
						Хотите поучаствовать в вебинаре и получить доступ к демо?
					</div>
					<button class="pop-upp" onclick="popUpDemo()">
						Оставить заявку
					</button>
				</div>
			</div>
		</section>
		<div class="pop-wrapper">
			<div class="shadow" onclick="popUpDemo()">

			</div>
			<div class="pop-up">
				<div class="close-pop">
					<img class="close-pop-img" src="/wp-content/themes/hello-elementor/assets/images/close-pop.svg" onclick="popUpDemo()">
				</div>
				<div class="sub-title">
					Запишитесь на вебинар с демонстрацией возможностей продукта:
				</div>
				<div class="pop-form">
					<?php echo do_shortcode( '[contact-form-7 id="3673" title="Main Page ver2.0"]' ); ?>
					<?php echo do_shortcode( '[wbcr_html_snippet id="4045"]' ); ?>
				</div>
			</div>
			<div class="pop-up form-sucsess">
				<div class="close-pop">
					<img class="close-pop-img" src="/wp-content/themes/hello-elementor/assets/images/close-pop.svg" onclick="popUpDemo()">
				</div>
				<div class="suc-title">
					Спасибо за Ваш интерес к AINSYS!
				</div>
				<div class="suc-sub">
					В связи с большим объемом обращений, процесс регистрации и онбординга новых пользователей может занимать дольше обычного. Ваш номер в очереди обработки заказов: <span class="imporatant-info">70</span>. (Пожалуйста не оформляйте несколько запросов в форму - это не ускорит обработку Вашего обращения) Чтобы получить доступ к продукту <a href="/auth/" class="imporatant-info">зарегистрируйтесь</a> на сайте и оформите <a href="/connectors/" class="imporatant-info">план интеграций</a> - каталог доступен полностью для тех, кто зарегистрировался…
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript">
		var CharTimeout = 170; // скорость печатания
		var StoryTimeout = 2800; // время ожидания перед переключением

		var Summaries = new Array();
		var SiteLinks = new Array();

		Summaries[0] = '<?php echo $group_fields['main-big-title-1']['main-anim-2']; ?>';
		Summaries[1] = '<?php echo $group_fields['main-big-title-1']['main-anim-3']; ?>';
		Summaries[2] = '<?php echo $group_fields['main-big-title-1']['main-anim-4']; ?>';
		Summaries[3] = '<?php echo $group_fields['main-big-title-1']['main-anim-5']; ?>';
		Summaries[4] = '<?php echo $group_fields['main-big-title-1']['main-anim-6']; ?>';
		Summaries[5] = '<?php echo $group_fields['main-big-title-1']['main-anim-7']; ?>';
		Summaries[6] = '<?php echo $group_fields['main-big-title-1']['main-anim-1']; ?>';

		/* Печатание текста - Тиккер
    ----------------------------------------------------------------
    var CharTimeout = 20;
    var StoryTimeout = 7000;
    var Summaries = new Array();
    var SiteLinks = new Array();
        Summaries[0] = "CMS для простых сайтов GetSimple на русском языке";
        SiteLinks[0] = "#link1";
        Summaries[1] = "Spectrum - шикарная тема для WordPress на русском языке";
        SiteLinks[1] = "#link2";
    startTicker();
    */

		function startTicker(){
			massiveItemCount =  Number(Summaries.length); //количество элементов массива
			// Определяем значения запуска
			CurrentStory     = -1;
			CurrentLength    = 0;
			// Расположение объекта
			AnchorObject     = document.getElementById("Ticker");
			runTheTicker();     
		}
		// Основной цикл тиккера
		function runTheTicker(){
			var myTimeout;  
			// Переход к следующему элементу
			if(CurrentLength == 0){
				CurrentStory++;
				CurrentStory      = CurrentStory % massiveItemCount;
				StorySummary      = Summaries[CurrentStory].replace(/"/g,'-');
			}
			// Располагаем текущий текст в анкор с печатанием
			AnchorObject.innerHTML = StorySummary.substring(0,CurrentLength) + znak();
			// Преобразуем длину для подстроки и определяем таймер
			if(CurrentLength != StorySummary.length){
				CurrentLength++;
				myTimeout = CharTimeout;
			} else {
				CurrentLength = 0;
				myTimeout = StoryTimeout;
			}
			// Повторяем цикл с учетом задержки
			setTimeout("runTheTicker()", myTimeout);
		}
		// Генератор подстановки знака
		function znak(){
			if(CurrentLength == StorySummary.length) return "";
			else return "<span style='color: #3b0a40; font-weight: 400'>|<span>";
		}

		startTicker();
	</script>
	</body>
<?php


get_footer();