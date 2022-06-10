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
				<h2 class="rate_page__title"><?= get_field( 'rate_page_head_title' ); ?></h2>
				<p class="rate_page__text"><?= get_field( 'rate_page_head_text' ); ?></p>
			</div>
			<div class="toggler__switch rate_page__toggler">
				<div class="toggler__switch__label active"><?php the_field( 'rate_page_without' ); ?></div>
				<div class="form-check form-switch">
					<input class="form-check-input form-check-input-content form-check-input-rate_page" type="checkbox" onclick="gtag( 'event', 'tumb_1', {   'event_category' : 'ain',   'event_label' : 't' });ym(86987238,'reachGoal','tumb_1'); return true;">
				</div>
				<div class="toggler__switch__label toggler__switch__label__rate">
					<?php the_field( 'rate_page_with' ); ?>
					<div class="rate_page__item__percent rate_page__toggler__percent"></div>
				</div>
			</div>
		</div>
		<?php if ( have_rows( 'rate_page' ) ) : ?>
			<div class="row rate_page__list active">
				<?php
				while ( have_rows( 'rate_page' ) ) :
					the_row();
					?>
					<div class="col col-12 col-md-6 col-lg-3">
						<div class="rate_page__item">
                            <div class="rate_page__item__header">
                                <?php if ( get_sub_field( 'name' ) ) { ?>
                                    <?php
                                    $name_bg = get_sub_field( 'name_bg' ) ? get_sub_field( 'name_bg' ) : 'light';
                                    ?>
                                    <div class="rate_page__item__name rate_page__item__name--<?php echo esc_attr( $name_bg ); ?>"><?php the_sub_field( 'name' ); ?></div>
                                <?php } ?>
                                <?php if ( get_sub_field( 'priority' ) ) { ?>
                                    <div class="rate_page__item__priority">
                                        <?php the_sub_field( 'priority' ); ?>
                                    </div>
                                <?php } ?>
								<?php if ( get_sub_field( 'percent' ) ) { ?>
                                    <div class="rate_year rate_page__item__percent">
                                        <?php the_sub_field( 'percent' ); ?>
                                    </div>
                                <?php } ?>
                            </div>
							<?php if ( get_sub_field( 'price_mounth' ) ) { ?>
								<div class="rate_page__item__price">
									   <span><?php the_sub_field( 'price_mounth' ); ?></span>
									<?php if ( get_sub_field( 'period' ) ) { ?>
										/ <?php the_sub_field( 'period' ); ?>
									<?php } ?>
								</div>
							<?php } ?>
								<div class="rate_page__item__payment">
								    <?php if ( get_sub_field( 'payment_for_month' ) ) { ?>
									   <span class="rate_mounth"><?php the_sub_field( 'payment_for_month' ); ?></span>
									 <?php } ?>   
									 <?php if ( get_sub_field( 'payment_for_year' ) ) { ?>
									   <span class="rate_year"><?php the_sub_field( 'payment_for_year' ); ?></span>
									 <?php } ?>  
								</div>
                            <div class="rate_page__item__statistics">
                                <?php if ( get_sub_field( 'users' ) ) { ?>
                                    <div class="rate_page__item__users">
                                        <?php the_sub_field( 'users' ); ?>
                                    </div>
                                <?php } ?>
								
                                <?php if ( get_sub_field( 'operations_mounth' ) ) { ?>
                                    <div class="rate_mounth rate_page__item__operations">
                                        <?php the_sub_field( 'operations_mounth' ); ?>
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

		<div class="rate_page_variables block-hide">
			<div class="var_first">
			  <?= get_field('var_first');?>
			</div>
			<div class="var_second">
			  <?= get_field('var_second');?>
			</div>
		</div>


		<div class="rate_page__ranges">
			<div class="range-slider">
				<div class="label-range"><?= get_field('label-range-first');?>
					<span class="tooltips__item">
				    	<div class="tooltips"><?= get_field('tooltips-range-first');?></div>
					</span>
				</div>
				<input id="range1" type="range" name="range1" min="0" max="50" step="1" value="0" />
			</div>
			<div class="range-slider">
			    <div class="label-range"><?= get_field('label-range-second');?></div>
                <input id="range2" type="range" name="range2" min="0" max="50000" step="500" value="0" />
			</div>
		</div>

		<div class="rate_page__header">
			<div class="rate_page__info">
		    	<h2 class="rate_page__title"><?= get_field('rate_page__title');?></h2>
			</div>
			<div class="table__reset"><?= get_field('table__reset');?></div>
		</div>
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th class="col_horizontal" scope="col">
						<?php if ( have_rows( 'rate_page_table_head' ) ) : ?>
								<?php
								$i = 1;
								while ( have_rows( 'rate_page_table_head' ) ) :
									the_row()
									?>
									<th class="col_horizontal rate-<?php echo $i; ?> scope="col">
										<div class="col_content">
											<div class="col_head">
											<?php if ( get_sub_field( 'rate_page_name' ) ) { ?>
												<?php
												$name_bg = get_sub_field( 'rate_page_name_background' ) ? get_sub_field( 'rate_page_name_background' ) : 'light';
												?>
												<div class="rate_page__item__name"><?php the_sub_field( 'rate_page_name' ); ?></div>
											<?php } ?>
												<div class="rate_delete rate_delete_first"></div>
											</div>
											<?php if ( get_sub_field( 'rate_page_price' ) ) { ?>
												<div class="rate_page__item__price">
													<?php the_sub_field( 'rate_page_price' ); ?>
												</div>
											<?php } ?>
											<div class="rate_page__statistics">
												<?php if ( get_sub_field( 'rate_page_users' ) ) { ?>
													<div class="rate_page__item__users">
														<?php the_sub_field( 'rate_page_users' ); ?>
													</div>
												<?php } ?>
												<?php if ( get_sub_field( 'rate_page_operations' ) ) { ?>
													<div class="rate_page__item__operations">
													<?php the_sub_field( 'rate_page_operations' ); ?>
													</div>
												<?php } ?>
										</div>
									</th>	
								<?php
								$i++;
							endwhile; ?>
						<?php endif; ?>
					</tr>
				</thead>


			<?php if ( have_rows( 'rate_page_table' ) ) : ?>
							<?php
							$i = 1;
							while ( have_rows( 'rate_page_table' ) ) :
								the_row();
							?>
				<tbody class="tbody_list tbody_list-disabled tbody_list-<?php echo $i; ?>">
					<tr class="tr_main">

					<?php if ( get_sub_field( 'table_main_name' ) ) { ?>
						<th class="row_main" scope="row">
						    <?php the_sub_field( 'table_main_name' ); ?>
						</th>
					<?php } ?>
						<td class="rate_first"></td>
						<td class="rate_second"></td>
						<td class="rate_third"></td>
						<td class="rate_fourth"></td>
					</tr>
					<?php if ( have_rows( 'table_dop' ) ) : ?>
							<?php
							while ( have_rows( 'table_dop' ) ) :
								the_row();
							?>
						<tr class="tr_dop">



							<th class="row_dop" scope="row">
								<?php the_sub_field( 'table_dop_name' ); ?>
									<?= the_sub_field( 'table_dop_name' ); ?>
								<?php ?>
								<span class="tooltips__item"><span> 
								<?php if ( get_sub_field( 'table_dop_tooltip' ) ) { ?>
									<div class="tooltips">
										<?= the_sub_field( 'table_dop_tooltip' ); ?>
									</div> 
								<?php } ?>
							</th>
							<?php if ( get_sub_field( 'table_val_fisrt' ) ) { ?>
								<td class="rate_first">
									<?php the_sub_field( 'table_val_fisrt' ); ?>
								</td>
								<?php } ?>
								<?php if ( get_sub_field( 'table_val_second' ) ) { ?>
								<td class="rate_second">
									<?php the_sub_field( 'table_val_second' ); ?>
								</td>
								<?php } ?>	
								<?php if ( get_sub_field( 'table_val_third' ) ) { ?>
								<td class="rate_third">
									<?php the_sub_field( 'table_val_third' ); ?>
								</td>
								<?php } ?>
								<?php if ( get_sub_field( 'table_val_fourth' ) ) { ?>
								<td class="rate_fourth">
									<?php the_sub_field( 'table_val_fourth' ); ?>
								</td>
								<?php } ?>
						</tr>
					    <?php endwhile; ?>
					<?php endif; ?>

				</div>
			</tbody>
			<?php
			$i++;
		 endwhile; ?>
	    <?php endif; ?>

		</table>
		</div>	



	</div>

</section>