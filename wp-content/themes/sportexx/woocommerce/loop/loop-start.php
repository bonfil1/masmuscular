<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $woocommerce_loop;

$columns 		= isset( $woocommerce_loop['columns'] ) ? $woocommerce_loop['columns'] : apply_filters( 'loop_shop_columns', 3 );
$columns 		= absint( $columns );
$columns_class 	= 'columns-' . $columns;
?>
<div class="<?php echo esc_attr( apply_filters( 'sportexx_products_wrapper_classes', $columns_class ) ); ?>">
	<ul class="products <?php echo esc_attr( apply_filters( 'sportexx_products_classes', '' ) ); ?>">