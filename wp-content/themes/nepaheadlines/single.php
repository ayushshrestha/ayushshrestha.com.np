<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package nepaheadlines
 */

get_header();
?>

	<main id="primary" class="site-main single-dot-php mt-3 mb-5">
		<div class="container">					
				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );
						the_post_navigation(
							array(
								'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'nepaheadlines' ) . '</span> <span class="nav-title">%title</span>',
								'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'nepaheadlines' ) . '</span> <span class="nav-title">%title</span>',
							)
						);
						echo "<hr>
						
						<div class='module-title mb-4 mt-5'>
							<div class='main-title clearfix'>
								<h4><a>Related News</a> </h4>
							</div>
						</div> <!-- module-title mb-4 ends -->
						<div class='row'>";
						$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 8, 'post__not_in' => array($post->ID) ) );
						if( $related ) foreach( $related as $post ) {
						setup_postdata($post); ?>
						<div class="col-md-4 col-xl-3 mb-5">
							<div class="card border-radius-0 border-0 h-100">
								<div class="image image-3-2">
									<figure>
										<a href="<?php the_permalink() ?>">
										<?php 
												if ( has_post_thumbnail() ) {
													the_post_thumbnail();
												} else { ?>
												
													<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" alt="<?php the_title(); ?>" />
												<?php } ?>
										</a>
									</figure>
								</div>
								<div class="card-body">
									<h5><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
									<p><?php echo wp_trim_words( get_the_content(), 5, '...' );?></p>
								</div>
							</div>   
						</div>
						<?php }
						wp_reset_postdata();
						echo "</div><hr>";
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;					

					endwhile; // End of the loop.
				?>

		</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
