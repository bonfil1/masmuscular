<?php
/**
 * Template functions used for pages.
 *
 * @package sportexx
 */

if ( ! function_exists( 'sportexx_page_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 * @since 1.0.0
	 * @return void
	 */
	function sportexx_page_header() {

		if( apply_filters( 'sportexx_show_page_header', true ) ) :
		?>
		<header class="entry-header inner-top-xs">
			<?php the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<?php
		endif;
	}
}

if ( ! function_exists( 'sportexx_page_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 * @since 1.0.0
	 * @return void
	 */
	function sportexx_page_content() {
		?>
		<div class="entry-content" itemprop="mainContentOfPage">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'sportexx' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php
	}
}