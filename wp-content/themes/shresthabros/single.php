<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package shresthabros
 */

get_header();
?>

	<main id="primary" class="mx-10 mt-5 mb-10 bg-white p-5 md:p-16">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'shresthabros' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'shresthabros' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		<h2 class="text-4xl font-black tracking-tight pb-5">Related Topics</h2>
		
		<ul class="slick-four -mx-4">
		<?php 
		$post_id = get_the_ID();
		$cat_ids = array();
		$categories = get_the_category( $post_id );
	
		if(!empty($categories) && is_wp_error($categories)):
			foreach ($categories as $category):
				array_push($cat_ids, $category->term_id);
			endforeach;
		endif;
	
		$current_post_type = get_post_type($post_id);
		$query_args = array( 
	
			'category__in'   => $cat_ids,
			'post_type'      => $current_post_type,
			'post__not_in'    => array($post_id),
			'posts_per_page'  => '10'
	
	
		 );
		$related_cats_post = new WP_Query( $query_args );
	
		if($related_cats_post->have_posts()):
			 while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
				<li class="px-5 h-full grayscalex hover:grayscale-0x hover:text-secondary ease-in duration-300">
					<div class="relative overflow-hidden bg-white h-full">
						<div class="image ease-in duration-300">
							<figure>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail('full', array('class' => 'w-full'));
									} else { ?>
										<img src="<?php bloginfo('template_directory'); ?>/images/default-image.jpg" alt="<?php the_title(); ?>" />
									<?php } ?>
								</a>
							</figure>
						</div>
						<div class="p-5 md:p-8 space-y-2">
							<a class="text-sm font-medium px-1.5 pt-0.5 pb-1 rounded bg-primary hover:bg-secondary text-white transition duration-300 ease-in" href="<?php the_permalink(); ?>"><?php $categories = get_the_category(); if ( ! empty( $categories ) ) { echo esc_html( $categories[0]->name ); } ?></a>
							<h5 class="mb-3 text-xl font-bold"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
							<div class="card-text text-md text-gray-500 hidden"><?php echo wp_trim_words( get_the_content(), 20, '...' );?></div>
							<div class="text-gray-300 mt-4 flex justify-end item-center">
								<small class="text-muted"><?php echo time_ago(); ?></small>
							</div>
						</div>
					</div>
				</li>
			<?php endwhile;
	
			// Restore original Post Data
			wp_reset_postdata();
		 endif;  ?>
		 
		 </ul>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
