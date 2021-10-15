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
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
if( !is_tax( array('province', 'city', 'specialty') ) ) {
    add_action( 'genesis_archive_title_descriptions', 'genesis_do_breadcrumbs', 8 );
}


/**
 * Sets up hero section.
 *
 * @since 1.0.0
 *
 * @return void
 */
function lcm_hero_section(){

    // Display the hero section only on custom taxonomies.
	if( is_tax( array('province', 'city', 'specialty') ) ) {

        // Hero section body class related. 
        add_filter( 'body_class', 'lcm_hero_body_class', 10, 1 );

        // Attributes.
        add_filter( 'genesis_attr_taxonomy-archive-description', 'lcm_add_hero_subtitle_class' );
        add_filter( 'genesis_attr_archive-title', 'lcm_add_hero_title_class' );
        
        // Hero structure.
        add_action( 'genesis_after_header', 'lcm_archive_hero_image' );
    }
}
add_action( 'genesis_meta', 'lcm_hero_section' );


/**
 * Display the hero section.
 *
 * @since 1.0.0
 *
 * @return void
 */
function lcm_archive_hero_image() {
	
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
	    <section class="lcm-hero" role="banner" style="background-image:url('<?php echo $herourl; ?>');background-size:cover;">
    <?php
    }
    else { ?>
        <section class="lcm-hero" role="banner" style="background-image:url('<?php echo $url; ?>');background-size:cover;">
    <?php
    } ?>
            <div class="lcm-hero__wrap">
                <?php 
                // Add the Archive titles info.
                genesis_do_taxonomy_title_description(); 
                genesis_do_breadcrumbs(); ?>                
            </div>
        </section>
        <?php
	
    // Taxonomy title displayed above so remove the default location.
	remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
}

/**
 * Adds hero utility class to body element.
 *
 * @since 1.0.0
 *
 * @param array $classes List of body classes.
 *
 * @return array
 */
function lcm_hero_body_class( $classes ) {

	$classes[] = 'has-hero-section';
	return $classes;
}

/**
 * Adds attributes to hero archive title markup.
 *
 * @since 1.0.0
 *
 * @param array $atts Hero title attributes.
 *
 * @return array
 */
function lcm_add_hero_title_class( $atts ) { 

    $atts['class'] = 'lcm-hero__title';
    $atts['itemprop'] .= 'headline';
    return $atts;
}

/**
 * Adds attributes to hero section markup.
 *
 * @since 1.0.0
 *
 * @param array $atts Hero entry attributes.
 *
 * @return array
 */
function lcm_add_hero_subtitle_class( $atts ) { 

    $atts['itemref'] = 'hero-section';
    return $atts;
}



/**
 * Sets up CTA archive pages
 *
 * @since 1.0.0
 *
 * @return void
 */
function lcm_archive_cta(){

    $cta_title = get_field('br_archive_title_cta', 'option');
    $cta_subtitle = get_field('br_archive_subtitle_cta', 'option');
    
    $cta_link = get_field('br_archive_link_cta', 'option');


    // Display the hero section only on custom taxonomies.
	if( is_tax( array('province', 'city', 'specialty') ) ) {
        
        echo '<div class="archive-cta alignfull"><div class="archive-cta__wrap">';
        
            echo '<h2 class="archive-cta__title has-text-align-center">' . $cta_title . '</h2>';
            echo '<p class="has-text-align-center has-large-font-size">' . $cta_subtitle . '</p>';
            
            if( $cta_link ) {
                $link_url = $cta_link['url'];
                $link_title = $cta_link['title'];
                $link_target = $cta_link['target'] ? $cta_link['target'] : '_self';
                
                echo '<div class="wp-block-buttons is-content-justification-center">';
                    echo '<div class="wp-block-button"><a class="wp-block-button__link" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title) . '</a></div>';
                echo '</div>';
                
            }

        echo '</div></div>';
    }
}
add_action( 'genesis_after_content', 'lcm_archive_cta', 15 );

genesis();