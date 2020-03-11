<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/wp-admin.php',                        // /wp-admin/ related functions
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

/*-- ADD ACF OPTIONS --*/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	acf_add_options_sub_page("Header");
	acf_add_options_sub_page("Social Media");
	acf_add_options_sub_page("Brands");
}

/*-- REGISTER MENUS --*/

function register_my_menus() {
  register_nav_menus(
    array(
      'footer-menu' => __( 'Footer Menu' )
     )
   );
 }
 add_action( 'init', 'register_my_menus' );
 
 /* -- Add social media icons to header --*/
 
add_filter( 'wp_nav_menu_items', 'add_social_media_icons', 10, 2 );
function add_social_media_icons ( $items, $args ) {
    if( $args->theme_location == 'primary' ) {
        $items .=
        '<div class="header-social-media">
        	<a href="https://www.facebook.com/pg/ReallyEpicDog/about/" target="_blank">
        		<img src="'.get_template_directory_uri().'/assets/images/facebook.svg">
        	</a>
        	<a href="https://www.instagram.com/repicdog/?hl=en" target="_blank">
        		<img src="'.get_template_directory_uri().'/assets/images/instagram.svg">
        	</a>
        	<a href="https://twitter.com/repicdog?lang=en" target="_blank">
        		<img src="'.get_template_directory_uri().'/assets/images/twitter.svg">
        	</a>
        	<a href="https://www.linkedin.com/company/really-epic-dog-group/about/" target="_blank">
        		<img src="'.get_template_directory_uri().'/assets/images/linkedin.svg">
        	</a>
        </div>';
    }
    return $items;
}

// Enqueue script
function myprefix_enqueue_scripts() {
    wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/add-social-media-header.js', array(), true );
}
add_action( 'wp_enqueue_scripts', 'myprefix_enqueue_scripts' );
	 