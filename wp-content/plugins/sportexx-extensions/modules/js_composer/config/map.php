<?php
/**
 * WPBakery Visual Composer Shortcodes settings
 *
 * @package Sportexx/VCExtensions
 *
 */

if ( function_exists( 'vc_map' ) ) :

	#-----------------------------------------------------------------
	# Sportexx Banner Element
	#-----------------------------------------------------------------
	vc_map(	
		array(
			'name' 			=> __( 'Banner', 'sportexx-extensions' ),
			'base' 			=> 'sportexx_banner',
			'description' 	=> __( 'Add a banner to your page.', 'sportexx-extensions' ),
			'class'			=> '',
			'controls' 		=> 'full', 
			'icon' 			=> '',
			'category' 		=> __( 'Sportexx Elements', 'sportexx-extensions' ),
		   	'params' 		=> array(
		      	array(
					 'type' 		=> 'textarea_html',
			         'heading' 		=> __( 'Caption', 'sportexx-extensions' ),
			         'param_name' 	=> 'content',
			         'description' 	=> __( 'Enter banner caption', 'sportexx-extensions' ),
			         'holder'		=> 'div',
		      	),

		      	array(
      				'type'			=> 'textfield',
      				'heading'		=> __( 'Height', 'sportexx-extensions' ),
      				'param_name'	=> 'height',
      				'description'	=> __( 'Height of banner in pixels', 'sportexx-extensions' )
  				),

				array(
		      		'type' 			=> 'dropdown',
		      		'heading' 		=> __( 'Banner Text Position', 'sportexx-extensions' ),
		      		'param_name' 	=> 'banner_text_position',
		      		'value' 		=> array(
						__( 'Select', 'sportexx-extensions' ) => '',
						__( 'Left', 'sportexx-extensions' )	=> 'text-left',
						__( 'Right', 'sportexx-extensions' )   => 'text-right',
						__( 'Center', 'sportexx-extensions' )  => 'text-center',
					),
	      		),

	      		array(
	      			'type'			=> 'checkbox',
	      			'heading'		=> __( 'Wrap inside a container', 'sportexx-extensions' ),
	      			'param_name'	=> 'wrap_container',
	      			'value'			=> array( 
	      				__( 'Yes', 'sportexx-extensions' ) 	=> '1'
      				),
      			),

      			array(
					'type' 			=> 'attach_image',
		         	'heading' 		=> __( 'Banner Image', 'sportexx-extensions' ),
		         	'param_name' 	=> 'banner_image',
		      	),

		      	array(
		      		'type'			=> 'textfield',
		      		'heading'		=> __( 'Background Position', 'sportexx-extensions' ),
		      		'param_name'	=> 'banner_image_bg_pos',
		      		'description'	=> __( 'Background Position of banner image. Applicable only if banner image is added', 'sportexx-extensions' ),
	      		),

  				array(
      				'type'			=> 'colorpicker',
      				'heading'		=> __( 'Background Color', 'sportexx-extensions' ),
      				'param_name'	=> 'background_color',
      				'description'	=> __( 'Background color of banner', 'sportexx-extensions' )
  				),

  				array(
      				'type'			=> 'textfield',
      				'heading'		=> __( 'Background Size', 'sportexx-extensions' ),
      				'param_name'	=> 'background_size',
      				'description'	=> __( 'Background size attribute of banner image', 'sportexx-extensions' )
  				),

  				array(
      				'type'			=> 'textfield',
      				'heading'		=> __( 'Background Repeat', 'sportexx-extensions' ),
      				'param_name'	=> 'background_repeat',
      				'description'	=> __( 'Background repeat of banner image', 'sportexx-extensions' )
  				),

  				array(
      				'type'			=> 'colorpicker',
      				'heading'		=> __( 'Color', 'sportexx-extensions' ),
      				'param_name'	=> 'color',
      				'description'	=> __( 'Text color of Banner', 'sportexx-extensions' )
  				),

  				array(
					 'type' 		=> 'textfield',
			         'heading' 		=> __( 'Banner Link', 'sportexx-extensions' ),
			         'param_name' 	=> 'banner_link',
			         'description' 	=> __( 'Link to banner.', 'sportexx-extensions' ),
			         'value' 		=> ''
		      	),
		      	
		      	array(
		      		'type' 			=> 'dropdown',
		      		'heading' 		=> __( 'On Click', 'sportexx-extensions' ),
		      		'param_name' 	=> 'banner_link_target',
		      		'value' 		=> array(
						__( 'Select', 'sportexx-extensions' ) => '',
						__( 'Open in same page', 'sportexx-extensions' ) 	=> '_self',
						__( 'Open in new page', 'sportexx-extensions' )   => '_blank'
					),
	      		),

				array(
					'type' 			=> 'textfield',
		         	'class' 		=> '',
		         	'heading' 		=> __( 'Caption Extra Class', 'sportexx-extensions' ),
		         	'param_name' 	=> 'banner_text_el_class',
		         	'description' 	=> __( 'Add your extra classes here for the caption.', 'sportexx-extensions' )
		      	),

		      	array(
					'type' 			=> 'textfield',
		         	'class' 		=> '',
		         	'heading' 		=> __( 'Extra Class', 'sportexx-extensions' ),
		         	'param_name' 	=> 'el_class',
		         	'description' 	=> __( 'Add your extra classes here.', 'sportexx-extensions' )
		      	),
		   	)
		) 
	);

	#-----------------------------------------------------------------
	# Sportexx Blog Recent Posts Element
	#-----------------------------------------------------------------
	vc_map(	
		array(
			'name' => __( 'Blog Recent Posts Widget', 'sportexx-extensions' ),
			'base' => 'sportexx_recent_posts',
			'description' => __( 'Add blog recent posts widget to your page.', 'sportexx-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon' => '',
			'category' => __( 'Sportexx Elements', 'sportexx-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
			        'heading' => __( 'Title', 'sportexx-extensions' ),
			        'param_name' => 'title',
			        'holder' => 'div'
		      	),
				array(
					'type' => 'textfield',
			        'heading' => __( 'Limit', 'sportexx-extensions' ),
			        'param_name' => 'limit',
			        'holder' => 'div'
		      	),
		      	array(
		      		'type' => 'dropdown',
		      		'heading' => __( 'Display', 'sportexx-extensions' ),
		      		'param_name' => 'display',
		      		'value' => array(
						__( 'Select', 'sportexx-extensions' ) => '',
						__( 'List', 'sportexx-extensions' ) => 'list',
						__( 'Grid', 'sportexx-extensions' ) => 'grid',
					),
	      		),
		      	array(
					'type' => 'textfield',
		         	'class' => '',
		         	'heading' => __( 'Extra Class', 'sportexx-extensions' ),
		         	'param_name' => 'el_class',
		         	'description' => __( 'Add your extra classes here.', 'sportexx-extensions' )
		      	)
			)
		)
	);

	#-----------------------------------------------------------------
	# Sportexx Product Tabs Element
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name'			=> __( 'Product Tabs', 'sportexx-extensions' ),
			'base'  		=> 'sportexx_product_tabs',
			'description'	=> __( 'Add Product Tabs to your page.', 'sportexx-extensions' ),
			'category'		=> __( 'Sportexx Elements', 'sportexx-extensions' ),
			'icon' 			=> '',
			'params' 		=> array(
				array(
					'type'			=> 'textfield',
					'heading'		=> __('Tab #1 title', 'sportexx-extensions' ),
					'param_name'	=> 'tab_title_1',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> __( 'Tab #1 Content, Show :', 'sportexx-extensions' ),
					'param_name'	=> 'tab_content_1',
					'value'			=> array(
						__( 'Select', 'sportexx-extensions' )				 	=> '',
						__( 'Featured Products', 'sportexx-extensions' )		=> 'featured_products' ,
						__( 'On Sale Products', 'sportexx-extensions' )			=> 'sale_products' 	,
						__( 'Top Rated Products', 'sportexx-extensions' )		=> 'top_rated_products' ,
						__( 'Recent Products', 'sportexx-extensions' )			=> 'recent_products' 	,
						__( 'Best Selling Products', 'sportexx-extensions' )	=> 'best_selling_products',
					),
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> __('Tab #2 title', 'sportexx-extensions' ),
					'param_name'	=> 'tab_title_2',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> __( 'Tab #2 Content, Show :', 'sportexx-extensions' ),
					'param_name'	=> 'tab_content_2',
					'value'			=> array(
						__( 'Select', 'sportexx-extensions' ) 					=> '',
						__( 'Featured Products', 'sportexx-extensions' )		=> 'featured_products' ,
						__( 'On Sale Products', 'sportexx-extensions' )			=> 'sale_products' 	,
						__( 'Top Rated Products', 'sportexx-extensions' )		=> 'top_rated_products' ,
						__( 'Recent Products', 'sportexx-extensions' )			=> 'recent_products' 	,
						__( 'Best Selling Products', 'sportexx-extensions' )	=> 'best_selling_products',
					),
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> __('Tab #3 title', 'sportexx-extensions' ),
					'param_name'	=> 'tab_title_3',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> __( 'Tab #3 Content, Show :', 'sportexx-extensions' ),
					'param_name'	=> 'tab_content_3',
					'value'			=> array(
						__( 'Select', 'sportexx-extensions' ) 					=> '',
						__( 'Featured Products', 'sportexx-extensions' )		=> 'featured_products' ,
						__( 'On Sale Products', 'sportexx-extensions' )			=> 'sale_products' 	,
						__( 'Top Rated Products', 'sportexx-extensions' )		=> 'top_rated_products' ,
						__( 'Recent Products', 'sportexx-extensions' )			=> 'recent_products' 	,
						__( 'Best Selling Products', 'sportexx-extensions' )	=> 'best_selling_products',
					),
				),
				array(
		      		'type' => 'dropdown',
		      		'heading' => __( 'Style', 'sportexx-extensions' ),
		      		'param_name' => 'style',
		      		'value' => array(
						__( 'Select', 'sportexx-extensions' ) => '',
						__( 'Style 1', 'sportexx-extensions' ) => '',
						__( 'Style 2', 'sportexx-extensions' ) => 'home-tabs-alt',
					),
	      		),
			),
		)
	);

	#-----------------------------------------------------------------
	# Sportexx Brands Carousel Element
	#-----------------------------------------------------------------
	vc_map(	
		array(
			'name' => __( 'Brands Carousel', 'sportexx-extensions' ),
			'base' => 'sportexx_brands_carousel',
			'description' => __( 'Add a brands carousel to your page.', 'sportexx-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon' => '',
			'category' => __( 'Sportexx Elements', 'sportexx-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
			        'heading' => __( 'Enter Carousel title', 'sportexx-extensions' ),
			        'param_name' => 'title',
			        'holder' => 'div'
		      	),
				array(
					'type' => 'textfield',
			        'heading' => __( 'Number of Brands to display', 'sportexx-extensions' ),
			        'param_name' => 'limit',
			        'holder' => 'div'
		      	),
		      	array(
					'type' => 'checkbox',
					'param_name' => 'has_no_products',
					'heading' => __( 'Show only has products', 'sportexx-extensions' ),
					'description' => __( 'Show only if products are available.', 'sportexx-extensions' ),
					'value' => array( __( 'Allow', 'sportexx-extensions' ) => 'false' )
				),
		      	array(
					'type' => 'textfield',
			        'heading' => __( 'Order by', 'sportexx-extensions' ),
			        'param_name' => 'orderby',
			        'description' => __( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'sportexx-extensions' ),
			        'value' => 'date',

		      	),

		      	array(
			 	   	'type' => 'textfield',
			        'heading' => __( 'Order', 'sportexx-extensions' ),
			        'param_name' => 'order',
			        'description' => __( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'sportexx-extensions' ),
			        'value' => 'DESC',
		      	),
		      	array(
					'type' => 'textfield',
		         	'class' => '',
		         	'heading' => __( 'Extra Class', 'sportexx-extensions' ),
		         	'param_name' => 'el_class',
		         	'description' => __( 'Add your extra classes here.', 'sportexx-extensions' )
		      	),
			)
		)
	);

	#-----------------------------------------------------------------
	# Sportexx Title Element
	#-----------------------------------------------------------------
	vc_map(	
		array(
			'name' => __( 'Title', 'sportexx-extensions' ),
			'base' => 'sportexx_title',
			'description' => __( 'Add a Title to your page with Description.', 'sportexx-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon' => '',
			'category' => __( 'Sportexx Elements', 'sportexx-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
			        'heading' => __( 'Title', 'sportexx-extensions' ),
			        'param_name' => 'title',
			        'description' => __( 'Enter title', 'sportexx-extensions' ),
			        'holder' => 'div'
		      	),
		      	array(
					'type' => 'checkbox',
					'param_name' => 'is_title_link',
					'heading' => 'Enable Link for Title', 'sportexx-extensions',
					'description' => 'Select checkbox to include title link.', 'sportexx-extensions',
					'value' => array( __( 'Allow', 'sportexx-extensions' ) => 'false' )
				),
				array(
					'type' => 'textfield',
			        'heading' => __( 'Title Link', 'sportexx-extensions' ),
			        'param_name' => 'title_link',
			        'description' => __( 'Enter link for title or leave empty', 'sportexx-extensions' ),
			        'holder' => 'div'
		      	),
		      	array(
					'type' => 'textarea',
			        'heading' => __( 'Description', 'sportexx-extensions' ),
			        'param_name' => 'desc',
			        'description' => __( 'Enter description', 'sportexx-extensions' ),
			        'holder' => 'div'
		      	),
		      	array(
					'type' => 'textfield',
			        'heading' => __( 'Description Class', 'sportexx-extensions' ),
			        'param_name' => 'desc_class',
			        'description' => __( 'Enter description class or leave empty', 'sportexx-extensions' ),
			        'holder' => 'div'
		      	),
		      	array(
		      		'type' => 'dropdown',
		      		'heading' => __( 'Text Position', 'sportexx-extensions' ),
		      		'param_name' => 'text_position',
		      		'value' => array(
						__( 'Select', 'sportexx-extensions' ) => '',
						__( 'Left', 'sportexx-extensions' ) => 'text-left',
						__( 'Right', 'sportexx-extensions' )   => 'text-right',
						__( 'Center', 'sportexx-extensions' )   => 'text-center',
					),
	      		),
		      	array(
		      		'type' => 'dropdown',
		      		'heading' => __( 'Heading Size', 'sportexx-extensions' ),
		      		'param_name' => 'heading_size',
		      		'description' => __( 'Select title heading size', 'sportexx-extensions' ),
		      		'value' => array(
						__( 'Select', 'sportexx-extensions' ) => '',
						__( 'Heading 1', 'sportexx-extensions' ) => 'h1',
						__( 'Heading 2', 'sportexx-extensions' ) => 'h2',
						__( 'Heading 3', 'sportexx-extensions' ) => 'h3',
						__( 'Heading 4', 'sportexx-extensions' ) => 'h4',
						__( 'Heading 5', 'sportexx-extensions' ) => 'h5',
						__( 'Heading 6', 'sportexx-extensions' ) => 'h6',
					),
	      		),
		      	array(
					'type' => 'textfield',
		         	'class' => '',
		         	'heading' => __( 'Extra Class', 'sportexx-extensions' ),
		         	'param_name' => 'el_class',
		         	'description' => __( 'Add your extra classes here.', 'sportexx-extensions')
		      	)
			)
		)
	);

	#-----------------------------------------------------------------
	# Sportexx Team Member Element
	#-----------------------------------------------------------------
	
	$team_member_options = array(
		__( 'Choose', 'sportexx-extensions' ) => ''
	);
	
	if( post_type_exists( 'team-member' ) ) :
		$args = array(
			'posts_per_page'	=> -1,
			'orderby'			=> 'id',
			'post_type'			=> 'team-member',
		);
		$team_members = get_posts( $args );
		if( !empty( $team_members ) ) :
			foreach( $team_members as $team_member ) :
				$team_member_options[$team_member->ID.' : '.get_the_title( $team_member->ID )] = $team_member->ID;
			endforeach;
		endif;
	endif;

	vc_map(	
		array(
			'name' 			=> __( 'Team Member', 'sportexx-extensions' ),
			'base' 			=> 'sportexx_team_member',
			'description' 	=> __( 'Add Team Member to your page.', 'sportexx-extensions' ),
			'class'			=> '',
			'controls' 		=> 'full',
			'icon' 			=> '',
			'category' 		=> __( 'Sportexx Elements', 'sportexx-extensions' ),
			'params' 		=> array(
		      	array(
					'type' 			=> 'dropdown',
			        'heading' 		=> __( 'Choose a Team Member', 'sportexx-extensions' ),
			        'param_name' 	=> 'id',
			        'value' 		=> $team_member_options,
			        'placeholder'	=> 'div'
		      	),
			)
		)
	);

	#-----------------------------------------------------------------
	# Sportexx Product Card
	#-----------------------------------------------------------------

	vc_map(	
		array(
			'name' => __( 'Product Card', 'sportexx-extensions' ),
			'base' => 'sportexx_product_card',
			'description' => __( 'Add a Product Card to your page.', 'sportexx-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon' => '',
			'category' => __( 'Sportexx Elements', 'sportexx-extensions' ),
			'params' => array(
				array(
					'type' 			=> 'textfield',
			        'heading' 		=> __( 'Enter Product ID', 'sportexx-extensions' ),
			        'param_name' 	=> 'product_id',
			        'value' 		=> '',
		      	),

		      	array(
					'type' 		=> 'textarea_html',
					'heading' 		=> __( 'Card Title', 'sportexx-extensions' ),
					'param_name' 	=> 'content',
					'description' 	=> __( 'The card title will appear at the top of the card', 'sportexx-extensions' ),
					'holder'		=> 'div',
				),

				array(
					'type' 		=> 'textfield',
					'heading' 		=> __( 'Button Link', 'sportexx-extensions' ),
					'param_name' 	=> 'button_link',
					'description' 	=> __( 'Link for button.', 'sportexx-extensions' ),
					'value' 		=> ''
				),
				
				array(
					'type' 		=> 'textfield',
					'heading' 		=> __( 'Button Text', 'sportexx-extensions' ),
					'param_name' 	=> 'button_text',
					'description' 	=> __( 'Text for button.', 'sportexx-extensions' ),
					'value' 		=> ''
				),

				array(
					'type'			=> 'colorpicker',
					'heading'		=> __( 'Text Color', 'sportexx-extensions' ),
					'param_name'	=> 'color',
					'description'	=> __( 'Color of content', 'sportexx-extensions' )
				),
				
				array(
					'type'			=> 'colorpicker',
					'heading'		=> __( 'Background Color', 'sportexx-extensions' ),
					'param_name'	=> 'background_color',
					'description'	=> __( 'Background color of content', 'sportexx-extensions' )
				),

				array(
					'type' 			=> 'textfield',
					'class' 		=> '',
					'heading' 		=> __( 'Extra Class', 'sportexx-extensions' ),
					'param_name' 	=> 'el_class',
					'description' 	=> __( 'Add your extra classes here.', 'sportexx-extensions' )
				)
			)
		)
	);

	#-----------------------------------------------------------------
	# Sportexx Image Card
	#-----------------------------------------------------------------
	vc_map(	
		array(
			'name' => __( 'Image Card', 'sportexx-extensions' ),
			'base' => 'sportexx_image_card',
			'description' => __( 'Add a Image Card to your page.', 'sportexx-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon' => '',
			'category' => __( 'Sportexx Elements', 'sportexx-extensions' ),
			'params' => array(
				array(
					'type' 			=> 'attach_image',
					'heading' 		=> __( 'Image', 'sportexx-extensions' ),
					'param_name' 	=> 'background_image',
				),

				array(
					'type'			=> 'colorpicker',
					'heading'		=> __( 'Text Color', 'sportexx-extensions' ),
					'param_name'	=> 'color',
					'description'	=> __( 'Text color', 'sportexx-extensions' ),
				),

				array(
					'type'			=> 'colorpicker',
					'heading'		=> __( 'Background Color', 'sportexx-extensions' ),
					'param_name'	=> 'background_color',
					'description'	=> __( 'Background color', 'sportexx-extensions' )
				),

				array(
					'type' 		=> 'textarea_html',
					'heading' 		=> __( 'Card Title', 'sportexx-extensions' ),
					'param_name' 	=> 'content',
					'description' 	=> __( 'The card title will appear at the top of the card', 'sportexx-extensions' ),
					'holder'		=> 'div',
				),
				
				array(
					'type' 		=> 'textfield',
					'heading' 		=> __( 'Button Link', 'sportexx-extensions' ),
					'param_name' 	=> 'button_link',
					'description' 	=> __( 'Link for button.', 'sportexx-extensions' ),
					'value' 		=> ''
				),
				
				array(
					'type' 		=> 'textfield',
					'heading' 		=> __( 'Button Text', 'sportexx-extensions' ),
					'param_name' 	=> 'button_text',
					'description' 	=> __( 'Text for button.', 'sportexx-extensions' ),
					'value' 		=> ''
				),

				array(
					'type' 			=> 'textfield',
					'class' 		=> '',
					'heading' 		=> __( 'Extra Class', 'sportexx-extensions' ),
					'param_name' 	=> 'el_class',
					'description' 	=> __( 'Add your extra classes here.', 'sportexx-extensions' )
				)
			)
		)
	);

	vc_map(	
		array(
			'name' => __( 'Product & Image Card', 'sportexx-extensions' ),
			'base' => 'sportexx_product_image_card',
			'description' => __( 'Add a Product-cum-image Card to your page.', 'sportexx-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon' => '',
			'category' => __( 'Sportexx Elements', 'sportexx-extensions' ),
			'params' => array(
				array(
					'type' 			=> 'textfield',
			        'heading' 		=> __( 'Enter Product ID', 'sportexx-extensions' ),
			        'param_name' 	=> 'product_id',
			        'value' 		=> '',
		      	),

		      	array(
					'type' 			=> 'attach_image',
					'heading' 		=> __( 'Main Image', 'sportexx-extensions' ),
					'param_name' 	=> 'main_image',
				),

				array(
					'type' 			=> 'attach_image',
					'heading' 		=> __( 'Side Image', 'sportexx-extensions' ),
					'param_name' 	=> 'side_image',
				),

		      	array(
					'type' 		=> 'textarea_html',
					'heading' 		=> __( 'Card Title', 'sportexx-extensions' ),
					'param_name' 	=> 'content',
					'description' 	=> __( 'The card title will appear at the top of the card', 'sportexx-extensions' ),
					'holder'		=> 'div',
				),

				array(
					'type' 		=> 'textfield',
					'heading' 		=> __( 'Button Link', 'sportexx-extensions' ),
					'param_name' 	=> 'button_link',
					'description' 	=> __( 'Link for button.', 'sportexx-extensions' ),
					'value' 		=> ''
				),
				
				array(
					'type' 		=> 'textfield',
					'heading' 		=> __( 'Button Text', 'sportexx-extensions' ),
					'param_name' 	=> 'button_text',
					'description' 	=> __( 'Text for button.', 'sportexx-extensions' ),
					'value' 		=> ''
				),

				array(
					'type'			=> 'colorpicker',
					'heading'		=> __( 'Text Color', 'sportexx-extensions' ),
					'param_name'	=> 'color',
					'description'	=> __( 'Color of content', 'sportexx-extensions' )
				),
				
				array(
					'type'			=> 'colorpicker',
					'heading'		=> __( 'Background Color', 'sportexx-extensions' ),
					'param_name'	=> 'bg_color',
					'description'	=> __( 'Background color of content', 'sportexx-extensions' )
				),

				array(
					'type' 			=> 'textfield',
					'class' 		=> '',
					'heading' 		=> __( 'Extra Class', 'sportexx-extensions' ),
					'param_name' 	=> 'el_class',
					'description' 	=> __( 'Add your extra classes here.', 'sportexx-extensions' )
				)
			)
		)
	);

endif;