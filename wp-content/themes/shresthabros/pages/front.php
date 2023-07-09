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

<main id="primary" class="mx-auto text-lg tracking-tight text-slate-700" >

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
                            <div class="h-full" style="background:url('<?php echo $postthumbnails;?>') no-repeat center center; background-size:cover;">
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>               
                
                <div class="absolute inset-0 h-full w-full z-10 bg-gray-300/40 dark:bg-black/80 opacity-100"></div>
                <div class="p-10 absolute z-20 bottom-0 slick-one_sync"> 
                    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                    <div>
                        <h5 class="text-white text-md"><?php the_field('year'); ?></h5>
                        <h4 class="text-white text-20xl font-bold font-lora"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                        <p><?php the_content();?></p>
                    </div>
                    <?php endwhile; ?>  
                </div>
                <?php wp_reset_postdata();  ?>
            </div>
        </div>

        <?php if( have_rows('aboutus_banner') ): ?>
        <?php while( have_rows('aboutus_banner') ): the_row(); $aboutusBannerImage = get_sub_field('aboutus_banner_image');?>
            <div class="py-10 aboutus_banner aboutus_banner--red-transparent relative flex items-center" style="background:url('<?php echo $aboutusBannerImage['url'];?>') no-repeat center center; background-size:cover; background-attachment: fixed;">
                <?php if( have_rows('aboutus_banner_caption') ): ?>
                <div class="absolute w-full">
                    <div class="max-w-screen-xl mx-auto px-4 space-y-5" data-aos="fade-up" data-aos-anchor-placement="top" data-aos-duration="1000">
                        <?php while( have_rows('aboutus_banner_caption') ): the_row(); ?>
                        <h2 class="mb-8 text-3xl font-bold tracking-[-0.04em] text-white sm:text-5xl"><?php the_sub_field('aboutus_banner_title_large'); ?></h2>
                        <h3 class="text-3xl text-white font-medium sm:leading-[2.5rem]"><?php the_sub_field('aboutus_banner_title_small'); ?></h3>
                        <div class="text-white"><?php the_sub_field('aboutus_banner_paragraph'); ?></div>
                        <a href="" class="text-white hover:text-primary text-sm tracking-[0.1em] mt-8 flex items-center">KNOW MORE NDPL </a>
                    <?php endwhile; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
        <?php endif; ?>

        <div class="px-4 sm:px-6 md:max-w-8xl md:px-4 lg:px-12 relative overflow-hidden bg-secondary bg-primary--before">
            <div class="py-10 max-w-screen-xl mx-auto px-4">
                <h2 class="text-4xl font-bold tracking-tight pb-8 pt-12 text-white sm:text-5xl">Portfolio</h2>
                <ul class="slick-two slick-two--arrow -mx-4 pb-10 mb-10" data-aos="fade-up" data-aos-anchor-placement="top" data-aos-duration="1000">                
                    <?php $the_query = new WP_Query('post_type=portfolio'); ?>                        
                    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                    <li class="px-5 mb-4">
                        <div class="relative overflow-hidden bg-white">
                            <div class="image image-1by1 grayscale hover:grayscale-0 ease-in duration-300">
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
                            <div class="p-10 absolute z-10 bottom-0">
                                <h5 class="text-white text-md"><?php the_field('year'); ?></h5>
                                <h4 class="text-white text-3xl font-bold font-lora"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
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
                <h2 class="text-4xl font-bold tracking-tight pb-8 pt-12 dark:text-zinc-100 sm:text-5xl">News & Events</h2>
                <ul class="slick-three -mx-4">
                
                        <?php $the_query = new WP_Query( 'posts_per_page=5' ); ?>
                        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                    
                    <li class="px-5 mb-4 h-full">
                        <div class="relative overflow-hidden bg-white h-full">
                            <div class="image grayscale hover:grayscale-0 ease-in duration-300">
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
                            <div class="p-8">
                                <h5 class="mb-3 text-xl font-bold"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                                <div class="card-text text-md text-gray-500"><?php echo wp_trim_words( get_the_content(), 20, '...' );?></div>
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
                <div class="max-w-screen-sm mx-auto px-4 text-white" data-aos="fade-up" data-aos-anchor-placement="top" data-aos-duration="1000">
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