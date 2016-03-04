<?php
/**
 * Template functions used for the site header.
 *
 * @package sportexx
 */

if ( ! function_exists( 'sportexx_site_branding' ) ) {
	/**
	 * Display Site Branding
	 * @since  1.0.0
	 * @return void
	 */
	function sportexx_site_branding() {
		ob_start();
		if ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
			jetpack_the_site_logo();
		} else {
			sportexx_get_template( 'sections/sportexx-logo-svg.php' );
		}
		$site_logo = ob_get_clean();
		$site_logo = apply_filters( 'sportexx_site_logo', $site_logo );
		echo sprintf( '<a href="%s" rel="home" class="navbar-brand">%s</a>', esc_url( home_url( '/' ) ), $site_logo );
	}
}

if ( ! function_exists( 'sportexx_primary_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 * @since  1.0.0
	 * @return void
	 */
	function sportexx_primary_navigation() {
		?>
		<div class="container container-yamm">
			<nav id="site-navigation" class="main-navigation yamm" aria-label="<?php _e( 'Primary Navigation', 'sportexx' ); ?>">
				<div id="primary-nav-collapse" class="navbar-collapse collapse">
					<?php
						$navbar_menu_class = apply_filters( 'sportexx_primary_dropdown_style', 'navbar-nav-inverse' );
						wp_nav_menu( array(
							'menu'              => 'primary',
							'theme_location'    => 'primary',
							'depth'             => 2,
							'container'         => false,
							'menu_class'        => 'nav navbar-nav ' . $navbar_menu_class,
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker())
						);
					?>
					
					<?php 
						$header_style = sportexx_get_header_style();
						if( $header_style === 'header-alt' ) :
					?>
					<form class="navbar-form form-search navbar-right" role="search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
						<label class="sr-only" for="search-field"><?php _e( 'Type your Search', 'sportexx' ); ?></label>
                        <div class="form-group">
                            <input type="text" value="<?php echo get_search_query(); ?>" name="s" class="input-search form-control" placeholder="<?php echo __( 'Search', 'sportexx' ); ?>" autocomplete="off">
                        </div>
                        <button type="submit" class="btn btn-search"><i class="fa fa-search icon-search"></i></button>
                        <input type="hidden" name="post_type" value="product" />
                    </form>
                	<?php endif; ?>
				</div><!-- /.navbar-collapse -->
			</nav><!-- #site-navigation -->
		</div><!-- /.container -->
		<?php
	}
}

if ( ! function_exists( 'sportexx_secondary_navigation' ) ) {
	/**
	 * Display Secondary Navigation
	 * @since  1.0.0
	 * @return void
	 */
	function sportexx_secondary_navigation() {
		?>
		<nav class="secondary-navigation top-bar" aria-label="<?php _e( 'Secondary Navigation', 'sportexx' ); ?>">
			<div class="container">
				<?php
					wp_nav_menu(
						array(
							'theme_location'	=> 'topbar-left',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'			=> new wp_bootstrap_navwalker(),
							'container'			=> false,
							'menu_class'		=> 'switchers pull-left flip'
						)
					);
					wp_nav_menu(
						array(
							'theme_location'	=> 'topbar-right',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'			=> new wp_bootstrap_navwalker(),
							'container'			=> false,
							'menu_class'		=> 'quick-links pull-right flip'
						)
					);
				?>
			</div><!-- /.container -->
		</nav><!-- #site-navigation -->
		<?php
	}
}

if ( ! function_exists( 'sportexx_skip_links' ) ) {
	/**
	 * Skip links
	 * @since  1.4.1
	 * @return void
	 */
	function sportexx_skip_links() {
		?>
		<a class="skip-link screen-reader-text" href="#site-navigation"><?php _e( 'Skip to navigation', 'sportexx' ); ?></a>
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'sportexx' ); ?></a>
		<?php
	}
}

if( ! function_exists( 'sportexx_navbar' ) ) {
	/**
	 * Displays Navbar
	 * @since 1.0
	 * @return void
	 */
	function sportexx_navbar() {
		?>
		<div class="navbar">
		<?php
			/**
			 * @hooked sportexx_navbar_header - 10
			 * @hooked sportexx_primary_navigation - 20
			 */
			do_action( 'sportexx_navbar' );
		?>
		</div><!-- /.navbar -->
		<?php
	}
}

if( ! function_exists( 'sportexx_navbar_header' ) ) {
	/**
	 * Displays Navbar Header
	 * @since 1.0
	 * @return void
	 */
	function sportexx_navbar_header() {
		/**
		 * @hooked sportexx_secondary_navigation - 10
		 * @hooked sportexx_navbar_header_mast - 20
		 */
		do_action( 'sportexx_navbar_header' );
	}
}

if( ! function_exists( 'sportexx_navbar_header_mast' ) ) {
	/**
	 * Displays Navbar Header Mast
	 * @since 1.0
	 * @return void
	 */
	function sportexx_navbar_header_mast() {
		?>
		<div class="navbar-header-mast">
			<div class="container">
				<?php 
				/**
				 * @hooked sportexx_site_branding - 10
				 * @hooked sportexx_navbar_right - 20
				 * @hooked sportexx_navbar_collapse_toggle - 30
				 */
				do_action( 'sportexx_navbar_header_mast' );
				?>
			</div>
		</div><!-- /.navbar-header-mast -->
		<?php
	}
}

if( ! function_exists( 'sportexx_navbar_right' ) ) {
	/**
	 * Displays Navbar Right contents
	 * @since 1.0
	 * @return void
	 */
	function sportexx_navbar_right() {
		?>
		<div class="navbar-right flip">
			<div class="top-cart">
				<div class="top-cart-inner">
					<?php 
					/**
					 * @hooked sportexx_mini_cart
					 * @hooked sportexx_top_cart_separator
					 * @hooked sportexx_navbar_right_search
					 */
					do_action( 'sportexx_navbar_right' );
					?>
				</div>
			</div>
		</div>
		<?php
	}
}

if( ! function_exists( 'sportexx_mini_cart' ) ) {
	/**
	 * Displays Shopping Cart Info for header
	 * @since 1.0
	 * @return void
	 */
	function sportexx_mini_cart() {
		if( is_woocommerce_activated() ) {
			sportexx_get_template( 'sections/sportexx_mini_cart.php' );
		}
	}
}

if( ! function_exists( 'sportexx_top_cart_separator' ) ) {
	/**
	 * Adds a horizontal separator
	 * @since 1.0
	 * @return void
	 */
	function sportexx_top_cart_separator() {
		?>
		<hr class="top-cart-separator">
		<?php
	}

}

if( ! function_exists( 'sportexx_navbar_right_search' ) ) {
	/**
	 * Displays Search Form
	 * @since 1.0
	 * @return void
	 */
	function sportexx_navbar_right_search() {
		?>
		<form role="search" class="form-search clearfix" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
			<div class="input-group input-search-group">
				<label class="sr-only" for="search-field"><?php _e( 'Type your Search', 'sportexx' ); ?></label>
				<input id="search-field" value="<?php echo get_search_query(); ?>" name="s" type="text" class="input-search form-control" placeholder="<?php echo __( 'What are you looking for?', 'sportexx' ); ?>">
				<span class="input-group-btn">
					<button class="btn btn-search" type="submit"><i class="fa fa-search search-icon"></i><span class="sr-only"><?php echo __( 'Search', 'sportexx' ); ?></span></button>
				</span>
				<input type="hidden" name="post_type" value="product" />
			</div><!-- /input-group -->
		</form>
		<?php
	}
}

if( ! function_exists( 'sportexx_navbar_collapse_toggle' ) ) {
	/**
	 * Displays Navbar Collapse Toggle Button
	 * @since 1.0
	 * @return void
	 */
	function sportexx_navbar_collapse_toggle() {
		?>
		<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
			<span class="sr-only"><?php echo apply_filters( 'toggle_nav_text', __( 'Toggle navigation', 'sportexx' ) ); ?></span> 
			<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
		</button><!-- /.navbar-toggle -->
		<?php
	}
}

if( ! function_exists( 'sportexx_mini_cart_report' ) ) {
	/**
	 * Displays product report for mini cart
	 * @since 1.0
	 * @return void
	 */
	function sportexx_mini_cart_report() {
		
		$product_report = '';
		$items_in_cart = sizeof( WC()->cart->get_cart() );
		
		if ( $items_in_cart > 0 ) {
			$product_report = sprintf( _n( '%s item added to your cart', '%s items added to your cart', $items_in_cart, 'sportexx' ), $items_in_cart );
		} else {
			$product_report = __( 'There are no items in your cart', 'sportexx' );
		}
		
		return $product_report;
	}
}

if( ! function_exists( 'sportexx_header_class' ) ) {
	/**
	 * Displays the classes for header
	 * @since 1.0.0
	 *
	 * @param string|array $class One or more classes to add to the class list.
	 */
	function sportexx_header_class( $class = '' ) {
		echo 'class="' . join( ' ', sportexx_get_header_class( $class ) ) . '"';
	}
}

if( ! function_exists( 'sportexx_get_header_class' ) ) {
	/**
	 * Retrieve the classes for the header as an array.
	 * @since 1.0.0
	 *
	 * @param string|array $class One or more classes to add to the class list.
	 * @return array Array of classes.
	 */
	function sportexx_get_header_class( $class ) {

		$classes = array();
		
		if ( $class ) {
            if ( ! is_array( $class ) ) {
                $class = preg_split( '#\s+#', $class );
            }
            $classes = array_map( 'esc_attr', $class );
        }

        $classes[] = 'site-header';

        $classes[] = sportexx_get_header_style();

        $classes[] = sportexx_get_header_bg();

        $page_layout_args = sportexx_get_page_layout_args();

        if( ! empty( $page_layout_args['has_jumbotron'] ) && $page_layout_args['has_jumbotron'] ) {
        	$classes[] = 'has-jumbotron';
        }

        if( ! empty( $page_layout_args['header_classes'] ) ) {
        	$classes[] = $page_layout_args['header_classes'];
        }

        $classes = array_map( 'esc_attr', $classes );

        $classes = apply_filters( 'sportexx_header_class', $classes );

        return array_unique( $classes );
	}
}

if( ! function_exists( 'sportexx_get_header_style' ) ) {
	/**
	 * Returns style of header
	 * @since 1.0.0
	 */
	function sportexx_get_header_style() {
		return apply_filters( 'sportexx_header_style', 'header-1' );
	}
}

if( ! function_exists( 'sportexx_get_header_bg' ) ) {
	/**
	 * Returns style of header
	 * @since 1.0.0
	 */
	function sportexx_get_header_bg() {
		return apply_filters( 'sportexx_header_bg', 'default-bg' );
	}
}

if( ! function_exists( 'sportexx_add_data_hover_attribute' ) ) {
	function sportexx_add_data_hover_attribute( $atts, $item, $args, $depth ) {
		if( $depth === 0 ) {

			$dropdown_trigger = apply_filters( 'sportexx_' . $args->theme_location . '_dropdown_trigger', 'click', $args->theme_location );
			if( $dropdown_trigger == 'hover' ) {
				$atts['data-hover'] = 'dropdown';
				
				if( isset( $atts['data-toggle'] ) ) {
					unset( $atts['data-toggle'] );
				}
			}	
		}
		
		return $atts;
	}
}

if( ! function_exists( 'sportexx_animate_dropdown_menu' ) ) {
	function sportexx_animate_dropdown_menu( $dropdown_menu, $indent, $args ) {
		$dropdown_animation = apply_filters( 'sportexx_' . $args->theme_location . '_dropdown_animation', 'animated fadeInUp', $args->theme_location );
		$dropdown_menu = "\n$indent<ul role=\"menu\" class=\" dropdown-menu " . $dropdown_animation . "\">\n";
		return $dropdown_menu;
	}
}

if( ! function_exists( 'sportexx_site_favicon' ) ) {
	function sportexx_site_favicon() {
		$favicon_url = apply_filters( 'sportexx_site_favicon_url', get_stylesheet_directory_uri() . '/assets/images/favicon.png' );
		?>
		<link rel="shortcut icon" href="<?php echo esc_url( $favicon_url );?>">
		<?php
	}
}