<?php
/**
 * ayushshrestha functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ayushshrestha
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ayushshrestha_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ayushshrestha, use a find and replace
		* to change 'ayushshrestha' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'ayushshrestha', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

	function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
	}

	// function add_lazyload($content){
	// 	$content = preg_replace('#<img([^>]+?)src=#', '<img$1srset=', $content);
	// 	return str_replace('<img', '<img loading="lazy"', $content);
	// }

	// add_filter('post_thumbnail', 'add_lazyload');

	// Add a filter to the_content() function

	function add_skeleton_classes($content) {
		// Add skeleton class to images
		$content = preg_replace('/<img(.*?)class=["\'](.*?)["\'](.*?)>/i', '<img$1class="$2 wp-skeleton"$3>', $content);
		
		// Add skeleton class to content containers
		$content = preg_replace('/<div(.*?)class=["\'](.*?)["\'](.*?)>(.*?)<\/div>/i', '<div$1class="$2 wp-skeleton"$3>$4</div>', $content);
		
		// Add skeleton class to other content elements (e.g., paragraphs, headings)
		$content = preg_replace('/<(p|h[1-6]|span|div|article)(.*?)>(.*?)<\/(p|h[1-6]|span|div|article)>/i', '<$1$2 class="$3 wp-skeleton"></$1>', $content);
	
		return $content;
	}
	add_filter('post-thumbnails', 'add_skeleton_classes');
	


	function limit_word_count($title) {
		$len = 20; //change this to the number of words
		if (str_word_count($title) > $len) {
			$keys = array_keys(str_word_count($title, 2));
			$title = substr($title, 0, $keys[$len]);
		}
		return $title;
	}
	add_filter('the_title', 'limit_word_count');
	

	

	function ayushshrestha_share_buttons() {
		$url = urlencode(get_the_permalink());
		$title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
		$media = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));

		include( locate_template('template-share.php', false, false) );
	}

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary', 'ayushshrestha' ),
			'footer-menu-1' => esc_html__( 'Footer 1', 'ayushshrestha' ),
			'footer-menu-2' => esc_html__( 'Footer 2', 'ayushshrestha' ),
			'social-links' => esc_html__( 'Social Links', 'ayushshrestha' ),
		)
	);
	
	
	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ayushshrestha_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ayushshrestha_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ayushshrestha_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ayushshrestha_content_width', 640 );
}
add_action( 'after_setup_theme', 'ayushshrestha_content_width', 0 );


function snip_category_rel($result) {
    $result = str_replace('rel="category"', 'class="inline-flex items-center rounded-md bg-default-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-gray-700/30 uppercase hover:text-default visited:text-default"', $result);
    return $result;
}
add_filter('wp_list_categories', 'snip_category_rel');
add_filter('the_category', 'snip_category_rel');

function snip_tag_rel($result) {
    $result = str_replace('rel="tag"', 'class="inline-flex items-center rounded-md bg-default-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-gray-700/30 uppercase hover:text-default visited:text-default"', $result);
    return $result;
}
add_filter('get_the_tag_list', 'snip_tag_rel');
add_filter('the_tags', 'snip_tag_rel');




function snip_categorytag_rel($result2) {
    $result2 = str_replace('rel="category tag"', 'class="inline-flex items-center rounded-md bg-default-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-gray-700/30 uppercase hover:text-default visited:text-default"', $result2);
    return $result2;
}
add_filter('wp_list_categories', 'snip_categorytag_rel');
add_filter('the_category', 'snip_categorytag_rel');



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ayushshrestha_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ayushshrestha' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ayushshrestha' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ayushshrestha_widgets_init' );


function add_additional_class_on_li($classes, $item, $wpSocialLinkMenuNav) {
    if(isset($wpSocialLinkMenuNav->add_li_class)) {
        $classes[] = $wpSocialLinkMenuNav->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


function some_function( $classes, $args, $depth ){
    foreach ( $classes as $key => $class ) {
		if ( $class == 'sub-menu' ) {
			$classes[ $key ] = 'menu-sub md:absolute md:right-0 md:z-10 md:mt-2 md:w-56 md:origin-top-right divide-y divide-gray-100 md:rounded-md md:bg-white md:shadow-lg md:ring-1 md:ring-black md:ring-opacity-5 focus:outline-none';
		}
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'some_function', 10, 3 );




/**
 * Enqueue scripts and styles.
 */
function ayushshrestha_scripts() {
	wp_enqueue_style( 'ayushshrestha-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'ayushshrestha-style', 'rtl', 'replace' );

	wp_enqueue_style( 'ayushshrestha-slick', get_template_directory_uri() . '/assets/css/slick.css', array(), _S_VERSION);	
	wp_enqueue_style( 'ayushshrestha-slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), _S_VERSION);	
	wp_enqueue_style( 'ayushshrestha-theme', get_template_directory_uri() . '/assets/css/tailwind.css', array(), _S_VERSION);	
	

	wp_enqueue_script( 'ayushshrestha-jquery', '//code.jquery.com/jquery-1.11.0.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'ayushshrestha-migrate', '//code.jquery.com/jquery-migrate-1.2.1.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'ayushshrestha-aos', '//unpkg.com/aos@2.3.1/dist/aos.js', array(), _S_VERSION, true );
	//wp_enqueue_script( 'ayushshrestha-scroll', get_template_directory_uri() . '/assets/js/scroll-main.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'ayushshrestha-slick', get_template_directory_uri() . '/assets/js/slick.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'ayushshrestha-sharect', '//unpkg.com/sharect@2.0.0/dist/sharect.js', array(), _S_VERSION, true );
	
	wp_enqueue_script( 'ayushshrestha-main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'ayushshrestha-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ayushshrestha_scripts' );



// total views
function totalView($id){
    $count = 1;
    $check = get_post_meta($id, 'count',true);
    if(!$check){
        add_post_meta($id,'count',$count,true);
    }else{
        $inc = $check+1;
        $a = update_post_meta($id,'count',$inc);
    }
    return 'Total views:&nbsp;<b>'.get_post_meta($id, 'count',true).'</b> &nbsp; times';
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

