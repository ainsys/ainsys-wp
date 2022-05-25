<?php
/**
 * Land newsletter.
 *
 * @package ainsys
 */

$block_id = 'img-txt-ul' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

$class_name = 'img-txt-ul';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}
if ( get_field( 'bg' ) ) {
	$class_name .= ' bg-color-' . get_field( 'bg' );
}
if ( get_field( 'align' ) ) {
	$class_name .= ' img-align-' . get_field( 'align' );
}
?>

<section class="steps">
          <div class="container">
            <p class="page__podtitle">
			<?= get_field('podtitle');?>
                Мы приручили технологии, воспользуйтесь ими за 8 шагов
            </p>
            <h2 class="landing__title">
			<?= get_field('title');?>
                AINSYS — снимите IT-нагрузку и займитесь развитием своего бизнеса
            </h2>
            <div class="steps__slider">
			<?php if ( have_rows( 'steps__slide' ) ) : ?>				
				<?php while ( have_rows( 'steps__slide' ) ) :
					the_row();?>

					<div class="steps__slide">
						<div class="steps__content">
						    <?php if ( get_sub_field( 'steps__img' ) ) { ?>
							  <div class="steps__img">
						         <img src="<?= the_sub_field('steps__img');?>" alt="">
							  </div>  
                            <?php } ?>
							<!-- <div class="steps__img">
								<img src="./assets/img/step__img.png" alt="">
							</div> -->
							<div class="steps__info">
								<?php if ( get_sub_field( 'steps__number' ) ) { ?>
									<p class="steps__number">
									    <?php the_sub_field( 'steps__number' ); ?>
									</p>
								<?php } ?>
								<?php if ( get_sub_field( 'steps__title' ) ) { ?>
									<p class="steps__title">
									    <?php the_sub_field( 'steps__title' ); ?>
									</p>
								<?php } ?>
								<?php if ( get_sub_field( 'steps__text' ) ) { ?>
									<p class="steps__text">
									    <?php the_sub_field( 'steps__text' ); ?>
									</p>
								<?php } ?>
							</div>
						</div>
					</div>	
				<?php endwhile; ?>
			<?php endif; ?>
            </div>



              <!-- <div class="steps__slide">
                  <div class="steps__content">
                      <div class="steps__img">
                        <img src="./assets/img/step__img.png" alt="">
                      </div>
                      <div class="steps__info">
                          <p class="steps__number">
                            Шаг 1
                          </p>
                          <p class="steps__title">
                            Регистрация в системе
                          </p>
                          <p class="steps__text">
                            Заходите на app.ainsys.com, создавайте рабочее пространство организации. WorkSpace позволяет консолидировать и организовать данные одной компании, куда подключаются все части инфраструктуры.
                          </p>
                      </div>
                  </div>
              </div>

              <div class="steps__slide">
                <div class="steps__content">
                    <div class="steps__img">
                      <img src="./assets/img/step__img.png" alt="">
                    </div>
                    <div class="steps__info">
                        <p class="steps__number">
                          Шаг 2
                        </p>
                        <p class="steps__title">
                            Онбординг ИТ специалистов
                        </p>
                        <p class="steps__text">
                            Пригласите в WorkSpace Ваших сисадминов. Интерфейс позволяет четко разделить ответственность, чтобы каждый отвечал за работу подконтрольных ему приложений и баз данных независимо от работы коллег и сторонних подрядчиков.
                        </p>
                    </div>
                </div>
            </div>

            <div class="steps__slide">
                <div class="steps__content">
                    <div class="steps__img">
                      <img src="./assets/img/step__img.png" alt="">
                    </div>
                    <div class="steps__info">
                        <p class="steps__number">
                          Шаг 3
                        </p>
                        <p class="steps__title">
                            Доступы и маппинг структур данных
                        </p>
                        <p class="steps__text">
                            AINSYS позволяет получить доступ к структуре данных любой внешней системы с API или способной отсылать веб-хуки. Для настройки бизнес логики AINSYS должна понимать, какие сущности есть в другой системе (документы, контакты, справочники), и иметь права на чтение и запись.
                        </p>
                    </div>
                </div>
            </div>

            <div class="steps__slide">
                <div class="steps__content">
                    <div class="steps__img">
                      <img src="./assets/img/step__img.png" alt="">
                    </div>
                    <div class="steps__info">
                        <p class="steps__number">
                          Шаг 4
                        </p>
                        <p class="steps__title">
                            Онбординг бизнес пользователей
                        </p>
                        <p class="steps__text">
                            Пригласите в WorkSpace Ваших руководителей и сотрудников. Мы оптимизировали интерфейс для работы команд нетехнических специалистов! <br>Все руководители заняты текучкой? Слишком сложная система? Пригласите партнёров AINSYS с компетенциями и опытом успешных внедрений нужной Вам ИТ системы.
                        </p>
                    </div>
                </div>
            </div>

            <div class="steps__slide">
                <div class="steps__content">
                    <div class="steps__img">
                      <img src="./assets/img/step__img.png" alt="">
                    </div>
                    <div class="steps__info">
                        <p class="steps__number">
                          Шаг 5
                        </p>
                        <p class="steps__title">
                            Организация инициативных рабочих групп
                        </p>
                        <p class="steps__text">
                            AINSYS создан для эффективной работы рабочих групп - ведь только в команде можно реализовать качественное внедрение! Интерфейс задает методологию и способствует организации всех процессов обсуждения, планирования, настройки и тестирования бизнес логики и потоков данных.
                        </p>
                    </div>
                </div>
            </div>

            <div class="steps__slide">
                <div class="steps__content">
                    <div class="steps__img">
                      <img src="./assets/img/step__img.png" alt="">
                    </div>
                    <div class="steps__info">
                        <p class="steps__number">
                          Шаг 6
                        </p>
                        <p class="steps__title">
                            Стандартизация данных в едином источнике правды
                        </p>
                        <p class="steps__text">
                            Благодаря методике структурирования и хранения данных в AINSYS нет необходимости настраивать обмен индивидуально между ИТ системами. Сервис выступает как единый источник правды и консолидирует данные, нормализует и “приводит все к одному знаменателю”. Через AINSYS Вы подключаете систему сразу ко всем приложениям за 1 операцию - нет необходимости настраивать отдельно связи между разными системами.
                        </p>
                    </div>
                </div>
            </div>

            <div class="steps__slide">
                <div class="steps__content">
                    <div class="steps__img">
                      <img src="./assets/img/step__img.png" alt="">
                    </div>
                    <div class="steps__info">
                        <p class="steps__number">
                          Шаг 7
                        </p>
                        <p class="steps__title">
                            Проверенные схемы и шаблоны ускоряют настройку в разы
                        </p>
                        <p class="steps__text">
                            Воспользуйтесь проверенным рецептами успеха AINSYS - готовыми картами обмена позволяющими настроить простые сценарии интеграции и автоматизации за минуты вместо часов, дней и недель!
                        </p>
                    </div>
                </div>
            </div>

            <div class="steps__slide">
                <div class="steps__content">
                    <div class="steps__img">
                      <img src="./assets/img/step__img.png" alt="">
                    </div>
                    <div class="steps__info">
                        <p class="steps__number">
                          Шаг 8
                        </p>
                        <p class="steps__title">
                            Симулятор и тестирования настроек на боевой инфраструктуре
                        </p>
                        <p class="steps__text">
                            Сразу после настройки уже можно запускать обмен в работу.С AINSYS Вам не потребуется инфраструктура для тестирования! AINSYS умеет эмулировать операции, а также тестирует автоматизации на старых транзакциях, чтобы вы могли убедиться, что все работает как было задумано перед тем, как допустить изменений в рабочих базах данных.
                        </p>
                    </div>
                </div>
            </div> -->
              
            </div>
          </div>
      </section>