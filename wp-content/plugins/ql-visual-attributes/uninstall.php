<?php
// if uninstall not called from WordPress exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit ();
}

$ql_visual_attributes_settings = get_option( 'ql_visual_attributes_settings' );

if ( isset( $ql_visual_attributes_settings['delete_on_uninstall_chk'] ) ) {
	delete_option( 'ql_visual_attributes_settings' );
}