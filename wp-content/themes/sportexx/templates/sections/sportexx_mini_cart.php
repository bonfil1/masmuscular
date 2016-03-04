<?php if( apply_filters( 'sportexx_is_catalog_mode_disabled', TRUE ) ) : ?>
<div id="mini-cart">
	<div class="dropdown dropdown-cart">
		<?php 
			$data_hover_attr = '';
			if( apply_filters( 'sportexx_top_cart_dropdown_trigger', 'click' ) === 'hover' ) {
				$data_hover_attr = 'data-hover="dropdown"';
			}
		?>
		<a href="#dropdown-menu-cart" class="dropdown-trigger-cart dropdown-toggle" data-toggle="dropdown" <?php echo $data_hover_attr; ?>><?php echo apply_filters( 'sportexx_top_cart_text', __( 'Cart/', 'sportexx' ) ); ?><span class="price"><?php echo WC()->cart->get_cart_subtotal(); ?></span></a>
		<ul class="dropdown-menu dropdown-menu-cart <?php echo esc_attr( apply_filters( 'sportexx_top_cart_dropdown_animation', 'animated fadeInUp' ) ); ?>">
			<li>
			<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>
			
				<div class="cart-item product-summary">
					<p class="product-report"><?php echo sportexx_mini_cart_report(); ?></p>
					<div class="cart-products">
						
						<?php
						foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
							$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

							if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

								$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
								$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
								$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
								?>
						
						<div class="basket-item product-item inner-bottom-xs">
							<div class="row">
								<div class="col-xs-5">
									<div class="image">
										<?php if ( ! $_product->is_visible() ) {
											echo str_replace( array( 'http:', 'https:' ), '', $thumbnail );
										} else {
											echo '<a href="' . esc_url( $_product->get_permalink( $cart_item ) ) . '">' . str_replace( array( 'http:', 'https:' ), '', $thumbnail ) . '</a>';
										} ?>
									</div>
								</div>
								<div class="col-xs-7">
									<h5 class="product-title">
										<?php if ( ! $_product->is_visible() ) {
											echo $product_name;
										} else {
											echo '<a href="' . esc_url( $_product->get_permalink( $cart_item ) ) . '">' . $product_name . '</a>';
										} ?>
									</h5>
									<div class="price"><span class="amount"><?php echo $product_price; ?></span></div>
									<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<div class="product-count">' . sprintf( __( 'QTY : %s', 'sportexx' ), $cart_item['quantity'] ) . '</div>', $cart_item, $cart_item_key ); ?>
									<?php echo WC()->cart->get_item_data( $cart_item ); ?>
								</div>
							</div>
							<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'sportexx' ) ), $cart_item_key ); ?>
						</div>

						<?php
							}
						}
					?>
						<div class="cart-actions clearfix">
							<a href="<?php echo WC()->cart->get_cart_url(); ?>" class="btn btn-default col-xs-6 btn-cart-view pull-left flip"><?php echo __( 'View Cart', 'sportexx' ); ?></a>
							<a href="<?php echo WC()->cart->get_checkout_url(); ?>" class="btn btn-primary col-xs-6 btn-cart-checkout pull-right flip"><?php echo __( 'Checkout', 'sportexx' ); ?></a>
						</div>
					</div><!-- /.cart-products -->
				</div>
				<div class="clearfix"></div>

			<?php else : ?>
				
				<div class="alert alert-warning"><?php _e( 'No products in the cart.', 'sportexx' ); ?></div>
			
			<?php endif; ?>
			</li>
		</ul><!-- /.dropdown-menu-cart -->
	</div>
</div><!-- /#-mini-cart -->
<?php else : ?>
	<div id="mini-cart">
		<div class="dropdown dropdown-cart">
			<span class="dropdown-trigger-cart dropdown-toggle">&nbsp;</a>
		</div>
	</div>
<?php endif; ?>