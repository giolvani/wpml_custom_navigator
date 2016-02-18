<?php
/*
Plugin Name: WPML Custom Navigator
Description: Customized header navigator for WPML
Author: Giolvani de Matos
Author URI: https://www.github.com/giolvani
Version: 0.0.4
Plugin Slug: wpml-custom-nav
*/

define('WPML_CUSTOM_NAV_PLUGIN_PATH', dirname(__FILE__));
define('WPML_CUSTOM_NAV_ID', 'wpml_custom_navigator');

require WPML_CUSTOM_NAV_PLUGIN_PATH . '/vendor/autoload.php';
require WPML_CUSTOM_NAV_PLUGIN_PATH . '/includes/wpml-custom-navigator.class.php';

// Register and load the widget
function wpml_custom_navigator_load_widget() {
	register_widget( 'WPML_Custom_Navigator' );
}

add_action( 'widgets_init', 'wpml_custom_navigator_load_widget' );