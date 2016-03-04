<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package sportexx
 */

if ( ! function_exists( 'sportexx_homepage_tabs' ) ) {
	/**
	 * Display product homepage tabs
	 * Hooked into the `homepage` action in the product homepage tabs
	 * @since  1.0.0
	 * @return  void
	 */
	function sportexx_homepage_tabs( $tabs = array(), $style = '' ) {

		if( is_woocommerce_activated() ) {
	   		
	   		$default_tabs = apply_filters( 'sportexx_homepage_tabs_args', array(
	   			array(
	   				'shortcode'		=> 'top_rated_products',
	   				'title'			=> __( 'Popular', 'sportexx' ),
				),
	   			array(
	   				'shortcode'		=> 'featured_products',
	   				'title'			=> __( 'Featured', 'sportexx' ),
				),
				array(
	   				'shortcode'		=> 'recent_products',
	   				'title'			=> __( 'New Products', 'sportexx' ),
				),
				
			) );

			if( empty( $tabs ) ) {
				$tabs = $default_tabs;
			}

			sportexx_get_template( 'sections/home-page-tabs.php', array( 'tabs' => $tabs, 'style' => $style ) );
		}
	}
}

if ( ! function_exists( 'sportexx_brands_carousel' ) ) {
	/**
	 * Display brands carousel
	 * Hooked into the `homepage` action in the brands carousel
	 * @since  1.0.0
	 * @return  void
	 */
	function sportexx_brands_carousel( $title = '', $limit = 12 , $has_no_products = FALSE, $orderby = 'title', $order = 'ASC') {

		if( is_woocommerce_activated() ) {

			$title = ! empty( $title ) ? $title : __( 'Brands', 'sportexx' );
		
			$brand_taxonomy = sportexx_get_brands_taxonomy();

			if( ! empty( $brand_taxonomy ) ) {

				$args = apply_filters( 'sportexx_brands_carousel_args', array(
					'orderby'			=> $orderby,
					'order'				=> $order,
					'number'			=> $limit,
					'hide_empty'    	=> $has_no_products,
			    ) );

			    $terms = get_terms( $brand_taxonomy, $args );

			    if( ! is_wp_error( $terms ) ) {
			    	wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '1.10.2', true );
					sportexx_get_template( 'sections/brands-carousel.php', array( 'terms' => $terms, 'title' => $title ) );
			    }
			}
		}
	}
}

if ( ! function_exists( 'sportexx_blog_posts_carousel' ) ) {
	/**
	 * Display blog recent posts
	 * Hooked into the `homepage` action in the recent blog post widget
	 * @since  1.0.0
	 * @return  void
	 */
	function sportexx_blog_posts_carousel( $title, $display = 'list', $limit = 6 ) {

		if( is_woocommerce_activated() ) {

			$title = ! empty( $title ) ? $title : __( 'From the Blog', 'sportexx' );

			$args = apply_filters( 'sportexx_blog_posts_carousel_args', array(
				'posts_per_page'      	=> $limit,
				'no_found_rows'       	=> true,
				'post_status'         	=> 'publish',
				'ignore_sticky_posts' 	=> true,
				'post_type'				=> 'post',
				'orderby'				=> 'date',
				'order'					=> 'DESC',
			) );

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) {

				//wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/assets/css/owl-carousel.css' );
				wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '1.10.2', true );

				if( $display == 'grid' ) {
					sportexx_get_template( 'sections/posts-carousel-grid.php', array( 'the_query' => $the_query, 'title' => $title ) );
				} else {
					sportexx_get_template( 'sections/posts-carousel-list.php', array( 'the_query' => $the_query, 'title' => $title ) );
				}
			}

			wp_reset_postdata();
		}
	}
}

if ( ! function_exists( 'sportexx_homepage_content' ) ) {
	/**
	 * Display homepage content
	 * Hooked into the `homepage` action in the homepage template
	 * @since  1.0.0
	 * @return  void
	 */
	function sportexx_homepage_content() {
		while ( have_posts() ) : the_post();

			get_template_part( 'content', 'page' );

		endwhile; // end of the loop.
	}
}

if ( ! function_exists( 'sportexx_get_sidebar' ) ) {
	/**
	 * Display sportexx sidebar
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function sportexx_get_sidebar() {
		
		$layout_args = sportexx_get_page_layout_args();

		if( ! empty( $layout_args['sidebar'] ) ) {
			get_sidebar( $layout_args['sidebar'] );
		} else {
			get_sidebar();
		}

	}
}

if( ! function_exists( 'sportexx_display_jumbotron' ) ) {
	/**
	 *
	 */
	function sportexx_display_jumbotron( $args = array() ) {
		sportexx_get_template( 'sections/jumbotron.php', $args );
	}
}

if( ! function_exists( 'sportexx_homepage_slider' ) ) {
	/**
	 *
	 */
	function sportexx_homepage_slider( $slider = 'home-page-1-slider' ) {

		$slider = empty( $slider ) ? 'home-page-1-slider' : $slider;
		
		if( is_revslider_activated() ) {
			putRevSlider( $slider );
		}
	}
}

if( ! function_exists( 'sportexx_display_team_member' ) ) {
	/**
	 *
	 */
	function sportexx_display_team_member( $id = '' ) {
		sportexx_get_template( 'sections/team-member.php', array( 'id' => $id ) );
	}
}

if( ! function_exists( 'sportexx_display_image_card' ) ) {
	/**
	 *
	 */
	function sportexx_display_image_card( $args = array() ) {
		sportexx_get_template( 'sections/image-card.php', $args );
	}
}

if( ! function_exists( 'sportexx_display_product_card' ) ) {
	/**
	 *
	 */
	function sportexx_display_product_card( $args = array() ) {
		sportexx_get_template( 'sections/product-card.php', $args );
	}
}

if( ! function_exists( 'sportexx_display_product_image_card' ) ) {
	/**
	 *
	 */
	function sportexx_display_product_image_card( $args = array() ) {
		sportexx_get_template( 'sections/product-image-card.php', $args );
	}
}

if( ! function_exists( 'sportexx_breadcrumb' ) ) {
	function sportexx_breadcrumb() {

		if( is_woocommerce_activated() && apply_filters( 'sportexx_show_breadcrumb', TRUE ) ) {
			woocommerce_breadcrumb();
		}
	}
}

if( ! function_exists( 'sportexx_product_quick_view' ) ) {
	function sportexx_product_quick_view() {

		if( isset( $_REQUEST['product_id'] ) ) {
			$product_id = $_REQUEST['product_id'];

			sportexx_get_template( 'sections/modal-quick-view.php', array( 'id' => $product_id ) );
		}
		die();
	}
}