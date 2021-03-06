<?php 
/**
 * Site Logo
 *
 * @package      Breeze
 * @author       Luis Colomé
 * @since        0.9.0
 * @license      GPL-2.0+
**/

/*
 * Remplazamos el título del sitio por código HTML personalizado.
 */
function personal_genesis_seo_title( $titulo ) {
    $titulo_front = '<h1 itemprop="headline" class="site-title"><a title="' . get_bloginfo('name') . '" href="' . get_bloginfo('url') . '"><img class="site-title__image" src="'. get_stylesheet_directory_uri() .'/assets/images/logo.svg" alt="' . get_bloginfo('name') . '"></a></h1>';
    $titulo = '<p itemprop="headline" class="site-title"><a title="' . get_bloginfo('name') . '" href="' . get_bloginfo('url') . '"><img class="site-title__image" src="'. get_stylesheet_directory_uri() .'/assets/images/logo.svg" alt="' . get_bloginfo('name') . '"></a></p>';

    if( is_front_page() ) {
        return $titulo_front;
    }else{
        return $titulo;
    }
}
add_filter( 'genesis_seo_title', 'personal_genesis_seo_title', 10, 1 );