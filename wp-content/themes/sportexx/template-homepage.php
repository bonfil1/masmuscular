<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package sportexx
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/**
			 * @hooked sportexx_homepage_slider - 10
			 * @hooked sportexx_homepage_tabs - 20
			 * @hooked sportexx_brands_carousel - 30
			 * @hooked sportexx_blog_posts_carousel - 40
			 */
			do_action( 'homepage' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>