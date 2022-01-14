<?php
/**
 * The template for displaying 404 pages
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WAT Theme
 */

get_header();
?>
	<header>
		<h1><?php esc_attr( 'Nothing here' ); ?></h1>
	</header>

	<div>
		<div>
			<p><?php esc_attr( 'Page Not Found' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>

<?php
get_footer();
