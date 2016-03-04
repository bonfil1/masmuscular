<?php

if( ! function_exists( 'add_sportexx_vc_params' ) ) {
	/**
	 * Modified or added options for Visual Composer default elements
	 *
	 * @since 1.0.0
	 */
	function add_sportexx_vc_params() {

		$extra_params = array(
			array(
				'base' 		=>  'vc_row',
				'args' 		=> array(
					array(
						'type' 			=> 'dropdown',
						'heading'		=> __( 'CSS3 Animation', 'sportexx' ),
						'param_name'	=> 'row_animation',
						'description'	=> __( 'Choose the animation effect on the row when scrolled into view.', 'sportexx' ),
						'value'			=> array(
							__( 'No Animation', 'sportexx' ) 			=> 	'none',
				        	__( 'BounceIn', 'sportexx' ) 				=> 	'bounceIn',
				        	__( 'BounceInDown', 'sportexx' ) 			=> 	'bounceInDown',
				        	__( 'BounceInLeft', 'sportexx' ) 			=> 	'bounceInLeft',
				        	__( 'BounceInRight', 'sportexx' ) 			=> 	'bounceInRight',
				        	__( 'BounceInUp', 'sportexx' ) 				=> 	'bounceInUp',
							__( 'FadeIn', 'sportexx' ) 					=> 	'fadeIn',
							__( 'FadeInDown', 'sportexx' ) 				=> 	'fadeInDown',
							__( 'FadeInDown Big', 'sportexx' ) 			=> 	'fadeInDownBig',
							__( 'FadeInLeft', 'sportexx' ) 				=> 	'fadeInLeft',
							__( 'FadeInLeft Big', 'sportexx' ) 			=> 	'fadeInLeftBig',
							__( 'FadeInRight', 'sportexx' ) 			=> 	'fadeInRight',
							__( 'FadeInRight Big', 'sportexx' ) 		=> 	'fadeInRightBig',
							__( 'FadeInUp', 'sportexx' ) 				=> 	'fadeInUp',
							__( 'FadeInUp Big', 'sportexx' ) 			=> 	'fadeInUpBig',
							__( 'FlipInX', 'sportexx' ) 				=> 	'flipInX',
							__( 'FlipInY', 'sportexx' ) 				=> 	'flipInY',
							__( 'Light SpeedIn', 'sportexx' ) 			=> 	'lightSpeedIn',
							__( 'RotateIn', 'sportexx' ) 				=> 	'rotateIn',
							__( 'RotateInDown Left', 'sportexx' ) 		=> 	'rotateInDownLeft',
							__( 'RotateInDown Right', 'sportexx' ) 		=> 	'rotateInDownRight',
							__( 'RotateInUp Left', 'sportexx' ) 		=> 	'rotateInUpLeft',
							__( 'RotateInUp Right', 'sportexx' ) 		=> 	'rotateInUpRight',
							__( 'RoleIn', 'sportexx' ) 					=> 	'roleIn',
				        	__( 'ZoomIn', 'sportexx' ) 					=> 	'zoomIn',
							__( 'ZoomInDown', 'sportexx' ) 				=> 	'zoomInDown',
							__( 'ZoomInLeft', 'sportexx' ) 				=> 	'zoomInLeft',
							__( 'ZoomInRight', 'sportexx' ) 			=> 	'zoomInRight',
							__( 'ZoomInUp', 'sportexx' ) 				=> 	'zoomInUp',
						),
					),
				),
			)
		);
		
		foreach( $extra_params as $param ) {

			$base = $param['base'];
			$args = $param['args'];

			foreach( $args as $arg ) {
				vc_add_param( $base, $arg );	
			}

			vc_map_update( $base );	
		}
	}
}

if( ! function_exists( 'sportexx_apply_custom_css' ) ) {
	function sportexx_apply_custom_css( $css_classes, $base, $atts ) {
		if( $base == 'vc_row' ) {
			extract( shortcode_atts( array(
				'row_animation'		=> '',
			), $atts ) );

			if( ! empty( $row_animation ) && $row_animation != 'none' ) {
				$css_classes .= ' wow ' . $row_animation;
			}
		}

		return $css_classes;
	}
}