<?php
if ( !class_exists( 'ReduxFramework' ) ) {
    return;
}

if ( !class_exists( 'Sportexx_Options' ) ) {

	class Sportexx_Options {
		
		
        public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'load_config') );
		}

		public function load_config() {

            $entrance_animations = array(
                'none'              => __( 'No Animation', 'sportexx' ),
                'bounceIn'          => __( 'BounceIn', 'sportexx' ),
                'bounceInDown'      => __( 'BounceInDown', 'sportexx' ),
                'bounceInLeft'      => __( 'BounceInLeft', 'sportexx' ),
                'bounceInRight'     => __( 'BounceInRight', 'sportexx' ),
                'bounceInUp'        => __( 'BounceInUp', 'sportexx' ),
                'fadeIn'            => __( 'FadeIn', 'sportexx' ),
                'fadeInDown'        => __( 'FadeInDown', 'sportexx' ),
                'fadeInDownBig'     => __( 'FadeInDown Big', 'sportexx' ),
                'fadeInLeft'        => __( 'FadeInLeft', 'sportexx' ),
                'fadeInLeftBig'     => __( 'FadeInLeft Big', 'sportexx' ),
                'fadeInRight'       => __( 'FadeInRight', 'sportexx' ),
                'fadeInRightBig'    => __( 'FadeInRight Big', 'sportexx' ),
                'fadeInUp'          => __( 'FadeInUp', 'sportexx' ),
                'fadeInUpBig'       => __( 'FadeInUp Big', 'sportexx' ),
                'flipInX'           => __( 'FlipInX', 'sportexx' ),
                'flipInY'           => __( 'FlipInY', 'sportexx' ),
                'lightSpeedIn'      => __( 'LightSpeedIn', 'sportexx' ),
                'rotateIn'          => __( 'RotateIn', 'sportexx' ),
                'rotateInDownLeft'  => __( 'RotateInDown Left', 'sportexx' ),
                'rotateInDownRight' => __( 'RotateInDown Right', 'sportexx' ),
                'rotateInUpLeft'    => __( 'RotateInUp Left', 'sportexx' ),
                'rotateInUpRight'   => __( 'RotateInUp Right', 'sportexx' ),
                'zoomIn'            => __( 'ZoomIn', 'sportexx' ),
                'zoomInDown'        => __( 'ZoomInDown', 'sportexx' ),
                'zoomInLeft'        => __( 'ZoomInLeft', 'sportexx' ),
                'zoomInRight'       => __( 'ZoomInRight', 'sportexx' ),
                'zoomInUp'          => __( 'ZoomInUp', 'sportexx' ),
            );

            if( function_exists ( 'sportexx_get_product_attr_taxonomies' ) ) {
                $product_attr_taxonomies = sportexx_get_product_attr_taxonomies();
            } else {
                $product_attr_taxonomies = array();
            }
			
			$sections = array(

				array(
					'title'        => __( 'General', 'sportexx' ),
					'icon'         => 'fa fa-dot-circle-o',
					'fields'       => array(
						array(
							'title'      => __( 'Favicon', 'sportexx' ),
							'subtitle'   => __( '<em>Upload your custom Favicon image. <br>.ico or .png file required.</em>', 'sportexx' ),
							'id'         => 'favicon',
							'type'       => 'media',
						),

						array(
							'title'      => __( 'Use text instead of logo ?', 'sportexx'),
							'id'         => 'use_text_logo',
							'type'       => 'checkbox',
							'default'    => '0',
						),

						array(
							'title'      => __( 'Logo Text', 'sportexx'),
							'subtitle'   => __( '<em>Will be displayed only if use text logo is checked.</em>', 'sportexx'),
							'id'         => 'logo_text',
							'type'       => 'text',
							'default'    => 'sportexx',
							'required' => array(
								0 => 'use_text_logo',
								1 => '=',
								2 => 1,
							),
						),

                        array(
                            'title'         => __( 'Enable Retina-ready feature', 'sportexx' ),
                            'subtitle'      => __( '<em>Once enabled, all images uploaded will have two resolutions, one normal and one 2x. Not recommended if you have limited space.</em>', 'sportexx' ),
                            'id'            => 'enable_retina',
                            'type'          => 'switch',
                            'on'            => __( 'Enabled', 'sportexx' ),
                            'off'           => __( 'Disabled', 'sportexx' ),
                            'default'       => 0,
                            'desc'          => __( 'After enabling retina-ready, please make sure to regenerate thumbnails and also upload a @2x version of it. Retina-ready will not work when Echo lazy loading is enabled.', 'sportexx' ),
                        ),  

                        array(
                            'title'          => __( 'Automatic Page Loader', 'sportexx' ),
                            'subtitle'       => __( '<em>Enable/Disable Youtube like Page loader</em>', 'sportexx' ), 
                            'id'             => 'enable_pace',
                            'on'             => __( 'Enabled', 'sportexx' ),
                            'off'            => __( 'Disabled', 'sportexx' ),
                            'type'           => 'switch',
                            'default'        => 1,
                        ),
						
                        array(
							'title'          => __( 'Scroll to Top', 'sportexx' ),
							'id'             => 'enable_scroll_to_top',
							'on'             => __( 'Enabled', 'sportexx' ),
							'off'            => __( 'Disabled', 'sportexx' ),
							'type'           => 'switch',
							'default'        => 1,
						),
					),
				),

                array(
                    'title'     => __( 'Layout', 'sportexx' ),
                    'icon'      => 'fa fa-th-list',
                    'fields'    => array(

                        array(
                            'title'         => __( 'Layout Style', 'sportexx' ),
                            'id'            => 'layout_style',
                            'type'          => 'select',
                            'default'       => 'stretched',
                            'options'       => array(
                                'stretched'         => __( 'Stretched', 'sportexx' ),
                                'boxed'             => __( 'Boxed', 'sportexx' ),
                                'boxed-attached'    => __( 'Boxed - Attached', 'sportexx' ),
                            )
                        ),

                        array(
                            'title'         => __( 'Body Background', 'sportexx' ),
                            'id'            => 'body_background',
                            'type'          => 'background',
                            'output'        => array( '.boxed', '.boxed-attached' ),
                            'subtitle'      => __( 'Only visible if layout style is Boxed or Boxed attached', 'sportexx' ),
                        ),
                    ),
                ),

                array(
                    'title'     => __( 'Header', 'sportexx' ),
                    'icon'      => 'fa fa-arrow-circle-o-up',
                    'fields'    => array(

                        array(
                            'title'      => __( 'Your Logo', 'sportexx' ),
                            'subtitle'   => __( '<em>Upload your logo image. Recommended dimension : 152x51 pixels</em>', 'sportexx' ),
                            'id'         => 'site_logo',
                            'type'       => 'media',
                        ),

                        array(
                            'title'     => __( 'Header Style', 'sportexx' ),
                            'id'        => 'header_style',
                            'type'      => 'select',
                            'options'   => array(
                                'header-1'      => __( 'Header Style 1', 'sportexx' ),
                                'header-alt'    => __( 'Header Style 2', 'sportexx' ),
                            ),
                            'default'   => 'header-1',
                        ),

                        array(
                            'title'     => __( 'Header Background', 'sportexx' ),
                            'id'        => 'header_bg',
                            'type'      => 'select',
                            'options'   => array(
                                'default-bg'    => __( 'Default BG', 'sportexx' ),
                                'dark-bg'       => __( 'Dark BG', 'sportexx' ),
                                'custom'        => __( 'Custom', 'sportexx' ),
                            ),
                            'default'   => 'default',
                        ),

                        array(         
                            'id'       => 'header_background',
                            'type'     => 'background',
                            'title'    => __('Header Background', 'sportexx'),
                            'subtitle' => __('Header background with image, color, etc.', 'sportexx'),
                            'required' => array(
                                array('header_bg','equals','custom'),
                            ),
                            'output'   => array(
                                'background-color'      => '.site-header, .main-navigation ul ul, .secondary-navigation ul ul, .main-navigation ul.menu > li.menu-item-has-children:after, .secondary-navigation ul.menu ul, .main-navigation ul.menu ul, .main-navigation ul.nav-menu ul, .main-navigation.yamm .dropdown-menu, .main-navigation.yamm .yamm-content',
                                'background-image'      => '.site-header',
                                'background-repeat'     => '.site-header',
                                'background-size'       => '.site-header',
                                'background-attachment' => '.site-header',
                                'background-position'   => '.site-header',
                            )
                        ),

                        array(         
                            'id'       => 'header_text_color',
                            'type'     => 'color',
                            'title'    => __('Header Text Color', 'sportexx'),
                            'required' => array(
                                array('header_bg','equals','custom'),
                            ),
                            'output'   => array(
                                'color' => '.site-header, .top-bar, .main-navigation, .site-description, ul.menu li.current-menu-item > a'
                            )
                        ),

                        array(         
                            'id'       => 'header_link_color',
                            'type'     => 'link_color',
                            'title'    => __('Header Link Color', 'sportexx'),
                            'required' => array(
                                array('header_bg','equals','custom'),
                            ),
                            'output'   => array(
                                'color' => '.site-header a, .main-navigation ul li a, .main-navigation.yamm .yamm-content ul li a, .site-title a, ul.menu li a, .site-branding h1 a, .top-bar a, .top-bar ul li a'
                            )
                        ),

                        array(
                            'title'     => __( 'Top Cart Text', 'sportexx' ),
                            'id'        => 'top_cart_text',
                            'type'      => 'text',
                            'default'   => __( 'Cart/', 'sportexx' ),
                        ),

                        array(
                            'title'     => __( 'Mini Cart Dropdown Trigger', 'sportexx' ),
                            'id'        => 'cart_dropdown_trigger',
                            'type'      => 'select',
                            'options'   => array(
                                'click'     => __( 'Click', 'sportexx' ),
                                'hover'     => __( 'Hover', 'sportexx' ),
                            ),
                            'default'   => 'click',
                        ),

                        array(
                            'title'     => __( 'Mini Cart Dropdown Animation', 'sportexx' ),
                            'id'        => 'cart_dropdown_animation',
                            'type'      => 'select',
                            'options'   => $entrance_animations,
                            'default'   => 'fadeInUp',
                        ),
                    ),
                ),

                array(
                    'title'             => __( 'Footer', 'sportexx' ),
                    'icon'              => 'fa fa-arrow-circle-o-down',
                    'fields'            => array(
                        
                        array(
                            'id'        => 'footer_style',
                            'type'      => 'select',
                            'title'     => __( 'Footer Style', 'sportexx' ),
                            'options'   => array(
                                'default-bg'    => __( 'Default BG', 'sportexx' ),
                                'dark-bg'       => __( 'Dark BG', 'sportexx' ),
                                'custom'        => __( 'Custom', 'sportexx' ),
                            ),
                            'default'   => 'default-bg',
                        ),

                        array(         
                            'id'       => 'footer_background',
                            'type'     => 'background',
                            'title'    => __('Footer Background', 'sportexx'),
                            'subtitle' => __('Footer background with image, color, etc.', 'sportexx'),
                            'required' => array(
                                array('footer_style','equals','custom'),
                            ),
                            'output'   => array(
                                'background-color'      => '.site-footer',
                                'background-image'      => '.site-footer',
                                'background-repeat'     => '.site-footer',
                                'background-size'       => '.site-footer',
                                'background-attachment' => '.site-footer',
                                'background-position'   => '.site-footer',
                            )
                        ),

                        array(         
                            'id'       => 'footer_text_color',
                            'type'     => 'color',
                            'title'    => __('Footer Text Color', 'sportexx'),
                            'required' => array(
                                array('footer_style','equals','custom'),
                            ),
                            'output'   => array(
                                'color' => '.site-footer, .site-footer label, .footer-widgets, .footer-widgets .footer-widget .widgettitle, .footer-widgets .footer-widget ul li, .footer-widgets .footer-widget .widget-title, .site-info .copyright, .site-info ul li'
                            )
                        ),

                        array(         
                            'id'       => 'footer_link_color',
                            'type'     => 'link_color',
                            'title'    => __('Footer Link Color', 'sportexx'),
                            'required' => array(
                                array('footer_style','equals','custom'),
                            ),
                            'output'   => array(
                                'color' => '.site-footer a, .footer-widgets a, .footer-widgets .footer-widget a, .footer-widgets .footer-widget ul li a, .footer-widgets .footer-widget .menu > li > a, .footer-widgets .footer-widget .widgettitle + ul > li > a, .footer-widgets .footer-widget .mail-to, .footer-widgets .footer-widget .tel-to, .footer-widgets .footer-widget address, .site-info a, .site-info .copyright a, .site-info ul li a'
                            )
                        ),

                        array(
                            'id'        => 'footer_credit',
                            'type'      => 'textarea',
                            'title'     => __( 'Footer Credit', 'sportexx' ),
                            'default'   => '&copy; ' . date( 'Y' ). ' <a href="' . esc_url( home_url( '/' ) ) . '">' .  get_bloginfo( 'name' ) . '</a>',
                        ),

                        array(
                            'id'        => 'footer_credit_card_icons_gallery',
                            'type'      => 'gallery',
                            'title'     => __( 'Footer Payment Images', 'sportexx' ),
                        ),
                    ),
                ),

                array(
                    'title'     => __( 'Navigation', 'sportexx' ),
                    'icon'      => 'fa fa-navicon',
                    'fields'    => array(                        
                        array(
                            'id'        => 'primary-navigation-start',
                            'type'      => 'section',
                            'title'     => __( 'Primary Navigation', 'sportexx' ),
                            'subtitle'  => __( 'Options for primary navigation of the theme', 'sportexx' ),
                            'indent'    => false,
                        ),

                        array(
                            'title'     => __( 'Dropdown Style', 'sportexx' ),
                            'id'        => 'primary_dropdown_style',
                            'type'      => 'select',
                            'options'   => array(
                                'default'   => __( 'Default', 'sportexx' ),
                                'inverse'   => __( 'Inverse', 'sportexx' ),
                            ),
                            'default'   => 'inverse',
                        ),

                        array(
                            'title'     => __( 'Dropdown Trigger', 'sportexx' ),
                            'id'        => 'primary_dropdown_trigger',
                            'type'      => 'select',
                            'options'   => array(
                                'click'     => __( 'Click', 'sportexx' ),
                                'hover'     => __( 'Hover', 'sportexx' ),
                            ),
                            'default'   => 'click',
                        ),

                        array(
                            'title'     => __( 'Dropdown Animation', 'sportexx' ),
                            'id'        => 'primary_dropdown_animation',
                            'type'      => 'select',
                            'options'   => $entrance_animations,
                            'default'   => 'fadeInUp',
                        ),

                        array(
                            'title'     => __( 'Show Dropdown Indicator', 'sportexx' ),
                            'id'        => 'primary_show_dropdown_indicator',
                            'type'      => 'switch',
                            'on'        => __( 'Yes', 'sportexx' ),
                            'off'       => __( 'No', 'sportexx' ),
                            'default'   => 1
                        ),

                        array(
                            'id'        => 'primary-navigation-end',
                            'type'      => 'section',
                            'indent'    => false,
                        ),

                        array(
                            'id'        => 'topbar-left-navigation-start',
                            'type'      => 'section',
                            'title'     => __( 'Top Bar Left Navigation', 'sportexx' ),
                            'subtitle'  => __( 'Options for top bar left navigation of the theme', 'sportexx' ),
                            'indent'    => FALSE,
                        ),

                        array(
                            'title'     => __( 'Dropdown Trigger', 'sportexx' ),
                            'id'        => 'topbar-left_dropdown_trigger',
                            'type'      => 'select',
                            'options'   => array(
                                'click'     => __( 'Click', 'sportexx' ),
                                'hover'     => __( 'Hover', 'sportexx' ),
                            ),
                            'default'   => 'click',
                        ),

                        array(
                            'title'     => __( 'Dropdown Animation', 'sportexx' ),
                            'id'        => 'topbar-left_dropdown_animation',
                            'type'      => 'select',
                            'options'   => $entrance_animations,
                            'default'   => 'fadeInUp',
                        ),

                        array(
                            'title'     => __( 'Show Dropdown Indicator', 'sportexx' ),
                            'id'        => 'topbar-left_show_dropdown_indicator',
                            'type'      => 'switch',
                            'on'        => __( 'Yes', 'sportexx' ),
                            'off'       => __( 'No', 'sportexx' ),
                            'default'   => 1
                        ),

                        array(
                            'id'        => 'topbar-left-navigation-end',
                            'type'      => 'section',
                            'indent'    => FALSE,
                        ),

                        array(
                            'id'        => 'topbar-right-navigation-start',
                            'type'      => 'section',
                            'title'     => __( 'Top Bar Right Navigation', 'sportexx' ),
                            'subtitle'  => __( 'Options for top bar right navigation of the theme', 'sportexx' ),
                            'indent'    => FALSE
                        ),

                        array(
                            'title'     => __( 'Dropdown Trigger', 'sportexx' ),
                            'id'        => 'topbar-right_dropdown_trigger',
                            'type'      => 'select',
                            'options'   => array(
                                'click'     => __( 'Click', 'sportexx' ),
                                'hover'     => __( 'Hover', 'sportexx' ),
                            ),
                            'default'   => 'click',
                        ),

                        array(
                            'title'     => __( 'Dropdown Animation', 'sportexx' ),
                            'id'        => 'topbar-right_dropdown_animation',
                            'type'      => 'select',
                            'options'   => $entrance_animations,
                            'default'   => 'fadeInUp',
                        ),

                        array(
                            'title'     => __( 'Show Dropdown Indicator', 'sportexx' ),
                            'id'        => 'topbar-right_show_dropdown_indicator',
                            'type'      => 'switch',
                            'on'        => __( 'Yes', 'sportexx' ),
                            'off'       => __( 'No', 'sportexx' ),
                            'default'   => 1
                        ),

                        array(
                            'id'        => 'topbar-right-navigation-end',
                            'type'      => 'section',
                            'indent'    => FALSE,
                        ),
                    )
                ),
				
				array(
                    'title'     => __('Shop', 'sportexx'),
                    'icon'      => 'fa fa-shopping-cart',
                    'fields'    => array(
                        
                        array(
                            'id'                => 'shop-general-info-start',
                            'type'              => 'section',
                            'title'             => __( 'General', 'sportexx' ),
                            'subtitle'          => __( '<em>General Shop Settings</em>', 'sportexx' ),
                            'indent'            => TRUE,
                        ),

                        array(
                            'title'             => __('Catalog Mode', 'sportexx'),
                            'subtitle'          => __('<em>Enable / Disable the Catalog Mode.</em>', 'sportexx'),
                            'desc'              => __('<em>When enabled, the feature Turns Off the shopping functionality of WooCommerce. However you will have to delete the Cart and Checkout pages manually.</em>', 'sportexx'),
                            'id'                => 'catalog_mode',
                            'on'                => __('Enabled', 'sportexx'),
                            'off'               => __('Disabled', 'sportexx'),
                            'type'              => 'switch',
                            'default'           => '0',
                        ),

                        array(
                            'id'                => 'shop_jumbotron',
                            'title'             => __( 'Shop Page Jumbotron', 'sportexx' ),
                            'subtitle'          => __( '<em>Choose a static block that will be the jumbotron element for shop page</em>', 'sportexx' ),
                            'type'              => 'select',
                            'data'              => 'posts',
                            'args'              => array(
                                'post_type'     => 'static_block',
                            )
                        ),

                        array(
                            'title'             => __( 'Brand Attribute', 'sportexx' ),
                            'subtitle'          => __( '<em>Choose a product attribute that will be used as brands</em>', 'sportexx' ),
                            'desc'              => __( '<em>Once you choose a brand attribute, you will be able to add brand images to the attributes', 'sportexx' ),
                            'id'                => 'product_brand_taxonomy',
                            'type'              => 'select',
                            'options'           => $product_attr_taxonomies
                        ),

                        array(
                            'title'             => __( 'Product Comparison Page', 'sportexx' ),
                            'id'                => 'product_comparison_page',
                            'type'              => 'select',
                            'data'              => 'pages',
                        ),

                        array(
                            'id'                => 'shop-general-info-end',
                            'type'              => 'section',
                            'indent'            => FALSE,
                        ),

                        array(
                            'id'                => 'product-archive-start',
                            'type'              => 'section',
                            'title'             => __( 'Shop/Catalog Pages', 'sportexx' ),
                            'subtitle'          => __( '<em>Settings related to product archive page and loop</em>', 'sportexx' ),
                            'indent'            => TRUE,
                        ),

                        array(
                            'id'                => 'shop_page_layout',
                            'title'             => __( 'Shop/Catalog Pages Layout', 'sportexx' ),
                            'type'              => 'select',
                            'options'           => array(
                                'full-width'    => __( 'Full Width', 'sportexx' ),
                                'left-sidebar'  => __( 'Left Sidebar', 'sportexx' ),
                                'right-sidebar' => __( 'Right Sidebar', 'sportexx' ),
                            ),
                            'default'           => 'left-sidebar'
                        ),

                        array(
                            'id'                => 'product_columns',
                            'type'              => 'slider',
                            'title'             => __( 'No of Product Columns', 'sportexx' ),
                            'subtitle'          => __('<em>Drag the slider to set the number of columns for displaying products in shop and catalog pages.</em>', 'sportexx'),
                            'min'               => '1',
                            'max'               => '6',
                            'step'              => '1',
                            'default'           => '3',
                            'display_value'     => 'label',
                        ),

                        array(
                            'title'             => __('Default View', 'sportexx'),
                            'subtitle'          => __('<em>Choose a default view between grid and list views.</em>', 'sportexx'),
                            'id'                => 'shop_default_view',
                            'type'              => 'select',
                            'options'           => array(
                                'grid'          => __( 'Grid View', 'sportexx' ),
                                'list'          => __( 'List View', 'sportexx' ),
                            ),
                            'default'           => 'grid',
                        ),

                        array(
                            'title'             => __('Remember User View ?', 'sportexx' ),
                            'subtitle'          => __( '<em>When user switches a view, should we maintain the view in all pages ?</em>', 'sportexx' ),
                            'id'                => 'remember_user_view',
                            'type'              => 'switch',
                            'on'                => __( 'Yes', 'sportexx' ),
                            'off'               => __( 'No', 'sportexx' ),
                            'default'           => 0
                        ),

                        array(
                            'title'             => __('Number of Products per Page', 'sportexx'),
                            'subtitle'          => __('<em>Drag the slider to set the number of products per page <br />to be listed on the shop page and catalog pages.</em>', 'sportexx'),
                            'id'                => 'products_per_page',
                            'min'               => '3',
                            'step'              => '1',
                            'max'               => '48',
                            'type'              => 'slider',
                            'default'           => '15',
                            'display_value'     => 'label'
                        ),
                        
                        array(
                            'id'                => 'product-archive-end',
                            'type'              => 'section',
                            'indent'            => FALSE,
                        ),

                        array(
                            'id'                => 'product-item-start',
                            'type'              => 'section',
                            'indent'            => TRUE,
                            'title'             => __( 'Product Item Settings', 'sportexx' ),
                            'subtitle'          => __( '<em>All options related to product items appearing in the loop</em>', 'sportexx' ),
                        ),

                        array(
                            'id'                => 'product_item_has_grid',
                            'title'             => __( 'Display Style', 'sportexx' ),
                            'type'              => 'switch',
                            'on'                => __( 'Packed', 'sportexx' ),
                            'off'               => __( 'Spaced', 'sportexx' ),
                            'default'           => TRUE
                        ),

                        array(
                            'title'             => __( 'Product Item Animation', 'sportexx' ),
                            'id'                => 'product_item_animation',
                            'type'              => 'select',
                            'options'           => $entrance_animations,
                            'default'           => 'fadeInUp',
                        ),

                        array(
                            'title'             => __( 'Should Delay Animation', 'sportexx' ),
                            'id'                => 'should_product_animation_delay',
                            'type'              => 'switch',
                            'on'                => __( 'Yes', 'sportexx' ),
                            'off'               => __( 'No', 'sportexx' ),
                            'default'           => TRUE,
                        ),

                        array(
                            'title'             => __( 'Thumbnail Lazy loading', 'sportexx' ),
                            'id'                => 'enable_lazy_loading',
                            'on'                => __( 'Enabled', 'sportexx' ),
                            'off'               => __( 'Disabled', 'sportexx' ),
                            'type'              => 'switch',
                            'default'           => TRUE,
                        ),

                        array(
                            'title'             => __( 'Quick View', 'sportexx' ),
                            'id'                => 'enable_quick_view',
                            'on'                => __( 'Enabled', 'sportexx' ),
                            'off'               => __( 'Disabled', 'sportexx' ),
                            'type'              => 'switch',
                            'default'           => TRUE,
                        ),

                        array(
                            'id'                => 'product-item-end',
                            'type'              => 'section',
                            'indent'            => FALSE,
                        ),

                        array(
                            'id'                => 'single-product-start',
                            'title'             => __( 'Single Product Page', 'sportexx' ),
                            'subtitle'          => __( '<em>Settings for Single Product Page</em>', 'sportexx' ),
                            'indent'            => TRUE,
                            'type'              => 'section',
                        ),

                        array(
                            'id'                => 'enable_single_product_share',
                            'title'             => __( 'Share Block', 'sportexx' ),
                            'type'              => 'switch',
                            'on'                => __( 'Enabled', 'sportexx' ),
                            'off'               => __( 'Disabled', 'sportexx' ),
                            'default'           => TRUE
                        ),

                        array(
                            'id'                => 'show_related_products',
                            'title'             => __( 'Related Products', 'sportexx' ),
                            'type'              => 'switch',
                            'on'                => __( 'Enabled', 'sportexx' ),
                            'off'               => __( 'Disabled', 'sportexx' ),
                            'default'           => TRUE
                        ),

                        array(
                            'id'                => 'related_products_count',
                            'title'             => __( 'Related Products Count', 'sportexx' ),
                            'type'              => 'slider',
                            'min'               => '1',
                            'max'               => '16',
                            'step'              => '1',
                            'default'           => '8',
                            'display_value'     => 'label',
                            'required'          => array( 'show_related_products', 'equals', TRUE ),
                        ),

                        array(
                            'id'                => 'show_upsell_products',
                            'title'             => __( 'Up-sell Products', 'sportexx' ),
                            'type'              => 'switch',
                            'on'                => __( 'Enabled', 'sportexx' ),
                            'off'               => __( 'Disabled', 'sportexx' ),
                            'default'           => FALSE
                        ),

                        array(
                            'id'                => 'upsell_products_count',
                            'title'             => __( 'Upsell Products Count', 'sportexx' ),
                            'type'              => 'slider',
                            'min'               => '1',
                            'max'               => '16',
                            'step'              => '1',
                            'default'           => '8',
                            'display_value'     => 'label',
                            'required'          => array( 'show_upsell_products', 'equals', TRUE ),
                        ),

                        array(
                            'id'                => 'single-product-end',
                            'type'              => 'section',
                            'indent'            => FALSE,
                        ),
                    ),
                ),

				array(
                    'title'     => __('Blog', 'sportexx'),
                    'icon'      => 'fa fa-list-alt',
                    'fields'    => array(
                        
                        array(
                            'title'     => __('Blog Page Layout', 'sportexx'),
                            'subtitle'  => __('<em>Select the layout for the Blog Listing. <br />The second option will enable the Blog Listing Sidebar.</em>', 'sportexx'),
                            'id'        => 'blog_layout',
                            'type'      => 'select',
                            'options'   => array(
                                'full-width'  	      => __( 'Full Width', 'sportexx' ),
                                'left-sidebar'        => __( 'Left Sidebar', 'sportexx' ),
                                'right-sidebar'       => __( 'Right Sidebar', 'sportexx' ),
                            ),
                            'default'   => 'right-sidebar',
                        ),
                        
                        array(
                            'title'     => __( 'Force Excerpt', 'sportexx' ),
                            'subtitle'  => __( 'Show only excerpt instead of blog content in archive pages', 'sportexx' ),
                            'id'        => 'force_excerpt',
                            'on'        => __('Yes', 'sportexx'),
                            'off'       => __('No', 'sportexx'),
                            'type'      => 'switch',
                            'default'   => TRUE,       
                        ),

                        array(
                            'id'        => 'post_item_animation',
                            'title'     => __( 'Post Item Animation', 'sportexx' ),
                            'type'      => 'select',
                            'options'   => $entrance_animations,
                            'default'   => 'fadeInUp',
                        ),

                        array(
                            'id'        => 'enable_post_item_share',
                            'title'     => __( 'Single Post Share Block', 'sportexx' ),
                            'type'      => 'switch',
                            'on'        => __( 'Enabled', 'sportexx' ),
                            'off'       => __( 'Disabled', 'sportexx' ),
                            'default'   => TRUE,
                        ),
                    ),
                ),

				array(
                    'title' => __('Typography', 'sportexx'),
                    'icon'  => 'fa fa-font',
                    'fields' => array(
                        array(
                            'title'         => __( 'Use default font scheme ?', 'sportexx' ),
                            'on'            => __('Yes', 'sportexx'),
                            'off'           => __('No', 'sportexx'),
                            'type'          => 'switch',
                            'default'       => TRUE,
                            'id'            => 'use_predefined_font',
                        ),

                        array(
                            'title'         => __( 'Title Font Family', 'sportexx' ),
                            'type'          => 'typography',
                            'id'            => 'sportexx_title_font',
                            'text-align'    => FALSE,
                            'font-style'    => FALSE,
                            'font-size'     => FALSE,
                            'line-height'   => FALSE,
                            'color'         => FALSE,
                            'default'       => array(
                                'font-family'   => 'Oswald',
                                'subsets'       => 'latin',
                                'style'         => '300',
                            ),
                            'required'      => array( 'use_predefined_font', 'equals', FALSE ),
                        ),

                        array(
                            'title'         => __( 'Content Font Family', 'sportexx' ),
                            'type'          => 'typography',
                            'id'            => 'sportexx_content_font',
                            'text-align'    => FALSE,
                            'font-style'    => FALSE,
                            'font-size'     => FALSE,
                            'line-height'   => FALSE,
                            'color'         => FALSE,
                            'default'       => array(
                                'font-family'   => 'Open Sans',
                                'subsets'       => 'latin',
                            ),
                            'required'      => array( 'use_predefined_font', 'equals', FALSE ),
                        ),
                    ),
                ),

				array(
                    'title'     => __('Social Media', 'sportexx'),
                    'icon'      => 'fa fa-share-square-o',
                    'desc'      => __('<em>Please type in your complete social network URL</em>', 'sportexx' ),
                    'fields'    => array(
                        array(
                            'title'     => __('Facebook', 'sportexx'),
                            'id'        => 'facebook',
                            'type'      => 'text',
                            'icon'      => 'fa fa-facebook',
                        ),
                        
                        array(
                            'title'     => __('Twitter', 'sportexx'),
                            'id'        => 'twitter',
                            'type'      => 'text',
                            'icon'      => 'fa fa-twitter',
                        ),

                        array(
                            'title'     => __('Google+', 'sportexx'),
                            'id'        => 'google-plus',
                            'type'      => 'text',
                            'icon'      => 'fa fa-google-plus',
                        ),
                        
                        array(
                            'title'     => __('Pinterest', 'sportexx'),
                            'id'        => 'pinterest',
                            'type'      => 'text',
                            'icon'      => 'fa fa-pinterest',
                        ),
                        
                        array(
                            'title'     => __('LinkedIn', 'sportexx'),
                            'id'        => 'linkedin',
                            'type'      => 'text',
                            'icon'      => 'fa fa-linkedin',
                        ),

                        array(
                            'title'     => __('Tumblr', 'sportexx'),
                            'id'        => 'tumblr',
                            'type'      => 'text',
                            'icon'      => 'fa fa-tumblr',
                        ),

                        array(
                            'title'     => __('Instagram', 'sportexx'),
                            'id'        => 'instagram',
                            'type'      => 'text',
                            'icon'      => 'fa fa-instagram',
                        ),

                        array(
                            'title'     => __('Youtube', 'sportexx'),
                            'id'        => 'youtube',
                            'type'      => 'text',
                            'icon'      => 'fa fa-youtube',
                        ),

                        array(
                            'title'     => __('Vimeo', 'sportexx'),
                            'id'        => 'vimeo',
                            'type'      => 'text',
                            'icon'      => 'fa fa-vimeo-square',
                        ),

                        array(
                            'title'     => __('Dribbble', 'sportexx'),
                            'id'        => 'dribbble',
                            'type'      => 'text',
                            'icon'      => 'fa fa-dribbble',
                        ),

                        array(
                            'title'     => __('Stumble Upon', 'sportexx'),
                            'id'        => 'stumbleupon',
                            'type'      => 'text',
                            'icon'      => 'fa fa-stumpleupon',
                        ),

                        array(
                            'title'     => __('Sound Cloud', 'sportexx'),
                            'id'        => 'soundcloud',
                            'type'      => 'text',
                            'icon'      => 'fa fa-soundcloud',
                        ),

                        array(
                            'title'     => __('Vine', 'sportexx'),
                            'id'        => 'vine',
                            'type'      => 'text',
                            'icon'      => 'fa fa-vine',
                        ),

                        array(
                            'title'     => __('VKontakte', 'sportexx'),
                            'id'        => 'vk',
                            'type'      => 'text',
                            'icon'      => 'fa fa-vk',
                        ),
                    ),
                ),

                array(
                    'title'         => __('Custom Code', 'sportexx'),
                    'icon'          => 'fa fa-code',
                    'fields'        => array(

                        array(
                            'title'         => __('Custom CSS', 'sportexx'),
                            'subtitle'      => __('<em>Paste your custom CSS code here.</em>', 'sportexx'),
                            'id'            => 'custom_css',
                            'type'          => 'ace_editor',
                            'mode'          => 'css',
                        ),

                        array(
                            'title'         => __('Header JavaScript Code', 'sportexx'),
                            'subtitle'      => __('<em>Paste your custom JS code here. The code will be added to the header of your site.</em>', 'sportexx'),
                            'id'            => 'custom_header_js',
                            'type'          => 'ace_editor',
                            'mode'          => 'javascript',
                        ),

                        array(
                            'title'         => __('Footer JavaScript Code', 'sportexx'),
                            'subtitle'      => __('<em>Paste your custom JS code here. The code will be added to the footer of your site.</em>', 'sportexx'),
                            'id'            => 'custom_footer_js',
                            'type'          => 'ace_editor',
                            'mode'          => 'javascript',
                        ),
                    ),
                ),
			);

			$theme = wp_get_theme();

			$args = array(
				'opt_name'          => 'sportexx_options',
				'display_name'      => $theme->get('Name'),
				'display_version'   => $theme->get('Version'),
				'allow_sub_menu'    => FALSE,
				'menu_title'        => __( 'Sportexx', 'sportexx' ),
				'google_api_key'    => 'AIzaSyDDZJO4F0d17RnFoi1F2qtw4wn6Wcaqxao',
				'page_priority'     => 3,
				'page_slug'         => 'theme_options',
				'intro_text'        => '',
				'dev_mode'          => FALSE,
                'customizer'        => TRUE,
				'footer_credit'     => '&nbsp;',
			);

			$ReduxFramework = new ReduxFramework( $sections, $args );
		}
	}

	new Sportexx_Options();
}