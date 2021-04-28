<?php

/**
 * Fired during plugin deactivation
 *
 * @since      1.0.0
 *
 * @package    Plugin_Currency
 * @subpackage Plugin_Currency/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Plugin_Currency
 * @subpackage Plugin_Currency/includes
 * @author    Serhii H.
 */
class Plugin_Currency_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
				return;
		}
		$plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
			check_admin_referer( "deactivate-plugin_{$plugin}" );


			do_action( 'plugin_currency_deactivate' );
	}//end deactivate

}
