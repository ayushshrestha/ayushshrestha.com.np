<?php
	/**
	* Template Name: Page Front
	*
	* @package WordPress
	* @subpackage AyushShrestha
	* @since Ayush Shrestha 1.0
	*/

	get_header();
	?>	
		<main id="primary" class="site-main">
			<div class="container-fluid px-3 px-md-5">
				<div id="hero">
					<div class="h-100 d-flex align-items-center">
						<div class="w-100">
							<div class="hero-slick_title text-uppercase">
								<div><h2>Full <span class="text-secondary">Stack</span></h2></div>
								<div><h2>Photographer</h2></div>
								<div><h2>Entrepreneur</h2></div>
							</div>
							<strong class="ps-1">2006-<?php echo date("Y"); ?></strong>
						</div>	
					</div>
				</div> <!-- #hero ends -->
				<div class="row">
					
					<div class="col-12 my-5 py-md-5">
						<div class="row">
							<?php $portfolioPost = new WP_Query("page_id=381"); while($portfolioPost->have_posts()) : $portfolioPost->the_post();?>
								
							<div class="col-sm-4 h-100 py-4 position-sticky top-0">
								<h3><?php the_title(); ?></h3>
								<p class="text-muted"><?php the_content(); ?></p>
								<a href="<?php echo esc_url( get_permalink(381) ); ?>" class="btn btn-outline-primary mt-3 rounded-pill px-3">View More</a>
							</div>

					
							<?php endwhile; ?>

							
							<?php $posts = get_field('portfolio_listing'); ?>
							<?php if( $posts ): ?>
							
								<?php setup_postdata($post); ?>
								
								
							<div class="col-sm-8" id="list-portfolio">
								<div class="row gx-3">
										
								<?php 
									$portfolioModalCount = 1;  
									$firstMarked = true;
									foreach( $posts as $post):
									setup_postdata($post); ?>
									
									<div class="col-md-6 col-portfolio <?php echo !$firstMarked ? "mt-3X":"";?>">
										<div class="image image-21by9">
											<figure>
												<a href="<?php the_permalink(); ?>" data-bs-toggle="modal" data-bs-target="#portfolioModal-<?php echo $portfolioModalCount; ?>" >
													<?php 
														if ( has_post_thumbnail() ) {
															the_post_thumbnail();
														} else { ?>
														
															<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" alt="<?php the_title(); ?>" class="img-fluid" />
														<?php } ?>
												</a>
											</figure>
										</div>
										<!-- Modal -->
										<div class="modal fade" id="portfolioModal-<?php echo $portfolioModalCount; ?>" tabindex="-1" aria-labelledby="portfolioModalLabel-<?php echo $portfolioModalCount; ?>" aria-hidden="true">
											<div class="modal-dialog modal-fullscreen">
												<div class="modal-content">
													<div class="modal-header border-0" >
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<div class="text-center">
															<h4><?php the_title(); ?></h4>
															<div class="py-4">
																<a href="<?php the_permalink(); ?>" data-bs-toggle="modal" data-bs-target="#portfolioModal-<?php echo $portfolioModalCount; ?>" >
																	<?php 
																		if ( has_post_thumbnail() ) {
																			the_post_thumbnail();
																		} else { ?>
																		
																			<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" alt="<?php the_title(); ?>" class="img-fluid" />
																		<?php } ?>
																</a>
															</div>
														</div>

														<div class="container-md py-5 text-muted">
															<h5 class="mb-3">Case Study</h5>
															<?php the_content(); ?><?php echo esc_html( $post->the_content );?>
															<a href="<?php the_permalink(); ?>" class="btn btn-outline-secondary mt-4 rounded-pill px-3 btn-ani">View Case Study</a>
														</div>
													</div>
													<div class="modal-footer shadow-lg border-0 justify-content-between" >
														<button type="button" class="btn btn-light text-dark" data-bs-toggle="tooltip" data-bs-placement="right" title="Previous Project: KMG"><i class="ri-arrow-left-s-line"></i></button>
														<h4>Uptrendly</h4>
														<button type="button" class="btn btn-light text-dark" data-bs-toggle="tooltip" data-bs-placement="left" title="Next Project: MyKronoz"><i class="ri-arrow-right-s-line"></i></button>
													</div>
												</div>
											</div>
										</div>
											</div>
									<?php 
										$firstMarked = false;
										$portfolioModalCount++; 
										endforeach; 
										wp_reset_postdata();
										endif; 
									?>
											
								</div>
							</div>
						</div>
					</div> <!-- portfolio col 12 ENDs -->
				</div>
			</div>
	
			<!-- Blog starts from here -->
			<div class="bg-secondary--soft p-3 p-md-5">
				<div class="my-5">
					<h6>FOR THE NEW DIGITAL WORLD</h6>
					<h3>Building brands, Creating products & Transforming business.</h4>
				</div>
				<?php 
					$args = array( 'numberposts' => 8 );
					//$args = array( 'category' => 8, 'post_type' =>  'post', 'post_per_page' => '-1', 'numberposts'=> '8');
					$postslist = get_posts( $args ); ?> 
				<div class="c-slider-slick mb-3">
					<?php foreach ($postslist as $post) :  setup_postdata($post); ?>
					<div>
						<div class="mx-md-2 card border-0 border-radius-0 bg-white">
							<div class="image image-3-2">
								<figure>
									<a href="<?php the_permalink(); ?>">
									<?php 
										if ( has_post_thumbnail() ) {
											the_post_thumbnail();
										} else { ?>
										
											<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" alt="<?php the_title(); ?>" class="img-fluid" />
										<?php } ?>
									</a>
								</figure>
							</div>
							<div class="card-body p-4">
								<div class="badge bg-secondary">
									<a href="<?php the_permalink(); ?>"><?php $categories = get_the_category(); if ( ! empty( $categories ) ) { echo esc_html( $categories[0]->name ); } ?></a>
								</div>
								<h5 class="text-truncate title"><a href="<?php the_permalink(); ?>" class="pt-3 d-block"><?php the_title(); ?></a></h5> 
							</div>
								
						</div> <!-- image content ends here -->
					</div> 
					<?php endforeach; ?><!-- latest news col md 8 ends -->		
				</div> <!-- slick slider Main ends -->
				<div class="d-flex justify-content-center my-4">
					<a href="?post_type=post" class="btn btn-outline-primary mt-2 mt-md-4 rounded-pill px-3">View All</a>
				</div>
				<?php 
					$args = array( 'numberposts' => 8 );
					//$args = array( 'category' => 8, 'post_type' =>  'post', 'post_per_page' => '-1', 'numberposts'=> '8');
					$postslist = get_posts( $args ); ?> 
			</div>

			<!-- Blog ENDs from here -->
				
			
			<div class="container-fluid px-3 px-md-5">
				<div class="row">
					<div class="col-12 my-5 py-md-5">
						<div class="row gx-5">

							<div class="col-sm-6 pt-md-4">
								<h3>Career Journey</h3>
								<strong>2006-<?php echo date("Y"); ?></strong>
							</div>
							<div class="col-sm-6 mt-5 mt-sm-0 text-md-end">
								<span class="d-block pb-2">Resume</span> <a href="ayush-resume-2023.pdf" title="Download CV" class="btn btn-outline-primary rounded-pill px-3">Download</a>
							</div>
						</div>
					</div><!-- Journey ENDs -->
				</div><!-- row  ends -->
			</div>
		</main><!-- #main -->
	<?php
	get_sidebar();
	get_footer();