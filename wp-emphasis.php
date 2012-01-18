<?php
/*
Plugin Name: WP Emphasis
Plugin URI: http://ben.balter.com/2011/01/11/wordpress-emphasis-plugin/
Description: WordPress implementation of NYT emphasis magic
Version: 0.7
Author: Benjamin J. Balter
Author URI: http://ben.balter.com/
License: GPL2
*/

function wp_emphasis_enqueue() {
	
	// If SCRIPT_DEBUG is defined in config.php, use the dev (non-minified) version of the script (h/t @nacin)
	$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '-src' : '';
		
	// Tell WordPress to queue the script for inclusion in the footer
	// Also incudes the jQuery framework if it is not already in the queue
	wp_enqueue_script( 'wp_emphasis', plugins_url('/js/emphasis'.$suffix.'.js', __FILE__), array('jquery'), filemtime(dirname(__FILE__).'/js/emphasis'.$suffix.'.js'), 'true' );

}

add_action('wp_enqueue_scripts', 'wp_emphasis_enqueue');