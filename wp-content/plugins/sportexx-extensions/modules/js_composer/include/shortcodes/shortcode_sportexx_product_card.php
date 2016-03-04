<?php
if ( !function_exists( 'shortcode_vc_product_card' ) ):

function shortcode_vc_product_card( $atts, $content = null ){

	$defaults = array(
		'product_id'		=> '',
		'button_link'		=> '',
		'button_text'		=> '',
		'el_class'			=> ''
    );

    $atts = shortcode_atts( $defaults , $atts );

	extract( $atts );

    $caption = '';
    if( !empty( $content ) ) {
		$caption = wpb_js_remove_wpautop( $content, true );
	}

	$args = array(
		'caption'		=> $caption,
		'product_id'	=> $product_id,
		'btn_link'		=> $button_link,
		'btn_text'		=> $button_text,
		'el_class'		=> $el_class
	);
    
    $html = '';
    if( function_exists( 'sportexx_display_product_card' ) ) {
		ob_start();
		sportexx_display_product_card( $args );
		$html = ob_get_clean();
    }

    return $html;
}

add_shortcode( 'sportexx_product_card' , 'shortcode_vc_product_card' );

endif;