<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ayushshrestha
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-4 col-xl-3'); ?>>

	<div class="card border-radius-0 border-0 h-100">
		<div class="image image-3-2">
			<figure>
				<a href="#">
					<?php ayushshrestha_post_thumbnail(); ?>
				</a>
			</figure>
		</div>
		<div class="card-body">
			<header class="entry-header">

				<div class="badge bg-secondary mb-3">
					<a href="<?php the_permalink(); ?>"><?php $categories = get_the_category(); if ( ! empty( $categories ) ) { echo esc_html( $categories[0]->name ); } ?></a>
				</div>
				<?php
				if ( is_singular() ) :
					the_title( '<h5 class="entry-title mb-0">', '</h5>' );
				else :
					the_title( '<h5 class="entry-title mb-0"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
				endif;

				?>
			</header><!-- .entry-header -->
			<div class="entry-content entry-archive mt-2 small text-muted">
				<?php
				if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta small text-muted">
						<?php
						ayushshrestha_posted_on();
						?>
					</div><!-- .entry-meta -->
				<?php endif; 
				

				?>
			</div><!-- .entry-content -->
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
