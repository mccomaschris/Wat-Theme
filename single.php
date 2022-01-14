<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WAT Theme
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-single' );

	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: Parent post link. */
				'prev_text' => sprintf( '<span>Published in</span><span>%s</span>', '%title' ),
			)
		);
	}

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

	// Previous/next post navigation.
	esc_html( '&rarr;' );
	esc_html( '&larr;' );

	$wat_theme_next_label     = esc_html( 'Next post' );
	$wat_theme_previous_label = esc_html( 'Previous post' );

	the_post_navigation(
		array(
			'next_text' => '<p>' . $wat_theme_next_label . $wat_theme_next . '</p><p>%title</p>',
			'prev_text' => '<p>' . $wat_theme_prev . $wat_theme_previous_label . '</p><p>%title</p>',
		)
	);
endwhile; // End of the loop.

get_footer();
