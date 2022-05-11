<?php
/**
 * Rate_page block.
 *
 * @package ainsys
 */

$block_id = 'rate_page-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'rate_page';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
	<div class="container">
		<div class="rate_page__header">
			<div class="rate_page__info">
				<?php if ( get_field( 'title' ) ) { ?>
					<h2 class="rate_page__title"><?php the_field( 'title' ); ?></h2>
				<?php } ?>
				<?php if ( get_field( 'text' ) ) { ?>
					<p class="rate_page__text"><?php the_field( 'text' ); ?></p>
				<?php } ?>
			</div>
			<div class="toggler__switch rate_page__toggler">
				<div class="toggler__switch__label active"><?php the_field( 'rate_page_without' ); ?></div>
				<div class="form-check form-switch">
					<input class="form-check-input form-check-input-content" type="checkbox" onclick="gtag( 'event', 'tumb_1', {   'event_category' : 'ain',   'event_label' : 't' });ym(86987238,'reachGoal','tumb_1'); return true;">
				</div>
				<div class="toggler__switch__label toggler__switch__label__rate">
					<?php the_field( 'rate_page_with' ); ?>
					<div class="rate_page__item__percent rate_page__toggler__percent"></div>
				</div>
			</div>
		</div>
		<?php if ( have_rows( 'rate_page' ) ) : ?>
			<div class="row rate_page__list">
				<?php
				while ( have_rows( 'rate_page' ) ) :
					the_row();
					?>
					<div class="col-md-6 col-lg-3">
						<div class="rate_page__item">
                            <div class="rate_page__item__header">
                                <?php if ( get_sub_field( 'name' ) ) { ?>
                                    <?php
                                    $name_bg = get_sub_field( 'name_bg' ) ? get_sub_field( 'name_bg' ) : 'light';
                                    ?>
                                    <div class="rate_page__item__name rate_page__item__name--<?php echo esc_attr( $name_bg ); ?>"><?php the_sub_field( 'name' ); ?></div>
                                <?php } ?>
                                <?php if ( get_sub_field( 'priority' ) ) { ?>
                                    <div class="rate_page__item__priority"></div>
                                <?php } ?>
								<?php if ( get_sub_field( 'percent' ) ) { ?>
                                    <div class="rate_page__item__percent"></div>
                                <?php } ?>
                            </div>
							<?php if ( get_sub_field( 'price' ) ) { ?>
								<div class="rate_page__item__price<?php echo esc_attr( $sale ); ?>">
									   <span><?php the_sub_field( 'price' ); ?></span>
									<?php if ( get_sub_field( 'period' ) ) { ?>
										/ <?php the_sub_field( 'period' ); ?>
									<?php } ?>
								</div>
							<?php } ?>
                            <div class="rate_page__statistics">
                                <?php if ( get_sub_field( 'users' ) ) { ?>
                                    <div class="rate_page__item__users">
                                        <?php the_sub_field( 'users' ); ?>
                                    </div>
                                <?php } ?>
                                <?php if ( get_sub_field( 'operations' ) ) { ?>
                                    <div class="rate_page__item__operations">
                                        <?php the_sub_field( 'operations' ); ?>
                                    </div>
                                <?php } ?>
                            </div>
							<?php if ( get_sub_field( 'title' ) ) { ?>
								<div class="rate_page__item__title">
									<?php the_sub_field( 'title' ); ?>
								</div>
							<?php } ?>
							<?php if ( get_sub_field( 'text' ) ) { ?>
								<div class="rate_page__item__text">
									<?php the_sub_field( 'text' ); ?>
								</div>
							<?php } ?>
							<?php if ( get_sub_field( 'link' ) ) { ?>
								<?php
								$button        = get_sub_field( 'link' );
								$button_url    = $button['url'] ? $button['url'] : '#';
								$button_title  = $button['title'] ? $button['title'] : '';
								$button_target = $button['target'] ? $button['target'] : '_self';
								?>
								<div class="rate_page__item__link">
									<a href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>" onclick="gtag( 'event', 't_1', {   'event_category' : 'ain',   'event_label' : 'p' });ym(86987238,'reachGoal','t_1'); return true;"><?php echo esc_html( $button_title ); ?></a>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>



		<div class="rate_page__ranges">
			<div class="range-slider">
				<div class="label-range">Сколько у вас в команде интеграторов?
					<span class="tooltips__item">
				    	<div class="tooltips">Интеграция через АИНСИС от 5 минут до нескольких часов VS интеграция вручную – от недели до нескольких месяцев или лет</div>
					</span>
				</div>
				<input id="range1" type="range" name="range1" min="2" max="100" step="1" value="2" />
			</div>
			<div class="range-slider">
			    <div class="label-range">Сколько у вас операций в месяц?</div>
                <input id="range2" type="range" name="range2" min="500" max="100000" step="500" value="500" />
			</div>
		</div>

		<div class="rate_page__header">
			<div class="rate_page__info">
				<?php if ( get_field( 'title' ) ) { ?>
					<h2 class="rate_page__title">Подробное сравнение тарифов</h2>
				<?php } ?>
			</div>
			<div class="table__reset">Сбросить настройки</div>
		</div>
		<table class="table">
			<thead>
				<tr>
				<th scope="col"></th>
				<th scope="col">
					
				</th>
				<th scope="col">Last</th>
				<th scope="col">Handle</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<th scope="row">1</th>
				<td>Mark</td>
				<td>Otto</td>
				<td>@mdo</td>
				</tr>
				<tr>
				<th scope="row">2</th>
				<td>Jacob</td>
				<td>Thornton</td>
				<td>@fat</td>
				</tr>
				<tr>
				<th scope="row">3</th>
				<td colspan="2">Larry the Bird</td>
				<td>@twitter</td>
				</tr>
			</tbody>
		</table>



	</div>
</section>
