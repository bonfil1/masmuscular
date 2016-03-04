<?php
/**
 * General functions that are applied on use with WPML plugin
 *
 * @package sportexx
 */

if ( ! function_exists( 'sportexx_style_icl_languages_dropdown' ) ) {
	/**
	 * Converts WPML langauges dropdown into bootstrap compatible
	 * 
	 */
	function sportexx_style_icl_languages_dropdown( $items, $args ) {
		$items = str_replace( 'menu-item-language-current', 'menu-item-language-current dropdown', $items );
		$items = str_replace( '<a href="#" onclick="return false">', '<a href="#" data-toggle="dropdown" onclick="return false">', $items );
		$items = str_replace( 'submenu-languages', 'submenu-languages dropdown-menu', $items );
		return $items;
	}
}