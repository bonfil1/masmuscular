<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package sportexx
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * @hooked sportexx_page_header - 10
	 * @hooked sportexx_page_content - 20
	 */
	do_action( 'sportexx_page' );
	?>
</article><!-- #post-## -->