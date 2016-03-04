<?php
/**
 * Product Quick view
 *
 * @author 		Transvelo
 * @package 	Sportexx/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

?>
<?php
	$args = array(
		'post_type' => 'product',
		'post__in' 	=> array( $id ),
	);
	query_posts( $args );
?>
<?php while ( have_posts() ) :  the_post(); ?>
	<div class="primary-block product-single single-product">
		<div class="row product-item product">
			<div class="col-lg-6 col-sm-5 col-product-image">
				<?php woocommerce_show_product_images(); ?>
			</div>
			<div class="col-lg-6 col-sm-7 col-product-detail text-left summary flip">
				<h2 class="product-title product_title"><?php the_title(); ?></h2>
				<?php woocommerce_template_loop_price(); ?>
				<?php woocommerce_template_single_rating(); ?>
				<?php sportexx_single_product_add_to_cart(); ?>
				<?php sportexx_single_product_share_icons(); ?>
				<a href="<?php the_permalink(); ?>" class="see-full-detail"><?php echo __( 'See full details', 'sportexx' ) ?><i class="fa fa-angle-right full-detail-icon"></i></a>
			</div>
		</div>
	</div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>