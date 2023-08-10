<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shresthabros
 */

?>
<!doctype html>
<html class="is-smooth-scroll-compatible is-loading" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700;900&display=swap" rel="stylesheet">
	
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/images/icon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/images/icon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/icon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/images/icon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/icon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/images/icon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/icon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/images/icon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/icon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/images/icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/images/icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/images/icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/images/icon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/images/icon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/images/icon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">


	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135007453-1"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-135007453-1');
</script>
<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution="setup_tool"
        page_id="150144508394050"
  theme_color="#000000"
  logged_in_greeting="Hi! How can we help? "
  logged_out_greeting="Hi! How can we help? ">
      </div>
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(' bg-gray-50 font-body o-scroll'); ?> style="background-color: white !important;"  id="js-scroll" data-scroll-container>
	<?php wp_body_open(); ?>
	<div id="page" class="site text-gray-700 ">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'shresthabros' ); ?></a>

		<header class="sticky top-0 z-30 p-3 lg:p-0">
			<nav class="mx-auto flex max-w-7xl items-center justify-between md:py-6" aria-label="Global">
				<div class="flex">
					<div class="w-7">
						<?php
						the_custom_logo();
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title sr-only"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<p class="site-title sr-only"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						$shresthabros_description = get_bloginfo( 'description', 'display' );
						if ( $shresthabros_description || is_customize_preview() ) :
							?>
							<p class="site-description sr-only"><?php echo $shresthabros_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
						<?php endif; ?>
					</div><!-- .site-branding -->
				</div>
				<div class="flex">
					<div class="flex lg:hidden">
						<button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
							<span class="sr-only">Open main menu</span>
							<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
							</svg>
						</button>
					</div>
					<div class="hidden lg:flex lg:gap-x-12">
						<?php

							$wpNavMenu = array(
								'container'     => '',
								'theme_location'=> 'primary-menu',
								'items_wrap'        => '<ul class="flex">%3$s</ul>',
								'fallback_cb'   => false,
								'add_li_class'  => 'hover:bg-primary/5 transition duration-300 px-3 py-2 text-sm tracking-widest uppercase relative'
								);
							wp_nav_menu($wpNavMenu);
						?>

						
					</div>
				</div>
			</nav>
			<!-- Mobile menu, show/hide based on menu open state. -->
			<div class="hidden" role="dialog" aria-modal="true">
				<!-- Background backdrop, show/hide based on slide-over state. -->
				<div class="fixed inset-0 z-10"></div>
				<div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
					<div class="flex items-center justify-between">
						<div class="site-branding">
							<?php
							the_custom_logo();
							if ( is_front_page() && is_home() ) :
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							else :
								?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
							endif;
							$shresthabros_description = get_bloginfo( 'description', 'display' );
							if ( $shresthabros_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $shresthabros_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
							<?php endif; ?>
						</div><!-- .site-branding -->
						<button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
						<span class="sr-only">Close menu</span>
						<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
						</svg>
						</button>
					</div>
					<div class="mt-6 flow-root">
						<div class="-my-6 divide-y divide-gray-500/10">
							<div class="space-y-2 py-3">
							<?php
								$wpNavMenu = array(
									'container'     => '',
									'theme_location'=> 'menu-1',
									'items_wrap'        => '<ul>%3$s</ul>',
									'fallback_cb'   => false,
									'add_li_class'  => 'hover:gray-700 rounded-md px-3 py-2 text-sm font-medium'
									);
								wp_nav_menu($wpNavMenu);
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header><!-- #masthead -->
