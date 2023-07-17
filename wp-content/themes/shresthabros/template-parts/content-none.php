<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shresthabros
 */

?>

<section class="no-results not-found text-center">
	<header class="page-header pb-5">
		<h1 class="font-bold text-3xl"><?php esc_html_e( 'Nothing Found', 'shresthabros' ); ?></h1>
	</header><!-- .page-header -->

	<div class="flex flex-col items-center space-y-5">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'shresthabros' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'shresthabros' ); ?></p>
			<?php get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'shresthabros' ); ?></p>
			<?php get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
