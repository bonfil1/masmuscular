<?php
/**
 * Product Image Card
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

$main_image_bg_url = '';

if( !empty( $main_image ) ) {
	$main_image_src = wp_get_attachment_image_src( $main_image, 'full' );

	if( isset( $main_image_src[0] ) ) {
		$main_image_bg_url = $main_image_src[0];
	}
}

$style_attr = '';

if( !empty( $main_image_bg_url ) ) {
	$style_attr = 'background:url(' . $main_image_bg_url . '); background-size: cover;';
}

if( !empty( $style_attr ) ) {
	$style_attr = 'style="' . esc_attr( $style_attr ) . '"';
}
?>
<?php while ( have_posts() ) :  the_post(); ?>
<div class="card row <?php echo esc_attr( $el_class ); ?>">
	<div class="row-same-height">
		<div class="col-xs-7 card-desc img-bg col-xs-height col-top" <?php echo $style_attr; ?>>
			<div class="container-card-desc">					
				<div class="card-desc-top">
					<?php echo $caption; ?>
				</div>
				<div class="card-desc-bottom">
					<div class="card-action">
						<a href="<?php echo esc_url( $button_link ); ?>" class="btn btn-transparent btn-lg inverse"><?php echo $button_text; ?></a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-5 col-xs-height col-top">
			<div class="card-image">
				<?php echo wp_get_attachment_image( $side_image, 'full', false, array( 'class' => 'img-responsive' ) ); ?>
			</div>	
			<div class="card-image card-product white-bg center-image">
				<a href="<?php echo esc_url( get_the_permalink() ); ?>">
					<figure>
						<?php woocommerce_template_loop_product_thumbnail(); ?>
						<figcaption>
							<span class="product-title"><?php the_title(); ?></span>
							<span class="price"><?php woocommerce_template_loop_price(); ?></span>
						</figcaption>
					</figure>
				</a>
			</div>
		</div>
	</div>
</div><!-- /.card -->
<?php endwhile; ?>
<?php wp_reset_query(); ?>