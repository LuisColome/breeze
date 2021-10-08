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

// We get Provinces custom field data.
$province = get_field_object('br-provinces');
$province_value = $province['value'];
$province_label = $province['choices'][ $province_value ];

$args = array(
    'post_type'         => 'center',
    'posts_per_page'    => 99,
    'order'             => 'ASC',
    'orderby'           => 'date',
    'post_status'       => 'publish',
    'tax_query'         => array(
        'relation' => 'AND',
        array(
          'taxonomy'    => 'specialty',
          'field'       => 'slug',
          'terms'       => $specialty_value, // Specialties select.
        ),
        array(
            'taxonomy'    => 'province',
            'field'       => 'slug',
            'terms'       => $province_value, // Provinces select.
        )),
);

$lessargs = array(
    'post_type'         => 'center', // this can be an array : array('guide','guide1',...)
    'posts_per_page'    => 99,
    'order'             => 'ASC',
    'orderby'           => 'date',
    'post_status'       => 'publish',
    'tax_query'         => array(
        array(
          'taxonomy'    => 'specialty',
          'field'       => 'slug',
          'terms'       => $specialty_value, // (the name of what you want to filter by (latest or whatever))
        )),
);



        $query = new WP_Query($args); // Run the first Query
        
        $posts = $query->get_posts(); // Get Posts of first Query

        if ( !$posts ) { // Check if we have posts from the first query, if not simpler query is displayed.

            // This query is more simple, just an argument has been selected.
            $query = new WP_Query($lessargs);
            if ( $query->have_posts() ) : ?>
                <h4 class="swiper__title"><?php echo $specialty_label ?></h4>
                <div class="swiper mySwiper swiper-center">
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
            wp_reset_query();

        }else {

            // Only if PROVINCE has been selecte we display this query.
            $query = new WP_Query($args);
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
            wp_reset_query();

        }
         