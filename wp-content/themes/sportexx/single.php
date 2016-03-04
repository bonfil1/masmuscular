<?php 
	
get_header();

	$page_layout_args = sportexx_get_page_layout_args();

	ob_start();

	while ( have_posts() ) : the_post();
	
	do_action( 'sportexx_single_post_before' );

	get_template_part( 'templates/contents/content', 'single' );

	/**
	 * @hooked sportexx_post_nav - 10
	 * @hooked sportexx_display_comments - 10
	 */
	do_action( 'sportexx_single_post_after' );

	endwhile; // end of the loop. 

	$output = ob_get_clean();

	$layout_args = array( 'main_content' => $output );

	sportexx_get_template( 'layouts/' . $page_layout_args['layout'] . '.php', $layout_args );

get_footer();