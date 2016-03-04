<?php
if ( !function_exists( 'shortcode_vc_image_card' ) ):

function shortcode_vc_product_image_card( $atts, $content = null ){

	$defaults = array(
		'product_id'	=> '',
		'main_image'	=> '',
		'side_image'	=> '',
		'button_link'	=> '',
		'button_text'	=> '',
		'color'			=> '',
		'bg_color'		=> '',
		'el_class'		=> '',
    );

    $atts = shortcode_atts( $defaults , $atts );

	extract( $atts );

    $caption = '';
    if( !empty( $content ) ) {
		$caption = wpb_js_remove_wpautop( $content, true );
	}

	$args = array_merge( $atts, array( 'caption' => $caption ) );

    $html = '';
    if( function_exists( 'sportexx_display_product_image_card' ) ) {
		ob_start();
		sportexx_display_product_image_card( $args );
		$html = ob_get_clean();
    }

    return $html;
}

add_shortcode( 'sportexx_product_image_card' , 'shortcode_vc_product_image_card' );

endif;