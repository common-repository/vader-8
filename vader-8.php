<?php
/*
 * Plugin Name: Vader 8
 * Plugin URI: https://profiles.wordpress.org/dnightroad
 * Description: Coming soon page for anyone not logged in, displaying our favourite sith lord Darth Vader.
 * Version: 1.1
 * Author: dnightroad
 * Author URI: https://profiles.wordpress.org/dnightroad
 * License: GPLv2 or later 
 *
 * @package maintenance-mode
 * @copyright Copyright (c) 2016, Diana Ivanova
 * @license GPLv2 or later
*/

/**
 * Vader 8
 *
 * The Darth Vader coming soon plugin is here.
 * Cool coming soon page that let's you log in and edit your site , but keeps everyone else's eyes away.
 *
 * @return void
 */
define( 'VADER8_PATH',  realpath( dirname( __FILE__ ) ) );
function vader8() {
	global $pagenow;
	if ( $pagenow !== 'wp-login.php' && ! current_user_can( 'manage_options' ) && ! is_admin() ) {
		header( $_SERVER["SERVER_PROTOCOL"] . ' 404 not found. The Page you are looking for is not available', true, 404 );
		header( 'Content-Type: text/html; charset=utf-8' );
		
		require_once(  'vies/soon.php' );
		
		die();
	}
}


add_action( 'wp_loaded', 'vader8' );
