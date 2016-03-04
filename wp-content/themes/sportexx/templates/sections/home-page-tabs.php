<?php
/**
 * Home Page Tabs
 *
 * @author 		Transvelo
 * @package 	Sportexx/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- ============================================== HOME TABS ============================================== -->
<div class="home-tabs <?php echo esc_attr( $style );?>" role="tabpanel">

    <div class="nav-tabs-wrapper">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
            	<?php foreach( $tabs as $key => $tab ) : ?>
                    <?php if( !empty( $tab['shortcode'] ) ) : ?>
                <li role="presentation" <?php if( $key == 0 ){ echo 'class="active"'; } ?>><a href="#<?php echo esc_attr( $tab['shortcode'] );?>" aria-controls="<?php echo esc_attr( $tab['shortcode'] );?>" role="tab" data-toggle="tab"><?php echo apply_filters( 'homepage_tab_title_'. $key , $tab['title'] ); ?></a></li>
                    <?php endif; ?>
            	<?php endforeach; ?>
            </ul><!-- /.nav-tabs -->
        </div><!-- /.container -->
    </div><!-- /.nav-tabs-wrapper -->

    <div class="tab-content">
    	<?php foreach( $tabs as $key => $tab ) : ?>
                <?php if( !empty( $tab['shortcode'] ) ) : ?>
        <div role="tabpanel" class="tab-pane <?php if( $key == 0 ) { echo esc_attr( 'active' ); } ?>" id="<?php echo esc_attr( $tab['shortcode'] ); ?>">

            <?php if( $style != 'home-tabs-alt' ) : ?>
            
            <div class="row-separator">
                <div class="container">
                    <div class="has-grid">
                        <?php echo do_shortcode( '['. $tab['shortcode'] . ' per_page="4"]' ); ?>
                    </div><!-- /.has-grid -->
                </div><!-- /.container -->
            </div><!-- /.row-separator -->
            <div class="row-separator">
                <div class="container">
                    <div class="has-grid">
                        <?php 
                        	sportexx_add_filter_to_offset_products_query();
                        	echo do_shortcode( '['. $tab['shortcode'] . ' per_page="4"]' );
                        	sportexx_remove_filter_to_offset_products_query();
                    	?>
                    </div><!-- /.has-grid -->
                </div><!-- /.container -->
            </div><!-- /.row-separator -->

            <?php else : ?>

            <div class="container has-no-grid">
                <?php echo do_shortcode( '[' . $tab['shortcode'] . ' per_page="8"]' ); ?>
            </div>

            <?php endif; ?>
            
        </div><!-- /.tab-pane -->

            <?php endif; ?>

    	<?php endforeach; ?>

    </div><!-- /.tab-content -->

</div><!-- /.home-tabs -->

<!-- ============================================== HOME TABS : END ============================================== -->