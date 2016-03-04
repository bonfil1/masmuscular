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
			<div class="archive-team">
				<?php
					/**
					 * team_members_before_loop hook
					 *
					 */
					do_action( 'team_members_before_loop' );
				?>
				<?php while ( have_posts() ) :  the_post(); ?>
					<?php
						/**
						 * team_members_before_loop_content hook
						 *
						 */
						do_action( 'team_members_before_loop_content' );
					?>
					<div class="team-member">
						<?php
							/**
							 * team_members_loop_content hook
							 *
							 * @hooked our_team_archive_post_thumbnail - 10
							 * @hooked our_team_archive_post_title - 20
							 * @hooked our_team_member_role - 30
							 * @hooked our_team_post_excerpt - 40
							 * @hooked our_team_member_social_links - 50
							 */
							do_action( 'team_members_loop_content' );
						?>
					</div>
					<?php
						/**
						 * team_members_after_loop_content hook
						 *
						 */
						do_action( 'team_members_after_loop_content' );
					?>
				<?php endwhile; ?>
				<?php
					/**
					 * team_members_after_loop hook
					 *
					 */
					do_action( 'team_members_after_loop' );
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