<?php
/**
 * Product Card
 *
 * @author 		Transvelo
 * @package 	Sportexx/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$args = array(
	'post_type' => 'product',
	'post__in' => array( $product_id ),
);
query_posts( $args );
?>
<?php while ( have_posts() ) :  the_post(); ?>
	<div class="card row <?php echo esc_attr( $el_class ); ?>">
		<div class="row-same-height">
			<div class="col-xs-6 card-image white-bg center-image col-xs-height col-top">
				<a href="<?php echo esc_url( get_the_permalink() );?>">
					<figure>
						<?php woocommerce_template_loop_product_thumbnail(); ?>
						<figcaption>
							<span class="product-title"><?php the_title(); ?></span>
							<span class="price"><?php woocommerce_template_loop_price(); ?></span>
						</figcaption>
					</figure>
				</a>
			</div>
			<div class="col-xs-6 card-desc col-xs-height col-top">
				<div class="container-card-desc">
					<div class="card-desc-top">
						<?php echo $caption; ?>
					</div>
					<div class="card-desc-bottom">
						<div class="card-action">
							<a href="<?php echo esc_url( $btn_link ); ?>" class="btn btn-transparent btn-lg inverse"><?php echo $btn_text; ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.card -->
<?php endwhile; ?>
<?php wp_reset_query(); ?>