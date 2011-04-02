<?php
/*
Plugin Name: WP Emphasis
Plugin URI: http://ben.balter.com/2011/01/11/wordpress-emphasis-plugin/
Description: WordPress implementation of NYT emphasis magic
Version: 0.4
Author: Benjamin J. Balter
Author URI: http://ben.balter.com/
License: GPL2
*/

function wp_emphasis_enqueue() {
	
	$options = get_option('wp_emphasis');

	// If SCRIPT_DEBUG is defined in config.php, use the dev (non-minified) version of the script (h/t @nacin)
	$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '-src' : '';
	
	//lib and filename for jquery/prototype
	$version = ( isset($options['jquery']) && $options['jquery'] ) ? '-jquery' : '';
	$lib = ( isset($options['jquery']) && $options['jquery'] ) ? array('jquery') : array('prototype');
	
	// Tell WordPress to queue the script for inclusion in the footer
	// Also incudes the prototype framework if it is not already in the queue
	wp_enqueue_script( 'wp_emphasis', plugins_url('/js/emphasis'.$version.$suffix.'.js', __FILE__), $lib, filemtime(dirname(__FILE__).'/js/emphasis'.$version.$suffix.'.js'), 'true' );

}

add_action('wp_enqueue_scripts', 'wp_emphasis_enqueue');

function add_emphasis_option() {
	register_setting(  'reading', 'wp_emphasis' );
	add_settings_field( 'wp_emphasis_jquery', 'Emphasis Library', 'wp_emphasis_jquery_cb', 'reading');
}

add_action('admin_init','add_emphasis_option');

	function wp_emphasis_jquery_cb() {
		$options = get_option('wp_emphasis');
		$fields = array(
			'0' => 'Prototype',
			'1' => 'jQuery'
		);
		foreach ( $fields as $field => $label ) {
			echo '<label><input type="radio" name="wp_emphasis[jquery]" value="' . $field . '"' . checked( $options['jquery'], $field, false ) . '> ' . $label . '</label><br/>';
		}
	}


?>