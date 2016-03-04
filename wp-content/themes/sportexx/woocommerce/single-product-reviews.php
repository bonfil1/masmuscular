<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.2
 */
global $product;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews">
	<ul class="add-review clearfix">
		<li class="active">
			<a href="#">
				<?php
					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_review_count() ) )
						printf( _n( '%s review for %s', '%s reviews for %s', $count, 'sportexx' ), $count, get_the_title() );
					else
						_e( 'Reviews', 'sportexx' );
				?>
			</a>
		</li>
		<li><a href="#modal-add-review" data-toggle="modal" data-target="#modal-add-review"><?php echo __( 'Add Review', 'sportexx' ); ?></a></li>
	</ul>
	<div id="comments">

		<?php if ( have_comments() ) : ?>

			<ol class="comment-list">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<div class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'sportexx' ); ?></div>

		<?php endif; ?>
	</div>

	<?php sportexx_get_template( 'sections/modal-add-review.php' ); ?>

	<div class="clearfix"></div>
</div>
