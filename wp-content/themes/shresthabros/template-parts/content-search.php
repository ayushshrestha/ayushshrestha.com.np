<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shresthabros
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="relative overflow-hidden bg-white h-full">
		<div class="image">
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
		<div class="p-8 flex flex-col">
			<h5 class="mb-3 text-xl font-bold"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
			<div class="card-text text-md text-gray-500"><?php echo wp_trim_words( get_the_content(), 20, '...' );?></div>
			<div class="text-gray-300 mt-4 flex justify-end item-center">
				<?php if ( 'post' === get_post_type() ) : ?>
				<small class="text-muted"><?php echo time_ago(); shresthabros_posted_by();?></small>
				<?php endif; ?>
			</div>
			<footer class="entry-footer flex flex-col">
				<?php shresthabros_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
