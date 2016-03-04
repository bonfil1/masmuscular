<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  Transvelo
 * @package Sportexx/WooCommerce/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<div class="list-view product-item">
	<div class="row">
		<div class="col-sm-5 col-md-5 col-lg-4 col-img">
			<a href="<?php the_permalink(); ?>" class="product-image"><?php woocommerce_template_loop_product_thumbnail(); ?></a>
		</div><!-- /.col --> 
		<div class="col-sm-7 col-md-7 col-lg-8 col-det">
			<div class="list-detail">
				<h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php
					woocommerce_template_loop_price();
					woocommerce_template_loop_rating();
				?>
				<div class="product-desc"><?php woocommerce_template_single_excerpt(); ?></div>
				<?php woocommerce_template_loop_add_to_cart(); ?>
			</div>
		</div> 
	</div><!-- /.row --> 
	<?php woocommerce_show_product_loop_sale_flash(); ?>
</div><!-- /.product-item -->