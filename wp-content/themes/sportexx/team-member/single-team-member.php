<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	get_header();
?>
	<?php
		/**
		 * team_members_before_main_content hook
		 *
		 */
		do_action( 'team_members_before_main_content' );
	?>

	<div class="team">

		<?php if ( have_posts() ) : ?>
			<div class="single-team">
				<?php
					/**
					 * team_members_before_single_content hook
					 *
					 */
					do_action( 'team_members_before_single_content' );
				?>
				<?php while ( have_posts() ) :  the_post(); ?>
					<div class="single-team-member">
						<?php
							/**
							 * team_members_single_content hook
							 *
							 * @hooked our_team_single_post_thumbnail - 10
							 * @hooked our_team_member_social_links - 20
							 * @hooked our_team_single_post_title - 30
							 * @hooked our_team_member_role - 40
							 * @hooked our_team_post_content - 50
							 */
							do_action( 'team_members_single_content' );
						?>
					</div>
				<?php endwhile; ?>
				<?php
					/**
					 * team_members_after_single_content hook
					 *
					 */
					do_action( 'team_members_after_single_content' );
				?>
			</div>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

	</div>

	<?php
		/**
		 * team_members_after_main_content hook
		 *
		 */
		do_action( 'team_members_after_main_content' );
	?>
<?php
	get_footer();