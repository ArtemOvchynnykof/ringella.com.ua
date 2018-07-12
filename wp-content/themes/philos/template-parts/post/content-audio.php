<?php
/**
 * Template part for displaying audio posts
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
		
		<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
			<div class="post-thumbnail blog-img-wrap">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('full'); ?>
				</a>
			</div><!-- .post-thumbnail -->
		<?php endif; ?>
		<div class="blog-box-content">
			<div class="blog-box-content-inner">
				<header class="entry-header">
						<div class="post-fromat-icon">
						<?php
							if ( is_sticky() && is_home() ) {
								echo nileforest_get_svg( array( 'icon' => 'thumb-tack' ) );
							}
							if (  !is_single() ) {						
								echo '<div class="post-icon"></div>';												
							}
						?>
						</div>
						<?php 
						if ( is_single() ) {
							the_title( '<h4 class="blog-title">', '</h4>' );
						} elseif ( is_front_page() && is_home() ) {
							the_title( '<h4 class="blog-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
						} else {
							the_title( '<h4 class="blog-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
						}
						if ( 'post' === get_post_type() ) {
							echo '<p class="entry-meta info">';								
									nileforest_posted_on();								
									nileforest_edit_link();								
							echo '</p><!-- .entry-meta -->';
						};			
					?>
				</header><!-- .entry-header -->
			
				<?php
					$content = apply_filters( 'the_content', get_the_content() );
					$audio = false;
			
					// Only get audio from the content if a playlist isn't present.
					if ( false === strpos( $content, 'wp-playlist-script' ) ) {
						$audio = get_media_embedded_in_content( $content, array( 'audio' ) );
					}
			
				?>
			
				<div class="entry-content  blog-description-content">
			
					<?php
					if ( is_single() ) {
			
						// If not a single post, highlight the audio file.
						if ( ! empty( $audio ) ) {
							foreach ( $audio as $audio_html ) {
								echo '<div class="entry-audio">';
									echo esc_html($audio_html);
								echo '</div><!-- .entry-audio -->';
							}
						};
			
					};
			
					if ( is_single() ) {
			
						/* translators: %s: Name of current post */
						the_excerpt( sprintf(
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'philos' ),
							get_the_title()
						) );
			
						wp_link_pages( array(
							'before'      => '<div class="page-links">' . __( 'Pages:', 'philos' ),
							'after'       => '</div>',
							'link_before' => '<span class="page-number">',
							'link_after'  => '</span>',
						) );
			
					};
					?>
			
				</div><!-- .entry-content -->
			
				<?php
				if ( is_single() ) {
					nileforest_entry_footer();
				}
				?>
			</div><!-- blog-box-content-inner -->
		</div><!-- blog-box-content -->	
		
	</div>
</article><!-- #post-## -->
