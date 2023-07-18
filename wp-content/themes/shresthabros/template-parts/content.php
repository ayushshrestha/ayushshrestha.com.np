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

<article id="post-<?php the_ID(); ?>" <?php post_class("mb-10"); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h2 class="text-4xl font-black tracking-tight sm:text-5xl">', '</h2>' );
		else :
			the_title( '<h2 class="text-4xl font-black tracking-tight sm:text-5xl"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		?>
	</header><!-- .entry-header -->
	<div class="py-10">
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail('full', array('class' => ''));
		} else { ?>
			<img src="<?php bloginfo('template_directory'); ?>/images/default-image.jpg" alt="<?php the_title(); ?>" />
		<?php } ?>
	</div>

	<div>
		<div class="entry-contentx mb-20">
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
</article><!-- #post-<?php the_ID(); ?> -->

