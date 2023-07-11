<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package shresthabros
 */

get_header();
?>
	<?php if ( have_posts() ) : ?>


	<div class="text-center relative">
		<div class="w-full py-40 bg-black/60">
			<h3 class="font-bold text-3xl text-white"><?php printf( esc_html__( 'Search Results for: %s', 'shresthabros' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
		</div>
	</div>
	<main id="primary" class="site-main py-10 max-w-screen-xl mx-auto px-4">
		<div class="grid gap-8 sm:grid-cols-2">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
