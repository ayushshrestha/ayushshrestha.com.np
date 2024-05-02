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
		<main id="primary" class="site-main relative z-20 mb-[100vh] bg-slate-100 dark:bg-black">

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
					
					<div class="w-full h-[100vh] block bg-cover bg-center bg-no-repeat" style="background-image: url('<?php echo $postthumbnails; ?>')">
						<span class="w-full h-full block bg-gradient-to-t from-slate-100 dark:from-black"></span>
					</div>
						
					<div class="p-5 md:p-8 xl:p-24 absolute bottom-0 z-20">
						<a href="<?php the_permalink(); ?>" class="badge bg-default/90 border-[1px]"><?php $categories = get_the_category(); if ( ! empty( $categories ) ) { echo esc_html( $categories[0]->name ); } ?></a>
						<h2 class="mb-5 mb:mb-10 mt-5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						
						<?php endforeach; wp_reset_postdata();?> 

						<ul class="grid md:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-5">
							<?php
								$recent_posts = wp_get_recent_posts(array(
									'post_type' =>  'post', 
									'numberposts'=> '5'
								));
								foreach (array_slice($recent_posts,1,4) as $post) :  setup_postdata($post); ?>
								<li class="grid grid-cols-4 gap-3">
									<a href="<?php echo get_permalink($post['ID']) ?>">
										<?php 
											if ( has_post_thumbnail($post['ID'])){
												$thumbnail_url = get_the_post_thumbnail_url($post['ID']);
        										echo '<img src="' . esc_url($thumbnail_url) . '">';
											} else { ?>
												<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpeg" alt="<?php the_title(); ?>" />
										<?php } ?>
									</a>
									<div class="col-span-3 items-center">
										<h5><a href="<?php echo get_permalink($post['ID']) ?>"><?php echo $post['post_title'] ?></a></h5>
									</div>
								</li>
							<!-- End post -->
							<?php endforeach; wp_reset_query(); ?>
						</ul>
						<!-- End list-post -->
					</div>
				</div>
				
			<!-- ends HERO here -->
			
			<div class="containerX mx-5 pt-14z space-y-5 md:space-y-10">
				
			   <div class="border-t-2 border-default border-b-[1px] py-3 flex flex-wrap gap-2 items-center">
					<h5 class="text-default md:mb-0 uppercase">What's New:</h5>
					<?php $tags = get_terms(array(
							'taxonomy' => 'post_tag',
							'orderby' => 'count',
							'order' => 'DESC',
							'number'  => 10,
						));  

					foreach ( (array) $tags as $tag ) {
						echo '<a class="bg-primary px-3 py-1 mb-1 md:mb-0 rounded-pill text-white visited:text-white/30" href="' . get_tag_link ($tag->term_id) . '" rel="tag">' . $tag->name . '</a>';
					} ?>
				</div>
				<?php wp_reset_postdata();?>	
					
				<section class="md:grid md:grid-cols-4 gap-5 mb:py-10 border-b-2X border-primaryX">
					<div class="col-span-3">
						
						<div class="md:grid md:grid-cols-6 gap-5">
							<?php
							$args = array('post_type' =>  'post', 'post_per_page' => '-1', 'numberposts'=> '7', 'post__not_in' => get_option("sticky_posts") ); 
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
									<div class="entry-meta hidden"><?php ayushshrestha_posted_on(); ?> </div><!-- .entry-meta -->
									<p><?php echo wp_trim_words( get_the_content(), 40, ' ...' );?></p>
								</div>
							</div>
							<?php endforeach; wp_reset_postdata();?>
							
							<div class="col-span-2">
								<?php foreach (array_slice($postslist,1,6) as $post) :  setup_postdata($post);?>
								
								<div class="grid grid-cols-4 gap-3 [&:not(:last-child)]:border-b-[1px] [&:not(:first-child)]:py-2">
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
						<?php $catquery = new WP_Query(array(
							'orderby' => 'rand',
							'posts_per_page' => '7')); ?> 		
						<h4><a href="<?php the_permalink(); ?>">Must Viewed</a></h4>
						<div class="card card-body card--white bg-white/70 rounded-md">
							<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
							<h5 class="font-normal [&:not(:last-child)]:border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800 p-3 mb-0"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h5>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div> <!-- Opinion ENDs -->
				</section> 
			</div>

			<section class=" px-5 py-20">
			<?php
// Function to retrieve YouTube videos from a channel
function get_youtube_videos($api_key, $channel_id, $max_results = 20) {
    $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=$channel_id&maxResults=$max_results&order=date&key=$api_key";
    
    $response = wp_remote_get($url);

    if (is_wp_error($response)) {
        return array();
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);

    $videos = array();

    foreach ($data->items as $item) {
        if ($item->id->kind == 'youtube#video') {
            $video = array(
                'title' => $item->snippet->title,
                'video_id' => $item->id->videoId,
                'thumbnail' => $item->snippet->thumbnails->medium->url,
                'published_at' => $item->snippet->publishedAt
            );
            $videos[] = $video;
        }
    }

    return $videos;
}

// Example usage: Retrieve videos from a YouTube channel
$api_key = 'AIzaSyAltgMnylX7Tfnx_AE92icEZIu1tSyXU74';
$channel_id = 'UCuO42H2gND8Hkwxp3Y92LYQ';
$videos = get_youtube_videos($api_key, $channel_id);

// Display the retrieved videos
if (!empty($videos)) {
    echo '<h2 class="text-2xl font-bold mb-5"><a href="">Videos</a></h2> <ul class="grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-3">';
    foreach ($videos as $video) {
        echo '<li class="bg-white p-5">';
        echo '<a href="https://www.youtube.com/watch?v=' . $video['video_id'] . '" target="_blank">';
        echo '<img src="' . $video['thumbnail'] . '" alt="' . $video['title'] . '">';
        echo '<div class="text-lg font-bold pt-2">' . $video['title'] . '</div>';
        echo '</a>';
        echo '</li>';
    }
    echo '</ul>';
} else {
    echo 'No videos found.';
}
?>
			</section>
												
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
						
					<div class="p-8 md:p-24 absolute bottom-0 z-20 w-full">
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
				
				<div class="md:grid xl:grid-cols-4 gap-5">
					<div class="col-span-3">
					
					<?php 
						$args = array( 'numberposts' => 10 );
						$postslist = get_posts( $args ); ?> 
						<h2 class="text-2xl font-bold mb-5"><a href="<?php the_permalink(); ?>">Latest news</a></h2>
						
						<?php foreach ($postslist as $post) :  setup_postdata($post); ?>
						<div class="card border-0 border-radius-0 mb-5 md:pb-5 [&:not(:last-child)]:border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800">
							<div class="md:grid md:grid-cols-4 h-100">
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
								<div class="col-span-3 p-5 md:px-5 md:py-0 flex items-center">
									<div>
										<a href="<?php the_permalink(); ?>" class="bg-default text-white visited:text-white text-xs inline-block font-medium me-2 px-2 py-1 rounded mb-2"><?php $categories = get_the_category(); if ( ! empty( $categories ) ) { echo esc_html( $categories[0]->name ); } ?></a>
										<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5> 
										<div class="entry-meta text-xs hidden"><?php ayushshrestha_posted_on();?></div><!-- .entry-meta -->
										<p class="font-sm d-none d-md-block mb-0"><?php echo wp_trim_words( get_the_content(), 20, ' ...' );?></p>
									</div>
								</div> <!-- image content ends here -->
							</div>
						</div>
						<?php endforeach;  wp_reset_postdata();?>	

					</div> <!-- latest news col md 8 ends -->
					<div>
						<a class="twitter-timeline" data-height="1200" href="https://twitter.com/ayushshrestha?ref_src=twsrc%5Etfw">Tweets by AyushShrestha</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
					<div class="col-span-4 border-b-2 border-primary mb-10x pb-5"></div>
					
					<div class="my-3">
						<?php $catquery = new WP_Query(array(
							'orderby' => 'rand',
							'category_name' => 'ui-ux',
							'posts_per_page' => '5')); ?> 		
						<h4 class="mb-4"><a href="<?php the_permalink(); ?>">UI/UX</a></h4>
						<div>
							<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
							<div class=" [&:not(:last-child)]:border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800 p-3 rounded-md bg-white block">
								<div class="grid grid-cols-4 gap-3">
									<div class="image">
										<a class="" href="<?php the_permalink(); ?>">
											<?php 
												if ( has_post_thumbnail() ) {
													the_post_thumbnail('thumbnail', array('class' => 'img-fluid'));
												} else { ?>
													<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpeg" alt="<?php the_title(); ?>" />
											<?php } ?>
										</a>
									</div>
									<div class="col-span-3 flex items-center">
										<strong class="font-normal"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></strong>
									</div>
								</div>
							</div>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>

					<div class="my-3">
						<?php $catquery = new WP_Query(array(
							'category_name' => 'css',
							'posts_per_page' => '5')); ?> 		
						<h4 class="mb-4"><a href="<?php the_permalink(); ?>">CSS</a></h4>
						<div>
							<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
							<div class=" [&:not(:last-child)]:border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800 p-3 rounded-md bg-white block">
								<div class="grid grid-cols-4 gap-3">
									<div class="image">
										<a class="" href="<?php the_permalink(); ?>">
											<?php 
												if ( has_post_thumbnail() ) {
													the_post_thumbnail('thumbnail', array('class' => 'img-fluid'));
												} else { ?>
													<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpeg" alt="<?php the_title(); ?>" />
											<?php } ?>
										</a>
									</div>
									<div class="col-span-3 flex items-center">
										<strong class="font-normal"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></strong>
									</div>
								</div>
							</div>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>

					<div class="my-3">
						<?php $catquery = new WP_Query(array(
							'orderby' => 'rand',
							'category_name' => 'html',
							'posts_per_page' => '5')); ?> 		
						<h4 class="mb-4"><a href="<?php the_permalink(); ?>">HTML</a></h4>
						<div>
							<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
							<div class=" [&:not(:last-child)]:border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800 p-3 rounded-md bg-white block">
								<div class="grid grid-cols-4 gap-3">
									<div class="image">
										<a class="" href="<?php the_permalink(); ?>">
										<?php 
											if ( has_post_thumbnail() ) {
												the_post_thumbnail('thumbnail', array('class' => 'img-fluid'));
											} else { ?>
												<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpeg" alt="<?php the_title(); ?>" />
										<?php } ?>
										</a>
									</div>
									<div class="col-span-3 flex items-center">
										<strong class="font-normal"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></strong>
									</div>
								</div>
							</div>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>

					<div class="my-3">
						<?php $catquery = new WP_Query(array(
							'orderby' => 'rand',
							'category_name' => 'javascript',
							'posts_per_page' => '5')); ?> 		
						<h4 class="mb-4"><a href="<?php the_permalink(); ?>">Javascript</a></h4>
						<div>
							<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
							<div class=" [&:not(:last-child)]:border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800 p-3 rounded-md bg-white block">
								<div class="grid grid-cols-4 gap-3">
									<div class="image">
										<a class="" href="<?php the_permalink(); ?>">
											<?php 
												if ( has_post_thumbnail() ) {
													the_post_thumbnail('thumbnail', array('class' => 'img-fluid'));
												} else { ?>
													<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpeg" alt="<?php the_title(); ?>" />
											<?php } ?>
										</a>
									</div>
									<div class="col-span-3 flex items-center">
										<strong class="font-normal"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></strong>
									</div>
								</div>
							</div>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>

					<div class="my-3">
						<?php $catquery = new WP_Query(array(
							'orderby' => 'rand',
							'category_name' => 'angular',
							'posts_per_page' => '5')); ?> 		
						<h4 class="mb-4"><a href="<?php the_permalink(); ?>">Angular</a></h4>
						<div>
							<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
							<div class=" [&:not(:last-child)]:border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800 p-3 rounded-md bg-white block">
								<div class="grid grid-cols-4 gap-3">
									<div class="image">
										<a class="" href="<?php the_permalink(); ?>">
											<?php 
												if ( has_post_thumbnail() ) {
													the_post_thumbnail('thumbnail', array('class' => 'img-fluid'));
												} else { ?>
													<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpeg" alt="<?php the_title(); ?>" />
											<?php } ?>
										</a>
									</div>
									<div class="col-span-3 flex items-center">
										<strong class="font-normal"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></strong>
									</div>
								</div>
							</div>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>

					<div class="my-3">
						<?php $catquery = new WP_Query(array(
							'orderby' => 'rand',
							'category_name' => 'react',
							'posts_per_page' => '5')); ?> 		
						<h4 class="mb-4"><a href="<?php the_permalink(); ?>">React</a></h4>
						<div>
							<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
							<div class=" [&:not(:last-child)]:border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800 p-3 rounded-md bg-white block">
								<div class="grid grid-cols-4 gap-3">
									<div class="image">
										<a class="" href="<?php the_permalink(); ?>">
											<?php 
												if ( has_post_thumbnail() ) {
													the_post_thumbnail('thumbnail', array('class' => 'img-fluid'));
												} else { ?>
													<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpeg" alt="<?php the_title(); ?>" />
											<?php } ?>
										</a>
									</div>
									<div class="col-span-3 flex items-center">
										<strong class="font-normal"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></strong>
									</div>
								</div>
							</div>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>

					<div class="my-3">
						<?php $catquery = new WP_Query(array(
							'orderby' => 'rand',
							'category_name' => 'php',
							'posts_per_page' => '5')); ?> 		
						<h4 class="mb-4"><a href="<?php the_permalink(); ?>">PHP</a></h4>
						<div>
							<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
							<div class=" [&:not(:last-child)]:border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800 p-3 rounded-md bg-white block">
								<div class="grid grid-cols-4 gap-3">
									<div class="image">
										<a class="" href="<?php the_permalink(); ?>">
											<?php 
												if ( has_post_thumbnail() ) {
													the_post_thumbnail('thumbnail', array('class' => 'img-fluid'));
												} else { ?>
													<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpeg" alt="<?php the_title(); ?>" />
											<?php } ?>
										</a>
									</div>
									<div class="col-span-3 flex items-center">
										<strong class="font-normal"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></strong>
									</div>
								</div>
							</div>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>

					<div class="my-3">
						<?php $catquery = new WP_Query(array(
							'orderby' => 'rand',
							'category_name' => 'lifestyle',
							'posts_per_page' => '5')); ?> 		
						<h4 class="mb-4"><a href="<?php the_permalink(); ?>">Lifestyle</a></h4>
						<div>
							<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
							<div class=" [&:not(:last-child)]:border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800 p-3 rounded-md bg-white block">
								<div class="grid grid-cols-4 gap-3">
									<div class="image">
										<a class="" href="<?php the_permalink(); ?>">
											<?php 
												if ( has_post_thumbnail() ) {
													the_post_thumbnail('thumbnail', array('class' => 'img-fluid'));
												} else { ?>
													<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpeg" alt="<?php the_title(); ?>" />
											<?php } ?>
										</a>
									</div>
									<div class="col-span-3 flex items-center">
										<strong class="font-normal"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></strong>
									</div>
								</div>
							</div>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>

					
					


				</div><!-- latest news row  ends -->
			</div>
		</main><!-- #main -->

<?php
get_sidebar();
get_footer();

