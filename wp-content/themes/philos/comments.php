<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Nileforest
 * @since Nileforest 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h6 class="review-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'philos' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'philos'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h6>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 74,
					'style'       => 'ul',
					'short_ping'  => true,
					'reply_text'  => esc_html__( 'Reply', 'philos' ),
				) );
			?>
		</ol>

		<?php the_comments_pagination( array(
			'prev_text' => '<i class="fa fa-angle-double-left"></i>',
			'next_text' => '<i class="fa fa-angle-double-right"></i>',
			'screen_reader_text' => ''
		) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && '0' !=  get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : 	
	?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'philos' ); ?></p>
	<?php
	endif;

	comment_form();
	?>

</div><!-- #comments -->