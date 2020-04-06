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
	acf_add_options_sub_page("Business Information");
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


add_editor_style();

/*-- Custom template for Case Study --*/
add_filter( 'single_template', 'case_study_template' );
function case_study_template($single_template)
{
	$category_name = get_term_by( 'slug', 'case-study', 'category' );
    if (in_category($category_name)) {
        $file = get_template_directory().'/single-case-study.php';
        if ( file_exists($file) ) {
            return $file;
        }
    }
    return $single_template;
}

// Trim excerpt
function trim_excerpt($text) {
	$string = "[...]";
     $text = str_replace( $string, '...', $text);
     return $text;
    }
add_filter('get_the_excerpt', 'trim_excerpt', 99);

// Remove excerpt "read more" button
function understrap_all_excerpts_get_more_link( $post_excerpt ) {

	return $post_excerpt;
}

add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );

/**
 * Replaces the excerpt "more" text by a link
 */
if ( ! function_exists( 'dyad_excerpt_continue_reading' ) ) {
	function dyad_excerpt_continue_reading() {
		return '<div class="news-card__button"><a href="' . esc_url( get_permalink() ) . '" class="link"><div class="btn_red-border">' . sprintf( esc_html__( 'Read On', 'dyad' ), '<span class="screen-reader-text"> "' . get_the_title() . '"</span>' ) . '</div></a></div>';
	}
} // /dyad_excerpt_continue_reading

add_filter( 'excerpt_more', 'dyad_excerpt_continue_reading' );

//Enqueue javascript
function my_theme_scripts() {
    wp_enqueue_script( 'wrap-divs', get_template_directory_uri() . '/js/wrap-divs.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

//Add categories to pages
function add_taxonomies_to_pages() {
 register_taxonomy_for_object_type( 'post_tag', 'page' );
 register_taxonomy_for_object_type( 'category', 'page' );
 }
add_action( 'init', 'add_taxonomies_to_pages' );

// Add excerpts to pages
add_post_type_support( 'page', 'excerpt' );

// Get page ID
function get_ID_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

// Turn off jetpack minification
add_filter( 'jetpack_sharing_counts', '__return_false', 99 );
add_filter( 'jetpack_implode_frontend_css', '__return_false', 99 );