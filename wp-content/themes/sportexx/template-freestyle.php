<?php
/**
 * The template for a page within a page. This template does not have any header or footer
 *
 * Template name: Free Style
 *
 * @package sportexx
 */
while ( have_posts() ) : the_post(); 

	the_content();

endwhile; // end of the loop.