<?php

require 'class-sx-query-shortcode.php';

require 'sportexx-list-pages-shortcode.php';

#-----------------------------------------------------------------
# Shortcodes using [query] calss
#-----------------------------------------------------------------


// [blog] shortcode
//................................................................
if ( ! function_exists( 'blog_query' ) ) :
	function blog_query( $args = null, $content = null ) {

		return custom_wp_query( $args, $content );
	}
	
	add_shortcode( 'blog', 'blog_query' );
endif;

// [shop] shortcode
//................................................................
if ( ! function_exists( 'shop_query' ) ) :
	function shop_query( $args = null, $content = null ) {

		if( class_exists( 'WooCommerce' ) ){
			
			$catalog_ordering_args = WC()->query->get_catalog_ordering_args();

			if( $args == null ){
				$args = array();
			}

			if( is_array( $args ) ){
				$args = array_merge( $args, $catalog_ordering_args );
			}
		}

		$args['template'] = 'woocommerce/archive-product';

		if( ! isset( $args['columns'] ) || empty( $args['columns'] ) ) {
			$args['columns'] = 3;
		}

		global $woocommerce_loop;

		$woocommerce_loop['columns'] = $args['columns'];

		// post type
		if ( !isset( $args['post_type'] ) || empty( $args['post_type'] ) ) {
			$args['post_type'] = 'product';
		}

		// orderby
		if ( !isset( $args['orderby'] ) || empty( $args['orderby'] ) ) {
			$args['orderby'] = 'menu_order'; // default by sort order
		}
		
		if ( !isset( $args['order'] ) || empty( $args['order'] ) ) {
			$args['order'] = 'ASC'; // default order
		}
		
		// categories 
		if ( isset( $args['category'] ) ) {
			$args['taxonomy_slug'] = 'product_category';
			unset($args['category']);
		}

		return custom_wp_query( $args, $content );
	}
	
	add_shortcode('shop', 'shop_query');
endif;

if( ! function_exists( 'sportexx_compare_page' ) ) {
	
	function sportexx_compare_page() {

		ob_start();

		if( class_exists( 'YITH_Woocompare_Frontend' ) ) {

			global $yith_woocompare;
			
			if( function_exists( 'wc_get_template' ) ) {
				wc_get_template( 'compare.php', array( 
					'products' 			  => $yith_woocompare->obj->get_products_list(), 
					'fields' 			  => $yith_woocompare->obj->fields(),
					'repeat_price' 		  => get_option( 'yith_woocompare_price_end' ),
					'repeat_add_to_cart'  => get_option( 'yith_woocompare_add_to_cart_end' )
				) );
			}

		} else {
			echo '<p class="alert alert-danger">' . __( 'You need to enable YITH Compare plugin for product comparison to work', 'sportexx-extensions' ) . '</p>';
		}
		
		return ob_get_clean();
	}
}
add_shortcode( 'sportexx_compare_page', 'sportexx_compare_page' );