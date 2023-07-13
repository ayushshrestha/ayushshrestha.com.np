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
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css2?family=Lora&family=Roboto:wght@100;300;400;900&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(' bg-gray-50'); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site text-gray-700">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'shresthabros' ); ?></a>

		<header class="sticky top-0 z-30">
			<nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
				<div class="flex">
					<div class="w-12">
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
								'depth'         => 1,
								'fallback_cb'   => false,
								'add_li_class'  => 'hover:gray-300 rounded-md px-3 py-2 text-sm tracking-widest uppercase'
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
									'depth'         => 1,
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
