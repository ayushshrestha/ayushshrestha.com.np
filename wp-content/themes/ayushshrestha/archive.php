<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ayushshrestha
 */

get_header();
?>

	<main id="primary" class="site-main single-dot-php py-20 relative z-20 mb-[100vh] bg-slate-100">
	<div class="mx-5 md:mx-14">
		<?php if ( have_posts() ) : ?>

			<header class="page-header mb-10 border-b-2 border-primary pb-5" >
				<?php
				the_archive_title( '<h1 class="entry-title font-bold text-5xl">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="grid md:grid-cols-4 gap-5">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-archive', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>
	</div>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
