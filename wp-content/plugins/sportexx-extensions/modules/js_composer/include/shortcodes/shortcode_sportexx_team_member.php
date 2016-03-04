<?php
if ( !function_exists( 'shortcode_vc_team_member' ) ):

function shortcode_vc_team_member( $atts, $content = null ){

	$defaults = array(
		'id' => '',
    );

    $atts = shortcode_atts( $defaults , $atts );

	extract( $atts );

    $html = '';
    if( function_exists( 'sportexx_display_team_member' ) ) {
		ob_start();
		sportexx_display_team_member( $id );
		$html = ob_get_clean();
    }

    return $html;
}

add_shortcode( 'sportexx_team_member' , 'shortcode_vc_team_member' );

endif;