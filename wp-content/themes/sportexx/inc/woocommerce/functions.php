<?php
/**
 * General functions used to integrate this theme with WooCommerce.
 *
 * @package sportexx
 */

/**
 * Before Content
 * Wraps all WooCommerce content in wrappers which match the theme markup
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'sportexx_before_wc_content' ) ) {
	function sportexx_before_wc_content() {

		$page_layout_args = sportexx_get_page_layout_args();

		ob_start();
	}
}

/**
 * After Content
 * Closes the wrapping divs
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'sportexx_after_wc_content' ) ) {
	function sportexx_after_wc_content() {

		$page_layout_args = sportexx_get_page_layout_args();
		
		$output = ob_get_clean();

		$layout_args = array( 'main_content' => $output, 'sidebar_action' => 'sportexx_shop_sidebar' );

		sportexx_get_template( 'layouts/' . $page_layout_args['layout'] . '.php', $layout_args );

	}
}

/**
 * 
 * @since 1.0.0
 * @return void
 */
if( ! function_exists( 'sportexx_shop_sidebar' ) ) {
	function sportexx_shop_sidebar() {
		woocommerce_get_sidebar();
	}
}

/**
 * Default loop columns on product archives
 * @return integer products per row
 * @since  1.0.0
 */
if ( ! function_exists( 'sportexx_loop_columns' ) ) {
	function sportexx_loop_columns() {
		
		$page_layout_args = sportexx_get_page_layout_args();

		if( ! empty( $page_layout_args['products_per_row'] ) ) {
			$products_per_row = $page_layout_args['products_per_row'] ;
		} else {
			$products_per_row = 3 ;
		}

		return apply_filters( 'sportexx_loop_columns', $products_per_row ); // 3 products per row
	}
}

/**
 * Add wrappers for breadcrumb default args
 * @param array $args
 * @return array $args modified to include 'col-full' class
 */
if ( ! function_exists( 'sportexx_breadcrumb_defaults' ) ) {
	function sportexx_breadcrumb_defaults( $args ) {
		$args['delimiter']		= '<span class="delimiter">&#47;</span>';
		$args['wrap_before'] 	= '<nav class="woocommerce-breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '><div class="container">';
		$args['wrap_after'] 	= '</div></nav><!-- /.woocommerce-breadcrumb -->';

		return $args;
	}
}



/**
 * Add 'woocommerce-active' class to the body tag
 * @param  array $classes
 * @return array $classes modified to include 'woocommerce-active' class
 */
if ( ! function_exists( 'sportexx_woocommerce_body_class' ) ) {
	function sportexx_woocommerce_body_class( $classes ) {
		if ( is_woocommerce_activated() ) {
			$classes[] = 'woocommerce-active';
		}

		return $classes;
	}
}

/**
 * Cart Fragments
 * Ensure cart contents update when products are added to the cart via AJAX
 * @param  array $fragments Fragments to refresh via AJAX
 * @return array            Fragments to refresh via AJAX
 */
if ( ! function_exists( 'sportexx_cart_link_fragment' ) ) {
	function sportexx_cart_link_fragment( $fragments ) {
		global $woocommerce;

		ob_start();

		sportexx_cart_link();

		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}

/**
 * Related Products Args
 * @param  array $args related products args
 * @since 1.0.0
 * @return  array $args related products args
 */
if( ! function_exists( 'sportexx_related_products_args' ) ) {
	function sportexx_related_products_args( $args ) {
		$args = apply_filters( 'sportexx_related_products_args', array(
			'posts_per_page' => 3,
			'columns'        => 3,
		) );

		return $args;
	}
}

/**
 * Product gallery thumnail columns
 * @return integer number of columns
 * @since  1.0.0
 */
if( ! function_exists( 'sportexx_thumbnail_columns' ) ) {
	function sportexx_thumbnail_columns() {
		return intval( apply_filters( 'sportexx_product_thumbnail_columns', 4 ) );
	}
}

/**
 * Products per page
 * @return integer number of products
 * @since  1.0.0
 */
if( ! function_exists( 'sportexx_products_per_page' ) ) {
	function sportexx_products_per_page() {
		return intval( apply_filters( 'sportexx_products_per_page', 12 ) );
	}
}

/**
 * Query WooCommerce Extension Activation.
 * @var  $extension main extension class name
 * @return boolean
 */
if( ! function_exists( 'is_woocommerce_extension_activated' ) ) {
	function is_woocommerce_extension_activated( $extension = 'WC_Bookings' ) {
		return class_exists( $extension ) ? true : false;
	}
}

/**
 * Adds wrapper to onsale flash
 * @return string wrapped on sale html
 * @since 1.0.0
 */
if( ! function_exists( 'sportexx_wrap_on_sale' ) ) {
	function sportexx_wrap_on_sale( $on_sale_html ) {
		return '<div class="product-label">' . $on_sale_html . '</div>';
	}
}

/**
 * Adds a wrapper to star rating
 * @return string wrapped star rating html
 * @since 1.0.0
 */
if( ! function_exists( 'sportexx_wrap_star_rating' ) ) {
	function sportexx_wrap_star_rating( $rating_html ) {
		return '<div class="star-rating-wrapper">' . $rating_html . '</div>';
	}
}

if( ! function_exists( 'sportexx_add_filter_to_offset_products_query' ) ) {
	function sportexx_add_filter_to_offset_products_query() {
		add_filter( 'woocommerce_shortcode_products_query', 'sportexx_add_offset_to_products_query', 10, 2 );
	}
}

if( ! function_exists( 'sportexx_remove_filter_to_offset_products_query' ) ) {
	function sportexx_remove_filter_to_offset_products_query() {
		remove_filter( 'woocommerce_shortcode_products_query', 'sportexx_add_offset_to_products_query', 10, 2 );	
	}
}

if( ! function_exists( 'sportexx_add_offset_to_products_query' ) ) {
	function sportexx_add_offset_to_products_query( $args, $atts ) {
		$args['offset'] = 4;
		return $args;
	}
}

if( ! function_exists( 'sportexx_get_brands_taxonomy' ) ) {
	function sportexx_get_brands_taxonomy() {
		return apply_filters( 'sportexx_product_brand_taxonomy', '' );
	}
}

if( ! function_exists( 'sportexx_get_product_attr_taxonomies' ) ) {
	function sportexx_get_product_attr_taxonomies() {
		$product_taxonomies = array();
		$attribute_taxonomies = wc_get_attribute_taxonomies();
		if ( $attribute_taxonomies ) {
			foreach ( $attribute_taxonomies as $tax ) {
				$product_taxonomies[wc_attribute_taxonomy_name( $tax->attribute_name )] = $tax->attribute_label;
			}
		}

		return $product_taxonomies;
	}
}

if( ! function_exists( 'sportexx_cart_item_thumbnail' ) ) {
	function sportexx_cart_item_thumbnail( $image, $cart_item ) {
		
		if( is_cart() ) {
			$_product = $cart_item['data'];
			$image = $_product->get_image( 'shop_catalog' );
		}

		return $image;
	}
}

if( ! function_exists( 'sportexx_show_wc_page_title' ) ) {
	function sportexx_show_wc_page_title( $show ) {
		
		if(	is_shop() ) {
			return false;
		}

		return $show;
	}
}

if( ! function_exists( 'sportexx_single_product_cart_buttons' ) ) {
	function sportexx_single_product_cart_buttons() {
		?>
		<div class="cart-buttons clearfix">
			<?php do_action( 'sportexx_cart_buttons' ); ?>
		</div>
		<?php
	}
}

if( ! function_exists( 'sportexx_single_product_share_icons' ) ) {
	function sportexx_single_product_share_icons() {
		
		if( apply_filters( 'sportexx_show_single_product_share', TRUE ) ) :

			$url = get_permalink();
			$title = get_the_title();

			if( has_post_thumbnail() ) {
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );

				if( isset( $thumbnail[0] ) ) {
					$thumbnail_src = $thumbnail[0];
				}
			}

			$single_product_social_icons_args = apply_filters( 'single_product_social_icons_args', array(
				'facebook'		=> array(
					'share_url'	=> 'http://www.facebook.com/sharer.php',
					'icon'		=> 'fa fa-facebook',
					'name'		=> __( 'Facebook', 'sportexx' ),
					'params'	=> array(
						'u'				=> 'url'
					)
				),
				'twitter'		=> array(
					'share_url'	=> 'https://twitter.com/share',
					'icon'		=> 'fa fa-twitter',
					'name'		=> __( 'Twitter', 'sportexx' ),
					'params'	=> array(
						'url'			=> 'url',
						'text'			=> 'title',
						'via'			=> 'via',
						'hastags'		=> 'hastags'
					)
				),
				'google_plus'	=> array(
					'share_url'	=> 'https://plus.google.com/share',
					'name'		=> __( 'Google Plus', 'sportexx' ),
					'icon'		=> 'fa fa-google-plus',
					'params'	=> array(
						'url'			=> 'url'
					)
				),
				'pinterest'		=> array(
					'share_url'	=> 'https://pinterest.com/pin/create/bookmarklet/',
					'name'		=> __( 'Pinterest', 'sportexx' ),
					'icon'		=> 'fa fa-pinterest',
					'params'	=> array(
						'media'			=> 'thumbnail_src',
						'url'			=> 'url',
						'is_video'		=> 'is_video',
						'description'	=> 'title'
					)
				),
				'digg'			=> array(
					'share_url'	=> 'http://digg.com/submit',
					'name'		=> __( '', 'sportexx' ),
					'icon'		=> 'fa fa-digg',
					'params'	=> array(
						'url'			=> 'url',
						'title'			=> 'title',
					)
				),
				'email'			=> array(
					'share_url'	=> 'mailto:yourfriend@email.com',
					'name'		=> __( 'Email', 'sportexx' ),
					'icon'		=> 'fa fa-envelope',
					'params'	=> array(
						'subject'		=> 'title',
						'body'			=> 'url',
					)
				),
			) );
			?>
			<div class="social-icons">
				<ul class="list-unstyled list-social-icons">
				<?php foreach( $single_product_social_icons_args as $key => $social_icon ): ?>
					<?php 
						$query_args = array();
						foreach( $social_icon['params'] as $param_key => $param ) {

							if( isset( $$param ) ) {
								$query_args[ $param_key ] = $$param;
							}
						}

						$share_url = add_query_arg( $query_args, $social_icon['share_url'] );
					?>
					<li class="<?php echo esc_attr( $key ); ?>">
						<a class="<?php echo esc_attr( $social_icon['icon'] ); ?>" href="<?php echo esc_url( $share_url ); ?>" title="<?php esc_attr( $social_icon['name'] ); ?>"></a>
					</li>
				<?php endforeach; ?>
				</ul>
			</div>
			<?php
		endif;
	}
}

if( ! function_exists( 'sportexx_single_product_add_to_cart' ) ) {
	function sportexx_single_product_add_to_cart() {
		global $product;

		if( apply_filters( 'sportexx_is_catalog_mode_disabled', TRUE ) ) {
			do_action( 'woocommerce_' . $product->product_type . '_add_to_cart'  );
		} else {
			if( $product->is_type( 'external' ) ) {
				do_action( 'woocommerce_' . $product->product_type . '_add_to_cart'  );
			}
		}
	}
}

if( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {
	function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
		global $post;

		$attr = array();
	 
		if ( has_post_thumbnail() ) {
			if( apply_filters( 'sportexx_enable_echo', TRUE ) ) {
				$blank_image_src = get_template_directory_uri() . '/assets/images/blank.gif';
				$thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size );
				$attr = array(
					'src' 		=> $blank_image_src,
					'data-echo'	=> $thumbnail_url[0],
				);
			}
			return get_the_post_thumbnail( $post->ID, $size, $attr );
		} elseif ( wc_placeholder_img_src() ) {
			return wc_placeholder_img( $size );
		}
	}
}

if( ! function_exists( 'sportexx_wc_pagination_args' ) ) {
	function sportexx_wc_pagination_args( $args ) {
		if( is_rtl() ) {
			$args['prev_text'] = '&rarr;';
			$args['next_text'] = '&larr;';
		}

		return $args;
	}
}

if ( ! function_exists( 'sportexx_get_compare_page_url' ) ) {
	function sportexx_get_compare_page_url() {
		return apply_filters( 'sportexx_compare_page_url', '' );
	}
}

if ( ! function_exists( 'sportexx_single_product_tab_start' ) ) {
	function sportexx_single_product_tab_start() {
		?>
		<div id="single-product-tab" class="single-product-tab light-bg">
		<div class="container">
		<?php
	}
}

if ( ! function_exists( 'sportexx_single_product_tab_end' ) ) {
	function sportexx_single_product_tab_end (){
		?>
		</div>
		</div>
		<?php
		
	}
}
