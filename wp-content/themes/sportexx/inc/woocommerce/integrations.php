<?php
/**
 * Integration logic for WooCommerce extensions
 *
 * @package sportexx
 */
if( is_woocommerce_extension_activated( 'YITH_Woocompare' ) ) {
	
	global $yith_woocompare;

	remove_action( 'woocommerce_single_product_summary', array( $yith_woocompare->obj , 'add_compare_link' ), 35 );

	add_action( 'sportexx_cart_buttons', array( $yith_woocompare->obj, 'add_compare_link' ), 20 );

	if ( ! function_exists( 'sportexx_update_yith_compare_options' ) ) {
		function sportexx_update_yith_compare_options( $options ) {

			foreach( $options['general'] as $key => $option ) {
				if( $option['id'] == 'yith_woocompare_auto_open' ) {
					$options['general'][$key]['std'] = 'no';
					$options['general'][$key]['default'] = 'no';
				}
			}

			return $options;
		}
	}

	add_filter( 'yith_woocompare_tab_options', 'sportexx_update_yith_compare_options' );

	if ( ! function_exists( 'sportexx_view_compare_page_url' ) ) {
		function sportexx_view_compare_page_url() {
			$compare_page_URL = sportexx_get_compare_page_url();
			$view_compare_button_label = apply_filters( 'sportexx_view_compare_page_label', __( 'View Comparison &rarr;', 'sportexx' ) );		
			?>
			<a href="<?php echo esc_url( $compare_page_URL ); ?>" class="text-center view-compare-button button hidden"><?php echo $view_compare_button_label;?></a>
			<?php
		}
	}

	add_action( 'sportexx_cart_buttons', 'sportexx_view_compare_page_url', PHP_INT_MAX );
}

if( is_woocommerce_extension_activated( 'YITH_WCWL' ) ) {

	global $yith_wcwl;

	if ( ! function_exists( 'sportexx_modify_wishlist_button_classes' ) ) {
		function sportexx_modify_wishlist_button_classes( $classes ) {
			
			$classes .= ' btn btn-default btn-lg btn-block';
			return $classes;

		}
	}
	add_filter( 'yith_wcwl_add_to_wishlist_button_classes', 'sportexx_modify_wishlist_button_classes' );

	if ( ! function_exists( 'sportexx_modify_yith_wcwl_positions' ) ) {
		function sportexx_modify_yith_wcwl_positions( $positions ) {
			
			$positions['add-to-cart'] = array(
				'hook'		=> 'sportexx_cart_buttons',
				'priority'	=> 10
			);
			return $positions;

		}
	}

	add_filter( 'yith_wcwl_positions', 'sportexx_modify_yith_wcwl_positions' );

	remove_action( 'wp_enqueue_scripts', array( $yith_wcwl->wcwl_init, 'enqueue_styles_and_stuffs' ) );
}