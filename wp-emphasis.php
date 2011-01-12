<?php
/*
Plugin Name: WP Emphasis
Plugin URI: http://ben.balter.com/2011/01/11/wordpress-emphasis-plugin/
Description: WordPress implementation of NYT emphasis magic
Version: 0.1
Author: Benjamin J. Balter
Author URI: http://ben.balter.com/
License: GPL2
*/

function wp_emphasis_enqueue() {

	wp_enqueue_script( 'wp_emphasis', plugins_url('/js/emphasis.js', __FILE__), array('prototype'), '1-11-11', 'true' );

}

add_action('init', 'wp_emphasis_enqueue');

?>