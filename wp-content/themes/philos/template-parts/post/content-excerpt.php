<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Nileforest
 * @since Nileforest 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-box">
		<?php if ( '' !== get_the_post_thumbnail()) : ?>
		<div class="post-thumbnail blog-img-wrap">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('full'); ?>
			</a>
		</div><!-- .post-thumbnail -->
		<?php endif; ?>
		<div class="blog-box-content">
			<div class="blog-box-content-inner">
				<header class="entry-header">			
			
					<?php if ( is_front_page() && ! is_home() ) {			
						// The excerpt is being displayed within a front page section, so it's a lower hierarchy than h2.
						the_title( sprintf( '<h4 class="blog-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
					} else {
						the_title( sprintf( '<h4 class="blog-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
					} ?>
					
					<?php if ( 'post' === get_post_type() ) : ?>
						<p class="entry-meta info">
							<?php
							echo nileforest_time_link();
							nileforest_edit_link();
							?>
						</p><!-- .entry-meta -->
					<?php elseif ( 'page' === get_post_type() && get_edit_post_link() ) : ?>
						<p class="entry-meta info">
							<?php nileforest_edit_link(); ?>
						</p><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->
				<div class="entry-summary blog-description-content">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
			</div>
		</div>
	</div>
</article><!-- #post-## -->
