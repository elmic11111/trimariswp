<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/elmic11111/trimariswp
 * @since             1.1.0
 * @package           Trimariswp
 *
 * @wordpress-plugin
 * Plugin Name:       Trimaris WP Plugin
 * Plugin URI:        test
 * Description:       This is a Plug custom writen for Kingdom of SCA Trimaris
 * Version:           1.1.0
 * Author:            David Hofmann
 * Author URI:        https://github.com/elmic11111
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       trimariswp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TRIMARISWP_VERSION', '1.0.0' );
define( 'TRIMARISWP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-trimariswp-activator.php
 */
function activate_trimariswp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-trimariswp-activator.php';
	Trimariswp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-trimariswp-deactivator.php
 */
function deactivate_trimariswp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-trimariswp-deactivator.php';
	Trimariswp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_trimariswp' );
register_deactivation_hook( __FILE__, 'deactivate_trimariswp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-trimariswp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_trimariswp() {

	$plugin = new Trimariswp();
	$plugin->run();

}
run_trimariswp();
