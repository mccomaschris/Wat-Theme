<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WAT Theme
 */

if ( ! defined( 'WAT_THEME_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'WAT_THEME_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function wat_theme_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );

	/*
	* Enable support for Post Thumbnails on posts and pages.
	*
	* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary-navigation' => esc_attr( 'Primary Navigation' ),
		)
	);

	/*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action( 'after_setup_theme', 'wat_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wat_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wat_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'wat_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wat_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html( 'Sidebar' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html( 'Add widgets here.' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wat_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wat_theme_scripts() {
	if ( 'production' === wp_get_environment_type() ) {
		$mix_data  = file_get_contents( get_template_directory() . '/mix-manifest.json' );
		$css_files = json_decode( $mix_data, true );
		foreach ( $css_files as $key => $value ) {
			if ( '/css/style.css' === $key ) {
				wp_enqueue_style( 'wat-theme-style', get_theme_file_uri( $value ), array(), WAT_THEME_VERSION, 'all' ); // phpcs:ignore
			}
		}
	} else {
		wp_enqueue_style( 'wat-theme-style', get_theme_file_uri( 'css/style.css' ), array(), WAT_THEME_VERSION, 'all' ); // phpcs:ignore
	}
}
add_action( 'wp_enqueue_scripts', 'wat_theme_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
