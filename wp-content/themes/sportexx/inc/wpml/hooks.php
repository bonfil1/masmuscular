<?php
/**
 * Hooks for WPML compatibility
 *
 * @package sportexx
 */

add_filter( 'wp_nav_menu_items', 'sportexx_style_icl_languages_dropdown', PHP_INT_MAX, 2 );