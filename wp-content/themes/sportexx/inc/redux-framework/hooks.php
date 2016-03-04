<?php

add_action( 'init', 										'redux_remove_demo_mode' );
add_action( 'redux/page/sportexx_options/enqueue', 			'redux_queue_font_awesome' );

/**
 * General Filters
 */
add_filter( 'sportexx_site_favicon_url',					'redux_apply_favicon',						10 );
add_filter( 'sportexx_enable_scrollup',						'redux_toggle_scrollup',					10 );
add_filter( 'sportexx_enable_pace',							'redux_toggle_pace',						10 );
add_filter( 'sportexx_layout_style',						'redux_apply_layout_style',					10 );
add_filter( 'sportexx_enable_retina',						'redux_toggle_retina',						10 );

/**
 * Header Filters
 */
add_filter( 'sportexx_site_logo',							'redux_apply_logo',							10 );
add_filter( 'sportexx_header_style',						'redux_apply_header_style',					10 );
add_filter( 'sportexx_header_bg',							'redux_apply_header_bg',					10 );

add_filter( 'sportexx_top_cart_text',						'redux_apply_top_cart_text',				10 );
add_filter( 'sportexx_top_cart_dropdown_trigger',			'redux_apply_top_cart_dropdown_trigger',	10 );
add_filter( 'sportexx_top_cart_dropdown_animation',			'redux_apply_top_cart_dropdown_animation',	10 );

/**
 * Footer Filters
 */
add_filter( 'sportexx_footer_classes', 						'redux_apply_footer_bg', 					10 );
add_filter( 'sportexx_copyright_text',						'redux_apply_copyright_text',				10 );
add_filter( 'sportexx_footer',								'redux_apply_footer_logo',					85 );
add_filter( 'sportexx_footer_social_icons_args',			'redux_apply_social_icons_url',				10 );

/**
 * Navigation Filters
 */

add_filter( 'sportexx_primary_dropdown_style',					'redux_apply_dropdown_style',		10 );

add_filter( 'sportexx_primary_dropdown_trigger',				'redux_apply_dropdown_trigger',		10, 2 );
add_filter( 'sportexx_topbar-left_dropdown_trigger',			'redux_apply_dropdown_trigger',		10, 2 );
add_filter( 'sportexx_topbar-right_dropdown_trigger',			'redux_apply_dropdown_trigger',		10, 2 );

add_filter( 'sportexx_primary_dropdown_animation',				'redux_apply_dropdown_animation',	10, 2 );
add_filter( 'sportexx_topbar-left_dropdown_animation',			'redux_apply_dropdown_animation',	10, 2 );
add_filter( 'sportexx_topbar-right_dropdown_animation',			'redux_apply_dropdown_animation',	10, 2 );

add_filter( 'sportexx_primary_show_dropdown_indicator',			'redux_toggle_dropdown_indicator',	10, 2 );
add_filter( 'sportexx_topbar-left_show_dropdown_indicator',		'redux_toggle_dropdown_indicator',	10, 2 );
add_filter( 'sportexx_topbar-right_show_dropdown_indicator',	'redux_toggle_dropdown_indicator',	10, 2 );

/**
 * Shop Filters
 */
add_filter( 'sportexx_is_catalog_mode_disabled',				'redux_is_catalog_mode_disabled',					10 );
add_filter( 'woocommerce_loop_add_to_cart_link',				'redux_apply_catalog_mode_for_product_loop',		10, 2 );
add_filter( 'sportexx_shop_jumbotron_id',						'redux_apply_shop_jumbotron',						10 );
add_filter( 'sportexx_page_layout_args_shop-page',				'redux_apply_shop_page_layout',						10 );
add_filter( 'sportexx_page_layout_args_product-category-page',	'redux_apply_shop_page_layout',						10 );
add_filter( 'loop_shop_columns',								'redux_apply_loop_shop_columns',					PHP_INT_MAX );
add_filter( 'sportexx_default_shop_view',						'redux_apply_shop_view',							10 );
add_filter( 'sportexx_products_per_page',						'redux_apply_products_per_page',					10 );
add_filter( 'sportexx_enable_shop_quick_view',					'redux_apply_enable_shop_quick_view',				10 );
add_filter( 'sportexx_product_brand_taxonomy',					'redux_apply_product_brand_taxonomy',				10 );

/**
 * Product Item Filters
 */
add_filter( 'sportexx_products_wrapper_classes', 				'redux_apply_product_item_display',		10 );
add_filter( 'sportexx_product_animation',						'redux_apply_product_animation',		10 );
add_filter( 'sportexx_should_product_animation_delay',			'redux_apply_product_animation_delay',	10 );
add_filter( 'sportexx_enable_echo',								'redux_toggle_echo',					10 );

/**
 * Single Product Filters
 */
add_filter( 'sportexx_show_related_products',					'redux_toggle_related_products',		10 );
add_filter( 'sportexx_related_products_count',					'redux_apply_related_products_count',	10 );

add_filter( 'sportexx_show_single_product_share',				'redux_toggle_single_product_share',	10 );
add_filter( 'sportexx_show_upsell_products',					'redux_toggle_upsell_products',			10 );
add_filter( 'sportexx_upsell_products_count',					'redux_apply_upsell_products_count',	10 );

add_filter( 'sportexx_compare_page_url',						'redux_apply_compare_page_url',			10 );

/**
 * Blog Page Filters
 */
add_filter( 'sportexx_page_layout_args_blog-page',				'redux_apply_blog_layout',				10 );
add_filter( 'sportexx_page_layout_args_archive-page',			'redux_apply_blog_layout',				10 );
add_filter( 'sportexx_page_layout_args_blog-single',			'redux_apply_blog_layout',				10 );

add_filter( 'sportexx_force_excerpt',							'redux_toggle_force_excerpt',			10 );
add_filter( 'additional_post_classes',							'redux_apply_post_item_animation',		10 );
add_filter( 'sportexx_enable_post_item_share',					'redux_toggle_single_post_share',		10 );

/**
 * Custom Code
 */
add_filter( 'sportexx_load_default_fonts',						'redux_has_google_fonts',				10 );

add_action( 'wp_head',				'redux_apply_custom_fonts',				100 );
add_action( 'wp_head',				'redux_apply_custom_css', 				200 );
add_action( 'wp_head',				'redux_apply_header_js',				PHP_INT_MAX );
add_action( 'wp_footer',			'redux_apply_footer_js',				PHP_INT_MAX );
