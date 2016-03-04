<?php
/**
 * @package Sportexx
 */

$additional_post_classes = apply_filters( 'additional_post_classes', array() );

?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $additional_post_classes ); ?> itemscope="" itemtype="http://schema.org/BlogPosting">

	<?php sportexx_post_content(); ?>

</div><!-- #post-## -->