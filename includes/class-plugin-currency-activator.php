<?php

/**
 * Fired during plugin activation
 *

 * @since      1.0.0
 *
 * @package    Plugin_Currency
 * @subpackage Plugin_Currency/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Plugin_Currency
 * @subpackage Plugin_Currency/includes
 * @author     Serhii H.
 */
class Plugin_Currency_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		do_action( 'plugin_currency_activate' );

		set_transient( 'plugin_currency_activated_notice', 1 );
	}//end activate

}
