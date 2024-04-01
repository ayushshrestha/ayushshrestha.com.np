<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nepaheadlines
 */

// if ( ! is_active_sidebar( 'footer-top' ) || ! is_active_sidebar( 'footer-bottom' ) ) {
// 	return;
// }
?>

<aside id="secondary" class="widget-area bg-dark py-5 footer-bottom">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'footer-top' ); ?>
			<?php dynamic_sidebar( 'footer-bottom' ); ?>
		</div>
	</div>
</aside><!-- #secondary -->
