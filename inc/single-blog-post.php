<?php
/**
 * Navigation
 *
 * @package White River
 * @author       Luis Colomé
 * @since        0.9.0
 * @license      GPL-2.0+
**/

/*  
 * Display the featured image on single posts from blog.
 * 
 */
function featured_post_image() {
    if ( ! is_singular( 'post' ) )
      return;
      the_post_thumbnail('lcm-center-featured');
  }
  add_action( 'genesis_entry_content', 'featured_post_image', 8 );