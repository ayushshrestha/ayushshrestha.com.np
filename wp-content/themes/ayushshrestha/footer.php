<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ayushshrestha
 */

?>

	<footer id="colophon" class="site-footer p-6 md:p-10 lg:px-14 fixed h-[100vh] bottom-0 w-full overflow-hidden bg-white z-0">
		<h5 class="text-sm text-whiteX">05</h5>
		<h2 class="text-xl tracking-tight font-light text-whiteX mb-5">Contact</h2>
		<div class="grid md:grid-cols-6 align-items-center justify-between mb-7 block">
			<div class="mb-5 md:mb-0 col-span-2">
				<h5 class="text-4xl leading-8 mb-7 block">Let's discuss your <strong>vision</strong></h5>
				<div class="flex">
					<a href="" class="rounded-3xl text-sm font-semibold py-3 px-5 text-gray-900 visited:text-gray-900 hover:text-default border border-gray-900 hover:border-default transition duration-300 effect-cloudliquid flex gap-1 items-center">
					<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M10 3H14C18.4183 3 22 6.58172 22 11C22 15.4183 18.4183 19 14 19V22.5C9 20.5 2 17.5 2 11C2 6.58172 5.58172 3 10 3ZM12 17H14C17.3137 17 20 14.3137 20 11C20 7.68629 17.3137 5 14 5H10C6.68629 5 4 7.68629 4 11C4 14.61 6.46208 16.9656 12 19.4798V17Z"></path></svg>
					Let's talk</a>
				</div>
				<div class="pt-14">
					<?php 
						$wpSocialLinkMenuNav = array(
						'container'     	=> '',
						'theme_location'	=> 'social-links',
						'items_wrap'    	=> '<ul class="flex gap-2">%3$s</ul>',
						'depth'         	=> 1,
						'fallback_cb'   	=> false,
						'menu_li_class'  		=> 'text-gray-300' );
						wp_nav_menu($wpSocialLinkMenuNav); 
					?>
				</div>
			</div>
			<div class="md:col-end-7 md:col-span-2">
				<p class="mb-1 flex items-center gap-1">
					<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M7 4V20H17V4H7ZM6 2H18C18.5523 2 19 2.44772 19 3V21C19 21.5523 18.5523 22 18 22H6C5.44772 22 5 21.5523 5 21V3C5 2.44772 5.44772 2 6 2ZM12 17C12.5523 17 13 17.4477 13 18C13 18.5523 12.5523 19 12 19C11.4477 19 11 18.5523 11 18C11 17.4477 11.4477 17 12 17Z"></path></svg>
					+977 985 112 2887
				</p>
				<p class="mb-1 flex items-center gap-1">
					<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C13.6418 20 15.1681 19.5054 16.4381 18.6571L17.5476 20.3214C15.9602 21.3818 14.0523 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12V13.5C22 15.433 20.433 17 18.5 17C17.2958 17 16.2336 16.3918 15.6038 15.4659C14.6942 16.4115 13.4158 17 12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7C13.1258 7 14.1647 7.37209 15.0005 8H17V13.5C17 14.3284 17.6716 15 18.5 15C19.3284 15 20 14.3284 20 13.5V12ZM12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9Z"></path></svg>
					email@ayushshrestha.com.np
				</p>
				<p class="mb-1 flex items-center gap-1">
					<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 20.8995L16.9497 15.9497C19.6834 13.2161 19.6834 8.78392 16.9497 6.05025C14.2161 3.31658 9.78392 3.31658 7.05025 6.05025C4.31658 8.78392 4.31658 13.2161 7.05025 15.9497L12 20.8995ZM12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364L12 23.7279ZM12 13C13.1046 13 14 12.1046 14 11C14 9.89543 13.1046 9 12 9C10.8954 9 10 9.89543 10 11C10 12.1046 10.8954 13 12 13ZM12 15C9.79086 15 8 13.2091 8 11C8 8.79086 9.79086 7 12 7C14.2091 7 16 8.79086 16 11C16 13.2091 14.2091 15 12 15Z"></path></svg>
					Kathmandu ( Nepal )
				</p>
			</div>
		</div>  

		<div class="site-info mt-10 pt-10 block border-t-[1px] border-solid border-white md:flex md:items-center justify-between text-primary/60">
			<?php 
				$wpFooterOneNavMenu = array(
				'container'     => '',
				'theme_location'=> 'footer-menu-2',
				'items_wrap'        => '<ul>%3$s</ul>',
				'depth'         => 1,
				'fallback_cb'   => false,
				'add_li_class'  => 'hover:text-gray-300 pb-2 text-sm transition duration-300' );
				wp_nav_menu($wpFooterOneNavMenu); 
			?>
			<div>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ayushshrestha' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( '© %s', 'ayushshrestha' ), 'Ayush Shrestha' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'ayushshrestha' ), 'SB', '<a href="http://ayushshrestha.com.np/">Me</a>' );
				?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
