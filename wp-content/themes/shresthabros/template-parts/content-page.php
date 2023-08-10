<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shresthabros
 */

?>

<?php 

// If we have a featured image, it will be used as background image using the same logic you already used, but we put the src value in a specific variable: $imageUrl
if ( has_post_thumbnail( $post->ID ) ) :
	$postthumbnails = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	$postthumbnails = $postthumbnails[0];
  // if not, we define $imageUrl with our default image src value
else:
	$postthumbnails = get_template_directory_uri() . '/images/default-image-large.jpg';
  endif;

?>
<div class="text-center relative" style="background:url('<?php echo $postthumbnails;?>') no-repeat center center; background-size:cover;">
	<div class="w-full py-40 bg-black/60">
		<div class="max-w-screen-xl mx-auto px-4 text-white">
			<?php the_title( '<h3 class="font-bold text-3xl">', '</h3>' ); ?>
		</div>
	</div>
</div>
<article id="post-<?php the_ID(); ?>" <?php post_class(' py-10 max-w-screen-xl mx-auto px-4 '); ?> data-scroll-section>
	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'shresthabros' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'shresthabros' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
