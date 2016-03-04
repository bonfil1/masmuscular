<?php
/**
 * Template functions used for posts.
 *
 * @package sportexx
 */

if( ! function_exists( 'sportexx_get_post_icon' ) ) {
	/**
	 * Display Post Icon based on post format
	 * @since 1.0.0
	 */
	function sportexx_get_post_icon() {

		$post_format = get_post_format();
		$post_icon = 'fa fa-paragraph';

		switch( $post_format ) {
			case 'image':
				$post_icon = 'fa fa-image';
			break;
			case 'gallery':
				$post_icon = 'fa fa-th-large';
			break;
			case 'video':
				$post_icon = 'fa fa-film';
			break;
			case 'audio':
				$post_icon = 'fa fa-music';
			break;
			case 'quote':
				$post_icon = 'fa fa-quote-left';
			break;
			case 'link':
				$post_icon = 'fa fa-link';
			break;
			case 'status':
				$post_icon = 'fa fa-comment-o';
			break;
			case 'chat':
				$post_icon = 'fa fa-comments-o';
			break;
			case 'aside':
				$post_icon = 'fa fa-hand-o-left';
			break;
			default :
				$post_icon = 'fa fa-paragraph';
		}

		return apply_filters( 'sportexx_post_icon', $post_icon, $post_format );
	}
}

if ( ! function_exists( 'sportexx_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 * @since 1.0.0
	 */
	function sportexx_post_header() { ?>
		<header class="entry-header">
		<?php
		$comments_link = '';

		if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
			$comments_link = sprintf( '<a href="%s" class="comments-link flip pull-right icon-comments hidden-xs"><i class="fa fa-comment"></i><span class="comment-count">%d</span></a>', esc_url( get_comments_link() ), get_comments_number() );
		}

		if ( is_single() ) {
			
			the_title( '<h1 class="entry-title" itemprop="name headline">', sprintf( '%s</h1>', $comments_link ) );
			sportexx_posted_on();

		} else {
			
			the_title( sprintf( '<h2 class="entry-title" itemprop="name headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), sprintf( '</a>%s</h2>', $comments_link ) );
			
			if ( 'post' == get_post_type() ) {
				sportexx_posted_on();
			}
		}

		?>
		</header><!-- .entry-header -->
		<?php
	}
}

if( ! function_exists( 'sportexx_post_media_attachment' ) ) {
	/**
	 * Displays the media attachment of the post
	 * @since 1.0.0
	 */
	function sportexx_post_media_attachment() { 
		
		$post_format = get_post_format();
		
		ob_start();

		if( $post_format == 'gallery' ){
			sportexx_gallery_slideshow( get_the_ID() );	
		} else if ( $post_format == 'video' ){
			sportexx_video_player( get_the_ID() );
		} else if ( $post_format == 'audio' ){
			sportexx_audio_player( get_the_ID() );
		} else if ( $post_format == 'image' || has_post_thumbnail() ){
			the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) );
		}

		$media_attachment = ob_get_clean();

		if( ! empty( $media_attachment ) ) {
			echo '<div class="media-attachment">' . $media_attachment . '</div>';
		}

	}
}

if( ! function_exists( 'sportexx_post_thumbnail' ) ) {
	function sportexx_get_post_thumbnail( $post_id, $size = 'post-thumbnail', $placeholder_width = 0, $placeholder_height = 0 ) {

		if( has_post_thumbnail() ) {
			return get_the_post_thumbnail( $post_id, $size );
		} elseif( sportexx_blog_placeholder_img_src() ) {
			return sportexx_blog_placeholder_img();
		}
	}
}

if( ! function_exists( 'sportexx_post_loop_description' ) ) {
	
	function sportexx_post_loop_description() {

		if( apply_filters( 'sportexx_force_excerpt', TRUE ) ) {
			sportexx_post_excerpt();
			sportexx_post_readmore();
		} else {
			sportexx_post_content();
		}
	}
}

if ( ! function_exists( 'sportexx_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 * @since 1.0.0
	 */
	function sportexx_post_content() {

		$post_format = get_post_format();

		if( $post_format === 'quote' ) : ?>
			
			<blockquote itemprop="articleBody">
				<p><?php echo esc_attr( get_post_meta ( get_the_ID() , 'postformat_quote_text' , true ) ); ?></p>
				<footer><cite><?php echo esc_attr( get_post_meta( get_the_ID() , 'postformat_quote_source' , true ) ); ?></cite></footer>
			</blockquote>
		
		<?php else : ?>
		
		<div class="entry-content ">
		
		<?php
			the_content(
				sprintf(
					__( 'Continue reading %s', 'sportexx' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				)
			);

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'sportexx' ),
				'after'  => '</div>',
			) );
		?>

		</div><!-- .entry-content -->
		<?php endif; ?>
		
		<?php
	}
}

if ( ! function_exists( 'sportexx_post_excerpt' ) ) {
	/**
	 * Display the post excerpt with a link to the single post
	 * @since 1.0.0
	 */
	function sportexx_post_excerpt() {

		$post_format = get_post_format();

		if( $post_format === 'quote' ) : ?>
			
			<blockquote itemprop="articleBody">
				<p><?php echo esc_attr( get_post_meta ( get_the_ID() , 'postformat_quote_text' , true ) ); ?></p>
				<footer><cite><?php echo esc_attr( get_post_meta( get_the_ID() , 'postformat_quote_source' , true ) ); ?></cite></footer>
			</blockquote>
		
		<?php else : ?>
		
		<div class="post-excerpt">
		
		<?php
			the_excerpt();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'sportexx' ),
				'after'  => '</div>',
			) );
		?>

		</div><!-- .post-excerpt -->
		<?php endif; ?>
		
		<?php
	}
}

if( ! function_exists( 'sportexx_post_readmore' ) ) {
	function sportexx_post_readmore() {
		?>
		<a href="<?php the_permalink(); ?>" class="btn btn-primary btn-readmore"><?php echo apply_filters( 'sportexx_blog_post_readmore_text', __( 'Read More', 'sportexx' ) ); ?></a>
		<?php
	}
}

if ( ! function_exists( 'sportexx_post_meta' ) ) {
	/**
	 * Display the post meta
	 * @since 1.0.0
	 */
	function sportexx_post_meta() {
		?>
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>

			<?php
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', __( ', ', 'sportexx' ) );

			if ( $tags_list ) : ?>
			<aside class="post-meta">
				<span class="tags-links">
					<?php
					echo '<span class="tag-title">' . esc_attr( __( 'Tags: ', 'sportexx' ) ) . '</span>';
					echo wp_kses_post( $tags_list );
					?>
				</span>
			</aside>
			<?php endif; // End if $tags_list ?>

			<?php endif; // End if 'post' == get_post_type() ?>
		<?php
	}
}

if ( ! function_exists( 'sportexx_paging_nav' ) ) {
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function sportexx_paging_nav() {
		global $wp_query;

		if( !is_rtl() ) {
			$args = array(
				'type' 		=> 'list',
				'next_text' => __( 'Next', 'sportexx' ) . '&nbsp;<span class="meta-nav">&rarr;</span>',
				'prev_text'	=> '<span class="meta-nav">&larr;</span>&nbsp' . __( 'Previous', 'sportexx' ),
			);
		} else {
			$args = array(
				'type' 		=> 'list',
				'next_text' => __( 'Next', 'sportexx' ) . '&nbsp;<span class="meta-nav">&larr;</span>',
				'prev_text'	=> '<span class="meta-nav">&rarr;</span>&nbsp' . __( 'Previous', 'sportexx' ),
			);
		}

		the_posts_pagination( $args );
	}
}

if ( ! function_exists( 'sportexx_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function sportexx_post_nav() {

		if( !is_rtl() ) {
			$args = array(
				'next_text' => '%title &nbsp;<span class="meta-nav">&rarr;</span>',
				'prev_text'	=> '<span class="meta-nav">&larr;</span>&nbsp;%title',
			);	
		} else {
			$args = array(
				'next_text' => '%title &nbsp;<span class="meta-nav">&larr;</span>',
				'prev_text'	=> '<span class="meta-nav">&rarr;</span>&nbsp;%title',
			);
		}
		
		the_post_navigation( $args );
	}
}

if ( ! function_exists( 'sportexx_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function sportexx_posted_on() {

		$posted_on = sportexx_get_posted_on();

		$byline = sportexx_get_byline();

		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'sportexx' ) );
		$cat_links = '';

		if ( $categories_list && sportexx_categorized_blog() ){
			$cat_links = sprintf( '<span class="cat-links"><span class="screen-reader-text">%s</span>%s</span>', esc_attr( __( 'Categories: ', 'sportexx' ) ), wp_kses_post( $categories_list ) );
		}

		echo apply_filters( 'sportexx_single_post_posted_on_html', '<div class="post-meta"><span class="byline"> ' . $byline . '</span><span class="posted-on">' . $posted_on . '</span>' . $cat_links . '</div>', $posted_on, $byline, $cat_links );

	}
}

if( ! function_exists( 'sportexx_get_posted_on' ) ) {
	/**
	 * Gets posted on link
	 *
	 * @return string link containing the posted on date
	 */
	function sportexx_get_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';
		
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s" itemprop="datePublished">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			_x( '%s', 'post date', 'sportexx' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		return $posted_on;
	}
}

if( ! function_exists( 'sportexx_get_byline' ) ) {
	/**
	 * Gets author byline for the post
	 *
	 * @return string
	 */
	function sportexx_get_byline() {
		$byline = sprintf(
			_x( 'by %s', 'post author', 'sportexx' ),
			'<span class="vcard author"><span class="fn" itemprop="author"><a class="url fn n" rel="author" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span></span>'
		);

		return $byline;
	}
}

if ( !function_exists( 'sportexx_gallery_slideshow' ) ) :
	/**
	 * Output Gallery (slide show) for Post Format.
	 */
    function sportexx_gallery_slideshow($post_id , $thumbnail = 'post-thumbnail') {
    	global $post;
    	
    	$post_id = ($post_id) ? $post_id : $post->ID;

    	// Get the media ID's
		$ids = esc_attr(get_post_meta($post_id, 'postformat_gallery_ids', true));

		// Query the media data
		$attachments = get_posts( array(
			'post__in' 			=> explode(",", $ids),
			'orderby' 			=> 'post__in',
			'post_type' 		=> 'attachment',
			'post_mime_type' 	=> 'image',
			'post_status' 		=> 'any',
			'numberposts' 		=> -1
		));

		// Create the media display
		if ($attachments) : 

			wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '1.10.2', true );
		?>
		<div class="media-attachment-gallery">
			<div id="owl-carousel-<?php echo $post_id; ?>" class="owl-carousel owl-inner-pagination owl-inner-nav owl-blog-post-gallery">
			<?php foreach ($attachments as $attachment): ?>
				<div class="item">
					<figure>
						<?php echo wp_get_attachment_image($attachment->ID, $thumbnail); ?>
					</figure>
				</div><!-- /.item -->
			<?php endforeach; ?>
			</div>
			<?php if( is_rtl() ) : ?>
			<div class="owl-custom-pagination">
				<a href="#" data-target="#owl-carousel-<?php echo $post_id; ?>" class="slider-prev btn-prev fa fa-angle-right"></a>
				<a href="#" data-target="#owl-carousel-<?php echo $post_id; ?>" class="slider-next btn-next fa fa-angle-left"></a>
			</div><!-- /.owl-custom-paginatio  -->
			<?php else : ?>
			<div class="owl-custom-pagination">
				<a href="#" data-target="#owl-carousel-<?php echo $post_id; ?>" class="slider-prev btn-prev fa fa-angle-left"></a>
				<a href="#" data-target="#owl-carousel-<?php echo $post_id; ?>" class="slider-next btn-next fa fa-angle-right"></a>
			</div><!-- /.owl-custom-paginatio  -->
			<?php endif; ?>
		</div><!-- /.media-attachment-gallery -->
		<script type="text/javascript">
	
			jQuery(document).ready(function(){
				if(jQuery().owlCarousel) {
					jQuery("#owl-carousel-<?php echo $post_id; ?>").owlCarousel({
						items : 1,
						nav : false,
						<?php if( is_rtl() ) : ?>
						rtl: true,
						<?php endif; ?>
						slideSpeed : 300,
						dots: false,
						paginationSpeed : 400,
						navText: ["", ""],
						responsive:{
							0:{
								items:1
							},
							600:{
								items:1
							},
							1000:{
								items:1
							}
						}
					});

					jQuery(".slider-next").click(function () {
						var owl = jQuery(jQuery(this).data('target'));
						owl.trigger('next.owl.carousel');
						return false;
					});

					jQuery(".slider-prev").click(function () {
						var owl = jQuery(jQuery(this).data('target'));
						owl.trigger('prev.owl.carousel');
						return false;
					});
				}
			});

		</script>
		<?php endif;
	}
endif;

if ( !function_exists( 'sportexx_audio_player' ) ) :
	/**
	 *  Output Audio Player for Post Format
	 */
    function sportexx_audio_player($post_id, $width = 1200) {

    	// Get the player media
		$mp3    = get_post_meta($post_id, 'postformat_audio_mp3', 		TRUE);
		$ogg    = get_post_meta($post_id, 'postformat_audio_ogg', 		TRUE);
		$embed  = get_post_meta($post_id, 'postformat_audio_embedded', 	TRUE);
		$height = get_post_meta($post_id, 'postformat_poster_height', 	TRUE);

		if ( isset($embed) && $embed != '' ) {
			// Embed Audio
			if( !empty($embed) ) {
				// run oEmbed for known sources to generate embed code from audio links
				echo $GLOBALS['wp_embed']->autoembed( stripslashes(htmlspecialchars_decode($embed)) );

				return; // and.... Done!
			}

		} else {

			wp_enqueue_script( 'jplayer', get_template_directory_uri() . '/assets/js/jquery.jplayer.min.js', array( 'jquery' ), '1.10.2', true );
		    
		    // Other audio formats ?>

			<script type="text/javascript">
		
				jQuery(document).ready(function(){

					if(jQuery().jPlayer) {
						jQuery("#jquery_jplayer_<?php echo $post_id; ?>").jPlayer({
							ready: function (event) {

								// set media
								jQuery(this).jPlayer("setMedia", {
								    <?php 
								    if($mp3 != '') :
										echo 'mp3: "'. $mp3 .'",';
									endif;
									if($ogg != '') :
										echo 'oga: "'. $ogg .'",';
									endif; ?>
									end: ""
								});
							},
							<?php if( !empty($poster) ) { ?>
							size: {
	        				    width: "<?php echo $width; ?>px",
	        				    height: "<?php echo $height . 'px'; ?>"
	        				},
	        				<?php } ?>
							swfPath: "<?php echo get_template_directory_uri(); ?>/assets/js",
							cssSelectorAncestor: "#jp_interface_<?php echo $post_id; ?>",
							supplied: "<?php if($ogg != '') : ?>oga,<?php endif; ?><?php if($mp3 != '') : ?>mp3, <?php endif; ?> all"
						});
					
					}
				});
			</script>

			<div id="jquery_jplayer_<?php echo $post_id; ?>" class="jp-jplayer jp-jplayer-audio"></div>

			<div class="jp-audio-container">
				<div class="jp-audio">
					<div class="jp-type-single">
						<div id="jp_interface_<?php echo $post_id; ?>" class="jp-interface">
							<ul class="jp-controls">
								<li><div class="seperator-first"></div></li>
								<li><div class="seperator-second"></div></li>
								<li><a href="#" class="jp-play" tabindex="1"><i class="fa fa-play"></i><span>play</span></a></li>
								<li><a href="#" class="jp-pause" tabindex="1"><i class="fa fa-pause"></i><span>pause</span></a></li>
								<li><a href="#" class="jp-mute" tabindex="1"><i class="fa fa-volume-up"></i><span>mute</span></a></li>
								<li><a href="#" class="jp-unmute" tabindex="1"><i class="fa fa-volume-off"></i><span>unmute</span></a></li>
							</ul>
							<div class="jp-progress-container">
								<div class="jp-progress">
									<div class="jp-seek-bar">
										<div class="jp-play-bar"></div>
									</div>
								</div>
							</div>
							<div class="jp-volume-bar-container">
								<div class="jp-volume-bar">
									<div class="jp-volume-bar-value"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php 
		} // End if embedded/else
    }
endif;

if ( !function_exists( 'sportexx_video_player' ) ) :
	/**
	 * Video Player / Embeds (self-hosted, jPlayer)
	 */
    function sportexx_video_player($post_id, $width = 1200) {
	
    	// Check for embedded video
    	$embed = get_post_meta($post_id, 'postformat_video_embed', true); 
		if( !empty($embed) ) {
			$embed = do_shortcode( $embed );
			// run oEmbed for known sources to generate embed code from video links
			echo '<div class="video-container"><div class="embed-responsive embed-responsive-16by9">'. $GLOBALS['wp_embed']->autoembed( stripslashes(htmlspecialchars_decode($embed)) ) .'</div></div>';

			return; // and.... Done!
		}
		wp_enqueue_script( 'jplayer', get_template_directory_uri() . '/assets/js/jquery.jplayer.min.js', array( 'jquery' ), '1.10.2', true );

		// Get the player media options
    	$height 	= get_post_meta($post_id, 'postformat_video_height', 	true);
    	$m4v 		= get_post_meta($post_id, 'postformat_video_m4v', 		true);
    	$ogv 		= get_post_meta($post_id, 'postformat_video_ogv', 		true);
    	$webm 		= get_post_meta($post_id, 'postformat_video_webm', 		true);
    	$poster 	= get_post_meta($post_id, 'postformat_video_poster', 	true);
	
		?>
	    <script type="text/javascript">
	    	jQuery(document).ready(function(){
			
	    		if(jQuery().jPlayer) {
	    			jQuery("#jquery_jplayer_<?php echo $post_id; ?>").jPlayer({
	    				ready: function (event) {
							// mobile display helper
							// if(event.jPlayer.status.noVolume) {	$('#jp_interface_<?php echo $post_id; ?>').addClass('no-volume'); }
							// set media
	    					jQuery(this).jPlayer("setMedia", {
	    						<?php if($m4v != '') : ?>
	    						m4v: "<?php echo $m4v; ?>",
	    						<?php endif; ?>
	    						<?php if($ogv != '') : ?>
	    						ogv: "<?php echo $ogv; ?>",
	    						<?php endif; ?>
	    						<?php if($webm != '') : ?>
	    						webmv: "<?php echo $webm; ?>",
	    						<?php endif; ?>
	    						<?php if ($poster != '') : ?>
	    						poster: "<?php echo $poster; ?>"
	    						<?php endif; ?>
	    					});
	    				},
	    				size: {
	    				    width: "<?php echo $width ?>px",
	    				    // height: "<?php echo $height . 'px'; ?>"
	    				},
	    				swfPath: "<?php echo get_template_directory_uri(); ?>/assets/js",
	    				cssSelectorAncestor: "#jp_interface_<?php echo $post_id; ?>",
	    				supplied: "<?php if($m4v != '') : ?>m4v, <?php endif; ?><?php if($ogv != '') : ?>ogv, <?php endif; ?> all"
	    			});
	    		}
	    	});
	    </script>

	    <div id="jquery_jplayer_<?php echo $post_id; ?>" class="jp-jplayer jp-jplayer-video"></div>

	    <div class="jp-video-container">
	        <div class="jp-video">
	            <div class="jp-type-single">
	                <div id="jp_interface_<?php echo $post_id; ?>" class="jp-interface">
	                    <ul class="jp-controls">
	                    	<li><div class="seperator-first"></div></li>
	                        <li><div class="seperator-second"></div></li>
	                        <li><a href="#" class="jp-play" tabindex="1"><i class="fa fa-play"></i><span>play</span></a></li>
	                        <li><a href="#" class="jp-pause" tabindex="1"><i class="fa fa-pause"></i><span>pause</span></a></li>
	                        <li><a href="#" class="jp-mute" tabindex="1"><i class="fa fa-volume-up"></i><span>mute</span></a></li>
	                        <li><a href="#" class="jp-unmute" tabindex="1"><i class="fa fa-volume-off"></i><span>unmute</span></a></li>
	                    </ul>
	                    <div class="jp-progress-container">
	                        <div class="jp-progress">
	                            <div class="jp-seek-bar">
	                                <div class="jp-play-bar"></div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="jp-volume-bar-container">
	                        <div class="jp-volume-bar">
	                            <div class="jp-volume-bar-value"></div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <?php 
	}
endif;

if( !function_exists( 'sportexx_single_post_social_icons' ) ) {
	function sportexx_single_post_social_icons() {

		if( apply_filters( 'sportexx_enable_post_item_share', TRUE ) ) :

			$url = get_permalink();
			$title = get_the_title();

			if( has_post_thumbnail() ) {
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );

				if( isset( $thumbnail[0] ) ) {
					$thumbnail_src = $thumbnail[0];
				}
			}

			$single_post_social_icons_args = apply_filters( 'single_post_social_icons_args', array(
				'facebook'		=> array(
					'share_url'	=> 'http://www.facebook.com/sharer.php',
					'icon'		=> 'fa fa-facebook',
					'name'		=> __( 'Facebook', 'sportexx' ),
					'params'	=> array(
						'u'				=> 'url'
					)
				),
				'twitter'		=> array(
					'share_url'	=> 'https://twitter.com/share',
					'icon'		=> 'fa fa-twitter',
					'name'		=> __( 'Twitter', 'sportexx' ),
					'params'	=> array(
						'url'			=> 'url',
						'text'			=> 'title',
						'via'			=> 'via',
						'hastags'		=> 'hastags'
					)
				),
				'google_plus'	=> array(
					'share_url'	=> 'https://plus.google.com/share',
					'name'		=> __( 'Google Plus', 'sportexx' ),
					'icon'		=> 'fa fa-google-plus',
					'params'	=> array(
						'url'			=> 'url'
					)
				),
				'pinterest'		=> array(
					'share_url'	=> 'https://pinterest.com/pin/create/bookmarklet/',
					'name'		=> __( 'Pinterest', 'sportexx' ),
					'icon'		=> 'fa fa-pinterest',
					'params'	=> array(
						'media'			=> 'thumbnail_src',
						'url'			=> 'url',
						'is_video'		=> 'is_video',
						'description'	=> 'title'
					)
				),
				'digg'			=> array(
					'share_url'	=> 'http://digg.com/submit',
					'name'		=> __( '', 'sportexx' ),
					'icon'		=> 'fa fa-digg',
					'params'	=> array(
						'url'			=> 'url',
						'title'			=> 'title',
					)
				),
				'tumblr'		=> array(
					'share_url'	=> 'http://www.tumblr.com/share/link',
					'name'		=> __( '', 'sportexx' ),
					'icon'		=> 'fa fa-tumblr',
					'params'	=> array(
						'url'			=> 'url',
						'title'			=> 'title',
					)
				),
				'reddit'		=> array(
					'share_url'	=> 'http://reddit.com/submit',
					'name'		=> __( '', 'sportexx' ),
					'icon'		=> 'fa fa-reddit',
					'params'	=> array(
						'url'			=> 'url',
						'title'			=> 'title',
					)
				),
				'stumble_upon'	=> array(
					'share_url'	=> 'http://www.stumbleupon.com/submit',
					'name'		=> __( '', 'sportexx' ),
					'icon'		=> 'fa fa-stumbleupon',
					'params'	=> array(
						'url'			=> 'url',
						'title'			=> 'title',
					)
				),
				'delicious'		=> array(
					'share_url'	=> 'https://delicious.com/save',
					'name'		=> __( '', 'sportexx' ),
					'icon'		=> 'fa fa-delicious',
					'params'	=> array(
						'v'				=> '5',
						'jump'			=> 'close',
						'url'			=> 'url',
						'title'			=> 'title',
					)
				),
				'email'			=> array(
					'share_url'	=> 'mailto:yourfriend@email.com',
					'name'		=> __( 'Email', 'sportexx' ),
					'icon'		=> 'fa fa-envelope',
					'params'	=> array(
						'subject'		=> 'title',
						'body'			=> 'url',
					)
				),
			) );
			?>
			<div class="block-social-icons">
				<ul class="list-social-icons">
					<?php foreach( $single_post_social_icons_args as $key => $social_icon ): ?>
						<?php 
							$query_args = array();
							foreach( $social_icon['params'] as $param_key => $param ) {

								if( isset( $$param ) ) {
									$query_args[ $param_key ] = $$param;
								}
							}

							$share_url = add_query_arg( $query_args, $social_icon['share_url'] );
						?>
					<li class="<?php echo esc_attr( $key ); ?>">
						<a href="<?php echo esc_url( $share_url ); ?>" title="<?php esc_attr( $social_icon['name'] ); ?>">
							<i class="<?php echo esc_attr( $social_icon['icon'] ); ?>"></i>
						</a>
					</li>
					<?php endforeach; ?>
				</ul><!-- /.social-icons -->
			</div>
			<?php
		endif;
	}
}