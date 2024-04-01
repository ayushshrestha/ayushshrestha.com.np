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
 * @package nepaheadlines
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="featured3-main">
			
			<div class="bk-thumb-wrap term-4">
				<a class="link-overlap" href="https://allthebestsofts.com/rubik-world/politics/school-honouring-confederate-general-renamed-barack-obama-elementary/"></a>
				<div class="thumb" data-type="background" style="background-image: url('https://allthebestsofts.com/rubik-world/wp-content/uploads/2018/05/4-905x613.jpg')"></div>
			</div>
			<div class="post-list-wrap">
				<div class="post-list-wrap-inner container bkwrapper">
					<div class="large-post-content post-c-wrap">
						<div class="post-category">
							<a class="term-4" href="https://allthebestsofts.com/rubik-world/category/politics/">Politics</a>
						</div>
						<h4 class="title" style="opacity: 1;">
							<a class="term-4" href="https://allthebestsofts.com/rubik-world/politics/school-honouring-confederate-general-renamed-barack-obama-elementary/">School Honouring Confederate General Renamed Barack Obama Elementary</a>
						</h4>
						<div class="meta">
							<div class="post-author"><a href="https://allthebestsofts.com/rubik-world/author/bkninja/">bkninja</a></div>
							<div class="post-date"><?php echo date( 'F j', strtotime( $recent['post_date'] ) ); ?></div>
						</div>
					</div>
					<ul class="list-small-post row">
						<?php
							$recent_posts = wp_get_recent_posts(array(
								'numberposts' => 4, // Number of recent posts thumbnails to display
								'post_status' => 'publish' // Show only the published posts
							));
							foreach($recent_posts as $post) : ?>
							<li class="small-post col-md-3 col-sm-6 bk-post-title-small clearfix">
								<div class="small-post-inner post-c-wrap">
									<h4 class="title">
										<a href="<?php echo get_permalink($post['ID']) ?>"><?php echo $post['post_title'] ?></a>
									</h4>
									<div class="meta">
										<div class="post-date"><?php echo date( 'F j', strtotime( $recent['post_date'] ) ); ?></div>
									</div>
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
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
				<?php
			
					
					if ( have_posts() ) :

						if ( is_home() && ! is_front_page() ) :
							?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							<?php
						endif;

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>
				<div class="col-sm-4">
					<div class="module-title">
						<div class="main-title clearfix">
							<h2 class="entry-title bk-tab-original active">
								<a href="">Politics</a>
							</h2>
						</div>
					</div>
					<?php $catquery = new WP_Query( 'cat=21&posts_per_page=5' ); ?>
					<ul>
						<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
						<li>
							<h4><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
							<div class="entry-meta">
								<?php
									nepaheadlines_posted_on();
								?>
							</div><!-- .entry-meta -->
						</li>
						<?php endwhile; ?> 
					</ul>
					<?php wp_reset_postdata(); ?>
				</div>
			
			</div>
			
		</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
