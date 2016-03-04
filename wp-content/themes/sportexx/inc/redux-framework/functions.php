<?php

#-----------------------------------------------------------------
# Setup
#-----------------------------------------------------------------

function redux_queue_font_awesome() {
    wp_register_style( 
		'redux-font-awesome',
		get_template_directory_uri() . '/assets/css/font-awesome.min.css',
		array(),
		time(),
		'all'
    );
    wp_enqueue_style( 'redux-font-awesome' );
}

function redux_remove_demo_mode() { // Be sure to rename this function to something more unique
    remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    remove_action( 'admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
}

function redux_get_product_attr_taxonomies() {
	if( function_exists( 'sportexx_get_product_attr_taxonomies' ) ) {
		return sportexx_get_product_attr_taxonomies();
	}
}

#-----------------------------------------------------------------
# General
#-----------------------------------------------------------------

function redux_apply_favicon( $favicon_url ) {
	global $sportexx_options;

	if( !empty( $sportexx_options['favicon']['url'] ) ) {
		$favicon_url = $sportexx_options['favicon']['url'];
	}

	return $favicon_url;
}

function redux_toggle_retina( $enable ) {
	global $sportexx_options;

	if( isset( $sportexx_options[ 'enable_retina' ] ) ) {
		if( $sportexx_options[ 'enable_retina' ] == '1' ) {
			$enable = true;
		} else {
			$enable = false;
		}
	}

	return $enable;
}

function redux_toggle_pace( $enable ) {
	global $sportexx_options;

	if( isset( $sportexx_options['enable_pace'] ) ) {
		if( $sportexx_options['enable_pace'] == '1' ) {
			$enable = TRUE;
		} else {
			$enable = FALSE;
		}
	}

	return $enable;
}

function redux_toggle_scrollup( $enable ) {
	global $sportexx_options;

	if( isset( $sportexx_options['enable_scroll_to_top'] ) ) {
		if( $sportexx_options['enable_scroll_to_top'] == '1' ) {
			$enable = TRUE;
		} else {
			$enable = FALSE;
		}
	}

	return $enable;
}

function redux_apply_layout_style( $layout_style ) {
	global $sportexx_options;

	if( isset( $sportexx_options['layout_style'] ) ) {
		$layout_style = $sportexx_options['layout_style'];
	}

	return $layout_style;
}

#-----------------------------------------------------------------
# Header
#-----------------------------------------------------------------

function redux_apply_logo( $logo ) {
	global $sportexx_options;

	if( !empty( $sportexx_options['use_text_logo'] ) && $sportexx_options['use_text_logo'] == '1' ) {
		$logo = '<span class="logo-text">' . $sportexx_options['logo_text'] . '</span>';
	} else {
		if ( !empty( $sportexx_options['site_logo']['url'] ) ) {
			$sportexx_site_logo = $sportexx_options['site_logo'];
			$logo = '<img alt="logo" src="' . $sportexx_site_logo['url'] . '" width="' . $sportexx_site_logo['width'] . '" height="' . $sportexx_site_logo['height'] . '"/>';
		}
	}

	return $logo;
}

function redux_apply_header_style( $header_style ) {
	global $sportexx_options;

	if( !empty( $sportexx_options['header_style'] ) ) {
		$header_style = $sportexx_options['header_style'];
	}

	return $header_style;
}

function redux_apply_header_bg( $header_bg ) {
	global $sportexx_options;

	if( !empty( $sportexx_options['header_bg'] ) ) {
		$header_bg = $sportexx_options['header_bg'];
	}

	return $header_bg;	
}

function redux_apply_top_cart_text( $top_cart_text ) {
	global $sportexx_options;

	if( !empty( $sportexx_options['top_cart_text'] ) ) {
		$top_cart_text = $sportexx_options['top_cart_text'];
	}

	return $top_cart_text;
}

function redux_apply_top_cart_dropdown_trigger( $cart_dropdown_trigger ) {
	global $sportexx_options;

	if( !empty( $sportexx_options['cart_dropdown_trigger'] ) ) {
		$cart_dropdown_trigger = $sportexx_options['cart_dropdown_trigger'];
	}

	return $cart_dropdown_trigger;
}

function redux_apply_top_cart_dropdown_animation( $cart_dropdown_animation) {
	global $sportexx_options;

	if( !empty( $sportexx_options['cart_dropdown_animation'] ) ) {
		$cart_dropdown_animation = 'animated ' . $sportexx_options['cart_dropdown_animation'];
	}

	return $cart_dropdown_animation;	
}

#-----------------------------------------------------------------
# Footer
#-----------------------------------------------------------------

function redux_apply_footer_bg( $additional_classes ) {
	global $sportexx_options;

	if( !empty( $sportexx_options['footer_style'] ) ) {
		$additional_classes = ' ' . $sportexx_options['footer_style'];
	}

	return $additional_classes;
}

function redux_apply_copyright_text( $copyright_text ) {
	global $sportexx_options;

	if( !empty( $sportexx_options['footer_credit'] ) ) {
		$copyright_text = $sportexx_options['footer_credit'];
	}

	return $copyright_text;
}

function redux_apply_footer_logo() {
	global $sportexx_options;
	if( !empty( $sportexx_options['footer_credit_card_icons_gallery'] ) ) : 
	$credit_cart_icons = explode( ',', $sportexx_options['footer_credit_card_icons_gallery'] ); ?>
    <div class="payment-methods">
        <ul>
        	<?php foreach ( $credit_cart_icons as $credit_cart_icon ): ?>
        	<?php $credit_cart_image_atts = wp_get_attachment_image_src( $credit_cart_icon ); ?>
            <li><img src="<?php echo $credit_cart_image_atts[0];?>" alt="" width="40" height="29"></li>
        	<?php endforeach; ?>
        </ul>
    </div><!-- /.payment-methods -->
    <?php
    endif; 
}

#-----------------------------------------------------------------
# Navigation
#-----------------------------------------------------------------

function redux_apply_dropdown_style( $nav_menu_class ) {
	global $sportexx_options;

	if( isset( $sportexx_options['primary_dropdown_style'] ) && $sportexx_options['primary_dropdown_style'] == 'inverse') {
		$nav_menu_class = 'navbar-nav-inverse';		
	} else {
		$nav_menu_class = '';
	}

	return $nav_menu_class;
}

function redux_apply_dropdown_trigger( $trigger, $theme_location ) {
	global $sportexx_options;

	if( isset( $sportexx_options[$theme_location . '_dropdown_trigger'] ) ) {
		$trigger = $sportexx_options[$theme_location . '_dropdown_trigger'];
	}

	return $trigger;
}

function redux_apply_dropdown_animation( $animation, $theme_location ) {
	global $sportexx_options;

	if( isset( $sportexx_options[$theme_location . '_dropdown_animation'] ) ) {
		$animation = 'animated ' . $sportexx_options[$theme_location . '_dropdown_animation'];
	}

	return $animation;
}

function redux_toggle_dropdown_indicator( $show, $theme_location ) {
	global $sportexx_options;

	if( isset( $sportexx_options[$theme_location . '_show_dropdown_indicator'] ) ) {
		if( $sportexx_options[$theme_location . '_show_dropdown_indicator'] ) {
			$show = TRUE;
		} else {
			$show = FALSE;
		}
	}

	return $show;
}

#-----------------------------------------------------------------
# Shop General
#-----------------------------------------------------------------

function redux_is_catalog_mode_disabled() {
	global $sportexx_options;

	if( isset( $sportexx_options['catalog_mode'] ) && $sportexx_options['catalog_mode'] == '1' ) {
		$is_disabled = FALSE;
	} else {
		$is_disabled = TRUE;
	}

	return $is_disabled;
}

function redux_apply_catalog_mode_for_product_loop( $product_link, $product ) {
	global $sportexx_options;

	if( ! redux_is_catalog_mode_disabled() ) {
		$product_link = sprintf( '<a href="%s" class="button product_type_%s">%s</a>',
			get_permalink( $product->ID ),
			esc_attr( $product->product_type ),
			apply_filters( 'sportexx_catalog_mode_button_text', __( 'View Product', 'sportexx' ) )
		);
	}

	return $product_link;
}

function redux_apply_product_brand_taxonomy( $brand_taxonomy ) {
	global $sportexx_options;

	if( isset( $sportexx_options['product_brand_taxonomy'] ) ) {
		$brand_taxonomy = $sportexx_options['product_brand_taxonomy'];
	}

	return $brand_taxonomy;
}

function redux_apply_compare_page_url( $compare_page_url ) {
	global $sportexx_options;

	if( isset( $sportexx_options['product_comparison_page'] ) ) {
		$compare_page_id = $sportexx_options['product_comparison_page'];

		if( function_exists( 'icl_object_id' ) ) {
			$compare_page_id = icl_object_id( $compare_page_id, 'page' );
		}

		$compare_page_url = get_permalink( $compare_page_id );
	}

	return $compare_page_url;
}

#-----------------------------------------------------------------
# Shop Catalog Pages
#-----------------------------------------------------------------

function redux_apply_shop_jumbotron( $static_block_id ) {
	global $sportexx_options;

	if( isset( $sportexx_options['shop_jumbotron'] ) ) {
		$static_block_id = $sportexx_options['shop_jumbotron'];
	}

	return $static_block_id;
}

function redux_apply_shop_page_layout( $args ) {
	global $sportexx_options;

	if( !empty( $sportexx_options['shop_page_layout'] ) ) {

		if( $sportexx_options['shop_page_layout'] == 'full-width' ) {
			
			$args['layout'] 				= 'layout-fullwidth';
			$args['layout_name'] 			= 'sportexx-fullwidth';
			$args['content_area_classes']	= '';
			$args['sidebar_area_classes']	= '';

		} elseif ( $sportexx_options['shop_page_layout'] == 'left-sidebar' ) {

			$args['layout'] 				= 'layout-sidebar';
			$args['layout_name'] 			= 'sportexx-left-sidebar';
			$args['content_area_classes']	= 'col-sm-12 col-md-8 col-md-push-4 col-lg-9 col-lg-push-3';
			$args['sidebar_area_classes']	= 'col-sm-12 col-md-4 col-lg-3 col-md-pull-8 col-lg-pull-9';

		} elseif ( $sportexx_options['shop_page_layout'] == 'right-sidebar' ) {

			$args['layout'] 				= 'layout-sidebar';
			$args['layout_name'] 			= 'sportexx-right-sidebar';
			$args['content_area_classes']	= 'col-sm-12 col-md-8 col-lg-9';
			$args['sidebar_area_classes']	= 'col-sm-12 col-md-4 col-lg-3';

		}
	}

	return $args;
}

function redux_apply_loop_shop_columns() {
	global $sportexx_options;
	return $sportexx_options['product_columns'];
}

function redux_apply_products_per_page( $products_per_page ) {
	global $sportexx_options;

	if( isset( $sportexx_options['products_per_page'] ) ) {
		$products_per_page = $sportexx_options['products_per_page'];
	}

	return $products_per_page;
}

function redux_apply_shop_view( $shop_view ) {
	global $sportexx_options;

	if( isset( $sportexx_options['remember_user_view'] ) && $sportexx_options['remember_user_view'] && isset( $_COOKIE['user_shop_view'] ) ){
		$shop_view = $_COOKIE['user_shop_view'];
	} else {
		if( isset( $sportexx_options['shop_default_view'] ) && !empty( $sportexx_options['shop_default_view']) ) {
			$shop_view = $sportexx_options['shop_default_view'];
		}
	}

	return $shop_view;
}

#-----------------------------------------------------------------
# Shop : Product Item Settings
#-----------------------------------------------------------------

function redux_apply_product_item_display( $classes ) {
	global $sportexx_options;

	if( $sportexx_options['product_item_has_grid'] == FALSE ) {
		$classes .= ' has-no-grid';
	}

	return $classes;
}

function redux_apply_product_animation( $animation ) {
	global $sportexx_options;

	if( isset( $sportexx_options['product_item_animation'] ) && $sportexx_options['product_item_animation'] != 'none' ) {
		$animation = $sportexx_options['product_item_animation'];
	} else {
		$animation = '';
	}

	return $animation;
}

function redux_apply_product_animation_delay( $should_delay ) {
	global $sportexx_options;

	if( isset( $sportexx_options['should_product_animation_delay'] ) ) {
		$should_delay = $sportexx_options['should_product_animation_delay'];
	}

	return $should_delay;
}

function redux_toggle_echo( $enable ) {
	global $sportexx_options;

	if( isset( $sportexx_options['enable_lazy_loading'] ) ) {
		$enable = $sportexx_options['enable_lazy_loading'];
	}

	return $enable;
}

function redux_apply_enable_shop_quick_view( $enable ) {
	global $sportexx_options;

	if( isset( $sportexx_options['enable_quick_view'] ) ) {
		$enable = $sportexx_options['enable_quick_view'];
	}

	return $enable;
}

#-----------------------------------------------------------------
# Shop : Single Product Settings
#-----------------------------------------------------------------

function redux_toggle_single_product_share( $show ) {
	global $sportexx_options;

	if( isset( $sportexx_options['enable_single_product_share'] ) ) {
		$show = $sportexx_options['enable_single_product_share'];
	}

	return $show;
}

function redux_toggle_related_products( $show ) {
	global $sportexx_options;

	if( isset( $sportexx_options['show_related_products'] ) ) {
		$show = $sportexx_options['show_related_products'];
	}

	return $show;
}

function redux_apply_related_products_count( $related_products_count ) {
	global $sportexx_options;

	if( isset( $sportexx_options['related_products_count'] ) ) {
		$related_products_count = $sportexx_options['related_products_count'];
	}

	return $related_products_count;
}

function redux_toggle_upsell_products( $show ) {
	global $sportexx_options;

	if( isset( $sportexx_options['show_upsell_products'] ) ) {
		$show = $sportexx_options['show_upsell_products'];
	}

	return $show;
}

function redux_apply_upsell_products_count( $upsell_products_count ) {
	global $sportexx_options;

	if( isset( $sportexx_options['upsell_products_count'] ) ) {
		$upsell_products_count = $sportexx_options['upsell_products_count'];
	}

	return $upsell_products_count;
}

#-----------------------------------------------------------------
# BLOG
#-----------------------------------------------------------------

function redux_apply_blog_layout( $args ) {
	global $sportexx_options;

	if( isset( $sportexx_options['blog_layout'] ) ) {

		if( $sportexx_options['blog_layout'] == 'full-width' ) {
			
			$args['layout'] 				= 'layout-fullwidth';
			$args['layout_name'] 			= 'sportexx-fullwidth';
			$args['content_area_classes']	= 'col-xs-12 col-sm-10 col-md-8 center-block';
			$args['sidebar_area_classes']	= '';

		} elseif ( $sportexx_options['blog_layout'] == 'left-sidebar' ) {

			$args['layout'] 				= 'layout-sidebar';
			$args['layout_name'] 			= 'sportexx-left-sidebar';
			$args['content_area_classes']	= 'col-sm-12 col-md-8 col-md-push-4 col-lg-8 col-lg-push-4';
			$args['sidebar_area_classes']	= 'col-sm-12 col-md-4 col-lg-4 col-md-pull-8 col-lg-pull-8';

		} elseif ( $sportexx_options['blog_layout'] == 'right-sidebar' ) {

			$args['layout'] 				= 'layout-sidebar';
			$args['layout_name'] 			= 'sportexx-right-sidebar';
			$args['content_area_classes']	= 'col-lg-8 col-md-8 col-sm-12';
			$args['sidebar_area_classes']	= 'col-lg-4 col-md-4 col-sm-12';

		}
	}

	return $args;
}

function redux_toggle_force_excerpt( $force_excerpt ) {
	global $sportexx_options;

	if( isset( $sportexx_options['force_excerpt'] ) ) {
		$force_excerpt = $sportexx_options['force_excerpt'];
	}

	return $force_excerpt;
}

function redux_apply_post_item_animation( $post_classes ) {

	global $sportexx_options;

	if( isset( $sportexx_options['post_item_animation'] ) && $sportexx_options['post_item_animation'] != 'none' ) {
		$post_classes[] = 'wow';
		$post_classes[] = $sportexx_options['post_item_animation'];
	}

	return $post_classes;
}

function redux_toggle_single_post_share( $enable ) {
	global $sportexx_options;

	if( isset( $sportexx_options['enable_post_item_share'] ) ) {
		$enable = $sportexx_options['enable_post_item_share'];
	}

	return $enable;
}

#-----------------------------------------------------------------
# TYPOGRAPHY
#-----------------------------------------------------------------

function redux_apply_title_font() {
	global $sportexx_options;

	//echo '<pre>' . print_r( $sportexx_options['sportexx_title_font'], 1 ) . '</pre>'; exit;
}

function redux_has_google_fonts( $load_default ) {
	global $sportexx_options;

	if( isset( $sportexx_options['use_predefined_font'] ) ) {
		$load_default = $sportexx_options['use_predefined_font'];
	}

	return $load_default;
}

#-----------------------------------------------------------------
# CUSTOM CODE
#-----------------------------------------------------------------

function redux_apply_custom_fonts() {
	global $sportexx_options;

	if( isset( $sportexx_options['use_predefined_font'] ) && !$sportexx_options['use_predefined_font'] ) :
		
		$title_font 			= $sportexx_options['sportexx_title_font'];
		$content_font			= $sportexx_options['sportexx_content_font'];
		$title_font_family 		= $title_font['font-family'];
		$title_font_weight		= $title_font['font-weight'];
		$content_font_family	= $content_font['font-family'];
		$content_font_weight 	= $content_font['font-weight'];
	?>
	<style type="text/css">
	h1, h2, h3, h4, h5, h6, 
	th, 
	.navbar-brand .logo-text, 
	.navbar-nav, 
	.dropdown-trigger-cart, 
	.home-tabs .nav-tabs > li > a ,
	.sidebar-blog,
	.product-filters .widget .widget-title + .list-filters > li > a,
	.single-product-tab .add-review,
	.sportexx-banner-wrapper .heading,
	.sportexx-banner-wrapper .lead,
	.sportexx-banner-wrapper .subtitle,
	.btn,
	button,
	input[type="button"],
    input[type="reset"],
    input[type="submit"],
    .button,
    .added_to_cart,
    .more-link,
    .card,
    .comment-list .comment-meta,
    .dropdown-menu-cart .basket-item .product-title,
    .jumbotron,
    .list-group-faq > li > a,
    .yamm .yamm-content h1,
    .yamm .yamm-content h2,
    .yamm .yamm-content h3,
    .yamm .yamm-content h4,
    .yamm .yamm-content h5,
    .yamm .yamm-content h6,
    .yamm .yamm-content .widgetitle,
    .owl-carousel .item .text-overlay .info,
    .post .post-meta,
    .post blockquote,
    .price,
    .amount,
    .products .product .price,
    .product-label,
    .list-view .product-label,
    .list-view .product-title,
    .widget-area .widget ul > li,
    .widget-area .widget_rss ul > li .rssSummary,
    .product-label,
    .product-filters .widget ul li > a,
    form.woocommerce-checkout #ship-to-different-address label,
    .woocommerce-checkout-review-order-table tfoot > tr > th,
    .message-404 .subtitle,
    .quote-about-brand,
    .cart-empty,
    table.cart thead th,
    .cart_totals > table > tbody > tr > th,
    .cart_totals > table > tbody > tr > td .amount,
    table.cart .product-name a,
    .woocommerce-checkout .woocommerce-info, 
    .woocommerce-breadcrumb {
	    text-transform: uppercase;
	    font-family: <?php echo $title_font_family; ?>;
	    font-weight: <?php echo $title_font_weight;?>;
	}

	body, 
	label,
	.top-bar,
	.input-search-group .input-search,
	.input-search-group .input-search:hover,
	.input-search-group .input-search:focus,
	.input-search-group .input-search:active,
	.header-alt .navbar-collapse .form-search .input-search,
	.sidebar-blog .form-control,
	.size-picker > li > a,
	.table-wishlist .action-items,
	.card-title,
	.card-subtitle,
	.dropdown-menu,
	.dropdown-menu-cart .cart-item .product-report,
	.le-select,
	.le-quantity .minus span,
	.le-quantity .plus span,
	.le-quantity input,
	.woocommerce-checkout .woocommerce-info a{
		font-family: <?php echo $content_font_family;?>;
		font-weight: <?php echo $content_font_weight;?>;
	}
	</style>
	<?php
	endif;
}

function redux_apply_custom_css() {
	global $sportexx_options;

	if( isset( $sportexx_options['custom_css'] ) && trim( $sportexx_options['custom_css'] ) != '' ) :
	?>
	<style type="text/css">
	<?php echo $sportexx_options['custom_css']; ?>
	</style>
	<?php
	endif;
}

function redux_apply_header_js() {
	global $sportexx_options;

	if( !empty( $sportexx_options['custom_header_js'] ) ) :
	?>
	<script type="text/javascript"><?php echo $sportexx_options['custom_header_js']; ?></script>
	<?php
	endif;
}

function redux_apply_footer_js() {
	global $sportexx_options;

	if( !empty( $sportexx_options['custom_footer_js'] ) ) :
	?>
	<script type="text/javascript"><?php echo $sportexx_options['custom_footer_js']; ?></script>
	<?php
	endif;
}

function redux_apply_social_icons_url() {
	global $sportexx_options;

	$social_icons = array(
		array(
		    'title'     => __('Facebook', 'sportexx'),
		    'id'        => 'facebook',
		    'icon'      => 'fa fa-facebook',
		),

		array(
		    'title'     => __('Twitter', 'sportexx'),
		    'id'        => 'twitter',
		    'icon'      => 'fa fa-twitter',
		),

		array(
		    'title'     => __('Google+', 'sportexx'),
		    'id'        => 'google-plus',
		    'icon'      => 'fa fa-google-plus',
		),

		array(
		    'title'     => __('Pinterest', 'sportexx'),
		    'id'        => 'pinterest',
		    'icon'      => 'fa fa-pinterest',
		),

		array(
		    'title'     => __('LinkedIn', 'sportexx'),
		    'id'        => 'linkedin',
		    'icon'      => 'fa fa-linkedin',
		),

		array(
		    'title'     => __('RSS', 'sportexx'),
		    'id'        => 'rss',
		    'icon'      => 'fa fa-rss',
		),

		array(
		    'title'     => __('Tumblr', 'sportexx'),
		    'id'        => 'tumblr',
		    'icon'      => 'fa fa-tumblr',
		),

		array(
		    'title'     => __('Instagram', 'sportexx'),
		    'id'        => 'instagram',
		    'icon'      => 'fa fa-instagram',
		),

		array(
		    'title'     => __('Youtube', 'sportexx'),
		    'id'        => 'youtube',
		    'icon'      => 'fa fa-youtube',
		),

		array(
		    'title'     => __('Vimeo', 'sportexx'),
		    'id'        => 'vimeo',
		    'icon'      => 'fa fa-vimeo-square',
		),

		array(
		    'title'     => __('Dribbble', 'sportexx'),
		    'id'        => 'dribbble',
		    'icon'      => 'fa fa-dribbble',
		),

		array(
		    'title'     => __('Stumble Upon', 'sportexx'),
		    'id'        => 'stumbleupon',
		    'icon'      => 'fa fa-stumpleupon',
		),

		array(
		    'title'     => __('Sound Cloud', 'sportexx'),
		    'id'        => 'soundcloud',
		    'icon'      => 'fa fa-soundcloud',
		),

		array(
		    'title'     => __('Vine', 'sportexx'),
		    'id'        => 'vine',
		    'icon'      => 'fa fa-vine',
		),

		array(
		    'title'     => __('VKontakte', 'sportexx'),
		    'id'        => 'vk',
		    'icon'      => 'fa fa-vk',
		),

		array(
            'title'     => __('RSS', 'sportexx'),
            'id'        => 'rss',
            'icon'      => 'fa fa-rss',
            'link'		=> get_bloginfo( 'rss2_url' )
        ),
	);

	foreach( $social_icons as $key => $social_icon ) {
		$option_key = $social_icon['id'];

		if( !empty( $sportexx_options[$option_key] ) ) {
			$social_icons[$key]['link'] = $sportexx_options[$option_key];
		}
	}

	return $social_icons;
}