<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             1.0.0
 * @package           Plugin_Currency
 *
 * @wordpress-plugin
 * Plugin Name:       Plugin Currency
 * Description:       This is a weekly currency plugin. 
 * Version:           1.0.0
 * Author:            Serhii H.
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-currency
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Rename this for your plugin and update it as you release new versions.
 */
defined( 'PLUGIN_CURRENCY_VERSION' ) or define( 'PLUGIN_CURRENCY_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-currency-activator.php
 */
function activate_plugin_currency() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-currency-activator.php';
	Plugin_Currency_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-currency-deactivator.php
 */
function deactivate_plugin_currency() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-currency-deactivator.php';
	Plugin_Currency_Deactivator::deactivate();
}


register_activation_hook( __FILE__, 'activate_plugin_currency' );
register_deactivation_hook( __FILE__, 'deactivate_plugin_currency' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-plugin-currency.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_currency() {

	$plugin = new Plugin_Currency();
	$plugin->run();

}
run_plugin_currency();
