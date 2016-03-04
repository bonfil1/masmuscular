<?php
if ( !function_exists( 'shortcode_vc_recent_posts' ) ):

function shortcode_vc_recent_posts( $atts, $content = null ){

	$defaults = array(
		'title'				 => '',
		'limit'				 => '',
		'display'			 => '',
		'el_class'			 => '',
    );

    $atts = shortcode_atts( $defaults , $atts );

	extract( $atts );

    $html = '';
    if( function_exists( 'sportexx_blog_posts_carousel' ) ) {
		ob_start();
		sportexx_blog_posts_carousel( $title, $display, $limit );
		$html = ob_get_clean();
    }

    return $html;
}

add_shortcode( 'sportexx_recent_posts' , 'shortcode_vc_recent_posts' );

endif;