<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Nileforest
 * @since Nileforest 1.0
 */

?>
	</div><!-- #content -->
		<?php if(theme_get_option('footer_widget') != 'no'): ?>
		<footer class="footer section-padding" role="contentinfo">			
				<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );				

				get_template_part( 'template-parts/footer/site', 'info' );
				?>		
		</footer><!-- #colophon -->
		<?php endif; ?>
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<!-- Scroll Top -->
<a class="back-top" href="#">
	<i class="fa fa-angle-double-up"></i>
</a>
<!-- End Scroll Top -->
<?php wp_footer(); ?>
</body>
</html>