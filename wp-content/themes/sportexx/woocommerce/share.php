<?php
/**
 * Wishlist Share template
 *
 * @author Transvelo
 * @package Sportexx/WooCommerce
 * @version 1.0.0
 */
?>

<div class="yith-wcwl-share inner-xs">
    <h4 class="yith-wcwl-share-title"><?php echo $share_title ?></h4>
    <div class="social-icons">
        <ul class="list-unstyled list-social-icons">
            <?php if( $share_facebook_enabled ): ?>
                <li>
                    <a target="_blank" class="facebook" href="https://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $share_link_title ?>&amp;p[url]=<?php echo $share_link_url ?>&amp;p[summary]=<?php echo $share_summary ?>&amp;p[images][0]=<?php echo $share_image_url ?>" title="<?php _e( 'Facebook', 'sportexx' ) ?>"><i class="fa fa-facebook"></i></a>
                </li>
            <?php endif; ?>

            <?php if( $share_twitter_enabled ): ?>
                <li>
                    <a target="_blank" class="twitter" href="https://twitter.com/share?url=<?php echo $share_link_url ?>&amp;text=<?php echo $share_twitter_summary ?>" title="<?php _e( 'Twitter', 'sportexx' ) ?>"><i class="fa fa-twitter"></i></a>
                </li>
            <?php endif; ?>

            <?php if( $share_pinterest_enabled ): ?>
                <li>
                    <a target="_blank" class="pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo $share_link_url ?>&amp;description=<?php echo $share_summary ?>&amp;media=<?php echo $share_image_url ?>" title="<?php _e( 'Pinterest', 'sportexx' ) ?>" onclick="window.open(this.href); return false;"><i class="fa fa-pinterest"></i></a>
                </li>
            <?php endif; ?>

            <?php if( $share_googleplus_enabled ): ?>
                <li>
                    <a target="_blank" class="googleplus" href="https://plus.google.com/share?url=<?php echo $share_link_url ?>&amp;title=<?php echo $share_link_title ?>" title="<?php _e( 'Google+', 'sportexx' ) ?>" onclick='javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;'><i class="fa fa-google-plus"></i></a>
                </li>
            <?php endif; ?>

            <?php if( $share_email_enabled ): ?>
                <li>
                    <a class="email" href="mailto:?subject=I wanted you to see this site&amp;body=<?php echo $share_link_url ?>&amp;title=<?php echo $share_link_title ?>" title="<?php _e( 'Email', 'sportexx' ) ?>"><i class="fa fa-envelope"></i></a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>