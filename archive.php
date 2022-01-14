<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WAT Theme
 */

get_header();

$description = get_the_archive_description();
?>

<?php if ( have_posts() ) : ?>

	<header>
		<?php the_archive_title( '<h1>', '</h1>' ); ?>
		<?php if ( $description ) : ?>
			<div><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
		<?php endif; ?>
	</header><!-- .page-header -->

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>
	<?php endwhile; ?>

	<?php wat_theme_posts_navigation(); ?>

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>
