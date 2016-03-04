<?php
/**
 * Sportexx Widget Functions
 *
 * Widget related functions and widget registration
 *
 * @author 		Transvelo
 * @package 	Sportexx/Functions
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! function_exists( 'sportexx_register_widgets' ) ) {
	/**
	 * Register Widgets
	 *
	 * @since 1.0.0
	 */
	function sportexx_register_widgets() {

		if( is_woocommerce_activated() && is_extensions_activated() ) {
			include_once get_template_directory() . '/inc/widgets/class-sx-static-block-widget.php';
			register_widget( 'SX_Static_Block_Widget' );
		}

		if( is_woocommerce_activated() && is_visual_attributes_activated() ) {
			include_once get_template_directory() . '/inc/widgets/class-sx-widget-layered-nav.php'; 
			register_widget( 'SX_Widget_Layered_Nav' );
		}
	}
}

add_action( 'widgets_init', 'sportexx_register_widgets' );