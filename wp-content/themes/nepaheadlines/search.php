<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package nepaheadlines
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">
			<div class="row">
					<?php if ( have_posts() ) : ?>
					<div class="col-12">
						<div class="module-title my-4">
							<div class="main-title clearfix">
								<h2><?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for: %s', 'nepaheadlines' ), '<span>' . get_search_query() . '</span>' );
								?></h2>
							</div>								
						</div>	
					</div>
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
		</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
