<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * 
 * Template Name: Home Page
 * 
 * @package shresthabros
 */

 get_header();
?>

<main id="primary" class="mx-auto text-lg tracking-tight text-gray-600" >

        <div class="relative overflow-hidden">
        <?php $the_query = new WP_Query('post_type=hero'); ?>  
            <div>
                <div class="relative hero_banner ">
                    <div class="absolute h-full md:w-2/3 top-0 end-0 bg-black">
                        <div class="slick-one h-full">                
                            <?php while ($the_query -> have_posts()) : $the_query -> the_post();
                            if ( has_post_thumbnail( $post->ID ) ) :
                                $postthumbnails = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                                $postthumbnails = $postthumbnails[0]; else:
                                $postthumbnails = get_template_directory_uri() . '/images/default-image-large.jpg';
                              endif; ?>
                            <div class="h-full" style="background:url('<?php echo $postthumbnails;?>') no-repeat center center; background-size:cover;"></div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>               
                
                <div class="absolute inset-0 h-full w-full z-10 bg-sky-400/40 opacity-100"></div>
                
                <div class="p-20 absolute z-20 bottom-0 w-full"> 
                    <div class="slick-one_sync">
                        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                            <div>
                                <h5 class="text-white text-md"><?php the_field('year'); ?></h5>
                                <h4 class="text-white text-20xl font-bold font-lora"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                                <h5 class="text-white text-2xl 2xl:text-3xl text-wrap"><?php the_content();?></h5>
                            </div>
                        <?php endwhile; ?>  
                    </div>
                </div>
                <?php wp_reset_postdata();  ?>
            </div>
        </div>

        <div class="p-4 sm:px-6 lg:px-12 md:py-32 relative overflow-hidden bg-sky-300">
            <div class="grid grid-cols-3 gap-4 h-full">
                <div class="sticky top-0">
                    <h2 class="text-4xl font-bold tracking-tight sm:text-5xl text-sky-600">Services</h2>
                    <p class="mb-10">Producing Outstanding Interactive Products around Across Platforms</p>
                    <a class="rounded-3xl text-sm font-semibold py-3 px-8 bg-gray-900 text-white hover:bg-gray-700">
                        <span>View <span class="hidden sm:inline">More</span> 
                    </a>
                </div>
                <div class="col-span-2">
                    <div class="grid md:grid-cols-2 2xl:grid-cols-3 gap-10">              
                        <?php $the_query = new WP_Query('post_type=service'); ?>                        
                        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                        <div class="mb-4 ease-in duration-300">
                            <div class="relative overflow-hidden">
                                <div class="w-16" >
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <?php if ( has_post_thumbnail() ) {
                                            the_post_thumbnail('full', array('class' => 'w-full'));
                                        } else { ?>
                                            <img src="<?php bloginfo('template_directory'); ?>/images/default-image.jpg" alt="<?php the_title(); ?>" />
                                        <?php } ?>
                                    </a>
                                </div>
                                <div class="py-6">
                                    <h4 class="text-2xl mb-2 font-bold font-lora"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                                    <div class="card-text text-md text-gray-500"><?php echo wp_trim_words( get_the_content(), 20, '...' );?></div>
                                    <div class="text-gray-300 mt-4">
                                        <small><a href="<?php the_permalink() ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-sm font-medium text-center text-primary hover:text-secondary transition duration-300">About <?php the_title(); ?>  <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg></a></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-4 sm:px-6 md:px-4 lg:px-12 relative overflow-hidden bg-sky-400/20 text-gray-600">
            <div class="py-10">
                <h2 class="text-4xl font-bold tracking-tight pt-12 sm:text-5xl text-sky-600">Selected Works</h2>
                <h5 class="text-2xl font-bold pb-2">The Importance of a Strong Brand Positioning</h5>
                <p>Creating a Consistent Brand Identity Across All Touchpoints</p>
                <ul class="slick-two slick-two--arrow -mx-4 pb-10 my-10" data-aos="fade-up" data-aos-anchor-placement="top" data-aos-duration="1000">                
                    <?php $the_query = new WP_Query('post_type=portfolio'); ?>                        
                    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                    <li class="px-5 mb-4 grayscale hover:grayscale-0 ease-in duration-300">
                        <div class="grid grid-cols-2 relative overflow-hidden items-center bg-white">
                            <div class="image image-1by1 ease-in duration-300">
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
                            <div class="p-10 ">

                                <?php 
                                    $post_tags = get_the_tags();
                                    if ( ! empty( $post_tags ) ) {
                                        foreach( $post_tags as $post_tag ) {
                                            $count++;
                                            echo '<a class="text-sm font-medium px-1.5 pt-0.5 pb-1 rounded bg-primary hover:bg-secondary text-white transition duration-300 ease-in me-1" href="' . get_tag_link( $post_tag ) . '">' . $post_tag->name . '</a>';
                                            if( $count > 2 ) break;
                                        }
                                    }
                                ?>
                                <h4 class="mt-4 mb-2 text-2xl font-bold font-lora"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                                <p><?php echo wp_trim_words( get_the_content(), 30, '...' );?></p>
                            </div>
                        </div>
                    </li>
                    <?php endwhile; wp_reset_postdata(); ?>
                </ul>
            </div>
        </div>



        <?php if( have_rows('our_team') ): ?>
        <?php while( have_rows('our_team') ): the_row(); 
            $our_team_images = get_sub_field('our_team_images');
            $our_team_images_two = get_sub_field('our_team_images_two');
            $our_team_images_three = get_sub_field('our_team_images_three');
            ?>
        <div class="relative ">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center">
                <ul class="slick-one" data-aos="fade-right" data-aos-anchor-placement="top" data-aos-duration="1000">
                    <li>
                        <figure>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <img src="<?php echo $our_team_images['url'];?>" alt="">
                            </a>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <img src="<?php echo $our_team_images_two['url'];?>" alt="">
                            </a>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <img src="<?php echo $our_team_images_three['url'];?>" alt="">
                            </a>
                        </figure>
                    </li>
                </ul>
                
                <div class="md:px-20" data-aos="fade-left" data-aos-anchor-placement="top" data-aos-duration="1000">                        
                    <h2 class="mb-3 text-2xl font-bold tracking-[-0.04em] sm:text-5xl sm:leading-[3.5rem]">
                        <?php the_sub_field('our_team_title'); ?>
                    </h2>
                    <div class="text-lg my-10">
                        <?php the_sub_field('our_team_paragraph'); ?>
                    </div>
                    
                    <a href="" title="Meet our Team" class="bg-transparent hover:bg-primary text-primary font-semibold sm:leading-[3.5rem] hover:text-white py-4 px-8 border border-primary hover:border-transparent rounded transition">Meet our Team</a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>


        <div class="px-4 sm:px-6 md:max-w-8xl md:px-4 lg:px-12 ">
            <div class="py-10">
                <h2 class="text-4xl font-bold tracking-tight pt-12 text-sky-600 sm:text-5xl">News & Events</h2>
                <div class="flex align-items-center justify-between">
                    <div>
                        <h5 class="text-2xl font-bold tracking-tight pb-2">Building brands, Creating products & Transforming business.</h5>
                        <p>We wants to stand out in the market and accomplish its goals must have a strong brand positioning.</p>
                    </div>
                    <div>
                        <a class="rounded-3xl text-sm font-semibold py-3 px-8 bg-gray-900 text-white hover:bg-gray-700">
                            <span>View <span class="hidden sm:inline">More</span> 
                        </a>
                    </div>
                </div>
                <ul class="slick-three -mx-4 pt-8">
                
                        <?php $the_query = new WP_Query( 'posts_per_page=5' ); ?>
                        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                    
                    <li class="px-5 mb-4 h-full grayscale hover:grayscale-0 ease-in duration-300">
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
                            <div class="p-8 space-y-2">
                                <a class="text-sm font-medium px-1.5 pt-0.5 pb-1 rounded bg-primary hover:bg-secondary text-white transition duration-300 ease-in" href="<?php the_permalink(); ?>"><?php $categories = get_the_category(); if ( ! empty( $categories ) ) { echo esc_html( $categories[0]->name ); } ?></a>
                                <h5 class="mb-3 text-xl font-bold"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                                <div class="card-text text-md text-gray-500 hidden"><?php echo wp_trim_words( get_the_content(), 20, '...' );?></div>
                                <div class="text-gray-300 mt-4 flex justify-end item-center">
                                    <small class="text-muted"><?php echo time_ago(); ?></small>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endwhile; wp_reset_postdata(); ?>
                </ul>
            </div>
        </div>

        
        <?php if( have_rows('letshavesomecoffee') ): ?>
        <?php while( have_rows('letshavesomecoffee') ): the_row(); $letsWorkBannerImage = get_sub_field('lets_work_background_image');?>
        <div class="text-center relative mt-10" style="background:url('<?php echo $letsWorkBannerImage['url'];?>') no-repeat center center; background-size:cover;">
            <div class="w-full py-40 bg-black/60">
                <div class="max-w-screen-sm mx-auto px-4 text-white">
                    <h2 class="mb-3 text-4xl font-bold tracking-[-0.04em] sm:leading-[3.5rem]"><?php the_sub_field('lets_work_title'); ?></h2>
                    <h3 class="mb-8 text-xl"><?php the_sub_field('lets_work_paragraph'); ?></h3>
                    <a href="" title="Email us" class="bg-transparent hover:bg-primary text-primary font-semibold sm:leading-[3.5rem] hover:text-white py-4 px-8 border border-primary hover:border-transparent rounded transition">Email us</a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        

	</main><!-- #main -->

    <?php
get_sidebar();
get_footer();