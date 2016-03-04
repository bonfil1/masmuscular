<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Sportexx
 */
if ( ! is_active_sidebar( 'blog-sidebar-1' ) ) {
	return;
}

?>

<div class="sidebar-blog">

	<?php dynamic_sidebar( 'blog-sidebar-1' ); ?>

</div><!-- /.sidebar-blog -->