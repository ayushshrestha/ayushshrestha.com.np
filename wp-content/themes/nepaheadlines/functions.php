<?php
/**
 * nepaheadlines functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nepaheadlines
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'nepaheadlines_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function nepaheadlines_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on nepaheadlines, use a find and replace
		 * to change 'nepaheadlines' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'nepaheadlines', get_template_directory() . '/languages' );

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
		
		// add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
		// function wpdocs_theme_setup() {
		// 	add_image_size( 'category-thumb', 300 ); // 300 pixels wide (and unlimited height)
		// 	add_image_size( 'homepage-thumb', 220, 180, true ); // (cropped)
		// }

		// add_filter( 'image_size_names_choose', 'my_custom_sizes' );
 
		// function my_custom_sizes( $sizes ) {
		// 	return array_merge( $sizes, array(
		// 		'your-custom-size' => __( '400' ),
		// 	) );
		// }

		/**
		 * Social media share buttons
		 */
		function nepaheadlines_share_buttons() {
			$url = urlencode(get_the_permalink());
			$title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
			$media = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));

			include( locate_template('template-share.php', false, false) );
		}

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Mobile', 'nepaheadlines' ),
				'menu-2' => esc_html__( 'Desktop', 'nepaheadlines' ),
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
				'nepaheadlines_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'nepaheadlines_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

function prefix_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'prefix_category_title' );



function nepaheadlines_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'nepaheadlines_content_width', 640 );
}
add_action( 'after_setup_theme', 'nepaheadlines_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nepaheadlines_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Top', 'nepaheadlines' ),
			'id'            => 'footer-top',
			'description'   => esc_html__( 'Add widgets here.', 'nepaheadlines' ),
			'before_widget' => '<section id="%1$s" class="text-center col-12 widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Bottom', 'nepaheadlines' ),
			'id'            => 'footer-bottom',
			'description'   => esc_html__( 'Add widgets here.', 'nepaheadlines' ),
			'before_widget' => '<section id="%1$s" class="col-md-6 col-lg-4 widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'nepaheadlines_widgets_init' );

function limit_word_count($title) {
    $len = 20; //change this to the number of words
    if (str_word_count($title) > $len) {
        $keys = array_keys(str_word_count($title, 2));
        $title = substr($title, 0, $keys[$len]);
    }
    return $title;
}
add_filter('the_title', 'limit_word_count');

/**
 * Enqueue scripts and styles.
 */
function nepaheadlines_scripts() {
	wp_enqueue_style( 'nepaheadlines-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'nepaheadlines-style', 'rtl', 'replace' );

	wp_enqueue_style( 'nepaheadlines-main', get_template_directory_uri() . '/assets/css/main.min.css', array(), _S_VERSION);
	

	wp_enqueue_script( 'nepaheadlines-jqueryslim', get_template_directory_uri() . '/assets/js/jquery-3.2.1.slim.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'nepaheadlines-popper', get_template_directory_uri() . '/assets/js/vendor/bootstrap/popper.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'nepaheadlines-bootstrap', get_template_directory_uri() . '/assets/js/vendor/bootstrap/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'nepaheadlines-slick', get_template_directory_uri() . '/assets/js/vendor/slick/slick.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'nepaheadlines-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'nepaheadlines-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'nepaheadlines-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nepaheadlines_scripts' );

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

