<?php
/*
 * Simple testimonials block for BestRehabs
 * 
 * 
 */

// We get Specialty custom field data.
$simple_rating = get_field( 'br_simple_rating');
$simple_testimonial = get_field( 'br_simple_testimonial');    
?>

<div class="wp-block-simple-testimonials stestimonials">
    <div class="stestimonials__wrap">
        <?php
        /*
         * Star rating - https://wpdevdesign.com/acf-star-rating-in-wordpress/
         */
        if ( $simple_rating ) {
            $average_stars = round( $simple_rating * 2 ) / 2;
            $drawn = 5;
            echo '<div class="stestimonials__rating">';
                // full stars.
                for ( $i = 0; $i < floor( $average_stars ); $i++ ) {
                $drawn--;
                    echo '<?xml version="1.0" ?><svg id="Layer_1" style="enable-background:new 0 0 30 30;" version="1.1" fill="#FFCE2C" width="20" height="20" viewBox="0 0 30 30" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M15.765,2.434l2.875,8.512l8.983,0.104c0.773,0.009,1.093,0.994,0.473,1.455l-7.207,5.364l2.677,8.576  c0.23,0.738-0.607,1.346-1.238,0.899L15,22.147l-7.329,5.196c-0.63,0.447-1.468-0.162-1.238-0.899l2.677-8.576l-7.207-5.364  c-0.62-0.461-0.3-1.446,0.473-1.455l8.983-0.104l2.875-8.512C14.482,1.701,15.518,1.701,15.765,2.434z"/></svg>';
                }
            echo '</div>';
        } ?>
        <p class="stestimonials__text"><?php echo $simple_testimonial ?></p>
    </div>
</div>