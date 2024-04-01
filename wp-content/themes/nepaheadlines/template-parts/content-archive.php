<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nepaheadlines
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-4 col-xl-3'); ?>>

	<div class="card border-radius-0 border-0 h-100">
		<div class="image image-3-2">
			<figure>
				<a href="#">
					<?php nepaheadlines_post_thumbnail(); ?>
				</a>
			</figure>
		</div>
		<div class="card-body">
			<header class="entry-header">
				<?php
				if ( is_singular() ) :
					the_title( '<h5 class="entry-title mb-0">', '</h5>' );
				else :
					the_title( '<h5 class="entry-title mb-0"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
				endif;

				?>
			</header><!-- .entry-header -->
			<div class="entry-content entry-archive mt-0">
				<?php
				if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<?php
						nepaheadlines_posted_on();
						?>
					</div><!-- .entry-meta -->
				<?php endif; 
				

				?>
			</div><!-- .entry-content -->
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
