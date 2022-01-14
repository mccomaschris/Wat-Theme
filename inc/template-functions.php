<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WAT Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wat_theme_body_classes( $classes ) {

	// Adds classes to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = '';
	}

	// Adds a classes when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = '';
	}

	return $classes;
}
add_filter( 'body_class', 'wat_theme_body_classes' );
