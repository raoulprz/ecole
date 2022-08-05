<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */

// CUSTOMIZATIONS
//Include style files
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );

//CHILD SCRIPT
function theme_custom_script() {
    wp_enqueue_script( 'child-script', get_stylesheet_directory_uri() . '/main.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'theme_custom_script' );

//Include shortcodes
include_once( get_stylesheet_directory() .'/includes/wp_head.php');
include_once( get_stylesheet_directory() .'/includes/admin_head.php');
include_once( get_stylesheet_directory() .'/includes/establishments.php');
include_once( get_stylesheet_directory() .'/includes/offers.php');
include_once( get_stylesheet_directory() .'/includes/booking.php');
include_once( get_stylesheet_directory() .'/includes/account.php');
include_once( get_stylesheet_directory() .'/includes/types.php');
include_once( get_stylesheet_directory() .'/includes/cantons.php');
include_once( get_stylesheet_directory() .'/includes/acf.php');
include_once( get_stylesheet_directory() .'/includes/shortcodes.php');
include_once( get_stylesheet_directory() .'/includes/macros.php');
include_once( get_stylesheet_directory() .'/includes/custom_query.php');
include_once( get_stylesheet_directory() .'/includes/registration.php');
include_once( get_stylesheet_directory() .'/includes/relations.php');

/**
 * Theme constants
 *
 * define the constants used in the theme here
 */
define('THEME_URI', get_bloginfo('template_url'));
define('THEME_PATH', __dir__);

//Redirect to home after logout
add_action('wp_logout','auto_redirect_external_after_logout');
function auto_redirect_external_after_logout(){
    $homeURL = get_option('home');
    wp_redirect( $homeURL );
    exit();
}


// Allow editors to see access the Menus page under Appearance but hide other options
// Note that users who know the correct path to the hidden options can still access them
function hide_menu() {
 	$user = wp_get_current_user();

	// Check if the current user is an Editor
	if ( in_array( 'editor', (array) $user->roles ) ) {

		// They're an editor, so grant the edit_theme_options capability if they don't have it
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			$role_object = get_role( 'editor' );
			$role_object->add_cap( 'edit_theme_options' );
		}

		// Hide the Themes page
	    remove_submenu_page( 'themes.php', 'themes.php' );

	    // Hide the Widgets page
	    remove_submenu_page( 'themes.php', 'widgets.php' );

	    // Remove Customize from the Appearance submenu
	    global $submenu;
	    unset($submenu['themes.php'][6]);
	}
}
add_action('admin_menu', 'hide_menu', 10);

//Display Admin menus
add_theme_support( 'menus' );

//Add support for thumbnails
add_theme_support( 'post-thumbnails' );

// Add excerpt for page and post
add_action( 'init', function() {
    add_post_type_support('post', 'excerpt');
    add_post_type_support('page', 'excerpt');
}, 99);

/**
 * Enqueue admin script (Wordpress backend script post page only)
 */
function admin_scripts($hook) {
    if ('post.php' !== $hook) {
        return;
    }
    wp_enqueue_script('admin_scripts', get_stylesheet_directory_uri() . '/admin.js');
    wp_enqueue_style('fontawesome', 'https://pro.fontawesome.com/releases/v5.10.0/css/all.css');
    wp_enqueue_style( 'admin_styles', get_stylesheet_directory_uri() . '/admin-style.css');
}
add_action('admin_enqueue_scripts', 'admin_scripts');

function var_template_include($t){
    $GLOBALS['current_theme_template'] = basename($t);
    return $t;
}
add_filter('template_include', 'var_template_include', 1000);

function get_current_template($echo = false) {
    if( !isset( $GLOBALS['current_theme_template'] ) )
        return false;
    if( $echo )
        echo $GLOBALS['current_theme_template'];
    else
        return $GLOBALS['current_theme_template'];
}

add_image_size( 'Post thumbnail', 640, 320, true );

function wpb_custom_new_menu() {
	register_nav_menus(
		array(
		'account-menu' => __( 'Account menu' ),
		'member-account-menu' => __( 'Member account menu' ),
		)
	);
}
add_action( 'init', 'wpb_custom_new_menu' );

