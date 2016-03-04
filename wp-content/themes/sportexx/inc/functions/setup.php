<?php
/**
 * Sportexx setup functions
 *
 * @package sportexx
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 723; /* pixels */
}

/**
 * Assign the Sportexx version to a var
 */
$theme 					= wp_get_theme();
$sportexx_version 		= $theme['Version'];

if ( ! function_exists( 'sportexx_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sportexx_setup() {

		/*
		 * Load Localisation files.
		 *
		 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
		 */

		// wp-content/languages/themes/sportexx-it_IT.mo
		load_theme_textdomain( 'sportexx', trailingslashit( WP_LANG_DIR ) . 'themes/' );

		// wp-content/themes/child-theme-name/languages/it_IT.mo
		load_theme_textdomain( 'sportexx', get_stylesheet_directory() . '/languages' );

		// wp-content/themes/theme-name/languages/it_IT.mo
		load_theme_textdomain( 'sportexx', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 728, 411, TRUE );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary'				=> __( 'Primary Menu', 'sportexx' ),
			'topbar-left'			=> __( 'Top Bar Left Menu', 'sportexx' ),
			'topbar-right'			=> __( 'Top Bar Right Menu', 'sportexx' ),
			'footer-quick-links'	=> __( 'Footer Quick Links', 'sportexx' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'widgets',
		) );

		// Add support for the Site Logo plugin and the site logo functionality in JetPack
		// https://github.com/automattic/site-logo
		// http://jetpack.me/
		add_theme_support( 'site-logo', array( 'size' => 'full' ) );

		// Declare WooCommerce support
		add_theme_support( 'woocommerce' );

		// Declare support for title theme feature
		add_theme_support( 'title-tag' );

		 // Declare support for Post formats feature
		add_theme_support( 'post-formats', array(
			'image',
			'gallery',
			'video',
			'audio',
			'quote'
		) );
	}
endif; // sportexx_setup

/**
 * Register widget functions
 */

require get_template_directory() . '/inc/functions/sx-widget-functions.php';

if( ! function_exists( 'sportexx_widgets_init' ) ) {
	/**
	 * Register widget area.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
	 */
	function sportexx_widgets_init() {

		$sidebars_widgets = wp_get_sidebars_widgets();

		$footer_widgets_counter = "0";
		if ( isset( $sidebars_widgets['footer-widgets-1'] ) ) {
			$footer_widgets_counter  = count( $sidebars_widgets['footer-widgets-1'] );
		}

		switch ( $footer_widgets_counter ) {
			case 0:
				$footer_widgets_columns ='col-lg-12 col-md-12 col-sm-12 col-xs-12';
				break;
			case 1:
				$footer_widgets_columns ='col-lg-12 col-md-12 col-sm-12 col-xs-12';
				break;
			case 2:
				$footer_widgets_columns ='col-lg-6 col-md-6 col-sm-6 col-xs-12';
				break;
			case 3:
				$footer_widgets_columns ='col-lg-4 col-md-4 col-sm-6 col-xs-12';
				break;
			case 4:
				$footer_widgets_columns ='col-lg-3 col-md-3 col-sm-6 col-xs-12';
				break;
			case 5:
				$footer_widgets_columns ='column-5 col-xs-12 col-sm-6';
				break;
			case 6:
				$footer_widgets_columns ='col-lg-2 col-md-2 col-sm-6 col-xs-12';
				break;
			default:
				$footer_widgets_columns ='col-lg-2 col-md-2 col-sm-6 col-xs-12';
		}


		register_sidebar( apply_filters( 'register_sidebar_args', array(
			'name'          => __( 'Blog Sidebar', 'sportexx' ),
			'id'            => 'blog-sidebar-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) ) );

		register_sidebar( apply_filters( 'register_shop_sidebar_args', array(
			'name'          => __( 'Shop Sidebar', 'sportexx' ),
			'id'            => 'shop-sidebar-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) ) );

		register_sidebar( apply_filters( 'register_product_filters_sidebar_args', array(
			'name'          => __( 'Product Filters', 'sportexx' ),
			'id'            => 'product-filters-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) ) );

		register_sidebar( apply_filters( 'register_footer_top_widgets_args', array(
			'name' 			=> __( 'Footer Widgets', 'sportexx' ),
			'id' 			=> 'footer-widgets-1',
			'description' 	=> 'Widgetized Footer Region',
			'before_widget' => '<div class="' . esc_attr( $footer_widgets_columns )  . '"><aside id="%1$s" class="widget footer-widget %2$s">',
			'after_widget' 	=> '</aside></div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',
		) ) );
	}
}

if ( ! function_exists( 'sportexx_fonts_url' ) ) :
	/**
	 * Register Google fonts for Sportexx.
	 *
	 * @since Sportexx 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function sportexx_fonts_url() {

		$fonts_url 		= '';
		$default_fonts 	= array();
		$fonts     		= array();
		$subsets   		= 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'sportexx' ) ) {
			$default_fonts[] = 'Open Sans:300italic,400italic,700italic,400,300,700';
		}

		/* translators: If there are characters in your language that are not supported by Oswald, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Oswald font: on or off', 'sportexx' ) ) {
			$default_fonts[] = 'Oswald:400,300,700';
		}

		$fonts = apply_filters( 'sportexx_google_fonts', $default_fonts );

		/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
		$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'sportexx' );

		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ( 'greek' == $subset ) {
			$subsets .= ',greek,greek-ext';
		} elseif ( 'devanagari' == $subset ) {
			$subsets .= ',devanagari';
		} elseif ( 'vietnamese' == $subset ) {
			$subsets .= ',vietnamese';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), '//fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
endif;

if( ! function_exists( 'sportexx_scripts' ) ) {
	/**
	 * Enqueue scripts and styles.
	 * @since  1.0.0
	 */
	function sportexx_scripts() {

		global $sportexx_version;

		if( apply_filters( 'sportexx_load_default_fonts', TRUE ) ) {
			wp_enqueue_style( 'sportexx-fonts', sportexx_fonts_url(), array(), null );
		}

		wp_enqueue_style( 'bootstrap',		get_template_directory_uri() . '/assets/css/bootstrap.min.css', '', $sportexx_version );

		if( is_rtl() ) {
			wp_enqueue_style( 'bootstrap-rtl',		get_template_directory_uri() . '/assets/css/bootstrap-rtl.min.css', '', $sportexx_version );
		}

		wp_enqueue_style( 'font-awesome', 	get_template_directory_uri() . '/assets/css/font-awesome.min.css', '', $sportexx_version );
		wp_enqueue_style( 'animate', 		get_template_directory_uri() . '/assets/css/animate.min.css', '', $sportexx_version );

		if( ! is_rtl() ) {
			wp_enqueue_style( 'sportexx-style', get_template_directory_uri() . '/style.css', '', $sportexx_version );
		}

		wp_enqueue_script( 'bootstrap-js', 					get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), $sportexx_version, true );
		wp_enqueue_script( 'sportexx-skip-link-focus-fix', 	get_template_directory_uri() . '/assets/js/skip-link-focus-fix.min.js', array(), $sportexx_version, true );
		wp_enqueue_script( 'wow', 							get_template_directory_uri() . '/assets/js/wow.min.js', array( 'jquery' ), $sportexx_version, true );
		wp_enqueue_script( 'number-polyfill',				get_template_directory_uri() . '/assets/js/number-polyfill.min.js', array( 'jquery' ), $sportexx_version, true );

		if( apply_filters( 'sportexx_enable_pace', TRUE ) ) {
			wp_enqueue_script( 'pace', get_template_directory_uri() . '/assets/js/pace.min.js', array( 'jquery' ), $sportexx_version, true );
		}

		if( apply_filters( 'sportexx_enable_scrollup', TRUE ) ) {
			wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/assets/js/jquery.easing-1.3.min.js', array( 'jquery' ), $sportexx_version, true );
			wp_enqueue_script( 'scrollup', get_template_directory_uri() . '/assets/js/scrollup.min.js', array( 'jquery' ), $sportexx_version, true );
		}

		if( apply_filters( 'sportexx_enable_bootstrap_hover', TRUE ) ) {
			wp_enqueue_script( 'bootstrap-hover-dropdown', get_template_directory_uri() . '/assets/js/bootstrap-hover-dropdown.min.js', array( 'bootstrap-js' ), $sportexx_version, true );
		}

		if( apply_filters( 'sportexx_enable_echo', TRUE ) ) {
			wp_enqueue_script( 'echo', get_template_directory_uri() . '/assets/js/echo.min.js', '', $sportexx_version, true );
		}

		if( apply_filters( 'sportexx_enable_retina', FALSE ) ) {
			wp_enqueue_script( 'retina', get_template_directory_uri() . '/assets/js/retina.min.js', '', $sportexx_version, true );
		}

		wp_enqueue_script( 'sportexx-js', get_template_directory_uri() . '/assets/js/scripts.min.js', array( 'jquery' ), $sportexx_version, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		$sportexx_option = array(
			'ajax_url'			=> admin_url( 'admin-ajax.php' ),
			'ajax_loader_url'	=> get_template_directory_uri() . '/assets/images/ajax-loader.gif',
		);
		wp_localize_script( 'sportexx-js', 'sportexx', $sportexx_option );
	}
}

if( ! function_exists( 'sportexx_template_debug_mode' ) ) {
	/**
	 * Enables template debug mode
	 */
	function sportexx_template_debug_mode() {
		if ( ! defined( 'SX_TEMPLATE_DEBUG_MODE' ) ) {
			$status_options = get_option( 'woocommerce_status_options', array() );
			if ( ! empty( $status_options['template_debug_mode'] ) && current_user_can( 'manage_options' ) ) {
				define( 'SX_TEMPLATE_DEBUG_MODE', true );
			} else {
				define( 'SX_TEMPLATE_DEBUG_MODE', false );
			}
		}
	}
}

if( ! function_exists( 'sportexx_get_template' ) ) {
	/**
	 * Get other templates (e.g. product attributes) passing attributes and including the file.
	 *
	 * @access public
	 * @param string $template_name
	 * @param array $args (default: array())
	 * @param string $template_path (default: '')
	 * @param string $default_path (default: '')
	 * @return void
	 */

	function sportexx_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
		if ( $args && is_array( $args ) ) {
			extract( $args );
		}

		$located = sportexx_locate_template( $template_name, $template_path, $default_path );

		if ( ! file_exists( $located ) ) {
			_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $located ), '2.1' );
			return;
		}

		// Allow 3rd party plugin filter template file from their plugin
		$located = apply_filters( 'sportexx_get_template', $located, $template_name, $args, $template_path, $default_path );

		do_action( 'sportexx_before_template_part', $template_name, $template_path, $located, $args );

		include( $located );

		do_action( 'sportexx_after_template_part', $template_name, $template_path, $located, $args );
	}
}

if( ! function_exists( 'sportexx_locate_template' ) ) {
	/**
	 * Locate a template and return the path for inclusion.
	 *
	 * This is the load order:
	 *
	 *		yourtheme		/	$template_path	/	$template_name
	 *		yourtheme		/	$template_name
	 *		$default_path	/	$template_name
	 *
	 * @access public
	 * @param string $template_name
	 * @param string $template_path (default: '')
	 * @param string $default_path (default: '')
	 * @return string
	 */
	function sportexx_locate_template( $template_name, $template_path = '', $default_path = '' ) {
		if ( ! $template_path ) {
			$template_path = 'templates/';
		}

		if ( ! $default_path ) {
			$default_path = 'templates/';
		}

		// Look within passed path within the theme - this is priority
		$template = locate_template(
			array(
				trailingslashit( $template_path ) . $template_name,
				$template_name
			)
		);

		// Get default template
		if ( ! $template || SX_TEMPLATE_DEBUG_MODE ) {
			$template = $default_path . $template_name;
		}

		// Return what we found
		return apply_filters( 'sportexx_locate_template', $template, $template_name, $template_path );
	}
}

if( ! function_exists( 'sportexx_register_required_plugins' ) ) {
	/**
	 * Registers all required and recommended plugins for Sportexx Theme
	 */
	function sportexx_register_required_plugins() {

		$plugins = array(

			array(
				'name'     				=> 'Contact Form 7',
				'slug'     				=> 'contact-form-7',
				'source'   				=> 'https://downloads.wordpress.org/plugin/contact-form-7.4.3.1.zip',
				'required' 				=> false,
				'version' 				=> '4.3.1',
				'force_activation' 		=> false,
				'force_deactivation' 	=> false,
				'external_url' 			=> '',
			),

			array(
				'name'     				=> 'Envato Toolkit',
				'slug'     				=> 'envato-toolkit',
				'source'   				=> 'https://github.com/envato/envato-wordpress-toolkit/archive/master.zip',
				'required' 				=> false,
				'version' 				=> '1.7.3',
				'force_activation' 		=> false,
				'force_deactivation' 	=> false,
				'external_url' 			=> '',
			),

			array(
				'name'     				=> 'MailChimp for WordPress Lite',
				'slug'     				=> 'mailchimp-for-wp',
				'source'   				=> 'https://downloads.wordpress.org/plugin/mailchimp-for-wp.3.0.12.zip',
				'required' 				=> false,
				'version' 				=> '3.0.12',
				'force_activation' 		=> false,
				'force_deactivation' 	=> false,
				'external_url' 			=> '',
			),

			array(
				'name'     				=> 'Our Team',
				'slug'     				=> 'our-team-by-woothemes',
				'source'   				=> 'https://downloads.wordpress.org/plugin/our-team-by-woothemes.1.4.1.zip',
				'required' 				=> false,
				'version' 				=> '1.4.1',
				'force_activation' 		=> false,
				'force_deactivation' 	=> false,
				'external_url' 			=> '',
			),

			array(
				'name'					=> 'QueryLoop Visual Attributes',
				'slug'					=> 'ql-visual-attributes',
				'source'				=> get_template_directory() . '/assets/plugins/ql-visual-attributes.zip',
				'required'				=> false,
				'version'				=> '1.1.7',
				'force_activation'		=> false,
				'force_deactivation'	=> false,
				'external_url'			=> ''
			),

			array(
				'name'					=> 'Redux Framework',
				'slug'					=> 'redux-framework',
				'source'				=> 'https://downloads.wordpress.org/plugin/redux-framework.3.5.9.zip',
				'required'				=> true,
				'version'				=> '3.5.9',
				'force_activation'		=> false,
				'force_deactivation'	=> false,
				'external_url'			=> '',
			),

			array(
				'name'     				=> 'Regenerate Thumbnails',
				'slug'     				=> 'regenerate-thumbnails',
				'source'   				=> 'https://downloads.wordpress.org/plugin/regenerate-thumbnails.zip',
				'required' 				=> false,
				'version' 				=> '2.2.6',
				'force_activation' 		=> false,
				'force_deactivation' 	=> false,
				'external_url' 			=> '',
			),

			array(
	            'name'					=> 'Revolution Slider',
	            'slug'					=> 'revslider',
	            'source'				=> get_template_directory() . '/assets/plugins/revslider.zip',
	            'required'				=> false,
	            'version'				=> '5.1.6',
	            'force_activation'		=> false,
	            'force_deactivation'	=> false,
	            'external_url'			=> '',
	        ),

	        array(
	            'name'					=> 'Sportexx Extensions',
	            'slug'					=> 'sportexx-extensions',
	            'source'				=> get_template_directory() . '/assets/plugins/sportexx-extensions.zip',
	            'required'				=> false,
	            'version'				=> '1.0.10',
	            'force_activation'		=> false,
	            'force_deactivation'	=> false,
	            'external_url'			=> '',
	        ),

			array(
				'name'     				=> 'WooCommerce',
				'slug'     				=> 'woocommerce',
				'source'   				=> 'https://downloads.wordpress.org/plugin/woocommerce.2.5.0.zip',
				'required' 				=> true,
				'version' 				=> '2.5.0',
				'force_activation' 		=> false,
				'force_deactivation' 	=> false,
				'external_url' 			=> '',
			),

			array(
				'name'     				=> 'WordPress Popular Posts',
				'slug'     				=> 'wordpress-popular-posts',
				'source'   				=> 'https://downloads.wordpress.org/plugin/wordpress-popular-posts.3.3.3.zip',
				'required' 				=> false,
				'version' 				=> '3.3.3',
				'force_activation' 		=> false,
				'force_deactivation' 	=> false,
				'external_url' 			=> '',
			),

			array(
	            'name'					=> 'WPBakery Visual Composer',
	            'slug'					=> 'js_composer',
	            'source'				=> get_template_directory() . '/assets/plugins/js_composer.zip',
	            'required'				=> false,
	            'version'				=> '4.9.2',
	            'force_activation'		=> false,
	            'force_deactivation'	=> false,
	            'external_url'			=> '',
	        ),

			array(
				'name'     				=> 'YITH WooCommerce Compare',
				'slug'     				=> 'yith-woocommerce-compare',
				'source'   				=> 'https://downloads.wordpress.org/plugin/yith-woocommerce-compare.2.0.6.zip',
				'required' 				=> false,
				'version' 				=> '2.0.6',
				'force_activation' 		=> false,
				'force_deactivation' 	=> false,
				'external_url' 			=> '',
			),

			array(
				'name'     				=> 'YITH WooCommerce Wishlist',
				'slug'     				=> 'yith-woocommerce-wishlist',
				'source'   				=> 'https://downloads.wordpress.org/plugin/yith-woocommerce-wishlist.2.0.13.zip',
				'required' 				=> false,
				'version' 				=> '2.0.13',
				'force_activation' 		=> false,
				'force_deactivation' 	=> false,
				'external_url' 			=> '',
			),

		);

		$config = array(
			'domain'       		=> 'sportexx',
			'default_path' 		=> '',
			'parent_slug' 		=> 'themes.php',
			'menu'         		=> 'install-required-plugins',
			'has_notices'      	=> true,
			'is_automatic'    	=> false,
			'message' 			=> '',
			'strings'      		=> array(
				'page_title'                       			=> __( 'Install Required Plugins', 'sportexx' ),
				'menu_title'                       			=> __( 'Install Plugins', 'sportexx' ),
				'installing'                       			=> __( 'Installing Plugin: %s', 'sportexx' ),
				'oops'                             			=> __( 'Something went wrong with the plugin API.', 'sportexx' ),
				'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'sportexx' ),
				'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'sportexx' ),
				'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'sportexx' ),
				'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'sportexx' ),
				'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'sportexx' ),
				'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'sportexx' ),
				'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'sportexx' ),
				'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'sportexx' ),
				'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'sportexx'  ),
				'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'sportexx'  ),
				'return'                           			=> __( 'Return to Required Plugins Installer', 'sportexx' ),
				'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'sportexx' ),
				'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'sportexx' ),
				'nag_type'									=> 'updated'
			)
		);
		tgmpa( $plugins, $config );
	}
}

if( ! function_exists( 'sportexx_add_editor_styles' ) ) {
	function sportexx_add_editor_styles() {
	    add_editor_style( 'editor-style.css' );
	}
}
