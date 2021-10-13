<?php
/**
 * Archive
 *
 * @package      Breeze
 * @author       Luis Colomé
 * @since        0.9.0
 * @license      GPL-2.0+
**/

// Full Width
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

/**
 * Blog Archive Body Class (only on archive pages)
 *
 */
function ea_blog_archive_body_class( $classes ) {
	$classes[] = 'archive';
	return $classes;
}
add_filter( 'body_class', 'ea_blog_archive_body_class' );

// Move breadcrumbs
// remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
// add_action( 'genesis_archive_title_descriptions', 'genesis_do_breadcrumbs', 8 );

/**
 * 
 * 
 */
function lcm_display_hero_section(){

    // Display the hero section only on custom taxonomies.
	if( is_tax( array('province', 'city', 'specialty') ) ) {

        // Add body class 
        add_filter( 'body_class', 'lcm_hero_body_class', 10, 1 );
        
        add_action( 'genesis_after_header', 'dcwd_archive_hero_image' );
    }
}
add_action( 'genesis_meta', 'lcm_display_hero_section' );



function dcwd_archive_hero_image() {
	
	global $wp_query;

	// get the current taxonomy term for the featured image
    $term = get_queried_object();

    // Default image
	$default_image = get_field('lcm_default_image', 'options');
        // Image variables.
        $url = $default_image['url'];

    // We get the featured picture from the taxonomy custom field
    $archive_background = get_field('br_archive_hero_image', $term);
        // Image variables.
        $herourl = $archive_background['url'];

    // Check if there is an image attached to the custom field.
    if( !empty($archive_background) ) {
    ?>
	    <section class="lcm-hero" style="background-image:url('<?php echo $herourl; ?>');background-size:cover;">
    <?php
    }
    else { ?>
        <section class="lcm-hero" style="background-image:url('<?php echo $url; ?>');background-size:cover;">
    <?php
    } ?>
            <div class="lcm-hero__wrap">
                <?php 
                // Add the Archive titles info.
                genesis_do_taxonomy_title_description(); ?>                
            </div>
        </section>
        <?php
	
    // Taxonomy title displayed above so remove the default location.
	remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
}

/**
 * Add hero section body class.
 *
 * @since 1.0.0
 *
 * @param $classes
 *
 * @return array
 */
function lcm_hero_body_class( $classes ) {
	$classes[] = 'has-hero-section';

	return $classes;
}


genesis();