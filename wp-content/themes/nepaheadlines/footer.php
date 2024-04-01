<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nepaheadlines
 */

?>

	<footer id="colophon" class="py-3 text-center site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://nepaheadlines.com/', 'nepaheadlines' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'nepaheadlines' ), 'NepaHeadlines' );
				?>
			</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
