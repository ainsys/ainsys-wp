<?php
add_filter ( 'woocommerce_account_menu_items', 'misha_log_my_acc', 10 );
function misha_log_my_acc( $menu_links ){

	$menu_links = array_slice( $menu_links, 0, 1, true )
	+ array( 'login-security' => 'Мой профиль' )
	+ array_slice( $menu_links, 1, NULL, true );

	return $menu_links;

}

add_action( 'init', 'misha_add_endpoint2' );
function misha_add_endpoint2() {
	add_rewrite_endpoint( 'login-security', EP_PAGES );
}

add_action( 'woocommerce_account_login-security_endpoint', 'misha_my_acc_content' );
function misha_my_acc_content() {
$current_user = wp_get_current_user();
$userid = $current_user->ID;
$name = $current_user->user_firstname;
$country = get_user_meta( $userid, 'shipping_country', true );
$tel = get_user_meta( $userid, 'billing_phone', true );
$last_name = $current_user->user_lastname;
$user_otchestvo = get_the_author_meta( '_otchestvo', $userid );
$date_roz = get_the_author_meta( '_date_roz', $userid );
$gender = get_the_author_meta( '_gender', $userid );
$age = get_the_author_meta( '_age', $userid );
$more_tel = get_the_author_meta( '_more_tel', $userid );

$status = get_field('dev-status', 'user_' . $userid);
$middle_name = get_field('middle-name', 'user_' . $userid);

$addres = get_field('dev-address', 'user_' . $userid);
$alt_con_name = get_field('dev-alt-con-name', 'user_' . $userid);
$alt_con_val = get_field('dev-alt-con-val', 'user_' . $userid);

$type_org = get_field('dev-type-org', 'user_' . $userid);

$level = get_field('dev-ip-kval', 'user_' . $userid);

$yrname = get_field('dev-yr-name', 'user_' . $userid);
$inn = get_field('dev-yr-inn', 'user_' . $userid);
$kpp = get_field('dev-yr-kpp', 'user_' . $userid);

$count_junior = get_field('dev-yr-jun', 'user_' . $userid);
$count_middle = get_field('dev-yr-middle', 'user_' . $userid);
$count_middle2 = get_field('dev-yr-middle+', 'user_' . $userid);
$count_senior = get_field('dev-yr-senior', 'user_' . $userid);
	?>

	<section class="my-acc">
	  <div class="my-acc__container">
	  <a href="<?php echo get_home_url( null, 'my-account/', 'https' ); ?>" class="my-acc__back">Вернуться в панель управления</a>

	  <h1 class="my-acc__title">
      Мой профиль
	  </h1>

	  	<div class="my-acc__left">
        <div class="my-acc__ava">
          <?= get_avatar( $userid, $size );?>
        </div>

        <div class="my-acc__name">
          <?= $name; ?> <br>
          <?= $last_name; ?>
        </div>

        <div class="my-acc__email">
          <?= $current_user->user_email; ?>
        </div>
	    </div>

	    <div class="my-acc__right">

	      <?php if(current_user_can('patnerdevelopers') || current_user_can('developer')) : ?>

          <div class="my-acc-block">

          <?php if($status == 'Бронза') { ?>
            <div class="my-acc-cart my-acc-cart-bronze">
            <?php }else if($status == 'Серебро'){ ?>
            <div class="my-acc-cart my-acc-cart-silver">
            <?php }else if($status == 'Золото'){ ?>
            <div class="my-acc-cart my-acc-cart-gold">
            <?php }else if($status == 'Платина'){ ?>
            <div class="my-acc-cart my-acc-cart-platina">
            <?php }else{ ?>
            <div class="my-acc-cart">
            <?php } ?>
              <h2 class="my-acc-cart__title">
                Вы являетесь разработчиком AINSYS
              </h2>

              <div class="my-acc-cart__info">
                <div class="my-acc-cart__name">
                  <?= $last_name; ?> <?= $name; ?> <?= $middle_name;?>
                </div>

                  <div class="my-acc-cart__status">
                    Статус: <?=$status;?>
                  </div>

                <?php if($type_org == 'Индивидуальный разработчик') : ?>

                  <div class="my-acc-cart__level">
                    Уровень: <?=$level;?>
                  </div>

                  <?php if( get_field('dev-ip-stack', 'user_' . $userid)): ?>
                      <div class="my-acc-cart-stack">
                      <?php while( has_sub_field('dev-ip-stack', 'user_' . $userid) ): ?>
                          <span class="my-acc-cart-stack__item">
                              <?= get_sub_field('dev-ip-stack-item', 'user_' . $userid); ?>
                          </span>
                      <?php endwhile; ?>
                      </div>
                  <?php endif; ?>

                <?php endif; ?>

                <div class="my-acc-cart__level">
                  Тип: <?=$type_org;?>
                </div>


                <?php if($type_org == 'Команда разработчиков') : ?>

                  <div class="my-acc-cart__data">
                    <h3 class="my-acc-cart__title">Данные: </h3>

                    <span>Адрес: <b><?= $addres;?></b></span><br>
                    <span>Название: <b><?= $yrname;?></b></span><br>
                    <span>ИНН: <b><?= $inn;?></b></span><br>
                    <span>КПП: <b><?= $kpp;?></b></span><br><br><br>

                    <h3 class="my-acc-cart__title">Ваша команда: </h3>
                    <span>Junior: <b><?= $count_junior;?></b></span><br>
                    <span>Middle: <b><?= $count_middle;?></b></span><br>
                    <span>Middle+: <b><?= $count_middle2;?></b></span><br>
                    <span>Senior: <b><?= $count_senior;?></b></span>
                  </div>

                <?php endif; ?>

                <?php if($type_org == 'Индивидуальный разработчик') : ?>

                  <div class="my-acc-cart__data">
                    <h3 class="my-acc-cart__title">Данные: </h3>

                    <span>Адрес: <b><?= $addres;?></b></span>

                  </div>

                <?php endif; ?>

              </div>
            </div>
          </div>
	      <?php endif;?>

	      <div class="my-acc-block">
          <h2 class="my-acc-block__title my-acc-block__title-chel">
            Личные данные
          </h2>
          <p class="my-acc-block__text">
              Вы можете менять свои личные данные, подтверждать почту, управлять аккаунтом и настройками безопасности.
          </p>

          <div class="my-acc-info">
            <div class="my-acc-info__key">
              ФИО
            </div>
            <div class="my-acc-info__value">
              <?= $name; ?>
              <?= $last_name; ?>
              <?= $user_otchestvo; ?>

            </div>
          </div>

          <div class="my-acc-info">
            <div class="my-acc-info__key">
              Пол
            </div>
            <div class="my-acc-info__value">
              <?php if($gender === ''){
              ?>
              <span class="red">Не указано</span>
              <?php }else {
              ?>
              <?= $gender; ?>
              <?php } ?>
            </div>
          </div>

          <div class="my-acc-info">
            <div class="my-acc-info__key">
              Дата рождения
            </div>
            <div class="my-acc-info__value">
              <?php if($date_roz === ''){
              ?>
              <span class="red">Не указано</span>
              <?php }else {
              ?>
              <?= $date_roz; ?>
              <?php } ?>
            </div>
          </div>



          <div class="my-acc-info">
            <div class="my-acc-info__key">
              Возраст
            </div>
            <div class="my-acc-info__value">
              <?php if($age === ''){
              ?>
              <span class="red">Не указано</span>
              <?php }else {
              ?>
              <?= $age; ?>
              <?php } ?>
            </div>
          </div>

	      </div>

        <div class="my-acc-block">
          <h2 class="my-acc-block__title my-acc-block__title-tel">
           Контактные данные
          </h2>

          <div class="my-acc-info">
            <div class="my-acc-info__key">
              Почта
            </div>
            <div class="my-acc-info__value">
              <?= $current_user->user_email; ?>
            </div>
          </div>

          <div class="my-acc-info">
            <div class="my-acc-info__key">
              Страна
            </div>
            <div class="my-acc-info__value">
             <?= $country; ?>
            </div>
          </div>

          <div class="my-acc-info">
            <div class="my-acc-info__key">
              Телефон
            </div>
            <div class="my-acc-info__value">
              <?php if($tel === ''){
              ?>
              <span class="red">Не указано</span>
              <?php }else {
              ?>
              <?= $tel; ?>
              <?php } ?>
            </div>
          </div>

          <div class="my-acc-info">
            <div class="my-acc-info__key">
              Дополнительный телефон
            </div>
            <div class="my-acc-info__value">
              <?php if($more_tel === ''){
              ?>
              <span class="red">Не указано</span>
              <?php }else {
              ?>
              <?= $more_tel; ?>
              <?php } ?>
            </div>
          </div>

          <div class="my-acc-form">
            <h3 class="my-acc-form__title">
              Изменить  данные
            </h3>
            <p class="my-acc-form__text">
              Напишите нам что вы хотите изменить и наш менеджер поправит это
            </p>
            <?= do_shortcode('[contact-form-7 id="2731" title="Изменить данные в профиле"]'); ?>
          </div>
	      </div>

        <div class="my-acc-block">
          <h2 class="my-acc-block__title my-acc-block__title-sec">
           Безопасность
          </h2>
          <p class="my-acc-form__text">
                        Желаете изменить пароль? <a href="/my-account/lost-password/" target="_blank">Нажмите сюда.</a>
                      </p>

<!--
          <div class="my-acc-reset-pass">
            <?php  do_action( 'woocommerce_before_reset_password_form' ); ?>
            <form method="post" action="<?php echo site_url('/wp-login.php?action=lostpassword'); ?>" class="woocommerce-ResetPassword lost_reset_password">

            	<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
            		<label for="password_1"><?php esc_html_e( 'New password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
            		<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_1" id="password_1" autocomplete="new-password" placeholder="••••••••" />
            	</p>
            	<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
            		<label for="password_2"><?php esc_html_e( 'Re-enter new password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
            		<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_2" id="password_2" autocomplete="new-password"placeholder="••••••••" />
            	</p>

            	<input type="hidden" name="reset_key" value="<?php echo esc_attr( $args['key'] ); ?>" />
            	<input type="hidden" name="reset_login" value="<?php echo esc_attr( $args['login'] ); ?>" />

            	<div class="clear"></div>

            	<?php do_action( 'woocommerce_resetpassword_form' ); ?>

            	<p class="woocommerce-form-row form-row">
            		<input type="hidden" name="wc_reset_password" value="true" />
            		<button type="submit" class="woocommerce-Button button my-acc-reset-pass__btn" value="<?php esc_attr_e( 'Изменить пароль', 'woocommerce' ); ?>"><?php esc_html_e( 'Изменить пароль', 'woocommerce' ); ?></button>
            	</p>

            	<?php wp_nonce_field( 'reset_password', 'woocommerce-reset-password-nonce' ); ?>

            </form>
            <?php do_action( 'woocommerce_after_reset_password_form' );  ?>
          </div>
          -->



	    </div>
	  </div>
	</section>
	</div>

	<div>
	<?php
}

