<?php
/**
 * Layout functions used in the theme
 *
 * @package sportexx
 */

if( ! function_exists( 'sportexx_get_page_layout_args' ) ) {
	/**
	 * Gets Page Layout for various pages used in the theme
	 * 
	 * @since v1.0.0
	 */
	function sportexx_get_page_layout_args() {

		$args = array(
			'layout'				=> 'layout-fullwidth',
			'layout_name'			=> 'sportexx-fullwidth',
			'page_name'				=> '',
			'site_content_classes'	=> '',
			'container_classes'		=> 'container inner-top-xs inner-bottom',
			'content_area_classes'	=> '',
			'sidebar_area_classes'	=> '',
		);
		
		$page_layout = 'full-width';
		$page_name = '';
		$wishlist_page_id = get_option( 'yith_wcwl_wishlist_page_id' );

		if( is_woocommerce_activated() && is_woocommerce() ) {
			
			if( is_product() ) {
				
				$args = array(
					'layout' 				=> 'layout-fullwidth',
					'layout_name'			=> 'sportexx-fullwidth',
					'page_name'				=> $page_name,
					'site_content_classes'	=> '',
					'container_classes'		=> 'uncontainer',
					'content_area_classes'	=> '',
					'sidebar_area_classes'	=> '',
					'site_main_classes'		=> '',
				);

			} else if( is_shop() ) {

				$args = array(
					'layout'				=> 'layout-sidebar',
					'layout_name'			=> 'sportexx-right-sidebar',
					'page_name'				=> 'shop-page',
					'site_content_classes'	=> '',
					'container_classes'		=> 'container inner-bottom-md',
					'content_area_classes'	=> 'col-sm-12 col-md-8 col-md-push-4 col-lg-9 col-lg-push-3',
					'sidebar_area_classes'	=> 'col-sm-12 col-md-4 col-lg-3 col-md-pull-8 col-lg-pull-9',
					'site_main_classes'		=> '',
					'has_jumbotron'			=> true,
				);

				$static_block_id = apply_filters( 'sportexx_shop_jumbotron_id', '' );

				if( ! empty( $static_block_id ) ) {
					$static_block = get_post( $static_block_id );
					remove_filter( 'the_content', 'wptexturize' );
					$jumbotron = apply_filters( 'the_content' , $static_block->post_content );
					add_filter( 'the_content', 'wptexturize' );

					$args['jumbotron'] = str_replace( 'wpb_row', '', $jumbotron );
					$args['has_jumbotron'] = TRUE;
				}

			} else if ( is_product_category() ) {

				$args = array(
					'layout'				=> 'layout-sidebar',
					'layout_name'			=> 'sportexx-right-sidebar',
					'page_name'				=> 'product-category-page',
					'site_content_classes'	=> '',
					'container_classes'		=> 'container inner-bottom',
					'content_area_classes'	=> 'col-sm-12 col-md-8 col-md-push-4 col-lg-9 col-lg-push-3',
					'sidebar_area_classes'	=> 'col-sm-12 col-md-4 col-lg-3 col-md-pull-8 col-lg-pull-9',
					'site_main_classes'		=> '',
				);

	    		$term 				= get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
				$term_id 			= $term->term_id;
				$static_block_id 	= get_woocommerce_term_meta( $term_id, 'static_block_id', true );

				if( !empty( $static_block_id ) ) {
					$static_block = get_post( $static_block_id );
					remove_filter( 'the_content', 'wptexturize' );
					$jumbotron = apply_filters( 'the_content' , $static_block->post_content );
					add_filter( 'the_content', 'wptexturize' );

					$args['jumbotron'] = str_replace( 'wpb_row', '', $jumbotron );
					$args['has_jumbotron'] = TRUE;
				}
			}

		} else if( is_woocommerce_activated() && is_cart() ) {
			
			$args = array(
				'layout'	 			=> 'layout-fullwidth',
				'layout_name'			=> 'sportexx-fullwidth',
				'page_name'				=> 'woocommerce-cart',
				'site_content_classes'	=> '',
				'container_classes'		=> 'container inner-top-xs inner-bottom',
				'content_area_classes'	=> '',
				'sidebar_area_classes'	=> '',
				'site_main_classes'		=> '',
			);
		
		} else if( is_woocommerce_activated() && is_checkout() ) {
			
			$args = array(
				'layout'	 			=> 'layout-fullwidth',
				'layout_name'			=> 'sportexx-fullwidth',
				'page_name'				=> 'woocommerce-checkout',
				'site_content_classes'	=> '',
				'container_classes'		=> 'container inner-md',
				'content_area_classes'	=> '',
				'sidebar_area_classes'	=> '',
				'site_main_classes'		=> '',
			);
		
		} else if( is_woocommerce_activated() && is_account_page() ) {

			if( !is_user_logged_in() ) {

				$args = array(
					'layout'				=> 'layout-fullwidth',
					'layout_name'			=> 'sportexx-fullwidth',
					'site_content_classes'	=> 'light-bg',
					'site_main_classes'		=> 'inner',
					'show_page_header'		=> FALSE
				);

				if( is_wc_endpoint_url( 'lost-password' ) ) {

					$args = array(
						'layout'				=> 'layout-fullwidth',
						'layout_name'			=> 'sportexx-fullwidth',
						'site_content_classes'	=> 'light-bg',
						'site_main_classes'		=> 'inner-top-xs inner-bottom',
						'show_page_header'		=> TRUE
					);
				}

			} else {

				$args = array(
					'layout'				=> 'layout-fullwidth',
					'layout_name'			=> 'sportexx-fullwidth',
					'site_content_classes'	=> 'light-bg',
					'site_main_classes'		=> 'inner-top-xs inner-bottom',
				);
			}

		} else if( is_our_team_activated() && is_post_type_archive( 'team-member' ) ) {

			$args = array(
				'layout'				=> 'layout-fullwidth',
				'layout_name'			=> 'sportexx-fullwidth',
				'page_name'				=> 'our-team',
				'site_content_classes'	=> 'light-bg',
				'site_main_classes'		=> 'inner',
			);

		} else if( is_single() ) {

			if( is_singular( 'team-member' ) ) {
				$args = array(
					'layout'				=> 'layout-fullwidth',
					'layout_name'			=> 'sportexx-fullwidth',
					'page_name'				=> 'team-member-single',
					'site_content_classes'	=> 'light-bg',
					'site_main_classes'		=> 'inner-md',
				);
			} else {
				$args = array(
					'layout'				=> 'layout-sidebar',
					'layout_name'			=> 'sportexx-left-sidebar',
					'page_name'				=> 'blog-single',
					'site_content_classes'	=> 'light-bg',
					'container_classes'		=> 'container inner-md',
					'content_area_classes'	=> 'col-lg-8 col-md-8 col-sm-12',
					'sidebar_area_classes'	=> 'col-lg-4 col-md-4 col-sm-12',
					'site_main_classes'		=> 'site-main-blog',
				);
			}

		} else if( is_archive() ) {

			$args = array(
				'layout'				=> 'layout-sidebar',
				'layout_name'			=> 'sportexx-left-sidebar',
				'page_name'				=> 'archive-page',
				'site_content_classes'	=> 'light-bg',
				'container_classes'		=> 'container inner-md',
				'content_area_classes'	=> 'col-lg-8 col-md-8 col-sm-12',
				'sidebar_area_classes'	=> 'col-lg-4 col-md-4 col-sm-12',
				'site_main_classes'		=> 'site-main-blog',
			);

		} else if( !empty( $wishlist_page_id ) && is_page( $wishlist_page_id ) ) {

			$args = array(
				'layout'				=> 'layout-fullwidth',
				'layout_name'			=> 'sportexx-fullwidth',
				'page_name'				=> '',
				'site_content_classes'	=> '',
				'container_classes'		=> 'container inner-top-md inner-bottom-sm',
				'content_area_classes'	=> '',
				'sidebar_area_classes'	=> '',
				'show_page_header'		=> FALSE,
			);

		} else if( is_page() ) {

			global $sportexx_page_metabox;

			$show_page_header = TRUE;
			$should_wrap_page = TRUE;
			$show_breadcrumb  = TRUE;

			if( $sportexx_page_metabox->get_the_value( 'hide_page_title' ) == '1' ) {
				$show_page_header = FALSE;
			}

			if( $sportexx_page_metabox->get_the_value( 'hide_breadcrumb' ) == '1' ) {
				$show_breadcrumb = FALSE;
			}

			$container_classes = $sportexx_page_metabox->get_the_value( 'container_classses' );
			if( $sportexx_page_metabox->get_the_value( 'do_not_wrap_page' ) == '1' ) {
				$container_classes = 'uncontainer ' . $container_classes;
			} else {
				$container_classes = 'container ' . $container_classes;
			}

			$site_content_classes 	= $sportexx_page_metabox->get_the_value( 'site_content_classes' );
			$content_area_classes 	= $sportexx_page_metabox->get_the_value( 'content_area_classes' );
			$sidebar_area_classes 	= $sportexx_page_metabox->get_the_value( 'sidebar_area_classes' );
			$header_classes 		= $sportexx_page_metabox->get_the_value( 'header_classes' );
			$body_classes 			= $sportexx_page_metabox->get_the_value( 'body_classes' );
			$static_block_id 		= $sportexx_page_metabox->get_the_value( 'header_content_static_block_ID' );
			$footer_classes 		= $sportexx_page_metabox->get_the_value( 'footer_classes' );

			$args = array(
				'layout'				=> 'layout-fullwidth',
				'layout_name'			=> 'sportexx-fullwidth',
				'show_page_header'		=> $show_page_header,
				'show_breadcrumb'		=> $show_breadcrumb,
				'container_classes'		=> $container_classes,
				'site_content_classes'	=> $site_content_classes,
				'content_area_classes'	=> $content_area_classes,
				'sidebar_area_classes'	=> $sidebar_area_classes,
				'header_classes'		=> $header_classes,
				'body_classes'			=> $body_classes,
				'footer_classes'		=> $footer_classes,
			);

			if( !empty( $static_block_id ) ) {
				$static_block = get_post( $static_block_id );
				
				if( $static_block ) {
					remove_filter( 'the_content', 'wptexturize' );
					$jumbotron = apply_filters( 'the_content' , $static_block->post_content );
					add_filter( 'the_content', 'wptexturize' );

					$args['jumbotron'] = str_replace( 'wpb_row', '', $jumbotron );
					$args['has_jumbotron'] = TRUE;
				}
			}

		} else {
				
			if ( is_front_page() && is_home() ) {
		  		// Default homepage which is also Blog page
				$args = array(
					'layout'				=> 'layout-sidebar',
					'layout_name'			=> 'sportexx-left-sidebar',
					'page_name'				=> 'blog-page',
					'site_content_classes'	=> 'light-bg',
					'container_classes'		=> 'container inner-md',
					'content_area_classes'	=> 'col-lg-8 col-md-8 col-sm-12',
					'sidebar_area_classes'	=> 'col-lg-4 col-md-4 col-sm-12',
					'site_main_classes'		=> 'site-main-blog',
				);

			} else if ( is_front_page() ) {
			  	// static homepage
				$args = array(
					'header_classes'		=> 'no-border-margin'
				);

			} else if ( is_home() ) {
			  	
			  	// blog page
				$args = array(
					'layout'				=> 'layout-sidebar',
					'layout_name'			=> 'sportexx-left-sidebar',
					'page_name'				=> 'blog-page',
					'site_content_classes'	=> 'light-bg',
					'container_classes'		=> 'container inner-md',
					'content_area_classes'	=> 'col-lg-8 col-md-8 col-sm-12',
					'sidebar_area_classes'	=> 'col-lg-4 col-md-4 col-sm-12',
					'site_main_classes'		=> 'site-main-blog',
				);

			}
		}

		if( isset( $args['page_name'] ) ) {
			$page_name = $args['page_name'];
		}

		return apply_filters( 'sportexx_page_layout_args_' . $page_name , $args );
	}
}

if( ! function_exists( 'sportexx_apply_site_content_classes' ) ) {
	function sportexx_apply_site_content_classes( $site_content_class ) {

		$layout_args = sportexx_get_page_layout_args();

		if( ! empty( $layout_args['site_content_classes'] ) ) {
			$site_content_class .= ' ' . $layout_args['site_content_classes']; // additional space
		}

		return $site_content_class;
	}
}

if( ! function_exists( 'sportexx_apply_container_classes' ) ) {
	function sportexx_apply_container_classes( $container_classes ) {

		$layout_args = sportexx_get_page_layout_args();

		if( ! empty( $layout_args['container_classes'] ) ) {
			$container_classes = $layout_args['container_classes'];
		}

		return $container_classes;
	}
}

if( ! function_exists( 'sportexx_apply_content_area_classes' ) ) {
	function sportexx_apply_content_area_classes( $content_area_classes ) {

		$layout_args = sportexx_get_page_layout_args();

		if( ! empty( $layout_args['content_area_classes'] ) ) {
			$content_area_classes .= ' ' . $layout_args['content_area_classes']; // additional space
		}

		return $content_area_classes;
	}
}

if( ! function_exists( 'sportexx_apply_sidebar_area_classes' ) ) {
	function sportexx_apply_sidebar_area_classes( $sidebar_area_classes ) {

		$layout_args = sportexx_get_page_layout_args();

		if( ! empty( $layout_args['sidebar_area_classes'] ) ) {
			$sidebar_area_classes .= ' ' . $layout_args['sidebar_area_classes']; // additional space
		}

		return $sidebar_area_classes;
	}
}

if( ! function_exists( 'sportexx_apply_site_main_classes' ) ) {
	function sportexx_apply_site_main_classes( $site_main_classes ) {

		$layout_args = sportexx_get_page_layout_args();

		if( ! empty( $layout_args['site_main_classes'] ) ) {
			$site_main_classes .= ' ' . $layout_args['site_main_classes']; // additional space
		}

		return $site_main_classes;
	}
}

if( ! function_exists( 'sportexx_apply_header_classes' ) ) {
	function sportexx_apply_header_classes( $header_classes ) {

		$layout_args = sportexx_get_page_layout_args();

		if( ! empty( $layout_args['header_classes'] ) ) {
			$header_classes .= ' ' . $layout_args['header_classes'];
		}

		return $header_classes;
	}
}

if( ! function_exists( 'sportexx_apply_body_classes' ) ) {
	function sportexx_apply_body_classes( $body_classes ) {

		$layout_args = sportexx_get_page_layout_args();

		if( ! empty( $layout_args['body_classes'] ) ) {
			$body_classes_arr = explode( ' ', $layout_args['body_classes'] );
			foreach( $body_classes_arr as $body_class ) {
				$body_classes[] = $body_class;
			}
		}

		return $body_classes;
	}
}

if( ! function_exists( 'sportexx_apply_footer_classes' ) ) {
	function sportexx_apply_footer_classes( $footer_classes ) {

		$layout_args = sportexx_get_page_layout_args();

		if( ! empty( $layout_args['footer_classes'] ) ) {
			$footer_classes = 'site-footer ' . $layout_args['footer_classes'];
		}

		return $footer_classes;
	}
}

if( ! function_exists( 'sportexx_hook_jumbotron' ) ) {
	function sportexx_hook_jumbotron() {
		
		$layout_args = sportexx_get_page_layout_args();

		if( ! empty( $layout_args['jumbotron'] ) ) {
			echo $layout_args['jumbotron'];
		}
	}
}

if( ! function_exists( 'sportexx_toggle_page_header' ) ) {
	function sportexx_toggle_page_header() {

		$layout_args = sportexx_get_page_layout_args();

		if( isset( $layout_args['show_page_header'] ) ) {
			return $layout_args['show_page_header'];
		}

		return true;
	}
}

if( ! function_exists( 'sportexx_toggle_breadcrumb' ) ) {
	function sportexx_toggle_breadcrumb() {

		$layout_args = sportexx_get_page_layout_args();

		if( isset( $layout_args['show_breadcrumb'] ) ) {
			return $layout_args['show_breadcrumb'];
		}

		return true;
	}
}