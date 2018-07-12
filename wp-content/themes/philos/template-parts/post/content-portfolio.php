<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Nileforest
 * @since Nileforest 1.0
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="row">
<?php if ( '' !== get_the_post_thumbnail()) : ?>
<div class="col-md-8">
	
	<?php if ( '' !== get_the_post_thumbnail()) : ?>
		<div class="post-thumbnail mb-sm-30">			
			<?php the_post_thumbnail('full'); ?>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>
</div>
<?php endif; ?>
<div class="<?php if ( '' !== get_the_post_thumbnail()){ echo "col-md-4" ;}else{ echo "col-md-12"; } ?>">
	<div class="porfolio-title">
		<?php
		if ( 'post' === get_post_type() ) {
			echo '<div class="entry-meta">';
				if ( is_single() ) {
					nileforest_posted_on();
				} else {
					echo nileforest_time_link();
					nileforest_edit_link();
				};
			echo '</div><!-- .entry-meta -->';
		};

		if ( is_single() ) {
			the_title( '<h2><span>', '</span></h2>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		} else {
			the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
	</div><!-- .entry-header -->
	
	
	<div class="porfolio-content">
		<?php
		/* translators: %s: Name of current post */
		the_content( sprintf(
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'philos' ),
			get_the_title()
		) );

		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'philos' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>
	</div><!-- .entry-content -->
	<div class="porfolio-content">
		<h4><?php _e( 'Project Details', 'philos' ); ?></h4>
		<div class="product-meta">
			<span><?php _e( 'Author :', 'philos' ); ?><span><?php echo get_post_meta( get_the_ID(), 'portfolio_author', TRUE ); ?></span></span>
			<span><?php _e( 'Date :', 'philos' ); ?><span><?php echo get_the_date(); ?></span></span>
			<span><?php _e( 'Website :', 'philos' ); ?><span><a href="<?php echo esc_url(get_post_meta( get_the_ID(), 'portfolio_url', TRUE )); ?>" target="_blank"><?php echo get_post_meta( get_the_ID(), 'portfolio_name', TRUE ); ?></a></span></span>
		</div>
	</div>
	
</div>
</div>
<?php
	if ( is_single() ) {
		nileforest_entry_footer();
	}
	?>
</div><!-- #post-## -->