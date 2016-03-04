<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( class_exists( 'WC_Widget' ) ) :

/**
 * Layered Navigation Widget
 *
 * @author   WooThemes
 * @category Widgets
 * @package  WooCommerce/Widgets
 * @version  2.3.0
 * @extends  WC_Widget
 */
class SX_Widget_Layered_Nav extends WC_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'sportexx_layered_nav_init' ) );
		$this->widget_cssclass    = 'woocommerce widget_layered_nav';
		$this->widget_description = __( 'Shows a custom attribute in a widget which lets you narrow down the list of products when viewing product categories.', 'sportexx' );
		$this->widget_id          = 'sportexx_layered_nav';
		$this->widget_name        = __( 'Sportexx Layered Nav', 'sportexx' );

		parent::__construct();
	}

	/**
	 * update function.
	 *
	 * @see WP_Widget->update
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$this->init_settings();

		return parent::update( $new_instance, $old_instance );
	}

	/**
	 * form function.
	 *
	 * @see WP_Widget->form
	 *
	 * @param array $instance
	 *
	 * @return void
	 */
	public function form( $instance ) {
		$this->init_settings();

		parent::form( $instance );
	}

	/**
	 * Init settings after post types are registered
	 *
	 * @return void
	 */
	public function init_settings() {
		$attribute_array      = array();
		$attribute_taxonomies = wc_get_attribute_taxonomies();

		if ( $attribute_taxonomies ) {
			foreach ( $attribute_taxonomies as $tax ) {
				if ( taxonomy_exists( wc_attribute_taxonomy_name( $tax->attribute_name ) ) ) {
					$attribute_array[ $tax->attribute_name ] = $tax->attribute_name;
				}
			}
		}

		$this->settings = array(
			'title' => array(
				'type'  => 'text',
				'std'   => __( 'Filter by', 'sportexx' ),
				'label' => __( 'Title', 'sportexx' )
			),
			'attribute' => array(
				'type'    => 'select',
				'std'     => '',
				'label'   => __( 'Attribute', 'sportexx' ),
				'options' => $attribute_array
			),
			'display_type' => array(
				'type'    => 'select',
				'std'     => 'list',
				'label'   => __( 'Display type', 'sportexx' ),
				'options' => array(
					'list'     => __( 'List', 'sportexx' ),
					'dropdown' => __( 'Dropdown', 'sportexx' ),
					'visual'   => __( 'Visual', 'sportexx' )
				)
			),
			'query_type' => array(
				'type'    => 'select',
				'std'     => 'and',
				'label'   => __( 'Query type', 'sportexx' ),
				'options' => array(
					'and' => __( 'AND', 'sportexx' ),
					'or'  => __( 'OR', 'sportexx' )
				)
			),
			'visual_type' => array(
				'type'    => 'select',
				'std'     => 'text',
				'label'   => __( 'Visual type', 'sportexx' ),
				'options' => array(
					'image' => __( 'Image', 'sportexx' ),
					'icon'  => __( 'Icon', 'sportexx' ),
					'color' => __( 'Color', 'sportexx' ),
					'text' => __( 'Text', 'sportexx' )
				)
			),
		);
	}

	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args
	 * @param array $instance
	 *
	 * @return void
	 */
	public function widget( $args, $instance ) {
		global $_chosen_attributes;

		if ( ! is_post_type_archive( 'product' ) && ! is_tax( get_object_taxonomies( 'product' ) ) ) {
			return;
		}

		$current_term = is_tax() ? get_queried_object()->term_id : '';
		$current_tax  = is_tax() ? get_queried_object()->taxonomy : '';
		$taxonomy     = isset( $instance['attribute'] ) ? wc_attribute_taxonomy_name( $instance['attribute'] ) : $this->settings['attribute']['std'];
		$query_type   = isset( $instance['query_type'] ) ? $instance['query_type'] : $this->settings['query_type']['std'];
		$display_type = isset( $instance['display_type'] ) ? $instance['display_type'] : $this->settings['display_type']['std'];
		$visual_type  = isset( $instance['visual_type'] ) ? $instance['visual_type'] : $this->settings['visual_type']['std'];

		if ( ! taxonomy_exists( $taxonomy ) ) {
			return;
		}

		$get_terms_args = array( 'hide_empty' => '1' );

		$orderby = wc_attribute_orderby( $taxonomy );

		switch ( $orderby ) {
			case 'name' :
				$get_terms_args['orderby']    = 'name';
				$get_terms_args['menu_order'] = false;
			break;
			case 'id' :
				$get_terms_args['orderby']    = 'id';
				$get_terms_args['order']      = 'ASC';
				$get_terms_args['menu_order'] = false;
			break;
			case 'menu_order' :
				$get_terms_args['menu_order'] = 'ASC';
			break;
		}

		$terms = get_terms( $taxonomy, $get_terms_args );

		if ( 0 < count( $terms ) ) {

			ob_start();

			$found = false;

			$this->widget_start( $args, $instance );

			// Force found when option is selected - do not force found on taxonomy attributes
			if ( ! is_tax() && is_array( $_chosen_attributes ) && array_key_exists( $taxonomy, $_chosen_attributes ) ) {
				$found = true;
			}

			if ( 'dropdown' == $display_type ) {

				// skip when viewing the taxonomy
				if ( $current_tax && $taxonomy == $current_tax ) {

					$found = false;

				} else {

					$taxonomy_filter = str_replace( 'pa_', '', $taxonomy );

					$found = false;

					echo '<select class="dropdown_layered_nav_' . $taxonomy_filter . '">';

					echo '<option value="">' . sprintf( __( 'Any %s', 'sportexx' ), wc_attribute_label( $taxonomy ) ) . '</option>';

					foreach ( $terms as $term ) {

						// If on a term page, skip that term in widget list
						if ( $term->term_id == $current_term ) {
							continue;
						}

						// Get count based on current view - uses transients
						$transient_name = 'wc_ln_count_' . md5( sanitize_key( $taxonomy ) . sanitize_key( $term->term_taxonomy_id ) );

						if ( false === ( $_products_in_term = get_transient( $transient_name ) ) ) {

							$_products_in_term = get_objects_in_term( $term->term_id, $taxonomy );

							set_transient( $transient_name, $_products_in_term, DAY_IN_SECONDS * 30 );
						}

						$option_is_set = ( isset( $_chosen_attributes[ $taxonomy ] ) && in_array( $term->term_id, $_chosen_attributes[ $taxonomy ]['terms'] ) );

						// If this is an AND query, only show options with count > 0
						if ( 'and' == $query_type ) {

							$count = sizeof( array_intersect( $_products_in_term, WC()->query->filtered_product_ids ) );

							if ( 0 < $count ) {
								$found = true;
							}

							if ( 0 == $count && ! $option_is_set ) {
								continue;
							}

						// If this is an OR query, show all options so search can be expanded
						} else {

							$count = sizeof( array_intersect( $_products_in_term, WC()->query->unfiltered_product_ids ) );

							if ( 0 < $count ) {
								$found = true;
							}

						}

						echo '<option value="' . esc_attr( $term->term_id ) . '" ' . selected( isset( $_GET[ 'filter_' . $taxonomy_filter ] ) ? $_GET[ 'filter_' . $taxonomy_filter ] : '' , $term->term_id, false ) . '>' . esc_html( $term->name ) . '</option>';
					}

					echo '</select>';

					wc_enqueue_js( "
						jQuery( '.dropdown_layered_nav_$taxonomy_filter' ).change( function() {
							var term_id = parseInt( jQuery( this ).val(), 10 );
							location.href = '" . str_replace( array( '%\/page/[0-9]+%', '&amp;', '%2C' ), array( '', '&', ',' ), esc_js( add_query_arg( 'filtering', '1', remove_query_arg( array( 'page', 'filter_' . $taxonomy_filter ) ) ) ) ) . "&filter_$taxonomy_filter=' + ( isNaN( term_id ) ? '' : term_id );
						});
					" );

				}

			} elseif ( 'list' == $display_type ) {

				// List display
				echo '<ul>';

				foreach ( $terms as $term ) {

					// Get count based on current view - uses transients
					$transient_name = 'wc_ln_count_' . md5( sanitize_key( $taxonomy ) . sanitize_key( $term->term_taxonomy_id ) );

					if ( false === ( $_products_in_term = get_transient( $transient_name ) ) ) {

						$_products_in_term = get_objects_in_term( $term->term_id, $taxonomy );

						set_transient( $transient_name, $_products_in_term );
					}

					$option_is_set = ( isset( $_chosen_attributes[ $taxonomy ] ) && in_array( $term->term_id, $_chosen_attributes[ $taxonomy ]['terms'] ) );

					// skip the term for the current archive
					if ( $current_term == $term->term_id ) {
						continue;
					}

					// If this is an AND query, only show options with count > 0
					if ( 'and' == $query_type ) {

						$count = sizeof( array_intersect( $_products_in_term, WC()->query->filtered_product_ids ) );

						if ( 0 < $count && $current_term !== $term->term_id ) {
							$found = true;
						}

						if ( 0 == $count && ! $option_is_set ) {
							continue;
						}

					// If this is an OR query, show all options so search can be expanded
					} else {

						$count = sizeof( array_intersect( $_products_in_term, WC()->query->unfiltered_product_ids ) );

						if ( 0 < $count ) {
							$found = true;
						}
					}

					$arg = 'filter_' . sanitize_title( $instance['attribute'] );

					$current_filter = ( isset( $_GET[ $arg ] ) ) ? explode( ',', $_GET[ $arg ] ) : array();

					if ( ! is_array( $current_filter ) ) {
						$current_filter = array();
					}

					$current_filter = array_map( 'esc_attr', $current_filter );

					if ( ! in_array( $term->term_id, $current_filter ) ) {
						$current_filter[] = $term->term_id;
					}

					// Base Link decided by current page
					if ( defined( 'SHOP_IS_ON_FRONT' ) ) {
						$link = home_url();
					} elseif ( is_post_type_archive( 'product' ) || is_page( wc_get_page_id('shop') ) ) {
						$link = get_post_type_archive_link( 'product' );
					} else {
						$link = get_term_link( get_query_var('term'), get_query_var('taxonomy') );
					}

					// All current filters
					if ( $_chosen_attributes ) {
						foreach ( $_chosen_attributes as $name => $data ) {
							if ( $name !== $taxonomy ) {

								// Exclude query arg for current term archive term
								while ( in_array( $current_term, $data['terms'] ) ) {
									$key = array_search( $current_term, $data );
									unset( $data['terms'][$key] );
								}

								// Remove pa_ and sanitize
								$filter_name = sanitize_title( str_replace( 'pa_', '', $name ) );

								if ( ! empty( $data['terms'] ) ) {
									$link = add_query_arg( 'filter_' . $filter_name, implode( ',', $data['terms'] ), $link );
								}

								if ( 'or' == $data['query_type'] ) {
									$link = add_query_arg( 'query_type_' . $filter_name, 'or', $link );
								}
							}
						}
					}

					// Min/Max
					if ( isset( $_GET['min_price'] ) ) {
						$link = add_query_arg( 'min_price', $_GET['min_price'], $link );
					}

					if ( isset( $_GET['max_price'] ) ) {
						$link = add_query_arg( 'max_price', $_GET['max_price'], $link );
					}

					// Orderby
					if ( isset( $_GET['orderby'] ) ) {
						$link = add_query_arg( 'orderby', $_GET['orderby'], $link );
					}

					// Current Filter = this widget
					if ( isset( $_chosen_attributes[ $taxonomy ] ) && is_array( $_chosen_attributes[ $taxonomy ]['terms'] ) && in_array( $term->term_id, $_chosen_attributes[ $taxonomy ]['terms'] ) ) {

						$class = 'class="chosen"';

						// Remove this term is $current_filter has more than 1 term filtered
						if ( sizeof( $current_filter ) > 1 ) {
							$current_filter_without_this = array_diff( $current_filter, array( $term->term_id ) );
							$link = add_query_arg( $arg, implode( ',', $current_filter_without_this ), $link );
						}

					} else {

						$class = '';
						$link = add_query_arg( $arg, implode( ',', $current_filter ), $link );

					}

					// Search Arg
					if ( get_search_query() ) {
						$link = add_query_arg( 's', get_search_query(), $link );
					}

					// Post Type Arg
					if ( isset( $_GET['post_type'] ) ) {
						$link = add_query_arg( 'post_type', $_GET['post_type'], $link );
					}

					// Query type Arg
					if ( $query_type == 'or' && ! ( sizeof( $current_filter ) == 1 && isset( $_chosen_attributes[ $taxonomy ]['terms'] ) && is_array( $_chosen_attributes[ $taxonomy ]['terms'] ) && in_array( $term->term_id, $_chosen_attributes[ $taxonomy ]['terms'] ) ) ) {
						$link = add_query_arg( 'query_type_' . sanitize_title( $instance['attribute'] ), 'or', $link );
					}
					
					echo '<li ' . $class . '>';

					echo ( $count > 0 || $option_is_set ) ? '<a href="' . esc_url( apply_filters( 'sportexx_layered_nav_link', $link ) ) . '">' : '<span>';

					echo $term->name;

					echo ( $count > 0 || $option_is_set ) ? '</a>' : '</span>';

					echo ' <span class="count">(' . $count . ')</span></li>';

				}

				echo '</ul>';

			} else {

				// Visual display
				echo '<ul>';

				foreach ( $terms as $term ) {

					// Get count based on current view - uses transients
					$transient_name = 'wc_ln_count_' . md5( sanitize_key( $taxonomy ) . sanitize_key( $term->term_taxonomy_id ) );

					if ( false === ( $_products_in_term = get_transient( $transient_name ) ) ) {

						$_products_in_term = get_objects_in_term( $term->term_id, $taxonomy );

						set_transient( $transient_name, $_products_in_term );
					}

					$option_is_set = ( isset( $_chosen_attributes[ $taxonomy ] ) && in_array( $term->term_id, $_chosen_attributes[ $taxonomy ]['terms'] ) );

					// skip the term for the current archive
					if ( $current_term == $term->term_id ) {
						continue;
					}

					// If this is an AND query, only show options with count > 0
					if ( 'and' == $query_type ) {

						$count = sizeof( array_intersect( $_products_in_term, WC()->query->filtered_product_ids ) );

						if ( 0 < $count && $current_term !== $term->term_id ) {
							$found = true;
						}

						if ( 0 == $count && ! $option_is_set ) {
							continue;
						}

					// If this is an OR query, show all options so search can be expanded
					} else {

						$count = sizeof( array_intersect( $_products_in_term, WC()->query->unfiltered_product_ids ) );

						if ( 0 < $count ) {
							$found = true;
						}
					}

					$arg = 'filter_' . sanitize_title( $instance['attribute'] );

					$current_filter = ( isset( $_GET[ $arg ] ) ) ? explode( ',', $_GET[ $arg ] ) : array();

					if ( ! is_array( $current_filter ) ) {
						$current_filter = array();
					}

					$current_filter = array_map( 'esc_attr', $current_filter );

					if ( ! in_array( $term->term_id, $current_filter ) ) {
						$current_filter[] = $term->term_id;
					}

					// Base Link decided by current page
					if ( defined( 'SHOP_IS_ON_FRONT' ) ) {
						$link = home_url();
					} elseif ( is_post_type_archive( 'product' ) || is_page( wc_get_page_id('shop') ) ) {
						$link = get_post_type_archive_link( 'product' );
					} else {
						$link = get_term_link( get_query_var('term'), get_query_var('taxonomy') );
					}

					// All current filters
					if ( $_chosen_attributes ) {
						foreach ( $_chosen_attributes as $name => $data ) {
							if ( $name !== $taxonomy ) {

								// Exclude query arg for current term archive term
								while ( in_array( $current_term, $data['terms'] ) ) {
									$key = array_search( $current_term, $data );
									unset( $data['terms'][$key] );
								}

								// Remove pa_ and sanitize
								$filter_name = sanitize_title( str_replace( 'pa_', '', $name ) );

								if ( ! empty( $data['terms'] ) ) {
									$link = add_query_arg( 'filter_' . $filter_name, implode( ',', $data['terms'] ), $link );
								}

								if ( 'or' == $data['query_type'] ) {
									$link = add_query_arg( 'query_type_' . $filter_name, 'or', $link );
								}
							}
						}
					}

					// Min/Max
					if ( isset( $_GET['min_price'] ) ) {
						$link = add_query_arg( 'min_price', $_GET['min_price'], $link );
					}

					if ( isset( $_GET['max_price'] ) ) {
						$link = add_query_arg( 'max_price', $_GET['max_price'], $link );
					}

					// Orderby
					if ( isset( $_GET['orderby'] ) ) {
						$link = add_query_arg( 'orderby', $_GET['orderby'], $link );
					}

					// Current Filter = this widget
					if ( isset( $_chosen_attributes[ $taxonomy ] ) && is_array( $_chosen_attributes[ $taxonomy ]['terms'] ) && in_array( $term->term_id, $_chosen_attributes[ $taxonomy ]['terms'] ) ) {

						$class = 'class="chosen"';

						// Remove this term is $current_filter has more than 1 term filtered
						if ( sizeof( $current_filter ) > 1 ) {
							$current_filter_without_this = array_diff( $current_filter, array( $term->term_id ) );
							$link = add_query_arg( $arg, implode( ',', $current_filter_without_this ), $link );
						}

					} else {

						$class = '';
						$link = add_query_arg( $arg, implode( ',', $current_filter ), $link );

					}

					// Search Arg
					if ( get_search_query() ) {
						$link = add_query_arg( 's', get_search_query(), $link );
					}

					// Post Type Arg
					if ( isset( $_GET['post_type'] ) ) {
						$link = add_query_arg( 'post_type', $_GET['post_type'], $link );
					}

					// Query type Arg
					if ( $query_type == 'or' && ! ( sizeof( $current_filter ) == 1 && isset( $_chosen_attributes[ $taxonomy ]['terms'] ) && is_array( $_chosen_attributes[ $taxonomy ]['terms'] ) && in_array( $term->term_id, $_chosen_attributes[ $taxonomy ]['terms'] ) ) ) {
						$link = add_query_arg( 'query_type_' . sanitize_title( $instance['attribute'] ), 'or', $link );
					}

					// Main plugin style.
					wp_enqueue_style( 'ql_visual_attributes-css' );

					echo '<li ' . $class . '>';

					switch ( $visual_type ) :

						case 'image':
							
							// Image
							$image_data = get_metadata( 'taxonomy_term', $term->term_id, 'image', true );
							$image_data = json_decode( html_entity_decode( $image_data ) );
							// echo '<pre>'.print_r($image_data,1);exit;
							if ( isset( $image_data->thumbnail ) ) {
								$image = $image_data->thumbnail;
								
								echo '<a href="' . esc_url( apply_filters( 'sportexx_layered_nav_link', $link ) ) . '" class="va-picker va-picker-image" title="' . esc_attr( $term->slug ) . '"><img class="va-picker-item va-image" src="' . esc_url( $image ) . '" alt="' . esc_attr( $term->slug ) . '"/></a>';
							}
							break;

						case 'icon':
							
							// Icon
							$icon_class = get_metadata( 'taxonomy_term', $term->term_id, 'icon', true );
							$icon_color_data = get_metadata( 'taxonomy_term', $term->term_id, 'icon_color', true );
							$icon_color_bg_data = get_metadata( 'taxonomy_term', $term->term_id, 'icon_color_bg', true );
							$icon_color_data = json_decode( $icon_color_data );
							$icon_color_bg_data = json_decode( $icon_color_bg_data );
							// echo '<pre>'.print_r($icon_color_data,1);
							// echo '<pre>'.print_r($icon_color_bg_data,1);
							// echo $icon_class;exit;
							
							if ( $icon =  $icon_class ) :
								// Add icon sets
								$icon_sets = array(
									'genericon' => array(
										'button_label' => __( 'Pick Genericon', 'sportexx' ),
										'url' => '/icons/gi/genericons.css',
									),
									'fa' => array(
										'button_label' => __( 'Pick FontAwesome', 'sportexx' ),
										'url' => '/icons/fa/css/font-awesome.min.css',
									),
								);
								foreach( array_keys( $icon_sets ) as $key ) {
									if ( !wp_script_is( "ql-icon-picker-$key" ) ) {
										if ( false !== stripos( $icon, $key ) ) {
											wp_enqueue_style( "ql-icon-picker-$key" );
										}
									}
								}

								if( $icon_color_data && $icon_color_bg_data ) {
									$icon_color = $icon_color_data->hex;
									$icon_color_bg =  $icon_color_bg_data->hex;
									if ( $icon_color || $icon_color_bg ) {
										$icon_style = 'style="';
										$icon_style .= $icon_color? 'color: ' . $icon_color . ';' : '';
										$icon_style .= $icon_color_bg? 'background-color: ' . $icon_color_bg . ';' : '';
										$icon_style .= '"';
									} else {
										$icon_style = '';
									}
								} else {
									$icon_style = '';
								}

								echo '<a href="' . esc_url( apply_filters( 'sportexx_layered_nav_link', $link ) ) . '" class="va-picker va-picker-icon" title="' . esc_attr( $term->slug ) . '"><i class="va-picker-item va-icon ' . esc_attr( $icon ) . '" ' . $icon_style . '></i></a>';
							endif;
							break;

						case 'color':
							
							// Color
							$color_data = get_metadata( 'taxonomy_term', $term->term_id, 'color', true );
							$color_data = json_decode( $color_data );
							// echo '<pre>'.print_r($color_data,1);
							if ( $color = $color_data->hex ) :
								$color_style = 'background-color: ' . $color . ';';
								$color_style = 'style="' . esc_attr( $color_style ) . '"';

								echo '<a href="' . esc_url( apply_filters( 'sportexx_layered_nav_link', $link ) ) . '" class="va-picker va-picker-color" title="' . esc_attr( $term->slug ) . '"><span class="va-picker-item va-color" ' . $color_style . '></span></a>';
							endif;
							break;

						case 'text':
							// Text
							$text_content = get_metadata( 'taxonomy_term', $term->term_id, 'text', true );
							$text_color_data = get_metadata( 'taxonomy_term', $term->term_id, 'text_color', true );
							$text_color_bg_data = get_metadata( 'taxonomy_term', $term->term_id, 'text_color_bg', true );
							$text_color_data = json_decode( $text_color_data );
							$text_color_bg_data = json_decode( $text_color_bg_data );
							// echo '<pre>'.print_r($text_color_data,1);
							// echo '<pre>'.print_r($text_color_bg_data,1);
							// echo $text_content;exit;

							if ( $text =  $text_content ) :
								if( $text_color_data && $text_color_bg_data ) {
									$text_color = $text_color_data->hex;
									$text_color_bg =  $text_color_bg_data->hex;
									if ( $text_color || $text_color_bg ) {
										$text_style = 'style="';
										$text_style .= $text_color? 'color: ' . $text_color . ';' : '';
										$text_style .= $text_color_bg? 'background-color: ' . $text_color_bg . ';' : '';
										$text_style .= '"';
									} else {
										$text_style = '';
									}
								} else {
									$text_style = '';
								}
								
								echo '<a href="' . esc_url( apply_filters( 'sportexx_layered_nav_link', $link ) ) . '" class="va-picker va-picker-text" title="' . esc_attr( $term->slug ) . '"><span class="va-picker-item va-text ' . esc_attr( $text ) . '" ' . $text_style . '>' . esc_html( $text ) . '</span></a>';
							endif;
							break;

					endswitch;

					echo '</li>';
					
				}

				echo '</ul>';

			} // End display type conditional

			$this->widget_end( $args );

			if ( ! $found ) {
				ob_end_clean();
			} else {
				echo ob_get_clean();
			}
		}
	}

	/**
	 * Layered Nav Init
	 */
	function sportexx_layered_nav_init( ) {

		if ( is_active_widget( false, false, 'sportexx_layered_nav', true ) && ! is_admin() ) {

			global $_chosen_attributes;

			$_chosen_attributes = array();

			$attribute_taxonomies = wc_get_attribute_taxonomies();
			if ( $attribute_taxonomies ) {
				foreach ( $attribute_taxonomies as $tax ) {

					$attribute       = wc_sanitize_taxonomy_name( $tax->attribute_name );
					$taxonomy        = wc_attribute_taxonomy_name( $attribute );
					$name            = 'filter_' . $attribute;
					$query_type_name = 'query_type_' . $attribute;

			    	if ( ! empty( $_GET[ $name ] ) && taxonomy_exists( $taxonomy ) ) {

			    		$_chosen_attributes[ $taxonomy ]['terms'] = explode( ',', $_GET[ $name ] );

			    		if ( empty( $_GET[ $query_type_name ] ) || ! in_array( strtolower( $_GET[ $query_type_name ] ), array( 'and', 'or' ) ) )
			    			$_chosen_attributes[ $taxonomy ]['query_type'] = apply_filters( 'woocommerce_layered_nav_default_query_type', 'and' );
			    		else
			    			$_chosen_attributes[ $taxonomy ]['query_type'] = strtolower( $_GET[ $query_type_name ] );

					}
				}
		    }
		    $wc_query = new WC_Query();

		    add_filter('loop_shop_post_in', array( $wc_query, 'layered_nav_query' ) );
	    }
	}
}

endif;
