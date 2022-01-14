<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WAT Theme
 */

if ( post_password_required() ) {
	return;
}

$wat_theme_comment_count = get_comments_number();
?>

<div id="comments" class=" <?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>">

	<?php
	if ( have_comments() ) :
		;
		?>
		<h2>
			<?php if ( '1' === $wat_theme_comment_count ) : ?>
				<?php esc_html( '1 comment' ); ?>
			<?php else : ?>
				<?php
				printf(
					/* translators: %s: Comment count number. */
					esc_html( _nx( '%s comment', '%s comments', $wat_theme_comment_count, 'Comments title' ) ),
					esc_html( number_format_i18n( $wat_theme_comment_count ) )
				);
				?>
			<?php endif; ?>
		</h2><!-- .comments-title -->

		<ol>
			<?php
			wp_list_comments(
				array(
					'avatar_size' => 60,
					'style'       => 'ol',
					'short_ping'  => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_pagination(
			array(
				'before_page_number' => esc_attr( 'Page' ) . ' ',
				'mid_size'           => 0,
				'prev_text'          => sprintf(
					'%s <span>%s</span>',
					esc_html( '&larr;' ),
					esc_html( 'Older comments' )
				),
				'next_text'          => sprintf(
					'<span>%s</span> %s',
					esc_html( 'Newer comments' ),
					esc_html( '&rarr;' ),
				),
			)
		);
		?>

		<?php if ( ! comments_open() ) : ?>
			<p><?php esc_attr( 'Comments are closed.' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	comment_form(
		array(
			'logged_in_as'       => null,
			'title_reply'        => esc_html( 'Leave a comment' ),
			'title_reply_before' => '<h2 id="reply-title">',
			'title_reply_after'  => '</h2>',
		)
	);
	?>

</div><!-- #comments -->
