<?php
/**
 * Tab content of View Switcher
 *
 * @author 		Transvelo
 * @package 	Sportexx/WooCommerce/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$default_shop_view = apply_filters( 'sportexx_default_shop_view', 'grid' );
?>
<div class="tab-content">
	<div id="grid-view" class="tab-pane<?php if( $default_shop_view == 'grid' ) : ?> active<?php endif; ?>">

		<?php woocommerce_product_loop_start(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>

	</div>
	<div id="list-view" class="tab-pane<?php if( $default_shop_view == 'list' ) : ?> active<?php endif; ?>">
		<div class="product-items">
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php wc_get_template_part( 'content', 'product-list-view' ); ?>

			<?php endwhile; // end of the loop. ?>			

		</div>
	</div>
</div>