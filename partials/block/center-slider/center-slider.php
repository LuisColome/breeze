<?php
/*
 * Custom Swiper slider block for Centers 
 * 
 * 
 */


global $post;

// We get Specialty custom field data.
$specialty = get_field_object('br-specialties');
$specialty_value = $specialty['value'];
$specialty_label = $specialty['choices'][ $specialty_value ];

// We get Proveinces custom field data.
$province = get_field_object('br-provinces');
$province_value = $province['value'];
$province_label = $province['choices'][ $province_value ];

$arg = array(
    'post_type'         => 'center', // this can be an array : array('guide','guide1',...)
    'posts_per_page'    => 99,
    'order'             => 'DESC',
    'post_status'       => 'publish',
    'tax_query'         => array(
        'relation' => 'AND',
        array(
          'taxonomy'    => 'specialty',
          'field'       => 'slug',
          'terms'       => $specialty_value, // (the name of what you want to filter by (latest or whatever))
        ),
        array(
            'taxonomy'    => 'province',
            'field'       => 'slug',
            'terms'       => $province_value, // (the name of what you want to filter by (latest or whatever))
        )),
);
    $query = new WP_Query($arg);
    if ( $query->have_posts() ) : ?>
        <h4 class="swiper__title"><?php echo $specialty_label ?></h4>
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