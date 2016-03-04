<?php
/**
 * Team Member
 *
 * @author 		Transvelo
 * @package 	Sportexx/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="team">
	<?php
		$args = array(
			'post_type' => 'team-member',
			'post__in' => array($id),
		);
		query_posts( $args );
	?>
	<?php while ( have_posts() ) :  the_post(); ?>
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
	<?php endwhile; ?>
	<?php wp_reset_query(); ?>
</div>