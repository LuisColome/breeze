<?php 

/**
 * Center archive partial
 *
 * @package      Breeze
 * @author       Luis Colomé
 * @since        0.9.0
 * @license      GPL-2.0+
**/

echo '<article class="lcm-center">'; 

    $default_image = get_field('lcm_default_image', 'options');
    if( $default_image ) {

        // Image variables.
        $url = $default_image['url'];
        $title = $default_image['title'];
        $alt = $default_image['alt'];
        $caption = $default_image['caption'];

        // Thumbnail size attributes.
        $size = 'lcm-center-featured';
        $thumb = $default_image['sizes'][ $size ];
    }

    if( has_post_thumbnail() ) {
	    echo '<a class="lcm-center__image-link" href="' . get_permalink() . '" tabindex="-1" aria-hidden="true">' . get_the_post_thumbnail( get_the_ID(), 'lcm-center-featured' ) . '</a>';
    }else{
        echo '<a class="lcm-center__image-link" href="' . get_permalink() . '" tabindex="-1" aria-hidden="true"><img class="br__img fallback__imgage" src="'.  esc_url($thumb)  .'" alt="' . esc_attr($alt) . '"></a>';
    }

	echo '<header class="lcm-center__header">';
		// $categories = get_the_category();
		// $category = !empty( $categories ) ? esc_html( $categories[0]->name ) : '' ;
		// echo '<p class="lcm-center__meta">' . $category . '</p>';
		// ea_entry_category();

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
        }
        
 		echo '<h2 class="lcm-center__title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
	echo '</header>';

echo '</article>';