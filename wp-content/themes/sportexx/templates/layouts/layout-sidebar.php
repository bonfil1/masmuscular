<?php
	
$default_args = array(
	'main_content'		=> '',
	'sidebar_action'	=> 'sportexx_sidebar',
);

if( !empty( $args ) ) {
	$args = array_merge( $default_args, $args );
}

extract( $args );

?>

<div class="<?php echo esc_attr( apply_filters( 'sportexx_container_classes', 'container' ) ); ?>">
	<div class="row">
		<div id="primary" class="<?php echo esc_attr( apply_filters( 'sportexx_content_area_classes', 'content-area' ) ); ?>">
			<main class="<?php echo esc_attr( apply_filters( 'sportexx_site_main_classes', 'site-main' ) ); ?>">
				<?php echo $main_content; ?>
			</main>
		</div>
		<aside id="secondary" class="<?php echo esc_attr( apply_filters( 'sportexx_sidebar_area_classes', 'sidebar-area widget-area' ) ); ?>">
			<?php do_action( $sidebar_action ); ?>
		</aside>
	</div>
</div>