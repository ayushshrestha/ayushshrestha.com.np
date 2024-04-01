<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nepaheadlines
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('Xcol-md-12'); ?>>

	
	<header class="entry-header bg-white mt-5 pt-4 px-4 pb-1">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		endif;

		?>
		<?php nepaheadlines_share_buttons(); ?>
	</header><!-- .entry-header -->
	<div class="pt-2X img-100">	
		<?php nepaheadlines_post_thumbnail(); ?>
	</div>
	<div class="entry-content p-4 mb-5 mt-0 bg-white">
		<?php
		if ( 'post' === get_post_type() ) :
			
			?>
			<div class="entry-meta pb-2">
				<?php
				nepaheadlines_posted_on();
				nepaheadlines_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; 
		
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'nepaheadlines' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nepaheadlines' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php nepaheadlines_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

<hr>
