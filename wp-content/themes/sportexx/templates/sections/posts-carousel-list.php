<?php
/**
 * Posts Carousel List
 *
 * @author      Transvelo
 * @package     Sportexx/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<!-- ============================================================= SECTION - POSTS ============================================================= -->
<section id="posts-carousel-list" class="light-bg posts-carousel-list">
    <div class="container inner-top-xs inner-bottom-md">
        <header class="has-owl-custom-pagination">
            <h2><?php echo apply_filters( 'sportexx_blog_posts_carousel_list_title', $title ); ?><span class="divi">/</span></h2>
            <?php if( is_rtl() ) : ?>
            <div class="owl-custom-pagination">
                <a href="#" data-target="#owl-posts-list" class="slider-prev btn-prev fa fa-angle-right"></a>
                <a href="#" data-target="#owl-posts-list" class="slider-next btn-next fa fa-angle-left"></a>
            </div><!-- /.owl-custom-pagination -->
            <?php else : ?>
            <div class="owl-custom-pagination">
                <a href="#" data-target="#owl-posts-list" class="slider-prev btn-prev fa fa-angle-left"></a>
                <a href="#" data-target="#owl-posts-list" class="slider-next btn-next fa fa-angle-right"></a>
            </div><!-- /.owl-custom-pagination -->
            <?php endif; ?>
        </header>
        
        <div class="row inner-top-xs">
            <div class="col-sm-12">
                <div id="owl-posts-list" class="owl-posts-list owl-carousel owl-outer-nav">

                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    
                    <div class="item post row text-left flip">
                        <div class="row-same-height">
                            <div class="col-xs-12 col-sm-6 col-sm-height">
                                <?php
                                    echo sportexx_get_post_thumbnail( get_the_ID() );
                                ?>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-sm-height col-top">
                                <h2 class="media-heading entry-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a></h2>
                                <div class="post-meta"><?php echo sportexx_get_byline();?><?php echo sportexx_get_posted_on();?></div>
                                <div class="post-excerpt"><?php echo get_the_excerpt(); ?></div>
                                <div class="post-readmore">
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-primary btn-lg btn-readmore"><?php echo apply_filters( 'sportexx_blog_post_readmore_text', __( 'Read More', 'sportexx' ) ); ?></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.item -->

                    <?php endwhile; ?>
                    
                </div><!-- /.owl-carousel -->
            </div><!-- /.col -->
        </div><!-- /.row -->
        
    </div><!-- /.container -->
</section>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $("#owl-posts-list").owlCarousel({
        items : 1,
        nav : true,
        <?php if( is_rtl() ) : ?>
        rtl: true,
        <?php endif; ?>
        slideSpeed : 300,
        dots: false,
        paginationSpeed : 400,
        navText: ["", ""]
    });
});
</script>
<!-- ============================================================= SECTION - POSTS : END ============================================================= -->