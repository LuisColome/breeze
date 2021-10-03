<?php 
/**
 * Single Center temaplate
 *
 * @package      Breeze
 * @author       Luis Colomé
 * @since        0.9.8
 * @license      GPL-2.0+
**/

// Remove the entry title.
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

// Remove post info.
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

// Remove default image
remove_action( 'genesis_entry_header', 'genesis_do_post_format_image', 4 );

/**
 * Add class to the Genesis header
 * @since 0.9.8
 */
function cabecera_add_class_attr( $attributes ) {
    $attributes['class'] .= ' lcm-header';
    return $attributes;
}
add_filter( 'genesis_attr_entry-header', 'cabecera_add_class_attr' );

/**
 * Custom header for any center
 * 
 */
function lcm_entry_header(){

    $img = genesis_get_image(
        array(
            'format' => 'html', 
            'size' => 'lcm-center-featured', 
            'attr' => 
            array(
                'class' => 'lcm-header__img'
            )
        )
    ); ?>
    
    <div class="lcm-header__wrap">

        <div class="lcm-header__columns">

            <div class="lcm-header__column">
                <?php 
                $args = array('number' => '1',);
                $terms = get_terms('specialty', $args ); 
                foreach($terms as $term) {
                    // Get the $term link.
                    $term_link = get_term_link( $term );

                    echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>';
                } ?>

                <?php 
                /*
                * Star rating - https://wpdevdesign.com/acf-star-rating-in-wordpress/
                */
                $rating = get_field( 'br_star_rating', $post->ID );
                if ( $rating ) {
                    $average_stars = round( $rating * 2 ) / 2;
                    $drawn = 5;
                    echo '<div class="lcm-center__rating">';
                        // full stars.
                        for ( $i = 0; $i < floor( $average_stars ); $i++ ) {
                        $drawn--;
                            echo '<?xml version="1.0" ?><svg id="Layer_1" style="enable-background:new 0 0 30 30;" version="1.1" fill="#FFCE2C" width="20" height="20" viewBox="0 0 30 30" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M15.765,2.434l2.875,8.512l8.983,0.104c0.773,0.009,1.093,0.994,0.473,1.455l-7.207,5.364l2.677,8.576  c0.23,0.738-0.607,1.346-1.238,0.899L15,22.147l-7.329,5.196c-0.63,0.447-1.468-0.162-1.238-0.899l2.677-8.576l-7.207-5.364  c-0.62-0.461-0.3-1.446,0.473-1.455l8.983-0.104l2.875-8.512C14.482,1.701,15.518,1.701,15.765,2.434z"/></svg>';
                        }
                    echo '</div>';
                } ?>
                <h1 class="lcm-header__title entry-title" itemprop="headline"><?php the_title() ?></h1>
                
                <?php 
                // We get the city
                $cities = get_terms('city');
                $city = $cities[0];

                // We get the province
                $provinces = get_terms('province'); 
                $province = $provinces[0]; ?>

                <p class="lcm-header__location"><?php echo $city->name ?>, <?php echo $province->name ?></p>
               
            </div><!-- End first column -->

            <div class="lcm-header__column">
                <figure class="lcm-header__img">
                    <?php if($img) {
                        echo $img;
                    }else{
                        echo '<img class="lcm-header__img fallback-imagge" src="/wp-content/uploads/fallback-image-768x512.jpg" alt="BestRehabs">';
                    }?>
                </figure>
            </div><!-- End second column -->
        
        </div><!-- End columns -->
        
    </div><!-- End header__wrap -->

    <?php
}
add_action( 'genesis_entry_header', 'lcm_entry_header', 8);

// start the engine
genesis();