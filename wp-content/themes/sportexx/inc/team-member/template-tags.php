<?php
/**
 * Custom template tags used to integrate this theme with Our Team.
 *
 * @package sportexx
 */

/**
 * Before Content
 * Wraps all Team member content in wrappers which match the theme markup
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'sportexx_before_ot_content' ) ) {
	function sportexx_before_ot_content() {

		$page_layout_args = sportexx_get_page_layout_args();

		ob_start();
	}
}

/**
 * After Content
 * Closes the wrapping divs
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'sportexx_after_ot_content' ) ) {
	function sportexx_after_ot_content() {

		$page_layout_args = sportexx_get_page_layout_args();
		
		$output = ob_get_clean();

		$layout_args = array( 'main_content' => $output );

		sportexx_get_template( 'layouts/' . $page_layout_args['layout'] . '.php', $layout_args );

	}
}

/**
 * Post Thumbnail
 * @since   1.0.0
 * @return  void
 */
if ( !function_exists( 'our_team_post_thumbnail' ) ) {
	function our_team_post_thumbnail( $id = '', $image_size = 'post-thumbnail', $should_link = false ) {
		if( empty( $id ) ) {
			$id = get_the_ID();
		}
		$post_thumbnail = get_the_post_thumbnail( $id, $image_size );
		if( $should_link ) {
			$post_thumbnail = '<a href="' . esc_attr( get_permalink() ) . '">' . $post_thumbnail . '</a>';	
		}
		echo $post_thumbnail;
	}
}

/**
 * Archive Post Thumbnail
 * @since   1.0.0
 * @return  void
 */
if ( !function_exists( 'our_team_archive_post_thumbnail' ) ) {
	function our_team_archive_post_thumbnail() {
		echo '<div class="image desat">';
		our_team_post_thumbnail( '', '', true );
		echo '</div>';
	}
}

/**
 * Single Post Thumbnail
 * @since   1.0.0
 * @return  void
 */
if ( !function_exists( 'our_team_single_post_thumbnail' ) ) {
	function our_team_single_post_thumbnail() {
		our_team_post_thumbnail();
	}
}

/**
 * Archive Post Title
 * @since   1.0.0
 * @return  void
 */
if ( !function_exists( 'our_team_archive_post_title' ) ) {
	function our_team_archive_post_title() {
		the_title( sprintf( '<h2 class="team-member-name" itemprop="name headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
	}
}

/**
 * Single Post Title
 * @since   1.0.0
 * @return  void
 */
if ( !function_exists( 'our_team_single_post_title' ) ) {
	function our_team_single_post_title() {
		?>
		<header class="entry-header"> <?php
			the_title( '<h1 itemprop="name headline" class="entry-title">', '</h1>' );
			our_team_member_role();
		?>
		</header>
		<?php
	}
}

/**
 * Post Content
 * @since   1.0.0
 * @return  void
 */
if ( !function_exists( 'our_team_post_content' ) ) {
	function our_team_post_content() {
		the_content();
	}
}

/**
 * Excerpt
 * @since   1.0.0
 * @return  void
 */
if ( !function_exists( 'our_team_post_excerpt' ) ) {
	function our_team_post_excerpt() {
		echo '<div class="team-member-desc">';
		the_excerpt();
		echo '</div>';
	}
}

/**
 * Role
 * @since   1.0.0
 * @return  void
 */
if ( !function_exists( 'our_team_member_role' ) ) {
	function our_team_member_role() {
		$role = esc_attr( get_post_meta( get_the_ID(), '_byline', true ) );
		echo '<p class="team-member-desig">'.$role.'</p>';
	}
}

/**
 * Social Links
 * @since   1.0.0
 * @return  void
 */
if ( !function_exists( 'our_team_member_social_links' ) ) {
	function our_team_member_social_links() {
		
		$twitter 			= esc_attr( get_post_meta( get_the_ID(), '_twitter', true ) );
		$facebook			= esc_attr( get_post_meta( get_the_ID(), '_facebook', true ) );
		$vine 				= esc_attr( get_post_meta( get_the_ID(), '_vine', true ) );
		$google_plus 		= esc_attr( get_post_meta( get_the_ID(), '_google_plus', true ) );
		$pintrest 			= esc_attr( get_post_meta( get_the_ID(), '_pinterest', true ) );
		$url 				= esc_attr( get_post_meta( get_the_ID(), '_url', true ) );

		$social_icons = apply_filters( 'our_team_member_social_links_icons_args', array(
                'twitter'		=> array( 
                	'class' 		=> 'twitter', 
                	'icon' 			=> 'fa fa-twitter', 
                	'social_link' 	=> $twitter 
            	),
                'facebook'		=> array( 
                	'class' 		=> 'facebook', 
                	'icon' 			=> 'fa fa-facebook', 
                	'social_link' 	=> $facebook 
            	),
                'vine'			=> array( 
                	'class' 		=> 'vine', 
                	'icon' 			=> 'fa fa-vine', 
                	'social_link' 	=> $vine 
            	),
                'google_plus'	=> array( 
                	'class' 		=> 'google-plus', 
                	'icon' 			=> 'fa fa-google-plus', 
                	'social_link' 	=> $google_plus 
            	),
                'pinterest'		=> array( 
                	'class' 		=> 'pinterest', 
                	'icon' 			=> 'fa fa-pinterest', 
                	'social_link' 	=> $pintrest 
            	)
            )
		);
		?>
		<div class="block-social-icons inner-top-xs">
			<ul class="list-social-icons">
				<?php foreach ($social_icons as $social_icon) : ?>
					<?php if( !empty( $social_icon['social_link'] ) ) :?>
					<li class="<?php echo $social_icon['class']; ?>"><a href="<?php echo esc_url( $social_icon['social_link'] ); ?>"><i class="<?php echo $social_icon['icon']; ?>"></i></a></li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php
	}
}

if( ! function_exists( 'our_team_row_wrap_start' ) ) {
	function our_team_row_wrap_start() {
		echo '<div class="row">';
	}
}

if( ! function_exists( 'our_team_row_wrap_end' ) ) {
	function our_team_row_wrap_end() {
		echo '</div>';
	}
}

if( ! function_exists( 'our_team_archive_wrap_start' ) ) {
	function our_team_archive_wrap_start() {
		echo '<div class="col-lg-3 col-md-4 col-sm-6">';
	}
}

if( ! function_exists( 'our_team_archive_wrap_end' ) ) {
	function our_team_archive_wrap_end() {
		echo '</div>';
	}
}

if( ! function_exists( 'our_team_single_thumb_wrap_start' ) ) {
	function our_team_single_thumb_wrap_start() {
		echo '<div class="col-lg-4 col-md-4 col-sm-6">';
	}
}

if( ! function_exists( 'our_team_single_content_wrap_start' ) ) {
	function our_team_single_content_wrap_start() {
		echo '<div class="col-lg-8 col-md-8 col-sm-6">';
	}
}

if( ! function_exists( 'our_team_single_wrap_end' ) ) {
	function our_team_single_wrap_end() {
		echo '</div>';
	}
}
