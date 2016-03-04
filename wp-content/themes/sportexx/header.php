<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package sportexx
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php sportexx_html_tag_schema(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site wrapper">
	<?php
	do_action( 'sportexx_before_header' ); ?>
	
	<!-- ============================================================= HEADER ============================================================= -->
	<header <?php sportexx_header_class();?>>
		<?php
		/**
		 * @hooked sportexx_skip_links - 0
		 * @hooked sportexx_navbar - 10
		 */
		do_action( 'sportexx_header' ); ?>
	</header><!-- /.site-header -->
	<!-- ============================================================= HEADER : END ============================================================= -->
	
	<?php
	do_action( 'sportexx_before_content' ); ?>

	<div id="content" class="<?php echo esc_attr( apply_filters( 'sportexx_site_content_classes', 'site-content' ) ); ?>" tabindex="-1">

		<?php
		/**
		 * @hooked woocommerce_breadcrumb - 10
		 */
		do_action( 'sportexx_content_top' ); ?>