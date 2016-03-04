<?php
if ( !function_exists( 'shortcode_vc_product_tabs' ) ):

function shortcode_vc_product_tabs( $atts, $content = null ){

	$defaults = array(
		'tab_title_1'		=> '',
		'tab_content_1'		=> '',
		'tab_title_2'		=> '',
		'tab_content_2'		=> '',
		'tab_title_3'		=> '',
		'tab_content_3'		=> '',
		'style'				=> '',
    );

    $atts = shortcode_atts( $defaults , $atts );

	extract( $atts );

	$tabs = array(
		array(
			'shortcode'		=> $tab_content_1,
			'title'			=> $tab_title_1,
		),
		array(
			'shortcode'		=> $tab_content_2,
			'title'			=> $tab_title_2,
		),
		array(
			'shortcode'		=> $tab_content_3,
			'title'			=> $tab_title_3,
		),
	);

    $html = '';
    if( function_exists( 'sportexx_homepage_tabs' ) ) {
		ob_start();
		sportexx_homepage_tabs( $tabs, $style );
		$html = ob_get_clean();
    }

    return $html;
}

add_shortcode( 'sportexx_product_tabs' , 'shortcode_vc_product_tabs' );

endif;