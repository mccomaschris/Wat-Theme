<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WAT Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php wat_theme_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- This script is not enqueued because of the defer requirement of Alpine.js.  -->
	<script defer src="https://unpkg.com/Alpine.js@3.x.x/dist/cdn.min.js"></script> <?php // phpcs:ignore ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page">
	<a href="#content"><?php esc_html( 'Skip to content' ); ?></a>

	<?php get_template_part( 'template-parts/header/site-header' ); ?>

	<div id="content">
		<div id="primary">
			<main id="main" role="main">
