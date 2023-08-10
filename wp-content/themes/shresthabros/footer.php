<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shresthabros
 */

?>

	<footer id="colophon" class="bg-white" data-scroll-section>
		<div class="max-w-screen-xl mx-auto">
			<div class="p-6 md:p-10 lg:px-12 py-5 md:py-20 md:flex space-y-5 md:space-y-0 md:space-x-10 lg:space-x-20">
				<div>
					<h3 class="text-2xl font-Sansita font-black pb-4">Social</h3>
					<?php 
						$wpFooterOneNavMenu = array(
						'container'     => '',
						'theme_location'=> 'footer-menu-1',
						'items_wrap'        => '<ul>%3$s</ul>',
						'depth'         => 1,
						'fallback_cb'   => false,
						'add_li_class'  => 'hover:text-gray-300 pb-2 text-sm transition duration-300' );
						wp_nav_menu($wpFooterOneNavMenu); ?>
				</div>
				<div>
					<h3 class="text-2xl font-Sansita font-black pb-4">About</h3>
					<?php
					$wpFooterTwoNavMenu = array(
						'container'     => '',
						'theme_location'=> 'footer-menu-2',
						'items_wrap'        => '<ul>%3$s</ul>',
						'depth'         => 1,
						'fallback_cb'   => false,
						'add_li_class'  => 'hover:text-gray-300 pb-2 text-sm transition duration-300'
						);
					wp_nav_menu($wpFooterTwoNavMenu); ?>
				</div>
				<div>
					<h3 class="text-2xl font-Sansita font-black pb-4">Contact Information</h3>
					<div class="sm:grid sm:grid-cols-3 space-y-10 sm:space-y-0 sm:space-x-10 lg:space-x-20">
						<div>
							<div class="text-sm tracking-[0.2em]">ADDRESS</div>
							<p class="text-sm pb-5">
							Kathmandu, Nepal</p>
							<div class="text-sm tracking-[0.2em]">EMAIL</div>
							<a href="mailto:ayushfrontend@gmail.com" class="hover:text-gray-300 pb-2 text-sm transition duration-300" title="Email">ayushfrontend@gmail.com</a>

						</div>
						<div>
							<div class="text-sm tracking-[0.2em]">PHONE</div>
							<p class="text-sm pb-5">+977-(985) - 112 - 2887</p>
						</div>
						<div class="w-8"><?php the_custom_logo(); ?></div>
					</div>	
				</div>
			</div>
		</div>
		<div class="site-info text-sm text-gray-500 border-t py-8 text-center flex items-center justify-center space-x-2">
			<a class="hidden" href="<?php echo esc_url( __( 'https://wordpress.org/', 'shresthabros' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( '© 2023 NDPL, All right reserved %s', 'shresthabros' ), 'WordPress' );
				?>
			</a>
			© <?=date("Y")?> <?php bloginfo( 'name' ); ?>, All right reserved 
			<?php
			$wpFooterThreeNavMenu = array(
				'container'     => '',
				'theme_location'=> 'footer-menu-3',
				'items_wrap'        => '<ul class=" flex items-center space-x-2">%3$s</ul>',
				'depth'         => 1,
				'fallback_cb'   => false,
				'add_li_class'  => 'transition text-primary hover:text-gray-300 text-sm'
				);
			wp_nav_menu($wpFooterThreeNavMenu); ?>
			<div class="hidden">
				<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'shresthabros' ), 'shresthabros', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<script nomodule src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/7.6.0/polyfill.min.js" crossorigin="anonymous"></script>
<script nomodule src="https://polyfill.io/v3/polyfill.min.js?features=Object.assign%2CElement.prototype.append%2CNodeList.prototype.forEach%2CCustomEvent%2Csmoothscroll" crossorigin="anonymous"></script>
<?php wp_footer(); ?>

<script>
	$(document).ready(function() {
		$("body,html").animate({
scrollTop: 1
}, 0);
		AOS.init();
		document.addEventListener('aos:in', ({ detail }) => {
			console.dir(detail);
		});
	});
</script>


</body>
</html>

