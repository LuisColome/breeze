<?php
/*
 * Custom Swiper slider block for Centers 
 * 
 * 
 */


global $post;
$arg = array(
    'post_type' => 'center', // this can be an array : array('guide','guide1',...)
    'posts_per_page' => 99,
    'order' => 'DESC',
    'post_status' => 'publish'
);
    $query = new WP_Query($arg);
    if ( $query->have_posts() ) : ?>

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                
                <div class="swiper-slide">
                <?php // we use the partial archive.php to create the archive loops
                get_template_part( 'partials/' . 'archive', 'center' ); ?>
                </div>

                <?php endwhile; ?>
            </div>

            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    <?php endif;
    wp_reset_query(); ?>