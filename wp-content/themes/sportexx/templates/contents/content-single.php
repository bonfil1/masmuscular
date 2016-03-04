<?php
/**
 * @package Sportexx
 */

$additional_post_classes = apply_filters( 'additional_post_classes', array() );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $additional_post_classes ); ?> itemscope="" itemtype="http://schema.org/BlogPosting">

	<?php
	$post_format = get_post_format();

	if( $post_format != 'quote' ) :
		/**
		 * @hooked sportexx_post_header - 10
		 * @hooked sportexx_post_meta - 20
		 * @hooked sportexx_post_content - 30
		 */
		do_action( 'sportexx_single_post' );
		
	else : 

		sportexx_post_content();

	endif;

	?>

</article><!-- #post-## -->