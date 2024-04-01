<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ayushshrestha
 */

get_header();
?>

	<main id="primary" class="site-main single-dot-php mt-3 mb-5">
		<div class="mx-5 md:mx-14">					
				<?php
					while ( have_posts() ) :
						the_post(); ?>
						<div class="grid md:grid-cols-4 md:gap-10 h-full">
							<div class="md:col-span-3"> 
								<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
							</div>
							<div class="md:mt-36">
								<?php
									echo "
									<h4 class='text-xl font-bold mb-2'>Related Blogs</h4>
									<ul class='grid grid-cols-4x gap-5 mb-10 pb-10'>";
									$related = get_posts( array( 
										'category__in' => wp_get_post_categories($post->ID), 
										'numberposts' => 8, 
										'post__not_in' => array($post->ID) ,
										"orderby" => "rand"
										) );
									if( $related ) foreach( $related as $post ) {
									setup_postdata($post); ?>
									<li>
										<?php /*<div class="image image-3-2 hidden">
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
										</div> */ ?>
										<div class="bg-white p-5 rounded-xl" style="text-wrap:wrap;">
											<h5 class="font-bold mb-3 <?php if(empty(get_the_content())){ ?> mb-2<?php } ?>"><a class="text-primary/90" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
											<?php if(empty(get_the_content())){ ?>
												<a href="<?php the_permalink() ?>" class="rounded-3xl text-sm font-semibold py-1 px-4 text-gray-900 visited:text-gray-900 hover:text-gray-300 hover:bg-gray-700x border border-gray-900 hover:border-gray-300 transition duration-300 effect-cloudliquid">View More</a>	
											<?php } ?>
											<p class="mb-5 text-primary/80 text-wrap" style="text-wrap:wrap;"><?php echo wp_trim_words( get_the_content(), 25, '...' );?></p>
											<?php if(!empty(get_the_content())){ ?>
												<a href="<?php the_permalink() ?>" class="rounded-3xl text-sm font-semibold py-1 px-4 text-gray-900 visited:text-gray-900 hover:text-gray-300 hover:bg-gray-700x border border-gray-900 hover:border-gray-300 transition duration-300 effect-cloudliquid">Read More</a>	
											<?php } ?>
										</div>  
									</li>
									<?php }
									wp_reset_postdata();
									echo "</ol>";
								?>
							</div>
						</div>

						<?php
						the_post_navigation(
							array(
								'prev_text' => '<span class=" font-bold">' . esc_html__( 'Previous:', 'ayushshrestha' ) . '</span> <span class="nav-title">%title</span>',
								'next_text' => '<span class="nav-subtitle font-bold">' . esc_html__( 'Next:', 'ayushshrestha' ) . '</span> <span class="nav-title">%title</span>',
							)
						);
						 ?>
						<div class="bg-white/60 rounded-lg p-10">
							<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif; ?>
						</div>
						<?php					

					endwhile; // End of the loop.
				?>

		</div>
	</main><!-- #main -->


<?php
get_sidebar();
get_footer();
