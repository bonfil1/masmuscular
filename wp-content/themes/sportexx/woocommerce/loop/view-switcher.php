<?php
/**
 * View Switcher to switch between Grid and List View
 *
 * @author 		Transvelo
 * @package 	Sportexx/WooCommerce/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$default_shop_view = apply_filters( 'sportexx_default_shop_view', 'grid' );

?>
<div class="view-switcher">
	<ul class="nav-tabs nav">
		<li <?php if( $default_shop_view == 'grid' ) : ?>class="active"<?php endif; ?>><a href="#grid-view" data-toggle="tab"><i class="fa fa-th-large"></i></a></li>
		<li <?php if( $default_shop_view == 'list' ) : ?>class="active"<?php endif; ?>><a href="#list-view" data-toggle="tab"><i class="fa fa-th-list"></i></a></li>
	</ul>
</div>