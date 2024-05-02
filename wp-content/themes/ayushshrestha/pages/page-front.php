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
 * Template Name: Page Front
 */

get_header(); ?>



	<main id="primary" class="site-main relative z-20 mb-[100vh] bg-slate-100 dark:bg-black">
        
   

        <div class="md:h-screen relative mb-auto overflow-hidden">
            <?php $the_query = new WP_Query([
                "post_type" => ["photography", "portfolio", "videos", ""],
                "posts_per_page" => 1,
                "orderby" => "rand",
            ]); ?>                        
            <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
            <div class="relative h-full py-5 md:py-10">
                <?php // If we have a featured image, it will be used as background image using the same logic you already used, but we put the src value in a specific variable: $imageUrl
                if (has_post_thumbnail($post->ID)):
                    $postthumbnails = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),"single-post-thumbnail");
                    $postthumbnails = $postthumbnails[0];
                    // if not, we define $imageUrl with our default image src value
                else:
                    $postthumbnails = get_template_directory_uri() . "/images/default-image-large.jpg";
                endif; ?>
                    <div class="blur-lg w-full h-full absolute left-0 top-0 bg-no-repeat bg-center bg-cover"  style="background-image:url('<?php echo $postthumbnails; ?>');"  data-swiper-parallax="30%" data-scroll data-scroll-offset="100%, 0%"><div class="bg-white/60 h-full w-full"></div></div>
                    <div class="bg-gradient-to-t from-slate-100 dark:bg-default/10 absolute z-10 w-full h-full top-0"></div>

                    <div class="mx-5 md:mx-14 relative z-10 h-full">
                        <div class="grid md:grid-cols-2 h-full">
                            
                            <div class="col-span-2x">
                                <div class="ps-0 py-10 md:pe-20 flex flex-col h-full">
                                    <div class="mb-5 md:mb-10">
                                        <h5 class="pt-6 mb-3 mb:mb-1 font-bold">Project</h5> 
                                        <h4 class="text-2xl md:text-5xl font-light -mt-4">
                                            <a class="text-default hover:text-default visited:text-default" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h4>
                                        <?php if (get_the_content()) { ?>
                                        <div class="text-gray-700 mt-3 md:mt-5"><?php echo wp_trim_words(get_the_content(), 20, "..."); ?></div>
                                        <?php } ?>
                                    </div>
                                    <div class="mt-autox">
                                        
                                        <div class="mb-5">
                                            <h5 class="font-bold">Skills & Tools</h5> 
                                            <span class="post_into">
                                                <?php
                                                $thelist = "";
                                                $i = 0;
                                                foreach (
                                                    get_the_category()
                                                    as $category
                                                ) {
                                                    if (0 < $i) {
                                                        $thelist .= " ";
                                                    }
                                                    $thelist .=
                                                        '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="inline-flex items-center rounded-md bg-default-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-gray-700/30 uppercase hover:text-default visited:text-default">' .
                                                        $category->name .
                                                        "</a>";
                                                    $i++;
                                                }
                                                echo $thelist;
                                                ?>
                                            </span>
                                        </div>
                                        <?php
                                        $post_tags = get_the_tags();
                                        if (!empty($post_tags)) { ?>
                                            <h5 class="font-bold">Tags</h5> 
                                            <?php foreach (
                                                $post_tags
                                                as $post_tag
                                            ) {
                                                echo '<a class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10 uppercase hover:text-default visited:text-default me-1" href="' . get_tag_link($post_tag) . '">' . $post_tag->name . "</a>";
                                            }}
                                        ?>
                                    </div>

                                    
                                    <?php 
                                    
                                        $orig_post = $post;
                                        global $post;
                                        $tags = wp_get_post_tags($post->ID); 

                                        if ($tags) {
                                            $tag_ids = [];
                                            foreach ($tags as $individual_tag) {
                                                $tag_ids[] = $individual_tag->term_id;
                                            }
                                            $args = [
                                                "tag__in" => $tag_ids,
                                                "post__not_in" => [$post->ID],
                                                "posts_per_page" => 3,
                                                "orderby" => "rand",
                                            ]; 
                                            $my_query = new wp_query($args);
                                    ?>
                                    
                                    
                                        <h5 class="pt-6 mb-1 font-bold">Related Article</h5> 
                                        <div class="text-sm font-medium text-gray-900 bg-white/30 border border-gray-200 rounded-lg">
                                        
                                            <?php while ($my_query->have_posts()) { $my_query->the_post(); ?>
        
                                            <div class="block w-full p-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white flex gridx grid-cols-5x gap-3 items-center text-sm">
                                                <a href="<? the_permalink()?>" class="hiddenZ"><?php the_post_thumbnail( [50, 50]); ?></a>
                                                <div class="col-span-3">
                                                    <a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a>
                                                </div>
                                            </div>
                                        
                                            <?php } ?>
                                        </div>
                                        <?php } $post = $orig_post; ?> 
                                    
                                </div>

                            </div>
                            <div class="col-span-2x h-96 md:h-full md:p-6 bg-white rounded-3xl">
                                <div class="relative h-96 md:h-full rounded-xl overflow-hidden items-end flex">
                                <?php // If we have a featured image, it will be used as background image using the same logic you already used, but we put the src value in a specific variable: $imageUrl
                                if (has_post_thumbnail($post->ID)):
                                    $postthumbnails = wp_get_attachment_image_src(
                                        get_post_thumbnail_id($post->ID), "single-post-thumbnail"
                                    );
                                    $postthumbnails = $postthumbnails[0];
                                    // if not, we define $imageUrl with our default image src value
                                else:
                                    $postthumbnails = get_template_directory_uri() . "/images/default-image-large.jpg";
                                endif; ?>
                                    <div class="w-full h-full absolute left-0 top-0 bg-no-repeat bg-center bg-cover"  style="background-image:url('<?php echo $postthumbnails; ?>');"  data-swiper-parallax="30%" data-scroll data-scroll-offset="100%, 0%"></div>

                                    
                                </div>
                            </div>
                            <?php endwhile; wp_reset_postdata();?>
                        </div>
                    </div>
            </div>
            
            
        </div>
        
        <div class="p-6 md:p-10 md:pb-20 lg:px-14 relative overflow-hidden" data-scroll-section>
            <div class="py-5 md:pt-10">
                <div class="grid md:grid-cols-2 gap-10">
                    <div>
                        <h5 class="text-sm">01</h5>
                        <h2 class="text-4xl tracking-tight sm:text-4xl font-bold">About Me</h2>
                        <div class="mb-5 text-xl md:text-3xl md:leading-9 font-light mt-10 md:mt-20 text-center md:mx-10">
                            <h5 class="mb-3">
                                <span class="text-default">Design</span> is not just what it looks like and <span class="font-bold">feels</span> like. <span class="text-default">Design</span> is how it works.</h5>
                            <p class="text-sm md:text-xl">- Steve Jobs</p>
                        </div>
                    </div>
                                            
                    <div class="font-mediumx">
                        <?php $the_query = new WP_Query("page_id=562"); ?>
                        <?php while ($the_query->have_posts()):
                            $the_query->the_post(); ?>
                            <?php if (get_the_content()) { ?>
                                <div class="text-xl md:text-4xl mb-10"><?php echo wp_trim_words( get_the_content(), 30, "..." ); ?></div>
                            <?php } ?>
                            <a href="<?php the_permalink(); ?>" class="btn btn-lg">View More</a>
                        <?php
                        endwhile; ?>
                    </div>
    
                </div>
            </div>
        </div>

        <div class="p-6 md:p-10 lg:px-14 relative overflow-hidden bg-default text-white" data-scroll-section>
            <div class="py-5 md:py-10">
                <h5 class="text-sm">02</h5>
                <h2>Work Experiences</h2>
                <div class="md:flex align-items-center justify-between pb-7">
                    <div class="mb-5 md:mb-0">
                        <p class="text-xl md:text-2xl md:leading-8 md:mb-5">The Importance of a Strong Brand Positioning</p>
                    </div>
                    <div>
                        <a href="?post_type=work-experience" class="btn btn-lg">View More</a>
                    </div>
                </div>

                <ol class="items-start sm:flex px-2 justify-start	">
                    <?php $the_query = new WP_Query(
                        "post_type=work-experience"
                    ); ?>                        
                    <?php
                    while ($the_query->have_posts()):
                        $the_query->the_post(); ?>
                    <li class="relative mb-6 sm:mb-0">
                        <div class="flex items-center">
                            <div class="z-10 flex items-center justify-center w-8 h-8 bg-white/30 rounded-full ring-0 ring-white dark:bg-primary-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12.6727 1.61162 20.7999 9H17.8267L12 3.70302 6 9.15757V19.0001H11V21.0001H5C4.44772 21.0001 4 20.5524 4 20.0001V11.0001L1 11.0001 11.3273 1.61162C11.7087 1.26488 12.2913 1.26488 12.6727 1.61162ZM14 11H23V18H14V11ZM16 13V16H21V13H16ZM24 21H13V19H24V21Z"></path></svg>
                            </div>
                            <div class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700"></div>
                        </div>
                        <div class="mt-5 sm:pe-8">
                            <h4 class="mt-3 mb-2 text-xl font-bold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <time class="block mb-5 text-sm font-normal leading-none"><?php the_field(
                                "work_duration"
                            ); ?></time>
                            <?php if (get_the_content()) { ?>
                                <div class="mb-5"><?php echo wp_trim_words( get_the_content(), 20,"..."); ?></div>
                            <?php } ?>
                            <div class="flex items-center">
                                <svg class="w-3 h-3 me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 20.8995L16.9497 15.9497C19.6834 13.2161 19.6834 8.78392 16.9497 6.05025C14.2161 3.31658 9.78392 3.31658 7.05025 6.05025C4.31658 8.78392 4.31658 13.2161 7.05025 15.9497L12 20.8995ZM12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364L12 23.7279ZM12 13C13.1046 13 14 12.1046 14 11C14 9.89543 13.1046 9 12 9C10.8954 9 10 9.89543 10 11C10 12.1046 10.8954 13 12 13ZM12 15C9.79086 15 8 13.2091 8 11C8 8.79086 9.79086 7 12 7C14.2091 7 16 8.79086 16 11C16 13.2091 14.2091 15 12 15Z"></path></svg> <?php
                                $post_tags = get_the_category();
                                if (!empty($post_tags)) {
                                    foreach ($post_tags as $post_tag) {
                                        echo '<a class="text-xs px-1 py-0.9 inline-block uppercase me-0.5 rounded bg-primary hover:bg-secondary text-white visited:text-white transition duration-300 ease-in" href="' .get_tag_link($post_tag) .'">' . $post_tag->name . "</a>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </li>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </ol>


            </div>
        </div>
        
        <div class="bg-default pb-14">
            <div class="mx-5 md:mx-14 relative overflow-hidden bg-white/90 text-primary rounded-xl shadow-[0_35px_60px_-15px_rgba(0,0,0,0.1)]" data-scroll-section>
                <div class="py-3">
                    <div class="p-6 md:p-10 lg:px-12 ">
                        <h5 class="text-sm">03</h5>
                        <h2>Selected Works</h2>
                        <div class="md:flex align-items-center justify-between">
                            <div class="mb-5 md:mb-0">
                                <h5>When Ideas captured, every dreams crafted into beautiful reality.</h5>
                            </div>
                            <div>
                                <a href="?post_type=portfolio" class="btn btn-lg">View More</a>
                            </div>
                        </div>
                    </div>
                    <ul class="slick-one--half -mx-3 md:-mx-8 md:mb-22" data-swiper-parallax="30%" data-scroll data-scroll-speed="2">                
                        <?php $the_query = new WP_Query(
                            "post_type=portfolio"
                        ); ?>                        
                        <?php
                        while ($the_query->have_posts()):
                            $the_query->the_post(); ?>
                        <li class="px-3 md:px-8 mb-5 grayscaleX hover:grayscale-0X text-gray-800 hover:text-secondary ease-in duration-300">
                            <div class="grid md:grid-cols-3 relative overflow-hidden items-center bg-white rounded-lg">
                                <div class="p-4 md:p-8 md:flex md:flex-col h-full">
                                    
                                    <h4 class="text-2xl font-bold leading-7"><a class="visited:text-default" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <div class="mt-auto">
                                        <?php if (get_the_content()) { ?>
                                        <p class="text-gray-800 mb-1"><?php echo wp_trim_words( get_the_content(), 15, "..." ); ?></p>
                                        <?php } ?>
                                        
                                        <div class="">
                                            <?php
                                            $post_tags = get_the_tags();
                                            if (!empty($post_tags)) {
                                                foreach (
                                                    $post_tags
                                                    as $post_tag
                                                ) {
                                                    echo '<a class="text-xs px-1 py-0.5 uppercase me-0.5 rounded bg-primary hover:bg-secondary visited:text-default text-white transition duration-300 ease-in" href="' .
                                                        get_tag_link(
                                                            $post_tag
                                                        ) .
                                                        '">' .
                                                        $post_tag->name .
                                                        "</a>";
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-2">
                                    <div class="w-full aspect-[4/3] overflow-hidden duration-300">
                                        <figure>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                <?php if (
                                                    has_post_thumbnail()
                                                ) {
                                                    the_post_thumbnail("full", [
                                                        "class" => "w-full",
                                                    ]);
                                                } else {
                                                     ?>
                                                    <img src="<?php bloginfo("template_directory"); ?>/images/default-image.jpg" alt="<?php the_title(); ?>" />
                                                <?php
                                                } ?>
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </ul>
                    
                </div>
            </div>
        </div>
        <div class="p-6 md:p-10 lg:px-14 bg-default" data-scroll-section>
            <div class="pb-5 md:pb-10">
                <h5 class="text-sm">04</h5>
                <h2>Recommendations</h2>
                <div class="md:flex align-items-center justify-between mb-7 text-white">
                    <div class="mb-5 md:mb-0">
                        <h5>What colleagues says about me?</h5>
                    </div>
                    <div>
                        <a href="?post_type=testimonial" class="btn btn-lg">View More</a>
                    </div>
                </div>    
                <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-5">
                        <?php $the_query = new WP_Query(
                            "post_type=testimonial"
                        ); ?>                        
                        <?php
                        while ($the_query->have_posts()):
                            $the_query->the_post(); ?>

                        <figure class="rounded-lg bg-white/90 p-6 lg:px-8">
                            <blockquote class="leading-7 text-gray-900">
                                <div class="text-balance mb-5">
                                    <?php echo get_the_content(); ?>
                                </div><!-- .entry-content -->
                            </blockquote>
                            <figcaption class="mt-5 flex items-center space-x-2">
                                <div class="w-14 h-14 rounded-full overflow-hidden image ease-in duration-300">
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
                                <div>
                                    <div class="text-gray-900 mb-1"><?php the_title();?> </div>
                                    <div class="flex flex-wrap gap-1">
                                    <?php
                                        $thelist = "";
                                        $i = 0;
                                        foreach (
                                            get_the_category()
                                            as $category
                                        ) {
                                            if (0 < $i) {
                                                $thelist .= " ";
                                            }
                                            $thelist .=
                                                '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="inline-flex items-center rounded-md bg-default-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-gray-700/30 uppercase hover:text-default visited:text-default">' . $category->name . "</a>";
                                            $i++;
                                        }
                                        echo $thelist;
                                        ?>

                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M18.3362 18.339H15.6707V14.1622C15.6707 13.1662 15.6505 11.8845 14.2817 11.8845C12.892 11.8845 12.6797 12.9683 12.6797 14.0887V18.339H10.0142V9.75H12.5747V10.9207H12.6092C12.967 10.2457 13.837 9.53325 15.1367 9.53325C17.8375 9.53325 18.337 11.3108 18.337 13.6245V18.339H18.3362ZM7.00373 8.57475C6.14573 8.57475 5.45648 7.88025 5.45648 7.026C5.45648 6.1725 6.14648 5.47875 7.00373 5.47875C7.85873 5.47875 8.55173 6.1725 8.55173 7.026C8.55173 7.88025 7.85798 8.57475 7.00373 8.57475ZM8.34023 18.339H5.66723V9.75H8.34023V18.339ZM19.6697 3H4.32923C3.59498 3 3.00098 3.5805 3.00098 4.29675V19.7033C3.00098 20.4202 3.59498 21 4.32923 21H19.6675C20.401 21 21.001 20.4202 21.001 19.7033V4.29675C21.001 3.5805 20.401 3 19.6675 3H19.6697Z"></path></svg>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                            
                        <?php
                        endwhile;
                        
                        wp_reset_postdata();
                         ?>
                
                </div>
            </div>
        </div>
        <div class="p-6 md:p-10 lg:px-14 bg-gradient-to-b from-default" data-scroll-section>
            <div class="py-5 md:py-10">
                <h5>05</h5>
                <h2>Research</h2>
                <div class="md:flex align-items-center justify-between mb-7 text-white">
                    <div class="mb-5 md:mb-0">
                        <h5 class="text-2xl leading-8 mb-5">The Importance of a Strong Brand Positioning</h5>
                        <p>Creating a Consistent Brand Identity Across All Touchpoints</p>
                    </div>
                    <div>
                        <a href="<?php the_permalink(); ?>blogs" class="btn btn-lg">View More</a>
                    </div>
                </div>    
                <div class="grid md:grid-cols-4 gap-5">
                    <?php $the_query = new WP_Query([
                            "posts_per_page" => 4,
                            "orderby" => "rand",
                        ]); ?>
                        <?php  while ($the_query->have_posts()):
                                $the_query->the_post();  ?>

                            <article <?php post_class("bg-white mb-0 p-4 rounded-xl hover:shadow-md transition duration-300 ease-in-out"); ?> data-scroll-section>

                            <div class="sm:gap-5 md:gap-10 items-center">
                                <div class="pb-5 sm:pb-0 mb-5 h-40 overflow-hidden">
                                    <div class="rounded-md overflow-hidden image ease-in duration-300">
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
                                </div>

                                <div class="hiddenx">
                                    <header class="entry-header">
                                        <?php
                                        if ( is_singular() ) :
                                            the_title( '<h2 class="text-2xl md:text-xl font-black leading-6 tracking-tight mb-2">', '</h2>' );
                                        else :
                                            the_title( '<h2 class="text-2xl md:text-xl font-black leading-6 tracking-tight mb-2"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                        endif;

                                        ?>
                                    </header><!-- .entry-header -->
                                    
                                    <p class="entry-contentx text-balance mb-5">
                                        <?php echo wp_trim_words( get_the_content(), 20, '...' ); ?>
                                    </p><!-- .entry-content -->
                                    <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-sm font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20 hidden"><?php echo totalView($id) ?></span>


                                </div>
                            </div>
                            </article>
                            
                        <?php endwhile; ?>
                
                </div>
            </div>
        </div>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

