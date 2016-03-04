<?php
/**
 * The loop template file.
 *
 * Included on pages like index.php, archive.php and search.php to display a loop of posts
 * Learn more: http://codex.wordpress.org/The_Loop
 *
 * @package Sportexx
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

do_action( 'sportexx_loop_before' ); ?>

<div class="posts">

<?php

while ( have_posts() ) : the_post();

	get_template_part( 'templates/contents/content', get_post_format() );

endwhile;

?>

</div><!-- /.posts -->

<?php

/**
 * @hooked sportexx_paging_nav - 10
 */
do_action( 'sportexx_loop_after' );