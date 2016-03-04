<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package sportexx
 */
?>
	</div><!-- #content -->

	<?php 
	do_action( 'sportexx_before_footer' ); ?>
	
	<!-- ========================================= FOOTER ========================================= -->
	<footer id="colophon" class="<?php echo esc_attr( apply_filters( 'sportexx_footer_classes', 'site-footer' ) ); ?>">
			
			<?php
			/**
			 * @hooked sportexx_before_footer_wrapper_start - 10
			 * @hooked sportexx_footer_form_newsletter - 20
			 * @hooked sportexx_footer_social_icons - 30
			 * @hooked sportexx_before_footer_wrapper_end - 40
			 * @hooked sportexx_footer_widgets - 50
			 * @hooked sportexx_after_footer_wrapper_start - 70
			 * @hooked sportexx_footer_copyright - 80
			 * @hooked sportexx_footer_quick_links - 90
			 * @hooked sportexx_after_footer_wrapper_end - 100
			 */
			do_action( 'sportexx_footer' ); ?>

	</footer><!-- #colophon -->
		
	<?php 
	do_action( 'sportexx_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>