<?php
	/**
	* Template Name: Front Page
	*
	* @package WordPress
	* @subpackage NepaHeadlines
	* @since Nepa Headlines 1.0
	*/

	get_header();
	?>	
		<div class="container d-none">
        
			<div class="row pt-3">
				<?php
				$args = array(
					'date_query'     => array( array( 'after' => '-3 months' ) ),  
					'posts_per_page' => (int) $nr,
					'orderby'        => 'comment_count',
					'order'          => 'DESC',
					'number'  => 3  
				);
				$postslist = get_posts( $args );				
				foreach ($postslist as $post) :  setup_postdata($post); ?>
				<div class="col-sm-6 col-md-4">
					<div class="card border-0 mb-3 border-radius-0">
						<div class="row no-gutters">
							<div class="col-4 ">
								<div class="image image-3-2 w-100 h-100">
									<figure class="h-100">
										<a href="<?php the_permalink(); ?>">
										<?php 
										
											if ( has_post_thumbnail() ) {
												the_post_thumbnail();
												 
											} else { ?>
											
												<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" alt="<?php the_title(); ?>" />
											<?php } ?>
										</a>
									</figure>
								</div> <!-- image image-3-2 ends here -->
							</div> <!-- col-4 ends here -->
							<div class="col-8">
								<div class="card-body p-2 pl-3 ">
									<h6 class="mb-0"><a href="<?php the_permalink(); ?>"><?php echo limit_word_count( the_title(), 10, '...' ); ?></a></h6> 
									<div class="entry-meta">
										<?php nepaheadlines_posted_on(); ?>
									</div><!-- .entry-meta -->
								</div> <!-- card-body px-0X py-3X end here -->
							</div> <!-- col 8 ends here -->
						</div> <!-- row ends here -->
					</div>  <!-- card border-0 mb-4 ends here -->
					<div class=" mb-2"></div>
				</div><!-- col ends -->
				<?php endforeach; wp_reset_postdata();?>
			</div><!-- row ends -->
		</div>					
		<div class="container my-2 d-none">
			<div class="d-flex align-items-center">
				<h6 class="mb-0 mr-2">What's news:</h6>
				<ul class="d-flex ">
					<?php 
					$tags = get_terms(array(
						'taxonomy' => 'post_tag',
						'orderby' => 'count',
						'number'  => 5,
						'order' => 'DESC',
					));
					foreach ( (array) $tags as $tag ) {
									echo '<li><a href="' . get_tag_link ($tag->term_id) . '" rel="tag">' . $tag->name . '</a></li>';
					} ?>
				</ul>
			</div> <!-- trending tags row -->
		</div> <!-- trending tags container -->
		<main id="primary" class="site-main">
			<div class="featured3-main">
			
			<?php
				$args = array(
					'post__in' => get_option( 'sticky_posts' ),
					'ignore_sticky_posts' => 1,
					'post_per_page' => '-1', 
					'numberposts'=> '1'
				);
				//$query = new WP_Query( $args ); 
				$postslist = get_posts( $args );
				
				// var_dump($thumb);
				foreach ($postslist as $post) :  setup_postdata($post); ?>
							
				<div class="bk-thumb-wrap term-4">
					<a class="link-overlap" href="<?php the_permalink(); ?>"></a>
					<div class="thumb" data-type="background" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post_id, 'large' ); ?>')"></div>
				</div>
				<div class="post-list-wrap">
					<div class="post-list-wrap-inner container bkwrapper">
						<div class="large-post-content post-c-wrapX">
							<div class="categories-style-1 mb-4">
								<a href="<?php the_permalink(); ?>"><?php $categories = get_the_category(); if ( ! empty( $categories ) ) { echo esc_html( $categories[0]->name ); } ?></a>
							</div>
							<h2>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<div class="meta d-none">
								<div class="post-author"><a href="<?php the_permalink(); ?>"><?php the_author(); ?></a></div>
							</div>
						</div>
						
						<?php endforeach; wp_reset_postdata();?> 
						<ul class="list-small-post row">
							<?php
								$recent_posts = wp_get_recent_posts(array(
									'numberposts' => 5, // Number of recent posts thumbnails to display
									// 'offset'=>'15',
									'post_status' => 'publish' // Show only the published posts
								));
								foreach (array_slice($recent_posts,1,4) as $post) :  setup_postdata($post); ?>
								<li class="small-post col-md-3 bk-post-title-small clearfix">
									<div class="post-c-wrap">
										<h5><a href="<?php echo get_permalink($post['ID']) ?>"><?php echo $post['post_title'] ?></a>
										</h5>
									</div>
								</li>
							<!-- End post -->
							<?php endforeach; wp_reset_query(); ?>
						</ul>
						<!-- End list-post -->
					</div>
				</div>
			</div> 
			<!-- ends HERO here -->
			<div class="container mt-5">
				<div class="row">		
				
					<div class="col-sm-8">
					<?php
						$args = array( 'category' => 1, 'post_type' =>  'post', 'post_per_page' => '-1', 'numberposts'=> '5' ); 
						$postslist = get_posts( $args ); ?>
						<div class="module-title mb-4">
							<div class="main-title clearfix">
								<h4><a href="<?php the_permalink(); ?>">Money</a> </h4>
							</div>
							
						</div> <!-- module-title mb-4 ends -->
						<div class="slider-slick">
							<div>
							<?php 
								foreach (array_slice($postslist,0,1) as $post) :  setup_postdata($post);
							?>
								<div class="row">  
									<div class="col-lg-8">
										<div class="card border-0 mb-4 border-radius-0">
											<div class="image image-3-2">
												<figure>
													<a href="<?php the_permalink(); ?>">
													<?php 
														if ( has_post_thumbnail() ) {
															the_post_thumbnail();
														} else { ?>
														
															<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" alt="<?php the_title(); ?>" />
														<?php } ?>
													</a>
												</figure>
											</div>

											
											<div class="card-body px-0X py-3X ">
												<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> 
												<div class="entry-meta"> <?php nepaheadlines_posted_on(); ?> </div><!-- .entry-meta -->
												<p><?php echo wp_trim_words( get_the_content(), 40, ' ...' );?></p>
											</div>
										</div>
										<div class=" mb-2"></div>
									</div>
									<?php endforeach; wp_reset_postdata();?>
									
									<div class="col-lg-4 first-image-display">
									<?php foreach (array_slice($postslist,1,2) as $post) :  setup_postdata($post);?> 
										<div class="card border-0 border-radius-0 mb-3">

											<div class="image image-3-2">
												<figure>
													<a href="<?php the_permalink(); ?>">
													<?php 
														if ( has_post_thumbnail() ) {
															the_post_thumbnail();
														} else { ?>
														
															<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" alt="<?php the_title(); ?>" />
														<?php } ?>
													</a>
												</figure>
											</div>


											<div class="card-body px-0X py-3X ">
												<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5> 
												<div class="entry-meta">
													<?php nepaheadlines_posted_on();?>
												</div><!-- .entry-meta -->
												<p class="font-sm"><?php echo wp_trim_words( get_the_content(), 10, ' ...' );?></p>
											</div>
										</div>
									<?php endforeach;  wp_reset_postdata();?>							
								</div> 
							</div>
						</div>
					</div>
					<?php
						$args = array( 'category' => 1, 'post_type' =>  'post', 'post_per_page' => '-1', 'numberposts'=> '5' ); 
						$postslist = get_posts( $args ); ?>
						<div class="module-title mb-4">
							<div class="main-title clearfix">
								<h4><a href="<?php the_permalink(); ?>">Money</a> </h4>
							</div>
						</div> <!-- module-title mb-4 ends -->
						<div class="row">
							<?php
								
								foreach (array_slice($postslist,0,1) as $post) :  setup_postdata($post);
							?>  
							<div class="col-lg-8">
								<div class="card border-0 mb-4 border-radius-0">
									<div class="image image-3-2">
										<figure>
											<a href="<?php the_permalink(); ?>">
											<?php 
												if ( has_post_thumbnail() ) {
													the_post_thumbnail();
												} else { ?>
												
													<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" alt="<?php the_title(); ?>" />
												<?php } ?>
											</a>
										</figure>
									</div>

									
									<div class="card-body px-0X py-3X ">
										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> 
										<div class="entry-meta"> <?php nepaheadlines_posted_on(); ?> </div><!-- .entry-meta -->
										<p><?php echo wp_trim_words( get_the_content(), 40, ' ...' );?></p>
									</div>
								</div>
								<div class=" mb-2"></div>
							</div>
							<?php endforeach; wp_reset_postdata();?>
							
							<div class="col-lg-4 first-image-display">
							<?php foreach (array_slice($postslist,1,2) as $post) :  setup_postdata($post);?> 
								<div class="card border-0 border-radius-0 mb-3">

									<div class="image image-3-2">
										<figure>
											<a href="<?php the_permalink(); ?>">
											<?php 
												if ( has_post_thumbnail() ) {
													the_post_thumbnail();
												} else { ?>
												
													<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" alt="<?php the_title(); ?>" />
												<?php } ?>
											</a>
										</figure>
									</div>


									<div class="card-body px-0X py-3X ">
										<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5> 
										<div class="entry-meta">
											<?php nepaheadlines_posted_on();?>
										</div><!-- .entry-meta -->
										<p class="font-sm"><?php echo wp_trim_words( get_the_content(), 10, ' ...' );?></p>
									</div>
								</div>
							<?php endforeach;  wp_reset_postdata();?>							
							</div> 
					  	</div> <!-- row ends -->
		
					</div> <!-- col-sm-8 -- MONEY block ends here -->
					<div class="col-sm-4">
					<?php $catquery = new WP_Query( 'cat=428&posts_per_page=1' ); ?>	
						<div class="module-title mb-4">
							<div class="main-title clearfix">
								<h4>
								
									<a href="<?php echo esc_url( $category_link ); ?>">Models</a>
								</h4>
							</div>
						</div>	
						<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
									
						<div class="image image-3-2">
							<figure>
								<a href="<?php the_permalink(); ?>">
								<?php 
									if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									} else { ?>
									
										<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" alt="<?php the_title(); ?>" />
									<?php } ?>
								</a>
							</figure>
						</div>
						<?php endwhile; wp_reset_postdata(); ?>
						<?php $catquery = new WP_Query( 'cat=18&posts_per_page=2' ); ?> 		
						<div class="module-title mt-4 mb-4">
							<div class="main-title clearfix">
								<h4><a href="<?php the_permalink(); ?>">Opinion</a></h4>
							</div>
						</div>		
						
						
						<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
									
						<div class="card mb-2 border-0 border-radius-0">
							<div class="card-body p-3">
								<h5 class="card-title mb-0"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h5>
								<a href="<?php the_permalink() ?>" class="card-link"><?php nepaheadlines_posted_on(); ?></a>
								<p class="font-sm"><?php echo wp_trim_words( get_the_content(), 10, ' ...' );?></p>
							</div>
						</div>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>  <!-- col-sm-4 -- model and politics block ends here -->

					
					<div class="col-12 py-4">
					<hr>
						<div class="row">
							<div class="col-md-8">
							<?php 
								$args = array( 'numberposts' => 10 );
								$postslist = get_posts( $args ); ?> 
								<div class="module-title mb-4">
									<div class="main-title clearfix">
										<h2><a href="<?php the_permalink(); ?>">Latest news</a></h2>
									</div>
								</div> <!-- module-title mb-4 ends -->
								
								<?php foreach ($postslist as $post) :  setup_postdata($post); ?>
								<div class="card border-0 border-radius-0 mb-3">
									<div class="row h-100">
										<div class="col-5 col-md-4 pr-0">
											<div class="image image-3-2 h-100">
												<figure class="h-100X">
													<a href="<?php the_permalink(); ?>">
													<?php 
														if ( has_post_thumbnail() ) {
															the_post_thumbnail();
														} else { ?>
														
															<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" alt="<?php the_title(); ?>" />
														<?php } ?>
													</a>
												</figure>
											</div>
										</div> <!-- image col 4 ends here -->

										<div class="col-7 col-md-8 plX-md-0 h-100 my-auto">
											<div class="card-body pl-0 pt-3 pr-3 pb-3">
												<div class="categories-style-1 mb-2">
													<a href="<?php the_permalink(); ?>"><?php $categories = get_the_category(); if ( ! empty( $categories ) ) { echo esc_html( $categories[0]->name ); } ?></a>
												</div>
												<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5> 
												<div class="entry-meta">
													<?php nepaheadlines_posted_on();?>
												</div><!-- .entry-meta -->
												<p class="font-sm d-none d-md-block"><?php echo wp_trim_words( get_the_content(), 20, ' ...' );?></p>
											</div>
											
										</div> <!-- image content ends here -->
									</div>


								</div>
								<?php endforeach;  wp_reset_postdata();?>		
							</div> <!-- latest news col md 8 ends -->
							<div class="col-md-4">
								<iframe src="https://www.facebook.com/plugins/page.php?href=http%3A%2F%2Ffacebook.com%2Fnepaheadlines&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1083519295116626" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
								<a class="twitter-timeline" data-height="1200" href="https://twitter.com/Nepa_Headlines?ref_src=twsrc%5Etfw">Tweets by Nepa_Headlines</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
							</div>
						</div><!-- latest news row  ends -->
					</div>				
				
					<div class="col-12 mt-5">
						
						<div class="bg-background-full">
						<?php							
							$args = array( 'tag' => 'covid19', 'post_type' =>  'post', 'post_per_page' => '-1', 'numberposts'=> '9' ); 
							$postslist = get_posts( $args ); ?>
							<div class="module-title mb-4">
								<div class="main-title clearfix">
									<h2><a href="<?php the_permalink(); ?>">Covid 19</a></h2>
								</div>
							</div> <!-- module-title mb-4 ends -->
							<div class="row mb-4">
								<?php
									// echo '<pre>';
									// var_dump($postslist);die();
									// echo '</pre>';
									foreach (array_slice($postslist,0,1) as $post) :  setup_postdata($post);
								?>  
								<div class="col-md-7">
									<div class="card border-0 border-radius-0">
										<div class="image image-3-2">
											<figure>
												<a href="<?php the_permalink(); ?>">
												<?php 
													if ( has_post_thumbnail() ) {
														the_post_thumbnail($_post->ID, 'thumbnail');
													} else { ?>		
														<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" alt="<?php the_title(); ?>" />
													<?php } ?>
												</a>
											</figure>
										</div>
										<div class="card-body bg-white title-style-1 pb-5">
											<div class="categories-style-1 mb-3">
												<a class="term-4" href="<?php the_permalink(); ?>"><?php $categories = get_the_category(); if ( ! empty( $categories ) ) { echo esc_html( $categories[0]->name ); } ?></a>
											</div>
											<h4 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4> 
											<div class="entry-meta">
												<?php nepaheadlines_posted_on(); ?>
											</div><!-- .entry-meta -->
											<p class="font-sm"><?php echo wp_trim_words( get_the_content(), 30, ' ...' );?></p>
										</div>
									</div>
									<div class=" mb-2"></div>
								</div>
								<?php endforeach;  wp_reset_postdata(); ?>
								
								<div class="col-md-5">
								<?php foreach (array_slice($postslist,1,5) as $post) :  setup_postdata($post);?> 
									<div class="card border-0 mb-3 border-radius-0">
										<div class="row h-100">											
											<div class="image image-3-2 col-5">
												<figure class="h-100">
													<a href="<?php the_permalink(); ?>">
													<?php 
														if ( has_post_thumbnail() ) {
															the_post_thumbnail();
														} else { ?>													
															<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" alt="<?php the_title(); ?>" />
														<?php } ?>
													</a>
												</figure>
											</div>

											<div class="col-7 pl-0 align-self-center">
												<div class="card-body p-1">
													<h5 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5> 
													<div class="entry-meta">
														<?php
															nepaheadlines_posted_on();
														?>
													</div><!-- .entry-meta -->
												</div>
											</div>
										</div>
									</div>
								<?php endforeach;  wp_reset_postdata();?> 
								</div>
							</div>	
						</div>
						<hr>	
						<?php
							$args = array( 'category' => 16, 'post_type' =>  'post', 'post_per_page' => '-1', 'numberposts'=> '8'); 
							
							$categories = get_categories();
							
							$postslist = get_posts( $args ); 
						?>
						
						<div class="module-title my-5">
							<div class="main-title clearfix">
								<h4><a href="<?php esc_url( $category_link ) ?>">Sports</a></h4>
							</div>
						</div>
					</div>
					<?php foreach ($postslist as $post) :  setup_postdata($post); ?>  
					<div class="col-md-4 col-lg-3 mb-5 ">
						<div class="card border-0 h-100 border-radius-0">

							<div class="image image-3-2">
								<figure>
									<a href="<?php the_permalink(); ?>">
									<?php 
										if ( has_post_thumbnail() ) {
											the_post_thumbnail();
										} else { ?>
										
											<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" alt="<?php the_title(); ?>" />
										<?php } ?>
									</a>
								</figure>
							</div>

							
							<div class="card-body px-0X py-3X">
								<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5> 
								<div class="entry-meta">
									<?php
										nepaheadlines_posted_on();
									?>
								</div><!-- .entry-meta -->
							</div>
						</div>
						<div class=" mb-2"></div>
					</div>
					<?php endforeach;  wp_reset_postdata();?> 

					<div class="col-12 d-none">

						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Entertainment</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Health</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Life & Style</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="row">
									<div class="col-sm-6">
												
										<?php $catquery = new WP_Query( 'cat=15&posts_per_page=5' ); ?>
										<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
													
											<div class="card mb-2 	border-0">
												<div class="card-body p-3">
													<h4 class="card-title mb-0"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
													<a href="#" class="card-link"><?php
														nepaheadlines_posted_on();
													?></a>
													<div class="image image-3-2">
														<figure>
															<a href="#">
															<?php 
																if ( has_post_thumbnail() ) {
																	the_post_thumbnail();
																} else { ?>
																
																	<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" alt="<?php the_title(); ?>" />
																<?php } ?>
															</a>
														</figure>
													</div>
												</div>
											</div>
										<?php endwhile;  wp_reset_postdata(); ?> 
									</div>
								</div>	
						
							</div>
							<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								2
								<?php $catquery = new WP_Query( 'cat=403&posts_per_page=5' ); ?>
									<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
												
										<div class="card mb-2 border-0">
											<div class="card-body p-3">
												<h4 class="card-title mb-0"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
												<a href="#" class="card-link"><?php
													nepaheadlines_posted_on();
												?></a>
												<div class="image image-3-2">
													<figure>
														<a href="#">
														<?php 
															if ( has_post_thumbnail() ) {
																the_post_thumbnail();
															} else { ?>
															
																<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" alt="<?php the_title(); ?>" />
															<?php } ?>
														</a>
													</figure>
												</div>
											</div>
										</div>
									<?php endwhile;  wp_reset_postdata(); ?> 	
							</div>
							<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
								3
								<?php $catquery = new WP_Query( 'cat=19&posts_per_page=5' ); ?>
									<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
												
										<div class="card mb-2">
											<div class="card-body p-3">
												<h4 class="card-title mb-0"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
												<a href="#" class="card-link"><?php
													nepaheadlines_posted_on();
												?></a>
												<div class="image image-3-2">
													<figure>
														<a href="#">
														<?php 
															if ( has_post_thumbnail() ) {
																the_post_thumbnail();
															} else { ?>
															
																<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" alt="<?php the_title(); ?>" />
															<?php } ?>
														</a>
													</figure>
												</div>
											</div>
										</div>
									<?php endwhile;  wp_reset_postdata();?> 	
							</div>
						</div>

					</div>
				</div>
			</div>
		</main><!-- #main -->
	<?php
	get_sidebar();
	get_footer();