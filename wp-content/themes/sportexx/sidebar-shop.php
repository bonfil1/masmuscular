<?php
/**
 * The sidebar containing the shop sidebar widget area and product filters widget area
 *
 * @package Sportexx
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<aside class="sidebar sidebar-shop">
	<div class="product-filters">
		<?php if ( is_active_sidebar( 'product-filters-1' ) ) : ?>
		<h3><?php echo apply_filters( 'sportexx_filter_by_text', __( 'Filter By /', 'sportexx' ) ); ?></h3>
		<div class="widgets">
			<?php dynamic_sidebar( 'product-filters-1' ); ?>	
		</div>
		<?php endif ; ?>

		<?php if( is_active_sidebar( 'shop-sidebar-1' ) ) : ?>
		<div class="widgets">
			<?php dynamic_sidebar( 'shop-sidebar-1' ); ?>	
		</div>
		<?php endif; ?>
	</div>
</aside><!-- /.sidebar -->