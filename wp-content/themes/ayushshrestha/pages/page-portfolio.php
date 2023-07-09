<?php
	/**
	* Template Name: Page Portfolio
	*
	* @package WordPress
	* @subpackage AyushShrestha
	* @since Ayush Shrestha 1.0
	*/

	get_header();
	?>	
		<main id="primary" class="site-main">
			<div class="container-fluid px-3 px-md-5">
				<div class="row">
					<div class="col-12 my-5 py-5">
						<div class="row">
						<?php

							if(have_rows('Portfolio')):
							while(have_rows('Portfolio')): the_row();

							$portfoList = get_sub_field('portfolio_listing');

							foreach ($portfoList as $port):
							setup_postdata($port); ?>

							<div class="col-md-4x">
								<div class="image image4by4">
									<figure><a href="">
									<?php echo get_the_post_thumbnail($port, 'full');?>
									</a></figure>
								</div>
								<div class="bg-white p-4">
									<h4 class="mb-1"><?php echo esc_html( $port->post_title );?></h4>
									<p><?php echo esc_html( $port->post_content );?></p>
								</div>
							</div>
							<?php endforeach;?>
							</div> <!-- row ENDs -->
							<?php wp_reset_postdata();?>
							<?php endwhile;?>
							<?php endif;?>
							<div class="col-12 py-4 mb-5">
								<h3><?php echo the_title() ;?></h3>
								<p class="text-muted"><?php echo the_content() ;?></p>
							</div>
							<div class="col-12" id="list-portfolio">
								<div class="row gx-3">
									<div class="col-md-6">
										<div class="image image-21by9">
											<figure>
												<a href=""><img src="<?php echo get_template_directory_uri();?>/assets/images/portfolio/thumb/portfolio-uptrendly-thumb.jpg" class="img-fluid" /></a>
											</figure>
										</div>
									</div>
									<div class="col-md-6 mt-3">
										<div class="image image-21by9">
											<figure>
												<a href=""><img src="<?php echo get_template_directory_uri();?>/assets/images/portfolio/thumb/portfolio-mykronoz-thumb.jpg" class="img-fluid" /></a>
											</figure>
										</div>
									</div>
									<div class="col-md-6 mt-3 mt-md-0">
										<div class="image image-21by9">
											<figure>
												<a href=""><img src="<?php echo get_template_directory_uri();?>/assets/images/portfolio/thumb/portfolio-edox-thumb.png" class="img-fluid" /></a>
											</figure>
										</div>
									</div>
									<div class="col-md-6 mt-3">
										<div class="image image-21by9">
											<figure>
												<a href=""><img src="<?php echo get_template_directory_uri();?>/assets/images/portfolio/thumb/portfolio-tkp-thumb.jpg" class="img-fluid" /></a>
											</figure>
										</div>
									</div>
									<div class="col-md-6 mt-3 mt-md-0">
										<div class="image image-21by9">
											<figure>
												<a href=""><img src="<?php echo get_template_directory_uri();?>/assets/images/portfolio/thumb/portfolio-nepal-thumb.jpg" class="img-fluid" /></a>
											</figure>
										</div>
									</div>
									<div class="col-md-6 mt-3">
										<div class="image image-21by9">
											<figure>
												<a href=""><img src="<?php echo get_template_directory_uri();?>/assets/images/portfolio/thumb/portfolio-mns-thumb.png" class="img-fluid" /></a>
											</figure>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- portfolio col 12 ENDs -->
				</div><!-- row  ends -->
			</div>
		</main><!-- #main -->
	<?php
	get_sidebar();
	get_footer();