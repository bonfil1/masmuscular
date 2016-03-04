<?php
/**
 * Custom template tags used to integrate this theme with WooCommerce.
 *
 * @package sportexx
 */

/**
 * Cart Link
 * Displayed a link to the cart including the number of items present and the cart total
 * @param  array $settings Settings
 * @return array           Settings
 * @since  1.0.0
 */
if ( ! function_exists( 'sportexx_cart_link' ) ) {
	function sportexx_cart_link() {
		?>
			<a class="cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart', 'sportexx' ); ?>">
				<?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?> <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'sportexx' ), WC()->cart->get_cart_contents_count() ) );?></span>
			</a>
		<?php
	}
}

/**
 * Quick View Link
 *
 * @return void
 * @since  1.0.0
 */
if ( ! function_exists( 'sportexx_quick_view_link' ) ) {
	function sportexx_quick_view_link() {
		if( apply_filters( 'sportexx_enable_shop_quick_view', TRUE ) ) :
			?>
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="nofollow" data-product_id="<?php echo esc_attr( get_the_ID() ); ?>" class="button product_quick_view"><?php echo __( 'Quick View', 'sportexx'); ?></a>
			<?php
		endif;
	}
}

/**
 * Quick View Wrapper
 *
 * @return void
 * @since  1.0.0
 */
if ( ! function_exists( 'sportexx_quick_view_wrapper' ) ) {
	function sportexx_quick_view_wrapper() {
		if( apply_filters( 'sportexx_enable_shop_quick_view', TRUE ) ) :
			wp_enqueue_script( 'wc-add-to-cart-variation' );
			?>
			<div class="quick-view-wrapper">
				<div class="modal fade modal-quick-view" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-body">
								<div id="modal-quick-view-ajax-content"></div>
								<a class="close-button" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.quick-view-wrapper -->
			<?php
		endif;
	}
}

/**
 * Display Product Search
 * @since  1.0.0
 * @uses  is_woocommerce_activated() check if WooCommerce is activated
 * @return void
 */
if ( ! function_exists( 'sportexx_product_search' ) ) {
	function sportexx_product_search() {
		if ( is_woocommerce_activated() ) { ?>
			<div class="site-search">
				<?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
			</div>
		<?php
		}
	}
}

/**
 * Display Header Cart
 * @since  1.0.0
 * @uses  is_woocommerce_activated() check if WooCommerce is activated
 * @return void
 */
if ( ! function_exists( 'sportexx_header_cart' ) ) {
	function sportexx_header_cart() {
		if ( is_woocommerce_activated() ) {
			if ( is_cart() ) {
				$class = 'current-menu-item';
			} else {
				$class = '';
			}
		?>
		<ul class="site-header-cart menu">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php sportexx_cart_link(); ?>
			</li>
			<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
		</ul>
		<?php
		}
	}
}

/**
 * Upsells
 * Replace the default upsell function with our own which displays the correct number product columns
 * @since   1.0.0
 * @return  void
 * @uses    woocommerce_upsell_display()
 */
if ( ! function_exists( 'sportexx_upsell_display' ) ) {
	function sportexx_upsell_display() {
		woocommerce_upsell_display( -1, 3 );
	}
}

if ( ! function_exists( 'sportexx_control_bar_wrapper_start' ) ) {
	/**
	 * Sorting wrapper
	 * @since   1.0.0
	 * @return  void
	 */
	function sportexx_control_bar_wrapper_start() {
		echo '<div class="control-bar clearfix">';
	}
}

if ( ! function_exists( 'sportexx_control_bar_wrapper_end' ) ) {
	/**
	 * Sorting wrapper close
	 * @since   1.0.0
	 * @return  void
	 */
	function sportexx_control_bar_wrapper_end() {
		echo '</div><!-- /.control-bar -->';
	}
}

if ( ! function_exists( 'sportexx_template_loop_product_thumbnail' ) ) {
	/**
	 * Get the product thumbnail for the loop.
	 * @since 1.0.0
	 */
	function sportexx_template_loop_product_thumbnail() {
		echo '<a href="' . get_permalink() . '" class="product-image">' . woocommerce_get_product_thumbnail() . '</a>';
	}
}

if( ! function_exists( 'sportexx_product_actions_wrapper' ) ) {
	/**
	 * Product Actions
	 * @since 1.0.0
	 * @return void
	 */
	function sportexx_product_actions_wrapper() {
		echo '<div class="product-actions"><div class="btn-group-product-actions">';
	}
}

if( ! function_exists( 'sportexx_product_actions_wrapper_close' ) ) {
	/**
	 * Product Actions wrapper close
	 * @since 1.0.0
	 * @return void
	 */
	function sportexx_product_actions_wrapper_close() {
		echo '</div><!-- /.btn-group-product-actions --></div><!-- /.product-actions -->';
	}
}

if( ! function_exists( 'sportexx_product_image_action_wrapper' ) ) {
	function sportexx_product_image_action_wrapper() {
		echo '<div class="product-image-actions">';
	}
}

if( ! function_exists( 'sportexx_product_image_action_wrapper_close' ) ) {
	function sportexx_product_image_action_wrapper_close() {
		echo '</div><!-- /.product-image-actions -->';
	}
}

if( ! function_exists( 'sportexx_cart_wrap_start' ) ) {
	/**
	 * Output Wrapper start for Cart Page
	 * @since v1.0.0
	 */
	function sportexx_cart_wrap_start() {
		?>
		<div class="inner-bottom">
		<?php
	}
}

if( ! function_exists( 'sportexx_cart_wrap_end' ) ) {
	/**
	 * Output Wrapper End for Cart Page
	 * @since v1.0.0
	 */
	function sportexx_cart_wrap_end() {
		?>
		</div><!-- /.inner-bottom -->
		<?php
	}
}

if( ! function_exists( 'sportexx_woocommerce_result_count' ) ) {
	function sportexx_woocommerce_result_count() {
		?>
		<div class="control-bar-left pull-left flip"><?php woocommerce_result_count(); ?></div>
		<?php
	}
}

if( ! function_exists( 'sportexx_woocommerce_pagination' ) ) {
	function sportexx_woocommerce_pagination() {
		?>
		<div class="control-bar-right pull-right flip"><?php woocommerce_pagination(); ?></div>
		<?php
	}
}

if( ! function_exists( 'sportexx_woocommerce_catalog_ordering' ) ) {
	function sportexx_woocommerce_catalog_ordering() {
		?>
		<div class="control-bar-left pull-left flip"><?php woocommerce_catalog_ordering(); ?></div>
		<?php
	}
}

#-----------------------------------------------------------------
# Wrappers for Single Product Page
#-----------------------------------------------------------------

if( ! function_exists( 'sportexx_wrap_product_images' ) ) {
	function sportexx_wrap_product_images() {
		?>
		<div class="container inner-top inner-bottom-xs">
			<div class="row product-item product-single">
				<div class="col-sm-6 col-product-image text-center">
		<?php
	}
}

if( ! function_exists( 'sportexx_wrap_product_detail' ) ) {
	function sportexx_wrap_product_detail() {
		?>
				</div><!-- /.col-product-image -->
			<div class="col-sm-6 col-product-detail">
		<?php
	}
}

if( ! function_exists( 'sportexx_wrap_product_item_row' ) ) {
	function sportexx_wrap_product_item_row() {
		?>
				</div><!-- /.col-product-detail -->
			</div><!-- /.product-single -->
		</div><!-- /.container -->
		<?php
	}
}

if( ! function_exists( 'sportexx_shop_view_switcher' ) ) {
	function sportexx_shop_view_switcher() {
		wc_get_template( 'loop/view-switcher.php' );
	}
}

if( ! function_exists( 'sportexx_subcategory_thumbnail')) {
	function sportexx_subcategory_thumbnail( $category ) {
		?>
		<div class="category-image">
			<div class="category-image-wrapper">
				<?php woocommerce_subcategory_thumbnail( $category ); ?>
			</div>
		</div>
		<?php
	}
}

if( ! function_exists( 'sportexx_simple_product_wrapper_start' ) ) {
	function sportexx_simple_product_wrapper_start() {
		global $product;

		if( $product->is_type( 'simple' ) ) {
			echo '<div class="quantity-add-to-cart-wrapper">';
		}
	}
}

if( ! function_exists( 'sportexx_simple_product_wrapper_end' ) ) {
	function sportexx_simple_product_wrapper_end() {
		global $product;

		if( $product->is_type( 'simple' ) ) {
			echo '</div>';
		}
	}
}

if( ! function_exists( 'sportexx_add_animation_to_product_start' ) ) {
	function sportexx_add_animation_to_product_start() {
		global $woocommerce_loop;
		$product_animation 	= apply_filters( 'sportexx_product_animation', 'fadeInUp' );
		$should_delay		= apply_filters( 'sportexx_should_product_animation_delay', TRUE );

		$delay_attr = '';

		if( $should_delay && !empty( $woocommerce_loop['loop'] ) && !empty( $woocommerce_loop['columns'] ) ) {
			$multiplier = ( ($woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] ) + 1;
			$delay_in_seconds = ( 0.1 * $multiplier );
			$delay_attr = ' data-wow-delay="' . esc_attr ( $delay_in_seconds ) . 's"';
		}

		if( !empty( $product_animation ) ) {
			echo '<div class="product-item wow ' . esc_attr( $product_animation ) . '"' . $delay_attr . '>';
		} else {
			echo '<div class="product-item">';
		}
	}
}

if( ! function_exists( 'sportexx_add_animation_to_product_end' ) ) {
	function sportexx_add_animation_to_product_end() {
		echo '</div>';
	}
}

if( ! function_exists( 'sportexx_update_cart_btn' ) ) {
	function sportexx_update_cart_btn() {
		echo '<input type="submit" class="button update-cart-button" name="update_cart" value="' . __( 'Update Cart', 'sportexx' ) . '" />';
	}
}

if( ! function_exists( 'sportexx_cart_collaterals' ) ) {
	function sportexx_cart_collaterals() {
		?>
		<div class="cart-collaterals">
			<?php do_action( 'sportexx_cart_collaterals' ); ?>
		</div>
		<?php
	}
}
