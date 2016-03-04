<?php
/**
 * Sportexx hooks
 *
 * @package sportexx
 */

/**
 * General
 * @see  sportexx_setup()
 * @see  sportexx_template_debug_mode()
 * @see  sportexx_widgets_init()
 * @see  sportexx_scripts()
 * @see  sportexx_header_widget_region()
 * @see  sportexx_get_sidebar()
 */
add_action( 'after_setup_theme',			'sportexx_setup',						10 );
add_action( 'after_setup_theme', 			'sportexx_template_debug_mode', 		20 );
add_action( 'widgets_init',					'sportexx_widgets_init',				10 );
add_action( 'wp_enqueue_scripts',			'sportexx_scripts',						10 );
add_action( 'tgmpa_register', 				'sportexx_register_required_plugins',	10 );
add_action( 'wp_head',						'sportexx_site_favicon',				10 );
add_action( 'admin_init', 					'sportexx_add_editor_styles',			10 );
add_action( 'after_setup_theme',			'sportexx_add_retina_filters',			10 );

/**
 * Layout
 */
add_filter( 'sportexx_site_content_classes',	'sportexx_apply_site_content_classes' );
add_filter( 'sportexx_container_classes',		'sportexx_apply_container_classes' );
add_filter( 'sportexx_content_area_classes',	'sportexx_apply_content_area_classes' );
add_filter( 'sportexx_sidebar_area_classes',	'sportexx_apply_sidebar_area_classes' );
add_filter( 'sportexx_site_main_classes',		'sportexx_apply_site_main_classes' );
add_filter( 'sportexx_show_page_header',		'sportexx_toggle_page_header' );
add_filter( 'body_class',						'sportexx_apply_body_classes' );
add_filter( 'sportexx_show_breadcrumb',			'sportexx_toggle_breadcrumb' );
add_filter( 'sportexx_footer_classes',			'sportexx_apply_footer_classes',	PHP_INT_MAX );

add_action( 'sportexx_before_content',			'sportexx_hook_jumbotron',			5 );
add_action( 'sportexx_before_content', 			'sportexx_breadcrumb', 				10 );
add_action( 'sportexx_sidebar',					'sportexx_get_sidebar',				10 );

/**
 * Header
 * @see  sportexx_skip_links()
 * @see  sportexx_navbar()
 * @see  sportexx_navbar_header()
 * @see  sportexx_primary_navigation()
 * @see  sportexx_secondary_navigation()
 * @see  sportexx_navbar_header_mast()
 * @see  sportexx_site_branding()
 * @see  sportexx_navbar_right()
 * @see  sportexx_navbar_collapse_toggle()
 * @see  sportexx_mini_cart()
 * @see  sportexx_top_cart_separator()
 * @see  sportexx_navbar_right_search()
 */
add_action( 'sportexx_header', 					'sportexx_skip_links', 				0 );
add_action( 'sportexx_header', 					'sportexx_navbar',					10 );

add_action( 'sportexx_navbar', 					'sportexx_navbar_header', 			10 );
add_action( 'sportexx_navbar',					'sportexx_primary_navigation',		20 );

add_action( 'sportexx_navbar_header',			'sportexx_secondary_navigation',	10 );
add_action( 'sportexx_navbar_header',			'sportexx_navbar_header_mast',		20 );

add_action( 'sportexx_navbar_header_mast',		'sportexx_site_branding',			10 );
add_action( 'sportexx_navbar_header_mast',		'sportexx_navbar_right',			20 );
add_action( 'sportexx_navbar_header_mast', 		'sportexx_navbar_collapse_toggle',	30 );

add_action( 'sportexx_navbar_right', 			'sportexx_mini_cart',				10 );
add_action( 'sportexx_navbar_right', 			'sportexx_top_cart_separator',		20 );											
add_action( 'sportexx_navbar_right', 			'sportexx_navbar_right_search',		30 );

/**
 * Footer
 * @see  sportexx_before_footer_wrapper_start()
 * @see  sportexx_footer_form_newsletter()
 * @see  sportexx_footer_social_icons()
 * @see  sportexx_before_footer_wrapper_end()
 * @see  sportexx_footer_widgets()
 * @see  sportexx_after_footer_wrapper_start()
 * @see  sportexx_footer_copyright()
 * @see  sportexx_footer_quick_links()
 * @see  sportexx_after_footer_wrapper_end()
 */

add_action( 'sportexx_footer',			'sportexx_before_footer_wrapper_start',		10 );
add_action( 'sportexx_footer',			'sportexx_footer_form_newsletter',			20 );
add_action( 'sportexx_footer',			'sportexx_footer_social_icons',				30 );
add_action( 'sportexx_footer',			'sportexx_before_footer_wrapper_end',		40 );
add_action( 'sportexx_footer',			'sportexx_footer_widgets',					50 );
add_action( 'sportexx_footer',			'sportexx_after_footer_wrapper_start',		60 );
add_action( 'sportexx_footer',			'sportexx_footer_copyright',				70 );
add_action( 'sportexx_footer',			'sportexx_footer_quick_links',				80 );
add_action( 'sportexx_footer',			'sportexx_after_footer_wrapper_end',		90 );

/**
 * Homepage
 * @see  sportexx_homepage_tabs()
 * @see  sportexx_brands_carousel()
 * @see  sportexx_blog_posts_carousel()
 */
add_action( 'homepage',		'sportexx_homepage_slider',			10 );
add_action( 'homepage', 	'sportexx_homepage_tabs',			20 );
add_action( 'homepage', 	'sportexx_brands_carousel',			30 );
add_action( 'homepage', 	'sportexx_blog_posts_carousel',		40 );

/**
 * Posts
 * @see  unlimited_post_media_attachment()
 * @see  unlimited_post_header()
 * @see  unlimited_post_meta()
 * @see  unlimited_post_content()
 * @see  unlimited_paging_nav()
 * @see  unlimited_single_post_header()
 * @see  unlimited_post_nav()
 * @see  unlimited_display_comments()
 */
add_action( 'sportexx_loop_post',			'sportexx_post_media_attachment', 		10 );
add_action( 'sportexx_loop_post',			'sportexx_post_header',					20 );
add_action( 'sportexx_loop_post',			'sportexx_post_loop_description',		30 );

add_action( 'sportexx_loop_after',			'sportexx_paging_nav',					10 );

add_action( 'sportexx_single_post',			'sportexx_post_media_attachment',		10 );
add_action( 'sportexx_single_post',			'sportexx_post_header',					20 );
add_action( 'sportexx_single_post',			'sportexx_post_content',				30 );
add_action( 'sportexx_single_post',			'sportexx_post_meta',					40 );
add_action( 'sportexx_single_post',			'sportexx_single_post_social_icons',	50 );

add_action( 'sportexx_single_post_after',	'sportexx_post_nav',					10 );
add_action( 'sportexx_single_post_after',	'sportexx_display_comments',			10 );

/**
 * Pages
 * @see  sportexx_page_header()
 * @see  sportexx_page_content()
 * @see  sportexx_display_comments()
 */
add_action( 'sportexx_page', 			'sportexx_page_header',			10 );
add_action( 'sportexx_page', 			'sportexx_page_content',		20 );
add_action( 'sportexx_page_after', 		'sportexx_display_comments',	10 );

/**
 * Extras
 * @see  sportexx_setup_author()
 * @see  sportexx_body_classes()
 * @see  sportexx_page_menu_args()
 */
add_filter( 'body_class',					'sportexx_body_classes' );
add_filter( 'wp_page_menu_args',			'sportexx_page_menu_args' );
add_filter( 'widget_text', 					'do_shortcode' );
add_filter( 'nav_menu_link_attributes',		'sportexx_add_data_hover_attribute',	10, 4 );
add_filter( 'sportexx_nav_menu_start_lvl',	'sportexx_animate_dropdown_menu',		10, 3 );

add_action( 'wp_ajax_nopriv_product_quick_view', 'sportexx_product_quick_view' );
add_action( 'wp_ajax_product_quick_view', 'sportexx_product_quick_view' );