<?php 
/**
 * Archive partial
 *
 * @package      Breeze
 * @author       Luis Colomé
 * @since        0.9.0
 * @license      GPL-2.0+
**/

echo '<article class="lcm-post">'; 

    echo '<figure class="lcm-post__image">';
	    echo '<a class="lcm-post__image__link" href="' . get_permalink() . '" tabindex="-1" aria-hidden="true">' . get_the_post_thumbnail( get_the_ID(), 'lcm-center-featured' ) . '</a>';
        ea_entry_category();
    echo '</figure>';

	echo '<header class="lcm-post__header">';
		// $categories = get_the_category();
		// $category = !empty( $categories ) ? esc_html( $categories[0]->name ) : '' ;
		// echo '<p class="lcm-post__meta">' . $category . '</p>';
 		echo '<h2 class="lcm-post__title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
        echo '<p class="lcm-post__content">';
            echo wp_trim_words( get_the_content(), 19, '...' );
        echo '</p>';
		echo '<a class="lcm-post__read-more-link" href="' . get_permalink() . '" tabindex="-1" aria-hidden="true">Read More<span class="screen-reader-text"> of ' . get_the_title() . '</span></a>';
	echo '</header>';

echo '</article>';