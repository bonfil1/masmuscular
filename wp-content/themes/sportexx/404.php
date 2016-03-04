<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Sportexx
 * @since 1.0.0
 */

get_header(); ?>

<main class="site-content dark-bg"> 
	<section class="message-404 text-center"> 
		<header> 
			<h2 class="title"><?php _e( '404', 'sportexx' ); ?></h2> 
			<p class="subtitle"><?php _e( 'Oops! That page can&rsquo;t be found.', 'sportexx' ); ?></p> 
			<p class="subtitle"><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'sportexx' ); ?></p>

			<?php get_search_form(); ?>
		</header> 
	</section> 
</main>

<?php get_footer(); ?>