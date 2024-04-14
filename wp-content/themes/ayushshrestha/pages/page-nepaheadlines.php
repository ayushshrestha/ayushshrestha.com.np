<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ayushshrestha
 * 
 * Template Name: Page Nepal Headlines
 */

get_header(); ?>
		<main id="primary" class="site-main relative z-20 mb-[100vh] bg-slate-100">

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
							
				<?php // If we have a featured image, it will be used as background image using the same logic you already used, but we put the src value in a specific variable: $imageUrl
					if (has_post_thumbnail($post->ID)):
						$postthumbnails = wp_get_attachment_image_src(
							get_post_thumbnail_id($post->ID), "single-post-thumbnail"
						);
						$postthumbnails = $postthumbnails[0];
						// if not, we define $imageUrl with our default image src value
					else:
						$postthumbnails = get_template_directory_uri() . "/images/default-image.jpeg";
					endif; ?>

				<div class="relative">
					
					<div class="w-full h-[100vh] block bg-cover bg-no-repeat" style="background-image: url('<?php echo $postthumbnails; ?>')">
						<span class="w-full h-full block bg-gradient-to-t from-slate-100"></span>
					</div>
						
					<div class="p-24 absolute bottom-0 z-20">
						<a href="<?php the_permalink(); ?>" class="badge bg-default/90 border-[1px]"><?php $categories = get_the_category(); if ( ! empty( $categories ) ) { echo esc_html( $categories[0]->name ); } ?></a>
						<h2 class="mb-10 mt-5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="hidden"><a href="<?php the_permalink(); ?>"><?php the_author(); ?></a></div>
						
						<?php endforeach; wp_reset_postdata();?> 

						<ul class="grid grid-cols-4 gap-5">
							<?php
								$recent_posts = wp_get_recent_posts(array(
									'numberposts' => 5, // Number of recent posts thumbnails to display
									// 'offset'=>'15',
									'post_status' => 'publish' // Show only the published posts
								));
								foreach (array_slice($recent_posts,1,4) as $post) :  setup_postdata($post); ?>
								<li class="grid grid-cols-4 gap-3">
									<a href="<?php the_permalink(); ?>">
										<?php 
											if ( has_post_thumbnail() ) {
												the_post_thumbnail();
											} else { ?>
												<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpeg" alt="<?php the_title(); ?>" />
										<?php } ?>
									</a>
									<div class="col-span-3 items-center">
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
				
			<!-- ends HERO here -->
			
			<div class="containerX mx-5 pt-14z space-y-10">
				
			   <div class="border-t-2 border-default border-b-[1px] py-3 flex gap-2 items-center">
					<h5 class="text-default mb-0 uppercase">What's New:</h5>
					<?php $tags = get_terms(array(
							'taxonomy' => 'post_tag',
							'orderby' => 'count',
							'order' => 'DESC',
							'number'  => 10,
						));  

					foreach ( (array) $tags as $tag ) {
						echo '<a class="bg-primary px-3 py-1 rounded-pill text-white visited:text-white/30" href="' . get_tag_link ($tag->term_id) . '" rel="tag">' . $tag->name . '</a>';
					} ?>
				</div>
				<?php wp_reset_postdata();?>	
					
				<section class="grid grid-cols-4 gap-5 py-10 border-b-2X border-primaryX">
					<div class="col-span-3">
						
						<div class="grid grid-cols-6 gap-5">
							<?php
							$args = array('post_type' =>  'post', 'post_per_page' => '-1', 'numberposts'=> '7' ); 
							$postslist = get_posts( $args ); ?>
							<?php foreach (array_slice($postslist,0,1) as $post) :  setup_postdata($post); ?>
							<div class="col-span-4">
								<div class="w-full aspect-[15/9] bg-white mb-5">
									<figure>
										<a href="<?php the_permalink(); ?>">
										<?php 
											if ( has_post_thumbnail() ) {
												the_post_thumbnail();
											} else { ?>
												<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpeg" alt="<?php the_title(); ?>" />
											<?php } ?>
										</a>
									</figure>
								</div>

								<div class="card-body">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> 
									<div class="entry-meta hidden"> <?php ayushshrestha_posted_on(); ?> </div><!-- .entry-meta -->
									<p><?php echo wp_trim_words( get_the_content(), 40, ' ...' );?></p>
								</div>
							</div>
							<?php endforeach; wp_reset_postdata();?>
							
							<div class="col-span-2">
								<?php foreach (array_slice($postslist,1,6) as $post) :  setup_postdata($post);?>
								
								<div class="grid grid-cols-4 gap-3 [&:not(:last-child)]:border-b-[1px] py-2">
									<div class="image image-3-2 overflow-hidden">
										<figure>
											<a href="<?php the_permalink(); ?>">
											<?php 
												if ( has_post_thumbnail() ) {
													the_post_thumbnail();
												} else { ?>
												
													<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpeg" alt="<?php the_title(); ?>" />
												<?php } ?>
											</a>
										</figure>
									</div>


									<div class="col-span-3 pb-2 card-body">
										<h5 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5> 
										<div class="entry-meta hidden">
											<?php ayushshrestha_posted_on();?>
										</div><!-- .entry-meta -->
										<p class="font-sm hidden"><?php echo wp_trim_words( get_the_content(), 10, ' ...' );?></p>
									</div>
								</div>
								<?php endforeach;  wp_reset_postdata();?>						
							</div>	
						</div><!-- Top Headline sticky article ENDs-->

					</div>
					<div>
						<?php $catquery = new WP_Query(array('meta_key' => 'post_views_count',
							'orderby' => 'meta_value_num',
							'order' => 'DESC',
							'posts_per_page' => '7')); ?> 		
						<h4><a href="<?php the_permalink(); ?>">Must Viewed</a></h4>
						<div class="card card-body card--white bg-white/70 rounded-md">
							<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
							<h5 class="font-normal [&:not(:last-child)]:border-b border-gray-200 dark:border-gray-600 p-3 mb-0"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h5>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div> <!-- Opinion ENDs -->
				</section> 
			</div>
												
				<section class="text-center py-12 relative h-full">
					<?php $the_query = new WP_Query( "post_type=photography"); 
						while ($the_query->have_posts()): $the_query->the_post(); 
						
						if (has_post_thumbnail($post->ID)):
							$postthumbnails = wp_get_attachment_image_src(
								get_post_thumbnail_id($post->ID), "single-post-thumbnail"
							);
							$postthumbnails = $postthumbnails[0];
							// if not, we define $imageUrl with our default image src value
						else:
							$postthumbnails = get_template_directory_uri() . "/images/default-image.jpeg";
						endif; ?>
					<div class="w-full h-[100vh] block bg-cover bg-no-repeat" style="background-image: url('<?php echo $postthumbnails; ?>')">
						<span class="w-full h-full block bg-gradient-to-t from-slate-100"></span>
					</div>
						
					<div class="p-24 absolute bottom-0 z-20 w-full">
						<a href="<?php the_permalink(); ?>" class="badge bg-default/90 border-[1px]"><?php $categories = get_the_category(); if ( ! empty( $categories ) ) { echo esc_html( $categories[0]->name ); } ?></a>
						<h2 class="mb-10 mt-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="hidden"><a href="<?php the_permalink(); ?>"><?php the_author(); ?></a></div>
					</div>
								
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
				</section>
				
			<div class="containerX mx-5  py-5">
				
				<div class="grid grid-cols-4 gap-5">
					<div class="col-span-3  dark:bg-gray-700 dark:border-gray-600 dark:text-white">
					<?php 
						$args = array( 'numberposts' => 10 );
						$postslist = get_posts( $args ); ?> 
						<h2 class="text-2xl font-bold mb-5"><a href="<?php the_permalink(); ?>">Latest news</a></h2>
						
						<?php foreach ($postslist as $post) :  setup_postdata($post); ?>
						<div class="card border-0 border-radius-0 mb-5 pb-5 [&:not(:last-child)]:border-b border-gray-200 dark:border-gray-600">
							<div class="grid grid-cols-4 h-100">
								<div class="image image-3-2 h-100">
									<figure class="h-100X">
										<a href="<?php the_permalink(); ?>">
										<?php 
											if ( has_post_thumbnail() ) {
												the_post_thumbnail();
											} else { ?>
											
												<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpeg" alt="<?php the_title(); ?>" />
											<?php } ?>
										</a>
									</figure>
								</div>
								<div class="col-span-3 px-5">
									<a href="<?php the_permalink(); ?>" class="bg-default text-white visited:text-white text-xs inline-block font-medium me-2 px-2 py-1 rounded mb-2"><?php $categories = get_the_category(); if ( ! empty( $categories ) ) { echo esc_html( $categories[0]->name ); } ?></a>
									<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5> 
									<div class="entry-meta text-xs hidden">
										<?php ayushshrestha_posted_on();?>
									</div><!-- .entry-meta -->
									<p class="font-sm d-none d-md-block"><?php echo wp_trim_words( get_the_content(), 20, ' ...' );?></p>
								</div> <!-- image content ends here -->
							</div>


						</div>
						<?php endforeach;  wp_reset_postdata();?>		
					</div> <!-- latest news col md 8 ends -->
					<div>
						<a class="twitter-timeline" data-height="1200" href="https://twitter.com/ayushshrestha?ref_src=twsrc%5Etfw">Tweets by Nepa_Headlines</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
				</div><!-- latest news row  ends -->
			</div>
		</main><!-- #main -->

<?php
get_sidebar();
get_footer();

