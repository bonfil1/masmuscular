<?php

if ( !function_exists( 'shortcode_vc_brands_carousel' ) ):

function shortcode_vc_brands_carousel( $atts, $content = null ){

	$defaults = array(
		'title' 			=> '',
	    'limit' 			=> '12',
	    'has_no_products'	=> false,
	    'orderby' 			=> 'date',
	    'order' 			=> 'desc',
	    'el_class' 			=> '',
    );

	$atts = shortcode_atts( $defaults , $atts );

	extract( $atts );

	$html = '';
    if( function_exists( 'sportexx_brands_carousel' ) ) {
		ob_start();
		sportexx_brands_carousel( $title, $limit, $has_no_products, $orderby, $order );
		$html = ob_get_clean();
    }

	return $html;

}

add_shortcode( 'sportexx_brands_carousel' , 'shortcode_vc_brands_carousel' );

endif;