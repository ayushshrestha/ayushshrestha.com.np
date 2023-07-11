<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package shresthabros
 */

get_header();
?>
<div class="text-center relative">
		<div class="w-full py-40 bg-black/60">
			<h3 class="font-bold text-3xl text-white"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'shresthabros' ); ?></h3>
		</div>
	</div>
	<main id="primary" class="site-main py-10 max-w-screen-xl mx-auto px-4 space-y-10">
		<div class="flex flex-col items-center space-y-5">
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'shresthabros' ); ?></p>

			<?php get_search_form(); ?>

			<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
			<lottie-player src="https://assets9.lottiefiles.com/packages/lf20_kcsr6fcp.json"  background="transparent"  speed="1"  style="width: 600px; height: 600px;"  loop  autoplay></lottie-player>
		</div><!-- .error-404 -->
	</main><!-- #main -->

<?php
get_footer();
