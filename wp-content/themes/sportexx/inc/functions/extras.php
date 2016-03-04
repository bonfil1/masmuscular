<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package sportexx
 */

if( ! function_exists( 'sportexx_page_menu_args' ) ) {
	/**
	 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
	 *
	 * @param array $args Configuration arguments.
	 * @return array
	 */
	function sportexx_page_menu_args( $args ) {
		$args['show_home'] = true;
		return $args;
	}
}

if( ! function_exists( 'sportexx_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function sportexx_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		if ( ! function_exists( 'woocommerce_breadcrumb' ) ) {
			$classes[]	= 'no-wc-breadcrumb';
		}

		/**
		 * What is this?!
		 * Take the blue pill, close this file and forget you saw the following code.
		 * Or take the red pill, filter sportexx_make_me_cute and see how deep the rabbit hole goes...
		 */
		$cute	= apply_filters( 'sportexx_make_me_cute', FALSE );

		if ( TRUE === $cute ) {
			$classes[] = 'sportexx-cute';
		}

		$layout_args = sportexx_get_page_layout_args();

		if( isset( $layout_args['layout_name'] ) ) {
			$classes[] = $layout_args['layout_name'];
		}

		if( apply_filters( 'sportexx_enable_echo', TRUE ) ) {
			$classes[] = 'echo-enabled';
		}

		$classes[] = apply_filters( 'sportexx_layout_style', 'stretched' );

		return $classes;
	}
}

if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	/**
	 * Checks if WooCommerce is activated
	 * @return boolean
	 */
	function is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? TRUE : FALSE;
	}
}

if ( ! function_exists( 'is_visual_attributes_activated' ) ) {
	/**
	 * Checks if visual attributes is activated
	 * @return boolean
	 */
	function is_visual_attributes_activated() {
		return class_exists( 'QL_Visual_Attributes_Main' ) ? TRUE : FALSE;
	}
}

if( ! function_exists( 'is_revslider_activated' ) ) {
	/**
	 * Checks if revslider is activated
	 * @return boolean
	 */
	function is_revslider_activated() {
		return class_exists( 'RevSlider' ) ? TRUE : FALSE ;
	}
}

if( ! function_exists( 'is_our_team_activated' ) ) {
	/**
	 * Checks if Our Team by WooThemes is activated
	 * @return boolean
	 */
	function is_our_team_activated() {
		return class_exists( 'Woothemes_Our_Team' ) ? TRUE : FALSE ;
	}
}

if( ! function_exists( 'is_vc_activated' ) ) {
	/**
	 * Checks if Visual Composer is activated
	 * @return boolean
	 */
	function is_vc_activated() {
		return class_exists( 'WPBakeryVisualComposerAbstract' ) ? TRUE : FALSE;
	}
}

if( ! function_exists( 'is_extensions_activated' ) ) {
	/**
	 * Checks if Sportexx Extensions is activated
	 * @return boolean
	 */
	function is_extensions_activated() {
		return class_exists( 'Sportexx_Extensions' ) ? TRUE : FALSE;
	}
}

if( ! function_exists( 'is_redux_activated' ) ) {
	/**
	 * Checks if Redux Framework is activated
	 * @return boolean
	 */
	function is_redux_activated() {
		return class_exists( 'ReduxFrameworkPlugin' ) ? TRUE : FALSE;
	}	
}

if( ! function_exists( 'is_wpml_activated' ) ) {
	/**
	 * Checks if WPML is activated
	 * @return boolean
	 */
	function is_wpml_activated() {
		return function_exists('icl_object_id') ? TRUE : FALSE;
	}
}

if( ! function_exists( 'sportexx_html_tag_schema' ) ) {
	/**
	 * Schema type
	 * @return string schema itemprop type
	 */
	function sportexx_html_tag_schema() {
		$schema 	= 'http://schema.org/';
		$type 		= 'WebPage';

		// Is single post
		if ( is_singular( 'post' ) ) {
			$type 	= 'Article';
		}

		// Is author page
		elseif ( is_author() ) {
			$type 	= 'ProfilePage';
		}

		// Is search results page
		elseif ( is_search() ) {
			$type 	= 'SearchResultsPage';
		}

		echo 'itemscope="itemscope" itemtype="' . esc_attr( $schema ) . esc_attr( $type ) . '"';
	}
}

if( ! function_exists( 'sportexx_categorized_blog' ) ) {
	/**
	 * Returns true if a blog has more than 1 category.
	 *
	 * @return bool
	 */
	function sportexx_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'sportexx_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,

				// We only need to know if there is more than one category.
				'number'     => 2,
			) );

			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'sportexx_categories', $all_the_cool_cats );
		}

		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so sportexx_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so sportexx_categorized_blog should return false.
			return false;
		}
	}
}

if( ! function_exists( 'sportexx_category_transient_flusher' ) ) {
	/**
	 * Flush out the transients used in sportexx_categorized_blog.
	 */
	function sportexx_category_transient_flusher() {
		// Like, beat it. Dig?
		delete_transient( 'sportexx_categories' );
	}
}

add_action( 'edit_category', 'sportexx_category_transient_flusher' );
add_action( 'save_post',     'sportexx_category_transient_flusher' );

if( ! function_exists( 'sportexx_blog_placeholder_get_image_size' ) ) {
	function sportexx_blog_placeholder_get_image_size( $image_size ) {

		if ( is_array( $image_size ) ) {
			$width  = isset( $image_size[0] ) ? $image_size[0] : '728';
			$height = isset( $image_size[1] ) ? $image_size[1] : '411';
			$crop   = isset( $image_size[2] ) ? $image_size[2] : 1;
		
			$size = array(
				'width'  => $width,
				'height' => $height,
				'crop'   => $crop
			);
		
			$image_size = $width . '_' . $height;
		
		} elseif ( in_array( $image_size, array( 'post-thumbnail' ) ) ) {
			$size           = get_option( $image_size . '_image_size', array() );
			$size['width']  = isset( $size['width'] ) ? $size['width'] : '728';
			$size['height'] = isset( $size['height'] ) ? $size['height'] : '411';
			$size['crop']   = isset( $size['crop'] ) ? $size['crop'] : 1;
		
		} else {
			$size = array(
				'width'  => '728',
				'height' => '411',
				'crop'   => 1
			);
		}
		
		return apply_filters( 'sportexx_blog_placeholder_get_image_size' . $image_size, $size );
	}
}

if( ! function_exists( 'sportexx_blog_placeholder_img' ) ) {
	function sportexx_blog_placeholder_img( $size = 'post-thumbnail' ) {
		$dimensions = sportexx_blog_placeholder_get_image_size( $size );

		return apply_filters( 'sportexx_blog_placeholder_img', '<img src="' . sportexx_blog_placeholder_img_src() . '" alt="' . __( 'Placeholder', 'sportexx' ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_attr( $dimensions['height'] ) . '" class="wp-post-image sportexx-blog-placeholder" />', $size, $dimensions );
	}
}

if( ! function_exists( 'sportexx_blog_placeholder_img_src' ) ) {
	function sportexx_blog_placeholder_img_src() {
		return apply_filters( 'sportexx_blog_placeholder_img_src', get_template_directory_uri() . '/assets/images/placeholder.png' );
	}
}