<?php
/*
Plugin Name: Sportexx Extensions
Plugin URI: http://demo.transvelo.in/wp/sportexx/
Description: Extensions for Sportexx Wordpress Theme. Supplied as a separate plugin so that the customer does not find empty shortcodes on changing the theme.
Version: 1.0.10
Author: Transvelo
Author URI: http://transvelo.com/
*/

// don't load directly
if ( ! defined( 'ABSPATH' ) ) die( '-1' );

if( !class_exists( 'Sportexx_Extensions' ) ) :

class Sportexx_Extensions {

	public function __construct() {

		#-----------------------------------------------------------------
		# Theme Shortcodes
		#-----------------------------------------------------------------

		require_once WP_PLUGIN_DIR . '/sportexx-extensions/modules/theme-shortcodes/theme-shortcodes.php';

		#-----------------------------------------------------------------
		# Visual Composer Extensions
		#-----------------------------------------------------------------

		require_once WP_PLUGIN_DIR . '/sportexx-extensions/modules/js_composer/js_composer.php';

		#-----------------------------------------------------------------
		# Post Type Static Block
		#-----------------------------------------------------------------

		require_once WP_PLUGIN_DIR . '/sportexx-extensions/modules/post-type-static-block/post-type-static-block.php';
	}

}

new Sportexx_Extensions();

endif;

function sportexx_extensions_load_textdomain() {
	load_plugin_textdomain( 'sportexx-extensions', FALSE, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}