<?php
/**
 * Jumbotrons
 *
 * @author 		Transvelo
 * @package 	Sportexx/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$default_args = array(
	'jumbotron_classes'	=> 'jumbotron-inverse text-center',
	'jumbotron_title'	=> __( 'Give a title for this Jumbotron', 'sportexx' ),
	'jumbotron_lead'	=> __( 'Give a lead for the title',	'sportexx' ),
	'jumbotron_bg'		=> '',
	'jumbotron_bg_pos'	=> ''
);

if( ! isset( $args ) ) {
	$args = array();
}

$args = array_merge( $default_args, $args );

extract( $args );

$background_image = '';

if( ! empty( $jumbotron_bg ) ) {
	$attachment_image_src = wp_get_attachment_image_src( $jumbotron_bg, 'full' );
	if( isset( $attachment_image_src[0] ) ) {
		$background_image_url = $attachment_image_src[0];

		$background_position = '';
		if( ! empty( $jumbotron_bg_pos ) ) {
			$background_position = 'background-position:' . esc_attr( $jumbotron_bg_pos ) . ';';
		}

		$background_image = 'style="background-repeat: no-repeat; background-image: url(' . esc_url( $background_image_url ) . ');' . $background_position . '"';
	}
}

?>
<div class="jumbotron <?php echo esc_attr( $jumbotron_classes ); ?>" <?php echo $background_image; ?>>
	<div class="container">
		<div class="caption">
			<?php if( ! empty( $jumbotron_title ) ) : ?>
			<h1><?php echo $jumbotron_title; ?></h1>
			<?php endif; ?>
			
			<?php if( ! empty( $jumbotron_lead ) ) : ?>
			<p class="lead"><?php echo $jumbotron_lead;?></p>
			<?php endif; ?>
		</div>
	</div>
</div>