<?php
/**
 * Template functions used for the site footer.
 *
 * @package sportexx
 */

if( ! function_exists( 'sportexx_before_footer_wrapper_start' ) ) {
	/**
	 * Wraps Block Social
	 * @since 1.0.0
	 * @return void
	 */
	function sportexx_before_footer_wrapper_start() {
		?>
		<div class="block-social">
			<div class="container">
		<?php
	}
}

if( ! function_exists( 'sportexx_footer_form_newsletter' ) ) {
	/**
	 * Displays a newsletter signup form
	 * @since 1.0.0
	 * @return void
	 */
	function sportexx_footer_form_newsletter() {
		if ( shortcode_exists( 'mc4wp_form' ) ) {
			echo do_shortcode( '[mc4wp_form]' );
		}
	}
}

if( ! function_exists( 'sportexx_footer_social_icons' ) ) {
	/**
	 * Displays social icons on footer
	 * @since 1.0.0
	 * @return void
	 */
	function sportexx_footer_social_icons() {

		$social_icons_args = apply_filters( 'sportexx_footer_social_icons_args', array(
			array(
				'id'		=> 'facebook',
				'title'		=> __( 'Facebook', 'sportexx' ),
				'icon'		=> 'fa fa-facebook',
				'link'		=> '#'
			),
			array(
				'id'		=> 'twitter',
				'title'		=> __( 'Twitter', 'sportexx' ),
				'icon'		=> 'fa fa-twitter',
				'link'		=> '#'
			),
			array(
				'id'		=> 'vine',
				'title'		=> __( 'Vine', 'sportexx' ),
				'icon'		=> 'fa fa-vine',
				'link'		=> '#'
			),
			array(
				'id'		=> 'google-plus',
				'title'		=> __( 'Google Plus', 'sportexx' ),
				'icon'		=> 'fa fa-google-plus',
				'link'		=> '#'
			),
			array(
				'id'		=> 'pinterest',
				'title'		=> __( 'Pinterest', 'sportexx' ),
				'icon'		=> 'fa fa-pinterest',
				'link'		=> '#'
			),
			array(
				'id'		=> 'rss',
				'title'		=> __( 'RSS', 'sportexx' ),
				'icon'		=> 'fa fa-rss',
				'link'		=> get_bloginfo( 'rss2_url' ),
			),
		) );
		?>
		<ul class="list-unstyled list-social-icons">
		<?php  foreach( $social_icons_args as $social_icon ) : ?>
			<?php if( !empty( $social_icon['link'] ) ) : ?>
			<li><a class="<?php echo esc_attr( $social_icon['icon'] ); ?>" title="<?php echo esc_attr( $social_icon['title'] );?>" href="<?php echo esc_url( $social_icon['link'] ); ?>"></a></li>
			<?php endif; ?>
		<?php endforeach; ?>
		</ul><!-- /.list-social-icons -->
		<?php
	}
}

if( ! function_exists( 'sportexx_before_footer_wrapper_end' ) ) {
	/**
	 * Wraps Block Social
	 * @since 1.0.0
	 * @return void
	 */
	function sportexx_before_footer_wrapper_end() {
		?>
			</div><!-- /.container -->
		</div><!-- /.block-social -->
		<?php
	}
}

if( !function_exists( 'sportexx_footer_widgets' ) ) {
	/**
	 * Display the footer bottom widget regions
	 * @since  1.0.0
	 * @return  void
	 */
	function sportexx_footer_widgets() {
		?>
		<div class="footer-widgets inner-sm">
			<div class="container">
				
				<?php if ( is_active_sidebar( 'footer-widgets-1' ) ) : ?>
				<div class="row"><?php dynamic_sidebar( 'footer-widgets-1' ); ?></div>
				<?php endif; ?>
				
			</div>
		</div><!-- /.footer -widgets -->
		<?php
	}
}

if( ! function_exists( 'sportexx_after_footer_wrapper_start' ) ) {

	/**
	 * Wraps After Footer Functions
	 * @since 1.0.0
	 * @return void
	 */
	function sportexx_after_footer_wrapper_start() {
		?>
		<div class="site-info">
			<div class="container">
		<?php
	}

}

if( ! function_exists( 'sportexx_footer_copyright' ) ) {
	/**
	 * Display copyright content on footer
	 * @since  1.0.0
	 * @return void
	 */
	function sportexx_footer_copyright() {
		?>
		<div class="copyright pull-left flip">
			<?php echo apply_filters( 'sportexx_copyright_text', $content = '&copy; ' . date( 'Y' ). ' <a href="' . esc_url( home_url( '/' ) ) . '">' .  get_bloginfo( 'name' ) . '</a>' ); ?>
		</div>
		<?php
	}
}

if( ! function_exists( 'sportexx_footer_quick_links' ) ) {
	/**
	 * Displays Quick Links on footer
	 * @since 1.0.0
	 * @return void
	 */
	function sportexx_footer_quick_links() {
		wp_nav_menu( apply_filters( 'sportexx_footer_quick_links_args', array( 
			'theme_location'		=> 'footer-quick-links',
			'container'				=> FALSE,
			'menu_class'			=> 'quick-links pull-right flip',
			'depth'					=> 1,
			'fallback_cb'			=> FALSE
		) ) );
	}
}

if( ! function_exists( 'sportexx_after_footer_wrapper_end' ) ) {

	/**
	 * Wraps End After Footer Functions
	 * @since 1.0.0
	 * @return void
	 */
	function sportexx_after_footer_wrapper_end() {
		?>
			</div><!-- /.container -->
		</div><!-- /.site-info -->
		<?php
	}

}