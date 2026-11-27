<?php
/**
 * Plugin Name: Wiesi Factory Versandklasse (Hilfsplugin)
 * Description: Liest Versandklassen und Konfigurator-Produkte aus (nur mit geheimem Schlüssel). Wird nach der Umstellung wieder entfernt.
 * Version: 0.4.0
 * Author: Wiesi Factory
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'WF_VK_TOKEN', 'HIER-GEHEIMEN-SCHLUESSEL-EINSETZEN' );

add_action( 'rest_api_init', function () {
	register_rest_route( 'wf-vk/v1', '/info', array(
		'methods'             => 'GET',
		'permission_callback' => function ( $r ) { return hash_equals( WF_VK_TOKEN, (string) $r->get_param( 'k' ) ); },
		'callback'            => 'wf_vk_info',
	) );
} );

/* Einmalig: Sitzbezug-Konfiguratoren auf Versandklasse PM 70 (mittlere, große Versandtasche). */
add_action( 'init', function () {
	if ( get_option( 'wf_vk_assign_done' ) || ! function_exists( 'wc_get_product' ) ) { return; }
	update_option( 'wf_vk_assign_done', 1, false );
	$term = get_term_by( 'slug', 'pm-70', 'product_shipping_class' );
	if ( ! $term ) { return; }
	$log = array();
	foreach ( array( 13769, 15583, 15695 ) as $id ) {
		$p = wc_get_product( $id );
		if ( ! $p ) { continue; }
		$log[ $id ] = $p->get_shipping_class();
		$p->set_shipping_class_id( $term->term_id );
		$p->save();
	}
	update_option( 'wf_vk_assign_log', array( 'time' => current_time( 'mysql' ), 'vorher' => $log ), false );
}, 99 );

/* Einmalig: alle Sitzbezüge (inkl. Varianten) auf PM 70. Varianten mit eigener Klasse -> "wie Hauptprodukt". */
add_action( 'init', function () {
	if ( get_option( 'wf_vk_assign2_done' ) || ! function_exists( 'wc_get_product' ) ) { return; }
	update_option( 'wf_vk_assign2_done', 1, false );
	$term = get_term_by( 'slug', 'pm-70', 'product_shipping_class' );
	$cat  = get_term_by( 'name', 'Sitzbezüge', 'product_cat' );
	if ( ! $term || ! $cat ) { return; }
	$ids = array_unique( array_merge( array_map( 'intval', get_objects_in_term( $cat->term_id, 'product_cat' ) ), array( 15695 ) ) );
	$log = array();
	foreach ( $ids as $id ) {
		$p = wc_get_product( $id );
		if ( ! $p || $p->is_type( 'external' ) ) { continue; }
		if ( $p->get_shipping_class() !== 'pm-70' ) { $log[ $id ] = $p->get_shipping_class(); $p->set_shipping_class_id( $term->term_id ); $p->save(); }
		if ( $p->is_type( 'variable' ) ) {
			foreach ( $p->get_children() as $vid ) {
				$v = wc_get_product( $vid );
				if ( $v && $v->get_shipping_class_id( 'edit' ) ) { $log[ $vid ] = $v->get_shipping_class(); $v->set_shipping_class_id( 0 ); $v->save(); }
			}
		}
	}
	update_option( 'wf_vk_assign2_log', array( 'time' => current_time( 'mysql' ), 'geaendert_vorher' => $log ), false );
}, 99 );

/* Einmalig: nur noch an Österreich + EU verkaufen, Versandzone Schweiz entfernen. Alte Werte in wf_vk_countries_backup. */
add_action( 'init', function () {
	if ( get_option( 'wf_vk_countries_done' ) || ! class_exists( 'WC_Shipping_Zones' ) ) { return; }
	update_option( 'wf_vk_countries_done', 1, false );
	$backup = array(
		'woocommerce_allowed_countries'          => get_option( 'woocommerce_allowed_countries' ),
		'woocommerce_specific_allowed_countries' => get_option( 'woocommerce_specific_allowed_countries' ),
		'woocommerce_all_except_countries'       => get_option( 'woocommerce_all_except_countries' ),
		'woocommerce_ship_to_countries'          => get_option( 'woocommerce_ship_to_countries' ),
		'woocommerce_specific_ship_to_countries' => get_option( 'woocommerce_specific_ship_to_countries' ),
		'zone_ch'                                => null,
	);
	$countries = array( 'AT', 'BE', 'BG', 'CY', 'CZ', 'DE', 'DK', 'EE', 'ES', 'FI', 'FR', 'GR', 'HR', 'HU', 'IE', 'IT', 'LT', 'LU', 'LV', 'MT', 'NL', 'PL', 'PT', 'RO', 'SE', 'SI', 'SK' );
	update_option( 'woocommerce_allowed_countries', 'specific' );
	update_option( 'woocommerce_specific_allowed_countries', $countries );
	update_option( 'woocommerce_ship_to_countries', '' ); // = an alle Verkaufsländer liefern.
	foreach ( WC_Shipping_Zones::get_zones() as $z ) {
		$zone = new WC_Shipping_Zone( $z['zone_id'] );
		$codes = array_map( function ( $l ) { return $l->code; }, $zone->get_zone_locations() );
		if ( array( 'CH' ) === $codes ) {
			$m = array();
			foreach ( $zone->get_shipping_methods() as $meth ) { $m[] = array( 'id' => $meth->id, 'enabled' => $meth->enabled, 'settings' => $meth->instance_settings ); }
			$backup['zone_ch'] = array( 'name' => $zone->get_zone_name(), 'order' => $zone->get_zone_order(), 'methods' => $m );
			$zone->delete();
		}
	}
	update_option( 'wf_vk_countries_backup', $backup, false );
}, 99 );

function wf_vk_info() {
	global $wpdb;
	$out = array( 'classes' => array(), 'zones' => array(), 'products' => array() );
	foreach ( get_terms( array( 'taxonomy' => 'product_shipping_class', 'hide_empty' => false ) ) as $t ) {
		$out['classes'][] = array( 'id' => $t->term_id, 'name' => $t->name, 'slug' => $t->slug, 'count' => $t->count, 'desc' => $t->description );
	}
	$zones = WC_Shipping_Zones::get_zones();
	$zones[] = array( 'zone_name' => 'Rest der Welt', 'zone_id' => 0, 'zone_locations' => array() );
	foreach ( $zones as $z ) {
		$zone = new WC_Shipping_Zone( $z['zone_id'] );
		$m = array();
		foreach ( $zone->get_shipping_methods( true ) as $meth ) {
			$m[] = array( 'id' => $meth->id, 'title' => $meth->get_title(), 'settings' => $meth->instance_settings );
		}
		$out['zones'][] = array( 'name' => $zone->get_zone_name(), 'locations' => array_map( function ( $l ) { return $l->code; }, $zone->get_zone_locations() ), 'methods' => $m );
	}
	$ids = $wpdb->get_col( "SELECT DISTINCT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_gravity_form_data' OR meta_key LIKE '%wns%' OR meta_key LIKE '%wss%' OR meta_key LIKE '%nithrone%' OR meta_key LIKE '%seat_studio%'" );
	$cat = get_term_by( 'name', 'Sitzbezüge', 'product_cat' );
	if ( $cat ) { $ids = array_merge( $ids, get_objects_in_term( $cat->term_id, 'product_cat' ) ); }
	foreach ( array_unique( array_map( 'intval', $ids ) ) as $id ) {
		$p = wc_get_product( $id );
		if ( ! $p ) { continue; }
		$keys = $wpdb->get_col( $wpdb->prepare( "SELECT meta_key FROM {$wpdb->postmeta} WHERE post_id=%d AND (meta_key='_gravity_form_data' OR meta_key LIKE '%%wns%%' OR meta_key LIKE '%%wss%%' OR meta_key LIKE '%%nithrone%%' OR meta_key LIKE '%%seat_studio%%')", $id ) );
		$out['products'][] = array( 'id' => $id, 'name' => $p->get_name(), 'status' => $p->get_status(), 'type' => $p->get_type(), 'class' => $p->get_shipping_class(), 'cats' => wp_get_post_terms( $id, 'product_cat', array( 'fields' => 'names' ) ), 'keys' => $keys );
	}
	$out['assign_log'] = get_option( 'wf_vk_assign_log' );
	foreach ( array( 13769, 15583, 15695 ) as $id ) { $p = wc_get_product( $id ); if ( $p ) { $out['check'][ $id ] = array( $p->get_name(), $p->get_shipping_class() ); } }
	$out['assign2_log'] = get_option( 'wf_vk_assign2_log' );
	$cat = get_term_by( 'name', 'Sitzbezüge', 'product_cat' );
	foreach ( array_unique( array_merge( array_map( 'intval', get_objects_in_term( $cat->term_id, 'product_cat' ) ), array( 15695 ) ) ) as $id ) {
		$p = wc_get_product( $id ); if ( ! $p ) { continue; }
		$row = array( $p->get_name(), $p->get_status(), $p->get_type(), $p->get_shipping_class() );
		if ( $p->is_type( 'variable' ) ) { foreach ( $p->get_children() as $vid ) { $v = wc_get_product( $vid ); $row['var'][ $vid ] = $v ? $v->get_shipping_class() : '?'; } }
		$out['sitz'][ $id ] = $row;
	}
	$out['countries'] = array( get_option( 'woocommerce_allowed_countries' ), get_option( 'woocommerce_specific_allowed_countries' ), get_option( 'woocommerce_ship_to_countries' ) );
	$out['countries_backup'] = get_option( 'wf_vk_countries_backup' );
	return $out;
}
