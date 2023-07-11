<?php
/**
 * Template part for displaying post content in post listing
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shresthabros
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('p-5 bg-white'); ?>>

    <div class="hover:scale-110 transition duration-1000 overflow-hidden w-full aspect-video">
        <?php shresthabros_post_thumbnail(); ?>
    </div>
    <?php the_title( '<h1 class="text-2xl font-bold py-4">', '</h1>' ); ?>
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
