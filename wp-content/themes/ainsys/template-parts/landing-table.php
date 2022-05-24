<section id="landing-table" class="landing-table">
    <h2 class="landing-table__title">
        Сравнение тарифов
    </h2>

    <div class="landing-table__wrapper">
        <div class="landing-table-info">

            <div class="landing-table-info-item">
                User deletion <span> Manage user deletion across Segment and supported destinations</span>
            </div>

            <div class="landing-table-info-item">
                User deletion <span>Manage user deletion across Segment and supported destinations</span>
            </div>

            <div class="landing-table-info-item">
                User deletion <span>Manage user deletion across Segment and supported destinations</span>
            </div>

            <div class="landing-table-info-item">
                User deletion <span>Manage user deletion across Segment and supported destinations</span>
            </div>



        </div>

        <div class="landing-table-slider">
            <nav class="landing-table-nav">

              <a href="#" class="landing-table-nav__btn landing-table-nav__btn-prev">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9 18L15 12L9 6" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </a>

              <a href="#" class="landing-table-nav__btn landing-table-nav__btn-next">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9 18L15 12L9 6" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </a>

            </nav>
            <div class="swiper-container swiper-landing-table">
                <div class="swiper-wrapper">
								<?php $wp_query = new WP_Query(array(
                        'posts_per_page' => -1,
                        'post_type'      => 'product',
                        'post_status'    => 'publish',
                        'orderby'        => 'date',
                        'order'          => 'ASC',

                       ));


							while ( $wp_query->have_posts() ) {
                 $wp_query->the_post();
                 global $product;

                 ?>

                    <div class="swiper-slide">
                        <div class="landing-table-product">
														<a href="<?php the_permalink( ); ?>"  class="landing-table-product__img">
                                <?= get_the_post_thumbnail( $id , 'pagehow'); ?>
                            </a>
                            <a href="<?php the_permalink( ); ?>"  class="landing-table-product__name">
                                <?php the_title();?>
                            </a>
                            <a href="<?php the_permalink( ); ?>" class="landing-table-product__slogan">

                            </a>
                            <a href="<?php the_permalink( ); ?>" class="landing-table-product__price">

                                <?php echo wc_price($product->get_price()) , " / месяц" ?>
                            </a>
                            <a href="<?php the_permalink( ); ?>" class="btn btn-green landing-table-product__btn">
                                Создать аккаунт
                            </a>
                            <a href="<?php the_permalink( ); ?>" class="master-item__more landing-table-product__more">
                                Узнать больше >
                            </a>

                            <div class="landing-table-product-info">

                                <div class="landing-product-info">
                                    <p class="landing-product-info__name">Быстрый и простой монтаж <span> с защитой от ошибок</span></p>
                                    <span>Нет</span>
                                </div>

                                <div class="landing-product-info">
                                    <p class="landing-product-info__name">Безопасность <span>низкое напряжение питания светильника, отсутствие сильного нагрева</span></p>
                                    <span>Нет</span>
                                </div>

                                <div class="landing-product-info">
                                    <p class="landing-product-info__name">Качество света <span>высокая яркость, естественная цветопередача, отсутствие множественных теней</span></p>
                                    <span>Да</span>
                                </div>

                                <div class="landing-product-info">
                                    <p class="landing-product-info__name">Срок службы <span>использование прочных материалов и компонентов позволяет устройствам работать много больше гарантийного срока</span></p>
                                    <span>Да</span>
                                    <span class="green"></span>
                                </div>

                                




                            </div>
                        </div>
                    </div>


                 <?php  }  wp_reset_query();
                                        wp_reset_postdata(); ?>



                </div>
            </div>
        </div>

    </div>

</section>