<?php
/**
 * Sportexx Our Team hooks
 *
 * @package sportexx
 */

/**
 * Filters
 */
remove_filter( 'the_content',						'woothemes_our_team_content' );
add_filter( 'woothemes_our_team_member_fields',		'sportexx_add_team_member_fields');
add_filter( 'woothemes_our_team_post_type_args',	'sportexx_add_team_member_support');
add_filter( 'template_include',						'sportexx_team_member_templates');

/**
 * Layout
 */
add_action( 'team_members_before_main_content', 	'sportexx_before_ot_content', 			10 );
add_action( 'team_members_after_main_content', 		'sportexx_after_ot_content', 			10 );

/**
 * Archive Team Member
 */
add_action( 'team_members_loop_content',			'our_team_archive_post_thumbnail',		10 );
add_action( 'team_members_loop_content',			'our_team_archive_post_title',			20 );
add_action( 'team_members_loop_content',			'our_team_member_role',					30 );
add_action( 'team_members_loop_content',			'our_team_post_excerpt',				40 );
add_action( 'team_members_loop_content',			'our_team_member_social_links',			50 );

add_action( 'team_members_before_loop',				'our_team_row_wrap_start',				20 );
add_action( 'team_members_after_loop',				'our_team_row_wrap_end',				20 );
add_action( 'team_members_before_loop_content',		'our_team_archive_wrap_start',			20 );
add_action( 'team_members_after_loop_content',		'our_team_archive_wrap_end',			20 );

/**
 * Single Team Member
 */
add_action( 'team_members_single_content',			'our_team_row_wrap_start',				5 );
add_action( 'team_members_single_content',			'our_team_single_thumb_wrap_start',		8 );
add_action( 'team_members_single_content',			'our_team_single_post_thumbnail',		10 );
add_action( 'team_members_single_content',			'our_team_member_social_links',			20 );
add_action( 'team_members_single_content',			'our_team_single_wrap_end',				25 );
add_action( 'team_members_single_content',			'our_team_single_content_wrap_start',	28 );
add_action( 'team_members_single_content',			'our_team_single_post_title',			30 );
add_action( 'team_members_single_content',			'our_team_post_content',				40 );
add_action( 'team_members_single_content',			'our_team_single_wrap_end',				50 );
add_action( 'team_members_single_content',			'our_team_row_wrap_end',				60 );