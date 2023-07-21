<?php
/**
 * shresthabros functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shresthabros
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
function shresthabros_setup() {

	function time_ago( $type = 'post' ) {
		$d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
		return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');
	}
	
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on shresthabros, use a find and replace
		* to change 'shresthabros' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'shresthabros', get_template_directory() . '/languages' );

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
	
	function limit_word_count($title) {
		$len = 20; //change this to the number of words
		if (str_word_count($title) > $len) {
			$keys = array_keys(str_word_count($title, 2));
			$title = substr($title, 0, $keys[$len]);
		}
		return $title;
	}
	add_filter('the_title', 'limit_word_count');
	

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary', 'shresthabros' ),
			'footer-menu-1' => esc_html__( 'Footer 1', 'shresthabros' ),
			'footer-menu-2' => esc_html__( 'Footer 2', 'shresthabros' ),
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
			'shresthabros_custom_background_args',
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
add_action( 'after_setup_theme', 'shresthabros_setup' );




/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shresthabros_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'shresthabros_content_width', 640 );
}
add_action( 'after_setup_theme', 'shresthabros_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shresthabros_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'shresthabros' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'shresthabros' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'shresthabros_widgets_init' );


function add_additional_class_on_li($classes, $item, $wpNavMenu) {
    if(isset($wpNavMenu->add_li_class)) {
        $classes[] = $wpNavMenu->add_li_class;
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
function shresthabros_scripts() {
	wp_enqueue_style( 'shresthabros-style', get_stylesheet_uri(), array(), _S_VERSION );
	//wp_style_add_data( 'shresthabros-style', 'rtl', 'replace' );

	wp_enqueue_style( 'shresthabros-slick', get_template_directory_uri() . '/dist/slick.css', array(), _S_VERSION);
	wp_enqueue_style( 'shresthabros-aos', '//unpkg.com/aos@2.3.1/dist/aos.css', array(), _S_VERSION);
	wp_enqueue_style( 'shresthabros-slicktheme', get_template_directory_uri() . '/dist/slick-theme.css', array(), _S_VERSION);
	wp_enqueue_style( 'shresthabros-tailwind-style', get_template_directory_uri() . '/dist/style.css', array(), _S_VERSION);
	wp_enqueue_style( 'shresthabros-theme', get_template_directory_uri() . '/dist/theme.css', array(), _S_VERSION);	

	
	wp_enqueue_script( 'shresthabros-jquery', '//code.jquery.com/jquery-1.11.0.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'shresthabros-migrate', '//code.jquery.com/jquery-migrate-1.2.1.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'shresthabros-aos', '//unpkg.com/aos@2.3.1/dist/aos.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'shresthabros-slick', get_template_directory_uri() . '/js/slick.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'shresthabros-sharect', '//unpkg.com/sharect@2.0.0/dist/sharect.js', array(), _S_VERSION, true );
	
	wp_enqueue_script( 'shresthabros-main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


}
add_action( 'wp_enqueue_scripts', 'shresthabros_scripts' );

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




function shresthabros_posts_nav(){
    $next_post = get_next_post();
    $prev_post = get_previous_post();
     
    if ( $next_post || $prev_post ) : ?>
     
        <div class="sm:flex sm:justify-between space-y-5 sm:space-y-0">
            <div>
                <?php if ( ! empty( $prev_post ) ) : ?>
                    <a href="<?php echo get_permalink( $prev_post ); ?>" class="block flex flex-col md:flex-row md:items-center gap-5 p-5 bg-gray-50 hover:bg-gray-100 transition duration-1000 rounded-lg">
                        <div class="order-last md:order-first">
                            <div class="shresthabros-posts-nav__thumbnail shresthabros-posts-nav__prev">
                                <?php echo get_the_post_thumbnail( $prev_post, [ 100, 100 ] ); ?>
                            </div>
                        </div>
                        <div class="md:order-last order-first">
                            <strong class="flex">
                                <svg viewBox="0 0 24 24" width="24" height="24"><path d="M13.775,18.707,8.482,13.414a2,2,0,0,1,0-2.828l5.293-5.293,1.414,1.414L9.9,12l5.293,5.293Z"/></svg>
                                <?php _e( 'Previous article', 'textdomain' ) ?>
                            </strong>
                            <h4><?php echo get_the_title( $prev_post ); ?></h4>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
            <div>
                <?php if ( ! empty( $next_post ) ) : ?>
                    <a href="<?php echo get_permalink( $next_post ); ?>"  class="block md:flex space-y-5 md:space-y-0 items-center gap-5 p-5 bg-gray-50 hover:bg-gray-100 transition duration-1000 rounded-lg">
                        <div>
                            <strong class="flex">
                                <?php _e( 'Next article', 'textdomain' ) ?>
                                <svg viewBox="0 0 24 24" width="24" height="24"><path d="M10.811,18.707,9.4,17.293,14.689,12,9.4,6.707l1.415-1.414L16.1,10.586a2,2,0,0,1,0,2.828Z"/></svg>
                            </strong>
                            <h4><?php echo get_the_title( $next_post ); ?></h4>
                        </div>
                        <div>
                            <div class="shresthabros-posts-nav__thumbnail shresthabros-posts-nav__next">
                                <?php echo get_the_post_thumbnail( $next_post, [ 100, 100 ] ); ?>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </div> <!-- .shresthabros-posts-nav -->
     
    <?php endif;
}
