<?php
/**
 * Brands Carousel
 *
 * @author 		Transvelo
 * @package 	Sportexx/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- ============================================================= SECTION - BRANDS ============================================================= -->
<section id="brands-carousel">
	<div class="container inner-top-xs inner-bottom-md">

		<?php if( apply_filters( 'sportexx_show_brands_carousel_header', TRUE ) ) : ?>
		
		<header class="has-owl-custom-pagination">
			
			<?php if( apply_filters( 'sportexx_show_brands_carousel_title', TRUE ) ) : ?>
			<h2><?php echo apply_filters( 'sportexx_brands_carousel_title', $title ); ?><span class="divi">/</span></h2>
			<?php endif; ?>
			
			<?php if( apply_filters( 'sportexx_show_brands_carousel_custom_pagination', TRUE ) ) : ?>
				<?php if( is_rtl() ) : ?>
			<div class="owl-custom-pagination">
				<a href="#" data-target="#owl-brands" class="slider-prev btn-prev fa fa-angle-right"></a>
				<a href="#" data-target="#owl-brands" class="slider-next btn-next fa fa-angle-left"></a>
			</div><!-- /.owl-custom-pagination -->
				<?php else : ?>
			<div class="owl-custom-pagination">
				<a href="#" data-target="#owl-brands" class="slider-prev btn-prev fa fa-angle-left"></a>
				<a href="#" data-target="#owl-brands" class="slider-next btn-next fa fa-angle-right"></a>
			</div><!-- /.owl-custom-pagination -->
				<?php endif; ?>
			<?php endif; ?>
			
		</header>

		<?php endif; ?>
		
		<div class="row inner-top-xs">
			<div class="col-sm-12">
				<div id="owl-brands" class="owl-brands owl-carousel owl-outer-nav">
					
					<?php foreach ( $terms as $term ) :	?>
					
					<div class="item">
						<figure>
							<figcaption class="text-overlay">
								<div class="info">
									<h4><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?></a></h4>
								</div><!-- /.info -->
							</figcaption>
						<?php 
							$thumbnail_id 	= get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );

							if ( $thumbnail_id ) {
								$image_attributes = wp_get_attachment_image_src( $thumbnail_id, 'full' );
								
								if( $image_attributes ) {
									$image_src = $image_attributes[0];
								}
							} else {
								$image_src = wc_placeholder_img_src();
							}

							$image_src = str_replace( ' ', '%20', $image_src ); 
						?>
							<img src="<?php echo esc_url( $image_src ); ?>" alt="<?php echo esc_attr( $term->name ); ?>" class="img-responsive">
						</figure>
					</div><!-- /.item -->

					<?php endforeach; ?>
					
				</div><!-- /.owl-carousel -->
			</div><!-- /.col -->
		</div><!-- /.row -->
		
	</div><!-- /.container -->
</section>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$("#owl-brands").owlCarousel({
		    autoplayHoverPause: true,
		    navRewind: true,
		    <?php if( is_rtl() ) : ?>
		    rtl: true,
		    <?php endif; ?>
		    items: 5,
		    dots: false,
		    stagePadding: 1,
		    responsive:{
		        0:{
		            items:1,
		        },
		        600:{
		            items:2,
		        },
		        1000:{
		            items:5,
		        }
		    }
		});
	});
</script>
<!-- ============================================================= SECTION - BRANDS : END ============================================================= -->