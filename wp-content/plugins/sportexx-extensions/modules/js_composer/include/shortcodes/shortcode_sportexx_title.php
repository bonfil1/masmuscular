<?php
if ( !function_exists( 'shortcode_sportexx_title' ) ):

function shortcode_sportexx_title( $atts, $content = null ){

	$defaults = array(
		'title' 		=> '',
		'is_title_link' => '',
		'title_link' 	=> '',
		'desc' 			=> '',
		'desc_class' 	=> '',
		'text_position' => '',
		'heading_size' 	=> '',
		'el_class' 		=> '',
    );

    $atts = shortcode_atts( $defaults , $atts );

	extract( $atts );

    $css_class = trim( 'vc-title ' . $text_position . ' ' . $el_class );

	$output = '';
	$output .= "\n\t" . '<div class="' . $css_class . '">';
	
	if( $is_title_link == true ) {
		$output .= "\n\t\t" . '<' . $heading_size . '><a href="' .$title_link. '">'.$title.'</a></' . $heading_size . '>';
	} else {
		$output .= "\n\t\t" . '<' . $heading_size . '>'.$title.'</' . $heading_size . '>';
	}
	
	if( !empty($desc) ) {
		if( !empty($desc_class) ) {
			$output .= "\n\t\t" . '<p class="' . $desc_class . '"">'.$desc.'</p>';
		} else {
			$output .= "\n\t\t" . '<p>'.$desc.'</p>';
		}
	}
	
	$output .= "\n\t" . '</div>';

	return $output;
}

add_shortcode( 'sportexx_title' , 'shortcode_sportexx_title' );

endif;