<?php
/**
 * ACF Customizations
 *
 * @package      EAGenesisChild
 * @author       Bill Erickson
 * @since        0.9.0
 * @license      GPL-2.0+
**/

class BE_ACF_Customizations {

	public function __construct() {

		// Only allow fields to be edited on development
		if ( ! defined( 'WP_LOCAL_DEV' ) || ! WP_LOCAL_DEV ) {
			//add_filter( 'acf/settings/show_admin', '__return_false' );
		}

		// Register options page
		add_action( 'init', array( $this, 'register_options_page' ) );

		// Register Blocks
		add_action('acf/init', array( $this, 'register_blocks' ) );
	}

	/**
	 * Register Options Page
	 *
	 */
	function register_options_page() {
	    if ( function_exists( 'acf_add_options_page' ) ) {
	        acf_add_options_page( array(
	        	'title'      => __( 'Site Options', 'ea_genesis_child' ),
	        	'capability' => 'manage_options',
	        ) );
	    }
	}

	/**
	 * Register Blocks
	 * @link https://www.billerickson.net/building-gutenberg-block-acf/#register-block
	 *
	 * Categories: common, formatting, layout, widgets, embed
	 * Dashicons: https://developer.wordpress.org/resource/dashicons/
	 * ACF Settings: https://www.advancedcustomfields.com/resources/acf_register_block/
	 */
	function register_blocks() {

		if( ! function_exists('acf_register_block_type') )
			return;

            acf_register_block_type( array(
                'name'			    => 'city-list',
                'title'			    => __( 'City list', 'breeze' ),
                'render_template'	=> 'partials/block/city-list/city-list.php',
                'category'		    => 'formatting',
                'icon'			    => 'list-view',
                // 'icon' => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z" /><path d="M19 13H5v-2h14v2z" /></svg>',
                'mode'			    => 'auto',
                'keywords'		    => array( 'best', 'rehabs', 'provinces', 'City', 'cities', 'list' )
            ));

            acf_register_block_type( array(
                'name'			    => 'province-list',
                'title'			    => __( 'Province list', 'breeze' ),
                'render_template'	=> 'partials/block/province-list/province-list.php',
                'category'		    => 'formatting',
                'icon'			    => 'list-view',
                'mode'			    => 'auto',
                'keywords'		    => array( 'best', 'rehabs', 'provinces', 'cities', 'lists' )
            ));

            acf_register_block_type( array(
                'name'			    => 'center-slider',
                'title'			    => __( 'Center slider', 'breeze' ),
                'render_template'	=> 'partials/block/center-slider/center-slider.php',
                'category'		    => 'formatting',
                'icon'			    => 'slides',
                'mode'			    => 'auto',
                'enqueue_assets'    => function(){
                    wp_enqueue_style( 'block-center-slider-css', get_stylesheet_directory_uri() . '/partials/block/center-slider/css/swiper-bundle.min.css' , array(), '7.0.6', 'all' );
                    wp_enqueue_script( 'block-center-slider', get_stylesheet_directory_uri() . '/partials/block/center-slider/js/swiper-bundle.min.js', array('jquery'), '7.0.6', true );
                    wp_enqueue_script( 'block-center-slider-init', get_stylesheet_directory_uri() . '/partials/block/center-slider/js/swiper-bundle-init.js', array('jquery'), '1.0.0', true );
                },
                'keywords'		    => array( 'best', 'rehabs', 'center', 'centre', 'slider', 'carousel' )
            ));
	}
}
new BE_ACF_Customizations();