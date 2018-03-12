<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Setup Theme
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'aiko', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'aiko' ) );

//* Add Image upload and Color select to WordPress Theme Customizer
require_once( get_stylesheet_directory() . '/lib/customize.php' );

//* Include Customizer CSS
include_once( get_stylesheet_directory() . '/lib/output.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'AIKO Theme' );
define( 'CHILD_THEME_URL', 'https://fasterwp.com/downloads/aiko/' );
define( 'CHILD_THEME_VERSION', '2.2.6' );

//* Enqueue Scripts and Styles

add_action( 'wp_enqueue_scripts', 'aiko_enqueue_scripts_styles' );

function aiko_enqueue_scripts_styles() {
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=PT+Sans|PT+Serif', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_script( 'aiko-responsive-menu', get_stylesheet_directory_uri() . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0', true );
	$output = array(
		'mainMenu' => __( 'Menu', 'aiko' ),
		'subMenu'  => __( 'Menu', 'aiko' ),
	);
	wp_localize_script( 'aiko-responsive-menu', 'genesisSampleL10n', $output );
}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

//* Add Accessibility support
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom header
add_theme_support( 'custom-header', array(
	'width'           => 600,
	'height'          => 160,
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'flex-height'     => true,
) );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for after entry widget
add_theme_support( 'genesis-after-entry-widget-area' );
//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Add support for after entry widget
add_theme_support( 'genesis-after-entry-widget-area' );

//* Add new featured image size
add_image_size( 'sidebar', 360, 175, TRUE );
add_image_size( 'blog-big', 880, 400, TRUE );
add_image_size( 'home-featured-4', 280, 160, TRUE );

//* Rename primary and secondary navigation menus
add_theme_support( 'genesis-menus' , array( 'primary' => __( 'After Header Menu', 'aiko' ), 'secondary' => __( 'Footer Menu', 'aiko' ) ) );

//* Reposition the secondary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

//* Reduce the secondary navigation menu to one level depth
add_filter( 'wp_nav_menu_args', 'aiko_secondary_menu_args' );
function aiko_secondary_menu_args( $args ) {
	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}
	$args['depth'] = 1;
	return $args;
}

//* Modify size of the Gravatar in the author box
add_filter( 'genesis_author_box_gravatar_size', 'aiko_author_box_gravatar' );
function aiko_author_box_gravatar( $size ) {
	return 90;
}

//* Modify size of the Gravatar in the entry comments
add_filter( 'genesis_comment_list_args', 'aiko_comments_gravatar' );
function aiko_comments_gravatar( $args ) {
	$args['avatar_size'] = 60;
	return $args;
}

//* Register widget areas

genesis_register_sidebar( array(
    'id' => 'featured-home',
    'name' => __( 'Featured Home', 'aiko' ),
    'description' => __( 'This is the featured home section.', 'aiko' ),
) );
genesis_register_sidebar( array(
    'id'          => 'home-featured-1',
    'name'        => __( 'Home Featured 1', 'aiko' ),
    'description' => __( 'This is the home featured 1 section.', 'aiko' ),
) );
genesis_register_sidebar( array(
    'id'          => 'home-featured-2',
    'name'        => __( 'Home Featured 2', 'aiko' ),
    'description' => __( 'This is the home featured 2 section.', 'aiko' ),
) );
genesis_register_sidebar( array(
    'id'          => 'home-featured-3',
    'name'        => __( 'Home Featured 3', 'aiko' ),
    'description' => __( 'This is the home featured 3 section.', 'aiko' ),
) );
genesis_register_sidebar( array(
    'id'          => 'home-featured-4',
    'name'        => __( 'Home Featured 4', 'aiko' ),
    'description' => __( 'This is the home featured 4 section.', 'aiko' ),
) );

/** Add the home featured section */
add_action( 'genesis_after_header', 'aiko_featured' );
function aiko_featured() {
	if (is_active_sidebar( 'featured-home' )) {
		genesis_widget_area( 'featured-home', array(
			'before' => '<div class="featured-home widget-area"><div class="wrap"',
			'after' => '</div></div>'
			) );
	}
}
