<?php
/**
 * Sportexx WooCommerce hooks
 *
 * @package sportexx
 */

/**
 * Styles
 */
add_filter( 'woocommerce_enqueue_styles', 	'__return_empty_array' );

/**
 * Layout
 * @see  sportexx_before_content()
 * @see  sportexx_after_content()
 * @see  woocommerce_breadcrumb()
 */
remove_action( 'woocommerce_before_main_content', 	'woocommerce_breadcrumb', 					20, 0 );
remove_action( 'woocommerce_before_main_content', 	'woocommerce_output_content_wrapper', 		10 );
remove_action( 'woocommerce_after_main_content', 	'woocommerce_output_content_wrapper_end', 	10 );
remove_action( 'woocommerce_sidebar', 				'woocommerce_get_sidebar', 					10 );
remove_action( 'woocommerce_after_shop_loop', 		'woocommerce_pagination', 					10 );
remove_action( 'woocommerce_before_shop_loop', 		'woocommerce_result_count', 				20 );
remove_action( 'woocommerce_before_shop_loop', 		'woocommerce_catalog_ordering', 			30 );

add_action( 'woocommerce_before_main_content', 		'sportexx_before_wc_content', 				10 );
add_action( 'woocommerce_after_main_content', 		'sportexx_after_wc_content', 				10 );

add_action( 'woocommerce_before_shop_loop',			'sportexx_control_bar_wrapper_start',		9 );
add_action( 'woocommerce_before_shop_loop', 		'sportexx_woocommerce_catalog_ordering', 	10 );
add_action( 'woocommerce_before_shop_loop', 		'sportexx_shop_view_switcher', 				20 );
add_action( 'woocommerce_before_shop_loop', 		'sportexx_woocommerce_pagination', 			30 );
add_action( 'woocommerce_before_shop_loop',			'sportexx_control_bar_wrapper_end',			31 );

add_action( 'woocommerce_after_shop_loop',			'sportexx_control_bar_wrapper_start',		9 );
add_action( 'woocommerce_after_shop_loop', 			'sportexx_woocommerce_result_count', 		20 );
add_action( 'woocommerce_after_shop_loop', 			'sportexx_woocommerce_pagination', 			30 );
add_action( 'woocommerce_after_shop_loop',			'sportexx_control_bar_wrapper_end',			31 );

add_action( 'sportexx_shop_sidebar',				'sportexx_shop_sidebar', 					10 );

/**
 * Subcategory
 * @see sportexx_subcategory_thumbnail()
 */
remove_action( 'woocommerce_before_subcategory_title',		'woocommerce_subcategory_thumbnail',			10 );
add_action( 'woocommerce_before_subcategory_title',			'sportexx_subcategory_thumbnail',				10 );


/**
 * Products
 * @see  sportexx_upsell_display()
 */
remove_action( 'woocommerce_after_single_product_summary', 	'woocommerce_upsell_display', 					15 );
remove_action( 'woocommerce_before_shop_loop_item_title', 	'woocommerce_show_product_loop_sale_flash', 	10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 	'woocommerce_template_loop_rating',				5 );
add_action( 'woocommerce_after_shop_loop_item_title', 		'woocommerce_template_loop_rating',				15 );
remove_action( 'woocommerce_before_shop_loop_item_title',	'woocommerce_template_loop_product_thumbnail', 	10 );
remove_action( 'woocommerce_after_shop_loop_item',			'woocommerce_template_loop_add_to_cart',		10 );
remove_action( 'woocommerce_single_product_summary',		'woocommerce_template_single_meta',				40 );
remove_action( 'woocommerce_before_shop_loop_item',			'woocommerce_template_loop_product_link_open',	10 );
remove_action( 'woocommerce_after_shop_loop_item',			'woocommerce_template_loop_product_link_close',	5 );

add_action( 'woocommerce_before_shop_loop_item',			'sportexx_add_animation_to_product_start',		0 );
add_action( 'woocommerce_before_shop_loop_item',			'sportexx_product_image_action_wrapper',		1 );
add_action( 'woocommerce_before_shop_loop_item', 			'sportexx_template_loop_product_thumbnail', 	10 );
add_action( 'woocommerce_before_shop_loop_item',			'woocommerce_show_product_loop_sale_flash',		20 );
add_action( 'woocommerce_before_shop_loop_item',			'sportexx_product_actions_wrapper',				30 );
add_action( 'woocommerce_before_shop_loop_item',			'woocommerce_template_loop_add_to_cart',		40 );
add_action( 'woocommerce_before_shop_loop_item',			'sportexx_quick_view_link',						45 );
add_action( 'woocommerce_before_shop_loop_item',			'sportexx_product_actions_wrapper_close',		50 );
add_action( 'woocommerce_before_shop_loop_item',			'sportexx_product_image_action_wrapper_close',	60 );

add_action( 'woocommerce_before_shop_loop_item_title',		'woocommerce_template_loop_product_link_open',	30 );
add_action( 'woocommerce_after_shop_loop_item',				'woocommerce_template_loop_product_link_close', 90 );

add_action( 'woocommerce_after_shop_loop_item',				'sportexx_add_animation_to_product_end',		PHP_INT_MAX );

/**
 * Single Product
 */
remove_action( 'woocommerce_before_single_product_summary',	'woocommerce_show_product_sale_flash',			10 );

remove_action( 'woocommerce_single_product_summary',		'woocommerce_template_single_rating',			10 );
remove_action( 'woocommerce_single_product_summary',		'woocommerce_template_single_add_to_cart',		30 );

remove_action( 'woocommerce_after_single_product_summary',	'woocommerce_output_product_data_tabs',			10 );
remove_action( 'woocommerce_after_single_product_summary',	'woocommerce_upsell_display',					15 );
remove_action( 'woocommerce_after_single_product_summary',	'woocommerce_output_related_products',			20 );

add_action( 'woocommerce_before_single_product_summary',	'sportexx_wrap_product_images', 				0 );
add_action( 'woocommerce_before_single_product_summary',	'sportexx_wrap_product_detail', 				PHP_INT_MAX );

add_action( 'woocommerce_single_product_summary',			'woocommerce_template_single_rating',			15 );
add_action( 'woocommerce_single_product_summary',			'sportexx_single_product_add_to_cart',			30 );
add_action( 'woocommerce_single_product_summary',			'sportexx_single_product_cart_buttons',			35 );
add_action( 'woocommerce_single_product_summary',			'woocommerce_template_single_meta',				55 );

add_action( 'woocommerce_share',							'sportexx_single_product_share_icons',			10 );

add_action( 'woocommerce_after_single_product_summary',		'sportexx_wrap_product_item_row',				0 );

add_action( 'woocommerce_after_single_product',				'sportexx_single_product_tab_start',			9 );
add_action( 'woocommerce_after_single_product',				'woocommerce_output_product_data_tabs',			10 );
add_action( 'woocommerce_after_single_product',				'sportexx_single_product_tab_end',				11 );

add_action( 'woocommerce_after_single_product',				'woocommerce_output_related_products',			20 );
add_action( 'woocommerce_after_single_product',				'woocommerce_upsell_display',					30 );

add_action( 'woocommerce_before_add_to_cart_button',		'sportexx_simple_product_wrapper_start',		PHP_INT_MAX );
add_action( 'woocommerce_after_add_to_cart_button',			'sportexx_simple_product_wrapper_end',			0 );

/**
 * Filters
 * @see  sportexx_woocommerce_body_class()
 * @see  sportexx_cart_link_fragment()
 * @see  sportexx_thumbnail_columns()
 * @see  sportexx_related_products_args()
 * @see  sportexx_products_per_page()
 * @see  sportexx_loop_columns()
 * @see  sportexx_breadcrumb_defaults()
 * @see  sportexx_wrap_on_sale()
 * @see  sportexx_wrap_star_rating()
 */
add_filter( 'body_class', 								'sportexx_woocommerce_body_class' );
add_filter( 'woocommerce_product_thumbnails_columns', 	'sportexx_thumbnail_columns' );
add_filter( 'woocommerce_output_related_products_args', 'sportexx_related_products_args' );
add_filter( 'loop_shop_per_page', 						'sportexx_products_per_page' );
add_filter( 'loop_shop_columns', 						'sportexx_loop_columns' );
add_filter( 'woocommerce_breadcrumb_defaults',			'sportexx_breadcrumb_defaults' );
add_filter( 'woocommerce_sale_flash', 					'sportexx_wrap_on_sale' );
add_filter( 'woocommerce_product_get_rating_html',		'sportexx_wrap_star_rating' );
add_filter( 'woocommerce_cart_item_thumbnail',			'sportexx_cart_item_thumbnail', 10, 2 );
add_filter( 'woocommerce_show_page_title',				'sportexx_show_wc_page_title' );
add_filter( 'woocommerce_pagination_args',				'sportexx_wc_pagination_args', 10 );

if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.3', '>=' ) ) {
	add_filter( 'woocommerce_add_to_cart_fragments', 'sportexx_cart_link_fragment' );
} else {
	add_filter( 'add_to_cart_fragments', 'sportexx_cart_link_fragment' );
}

/**
 * Cart Page
 */
add_action( 'woocommerce_before_cart',		'sportexx_cart_wrap_start',		0 );
add_action( 'woocommerce_after_cart',		'sportexx_cart_wrap_end', 		PHP_INT_MAX );

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );

add_action( 'sportexx_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'sportexx_cart_collaterals', 'woocommerce_cart_totals', 10 );

add_action( 'woocommerce_after_cart_table', 'sportexx_cart_collaterals' );
add_action( 'woocommerce_proceed_to_checkout', 'sportexx_update_cart_btn' );

/**
 * Product Taxonomies
 */
add_action( 'after_setup_theme', 'taxonomy_form_fields_actions' );

add_action( 'sportexx_after_footer',	'sportexx_quick_view_wrapper',				50 );
