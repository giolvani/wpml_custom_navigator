<?php
/*
Plugin Name: WPML Custom Navigator
Description: Customized header navigator for WPML
Author: Giolvani de Matos
Author URI: https://www.github.com/giolvani
Version: 0.0.4
Plugin Slug: wpml-custom-nav
*/

/*
 * Reference tags: 		https://wpml.org/documentation/getting-started-guide/language-setup/custom-language-switcher/
 * id:					Internal reference id
 * active: 				This is the currently active language (exactly one language is active)
 * native_name: 		The native name of the language (never translated)
 * translated_name: 	The name of the language translated to the currently active language
 * country_flag_url: 	The URL to a PNG image with the country flag
 * url: 				The link to the translation in that language
 * missing: 			1 if the translation for that element is missing, 0 if it it exists.
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