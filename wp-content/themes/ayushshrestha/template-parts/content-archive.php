<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ayushshrestha
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class("bg-white mb-0 p-4 rounded-xl hover:shadow-md transition duration-300 ease-in-out"); ?> data-scroll-section>

	<div class="sm:gap-5 md:gap-10 items-center">
		<div class="pb-5 sm:pb-0 mb-5 h-40 overflow-hidden">
			<div class="rounded-md overflow-hidden image ease-in duration-300">
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

		<div class="hiddenX">
			<header class="entry-header">
				<?php
				if ( is_singular() ) :
					the_title( '<h2 class="text-2xl md:text-xl font-black leading-6 tracking-tight mb-2 visited:text-primary-100">', '</h2>' );
				else :
					the_title( '<h2 class="text-2xl md:text-xl font-black leading-6 tracking-tight mb-2"><a class=" visited:text-primary" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				?>
			</header><!-- .entry-header -->
			
			<div class="entry-contentx break-all mb-5 hidden">
				<?php echo wp_trim_words( get_the_content(), 20, '...' ); ?>
			</div><!-- .entry-content -->
			<span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-sm font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20 hidden"><?php echo totalView($id) ?></span>

			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta pt-3 text-sm text-gray-300">
					<?php
					ayushshrestha_posted_on();
					ayushshrestha_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
