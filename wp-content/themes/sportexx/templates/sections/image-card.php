<?php
/**
 * Image Card
 *
 * @author 		Transvelo
 * @package 	Sportexx/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$default_args = array(
	'bg_image'	=> '',
	'bg_pos'	=> '',
	'bg_color'	=> '',
	'color'		=> '',
	'caption'	=> '',
	'btn_link'	=> '#',
	'btn_text'	=> __( 'Shop Now', 'sportexx' ),
	'el_class'	=> '',
);

if( ! isset( $args ) ) {
	$args = array();
}

$args = array_merge( $default_args, $args );

extract( $args );

$style_attr = '';

if( ! empty( $bg_color ) ) {
	$style_attr = 'background-color: ' .  $bg_color . ';';
}

if( ! empty( $color ) ) {
	$style_attr .= 'color:' . $color . ';';
}

if( ! empty( $style_attr ) ) {
	$style_attr = 'style="' . esc_attr( $style_attr ) . '"';
}

?>
<div class="card row <?php echo esc_attr( $el_class ); ?>">
	<div class="row-same-height">
		<div class="col-xs-6 card-image col-xs-height col-top">
			<?php echo wp_get_attachment_image( $bg_image, 'full', false, array( 'class' => 'img-responsive' ) ); ?>
		</div>
		<div class="col-xs-6 card-desc col-xs-height col-top" <?php echo $style_attr; ?>>
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