<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nepaheadlines
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/icons/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Open+Sans&display=swap" rel="stylesheet">

</head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-32501180-5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-32501180-5');
</script>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'nepaheadlines' ); ?></a>

	<header id="masthead" class="py-3 pb-sm-0 position-relative site-header">
		<div class="container clearfix">
			<div class="row justify-content-betweenX align-items-center">
				<div class="col-sm-4 font-sm block-time text-center text-sm-left"> <?php echo date('l, F j, Y',strtotime(date('Y-m-d'))); ?></div>
				<div class="col-sm-4 text-center site-branding mt-1 mb-4 my-sm-0">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title d-none"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title d-none mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$nepaheadlines_description = get_bloginfo( 'description', 'display' );
					if ( $nepaheadlines_description || is_customize_preview() ) :
						?>
						<p class="site-description d-none"><?php echo $nepaheadlines_description; ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->
				<div class="col-sm-4 text-right text-sm-right block-search">
						<span class="trigger block-search_icon"></span>
				</div>
				<div class="block-search_form d-flex align-items-center justify-content-center">
					<span class="close">close</span>
					<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div>
							<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
							<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search here..." />
						</div>
					</form>
				</div>
			</div>
			<nav id="site-navigation" class="main-navigation pt-2 text-center">
				<div class="hamburger hamburger--slider js-hamburger">
					<div class="hamburger-box">
						<button class="menu-toggle hamburger-inner" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'nepaheadlines' ); ?></button>
					</div>
				</div>	
				<div class="d-sm-nonex">
					<div class="mobile-menu-close">
						<div class="hamburger hamburger--slider js-hamburger">
							<div class="hamburger-box">
								<button class="menu-toggle hamburger-inner" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'nepaheadlines' ); ?></button>
							</div>
						</div>	
					</div>
					<?php wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'mobile-menu',
					)); ?>
				</div>
				<div class="d-none d-sm-block">		
					<?php wp_nav_menu( array(
						'theme_location' => 'menu-2',
						'menu_id'        => 'desktop-menu',
					)); ?>
				</div>	
			</nav><!-- #site-navigation -->
		</div>

		
	</header><!-- #masthead -->
