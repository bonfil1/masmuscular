<?php
/**
 * @package Sportexx
 */

$additional_post_classes = apply_filters( 'additional_post_classes', array() );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $additional_post_classes ); ?> itemscope="" itemtype="http://schema.org/BlogPosting">

	<?php
	/**
 	 * @hooked sportexx_post_header() - 10
 	 * @hooked sportexx_post_meta() - 20
 	 * @hooked sportexx_post_loop_description() - 30
	 */
	do_action( 'sportexx_loop_post' );
	?>

</article><!-- #post-## -->