<?php

add_action( 'wp_loaded', 'add_sportexx_vc_params' );
add_action( 'admin_head', 'remove_vc_teaser' );

add_filter( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'sportexx_apply_custom_css', PHP_INT_MAX, 3 );