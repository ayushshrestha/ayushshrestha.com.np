<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shresthabros
 * 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("mx-10 mt-5 mb-10 bg-white p-5 md:p-16"); ?>>

<div class="grid sm:grid-cols-2 md:grid-cols-1 xl:grid-cols-2 gap-10 items-center">
	<div class="pb-5 sm:pb-0">
		<div class="image ease-in duration-300">
			<figure>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail('full', array('class' => 'w-full'));
					} else { ?>
						<img src="<?php bloginfo('template_directory'); ?>/images/default-image.jpg" alt="<?php the_title(); ?>" />
					<?php } ?>
				</a>
			</figure>
		</div>
	</div>

	<div>
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h2 class="text-4xl font-black tracking-tight sm:text-5xl pb-5">', '</h2>' );
			else :
				the_title( '<h2 class="text-4xl font-black tracking-tight sm:text-5xl pb-5"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			?>
		</header><!-- .entry-header -->
		
		<div class="entry-content mb-5">
			<?php echo wp_trim_words( get_the_content(), 20, '...' ); ?>
		</div><!-- .entry-content -->

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta pt-3 text-sm text-gray-300 ">
				<?php
				shresthabros_posted_on();
				shresthabros_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</div>
</div>
</article><!-- #post-<?php the_ID(); ?> -->

