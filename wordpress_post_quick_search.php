<?php
/**
 * Plugin Name: WordPress Post Quick Search
 * Plugin URI:  http://wordpress.org/plugins
 * Description: Adds an ajaxy search box to the post list page
 * Version:     0.1.0
 * Author:      Adam Silverstein
 * Author URI:  
 * License:     GPLv2+
 * Text Domain: wppostquicksearch
 * Domain Path: /languages
 */

/**
 * Copyright (c) 2014 Adam Silverstein (email : adam@10up.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/**
 * Built using grunt-wp-plugin
 * Copyright (c) 2013 10up, LLC
 * https://github.com/10up/grunt-wp-plugin
 */

// Useful global constants
define( 'WPPOSTQUICKSEARCH_VERSION', '0.1.0' );
define( 'WPPOSTQUICKSEARCH_URL',     plugin_dir_url( __FILE__ ) );
define( 'WPPOSTQUICKSEARCH_PATH',    dirname( __FILE__ ) . '/' );

/**
 * Default initialization for the plugin:
 * - Registers the default textdomain.
 */
function wppostquicksearch_init() {
	$locale = apply_filters( 'plugin_locale', get_locale(), 'wppostquicksearch' );
	load_textdomain( 'wppostquicksearch', WP_LANG_DIR . '/wppostquicksearch/wppostquicksearch-' . $locale . '.mo' );
	load_plugin_textdomain( 'wppostquicksearch', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

/**
 * Activate the plugin
 */
function wppostquicksearch_activate() {
	// First load the init scripts in case any rewrite functionality is being loaded
	wppostquicksearch_init();

	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'wppostquicksearch_activate' );

/**
 * Deactivate the plugin
 * Uninstall routines should be in uninstall.php
 */
function wppostquicksearch_deactivate() {

}
register_deactivation_hook( __FILE__, 'wppostquicksearch_deactivate' );

// Wireup actions
add_action( 'init', 'wppostquicksearch_init' );

// Wireup filters

// Wireup shortcodes
