<?php
/**
 * @package		WPCore
 * @author		stueynet
 * @link		https://wpcore.com
 */

// If uninstall is not called from WordPress, exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit();
}

delete_option( 'wpcore_keys' );
delete_option( '_transient_wpcore_payload' );

// For site options in Multisite
delete_site_option( 'wpcore_keys' );
delete_site_option( '_transient_wpcore_payload' );