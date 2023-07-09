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

	<footer id="colophon" class="site-footer text-center small text-gray">
		<ul class="list-inline">
			<li class="list-inline-item fs-4"><a href="https://www.facebook.com/ayushstha"><i class="ri-facebook-fill"></i></a></li>
			<li class="list-inline-item fs-4"><a href="https://www.instagram.com/photographernepal/"><i class="ri-instagram-line"></i></a></li>
			<li class="list-inline-item fs-4"><a href="https://twitter.com/AyushShrestha"><i class="ri-twitter-fill"></i></a></li>
			<li class="list-inline-item fs-4"><a href="https://www.linkedin.com/in/shresthaayush/"><i class="ri-linkedin-box-fill"></i></a></li>
			<li class="list-inline-item fs-4"><a href="https://www.pinterest.com/ayushshrestha"><i class="ri-pinterest-fill"></i></a></li>
			<li class="list-inline-item fs-4"><a href=""><i class="ri-skype-fill"></i></a></li>
			<li class="list-inline-item fs-4"><a href="https://www.behance.net/ayushman"><i class="ri-behance-fill"></i></a></li>
			<li class="list-inline-item fs-4"><a href="https://www.youtube.com/channel/UCj4e0y-igrS9i-OrxUZB0BQ"><i class="ri-youtube-fill"></i></a></li>
			<li class="list-inline-item fs-4"><a href="https://stackoverflow.com/users/1466234/ayush-shrestha"><i class="ri-stack-overflow-fill"></i></a></li>
			<li class="list-inline-item fs-4"><a href="https://github.com/ayushshrestha"><i class="ri-github-fill"></i></a></li>
		</ul>
		<div class="site-info d-none">
			<a class=" text-gray" href="<?php echo esc_url( __( 'https://wordpress.org/', 'ayushshrestha' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'ayushshrestha' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'ayushshrestha' ), 'ayushshrestha', '<a href="http://underscores.me/" class=" text-gray" >Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<link rel="stylesheet" type="text/css" href="https://kenwheeler.github.io/slick/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://kenwheeler.github.io/slick/slick/slick-theme.css"/>
<script type="text/javascript" src="https://kenwheeler.github.io/slick/slick/slick.js"></script>

<script>
	$(document).ready(function(){
		//$('#exampleModal').modal('show');
	});
</script>

</body>
</html>
