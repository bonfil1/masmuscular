<?php
/**
 * General functions used to integrate this theme with Our Team.
 *
 * @package sportexx
 */

if( ! function_exists( 'sportexx_add_team_member_fields' ) ) {
    function sportexx_add_team_member_fields( $fields ) {
        
        $fields['facebook'] = array(
            'name'            => __( 'Facebook URL', 'sportexx' ),
            'description'     => __( 'Enter this team member\'s complete Facebook URL (for example: http://facebook.com/transvelo).', 'sportexx' ),
            'type'            => 'text',
            'default'         => '',
            'section'         => 'info'
        );
        
        $fields['vine'] = array(
            'name'            => __( 'Vine URL', 'sportexx' ),
            'description'     => __( 'Enter this team member\'s Vine URL (for example: http://vine.co/transvelo).', 'sportexx' ),
            'type'            => 'text',
            'default'         => '',
            'section'         => 'info'
        );

        $fields['pinterest'] = array(
            'name'            => __( 'Pinterest URL', 'sportexx' ),
            'description'     => __( 'Enter this team member\'s Pintrest URL (for example: http://pinterest.com/transvelo).', 'sportexx' ),
            'type'            => 'text',
            'default'         => '',
            'section'         => 'info'
        );

        $fields['google_plus'] = array(
            'name'            => __( 'Google Plus URL', 'sportexx' ),
            'description'     => __( 'Enter this team member\'s Google Plus URL.', 'sportexx' ),
            'type'            => 'text',
            'default'         => '',
            'section'         => 'info'
        );

        return apply_filters( 'sportexx_add_team_member_field_args', $fields );
    }
}

if( ! function_exists( 'sportexx_add_team_member_support' ) ) {
    function sportexx_add_team_member_support( $args ){
        $args['supports'] = array('title','author','editor','thumbnail','page-attributes','excerpt');
        return apply_filters( 'sportexx_add_team_member_support_args', $args );
    }
}

if( ! function_exists( 'sportexx_team_member_templates' ) ) {
    function sportexx_team_member_templates( $template ) {
        $file = '';
        
        if ( is_single() && get_post_type() == 'team-member' ) {
            $file = locate_template('team-member/single-team-member.php');
        } elseif ( is_tax( get_object_taxonomies( 'team-member' ) ) ) {
            $file = locate_template('team-member/archive-team-member.php');
        } elseif ( is_post_type_archive( 'team-member' ) ) {
            $file = locate_template('team-member/archive-team-member.php');
        }
        
        if ( $file ) {
            $template = $file;
        }

        return $template;
    }
}