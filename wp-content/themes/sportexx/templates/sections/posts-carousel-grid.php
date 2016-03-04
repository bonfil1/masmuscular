<?php
/**
 * Posts Carousel Grid
 *
 * @author 		Transvelo
 * @package 	Sportexx/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- ============================================================= SECTION - POSTS ============================================================= -->
<section id="posts-carousel-grid" class="light-bg posts-carousel-grid">
	<div class="container inner-top-xs inner-bottom-sm">
		<header class="has-owl-custom-pagination">
			<h2><?php echo apply_filters( 'sportexx_blog_posts_carousel_grid_title', $title ); ?><span class="divi">/</span></h2>
			<?php if( is_rtl() ) : ?>
			<div class="owl-custom-pagination">
				<a href="#" data-target="#owl-posts-grid" class="slider-prev btn-prev fa fa-angle-right"></a>
				<a href="#" data-target="#owl-posts-grid" class="slider-next btn-next fa fa-angle-left"></a>
			</div><!-- /.owl-custom-pagination -->
			<?php else : ?>
			<div class="owl-custom-pagination">
				<a href="#" data-target="#owl-posts-grid" class="slider-prev btn-prev fa fa-angle-left"></a>
				<a href="#" data-target="#owl-posts-grid" class="slider-next btn-next fa fa-angle-right"></a>
			</div><!-- /.owl-custom-pagination -->
			<?php endif; ?>
		</header>
		
		<div class="row inner-top-xs">
			<div class="col-sm-12">
				<div id="owl-posts-grid" class="owl-posts-grid owl-carousel owl-outer-nav">

					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					
					<div class="item post text-left flip">
						<?php
                            echo sportexx_get_post_thumbnail( get_the_ID() );
                        ?>
						<h2 class="entry-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a></h2>
						<div class="post-meta"><?php echo sportexx_get_byline();?><?php echo sportexx_get_posted_on();?></div>
						<div class="post-excerpt"><?php echo get_the_excerpt(); ?></div>
					</div><!-- /.item -->

					<?php endwhile; ?>
					
				</div><!-- /.owl-carousel -->
			</div><!-- /.col -->
		</div><!-- /.row -->
		
	</div><!-- /.container -->
</section>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$("#owl-posts-grid").owlCarousel({
        items : 3,
        nav : true,
        <?php if( is_rtl() ) : ?>
        rtl: true,
        <?php endif; ?>
        slideSpeed : 300,
        dots: false,
        paginationSpeed : 400,
        margin: 30,
        navText: ["", ""],
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            1000:{
                items:3,
            }
        }
    });
});
</script>
<!-- ============================================================= SECTION - POSTS : END ============================================================= -->