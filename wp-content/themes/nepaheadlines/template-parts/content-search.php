<?php
/**
 * Template part for displaying results in search pages
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
				<?php the_title( sprintf( '<h5 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>

				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php
					nepaheadlines_posted_on();
					?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->


		</div><!-- .entry-content -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
