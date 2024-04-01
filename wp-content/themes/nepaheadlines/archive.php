<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
									<?php
										the_archive_title( '<h2 class="entry-title bk-tab-original active">', '</h2>' );
										the_archive_description( '<div class="archive-description">', '</div>' );
									?>
								</div>								
						</div>			
					</div>	<!-- .page-header -->				

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
