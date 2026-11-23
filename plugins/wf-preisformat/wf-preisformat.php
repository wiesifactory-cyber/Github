<?php
/**
 * Plugin Name: Wiesi Factory Preisformat (einmalig)
 * Description: Setzt beim Aktivieren das WooCommerce-Preisformat auf österreichische Schreibweise (189,99 €) und sichert die alten Werte in der Option "wf_preisformat_backup". Kann danach deaktiviert und gelöscht werden – die Einstellungen bleiben.
 * Version: 1.0.0
 * Author: Wiesi Factory
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

register_activation_hook(
	__FILE__,
	function () {
		$keys = array( 'woocommerce_currency_pos', 'woocommerce_price_decimal_sep', 'woocommerce_price_thousand_sep', 'woocommerce_price_num_decimals' );
		if ( false === get_option( 'wf_preisformat_backup', false ) ) {
			$backup = array();
			foreach ( $keys as $k ) {
				$backup[ $k ] = get_option( $k );
			}
			add_option( 'wf_preisformat_backup', $backup, '', 'no' );
		}
		update_option( 'woocommerce_currency_pos', 'right_space' );
		update_option( 'woocommerce_price_decimal_sep', ',' );
		update_option( 'woocommerce_price_thousand_sep', '.' );
		update_option( 'woocommerce_price_num_decimals', 2 );
	}
);
