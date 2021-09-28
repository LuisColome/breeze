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

	echo '<a class="lcm-center__image-link" href="' . get_permalink() . '" tabindex="-1" aria-hidden="true">' . get_the_post_thumbnail( get_the_ID(), 'lcm-featured-images' ) . '</a>';

	echo '<header class="lcm-center__header">';
		// $categories = get_the_category();
		// $category = !empty( $categories ) ? esc_html( $categories[0]->name ) : '' ;
		// echo '<p class="lcm-center__meta">' . $category . '</p>';
		ea_entry_category();
 		echo '<h2 class="lcm-center__title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
	echo '</header>';

echo '</article>';