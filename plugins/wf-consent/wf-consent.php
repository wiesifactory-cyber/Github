<?php
/**
 * Plugin Name: Wiesi Factory Consent & Fonts
 * Description: Lädt Meta-Pixel (Marketing) sowie Jetpack-Statistik und WooCommerce-Analytics (Statistik) erst nach Zustimmung im DataReporter-WebCare-Banner und ersetzt Google/Bunny-Fonts durch lokale Schriftdateien.
 * Version: 1.0.0
 * Author: Wiesi Factory
 * Requires at least: 6.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * Funktionsweise
 * --------------
 * Das DataReporter-WebCare-Banner führt <script type="text/plain" data-webcare="marketing|statistic">
 * selbst aus, sobald die jeweilige Kategorie erlaubt wurde (dr_directTagActivation in banner.js).
 * Dieses Plugin markiert die betroffenen Skripte nur entsprechend.
 */

/** Skript-IDs (Handle + "-js", "-js-before", "-js-after", "-js-extra") und ihre Kategorie. */
function wf_consent_script_map() {
	return array(
		// Meta / Facebook (Marketing).
		'facebook-capi-param-builder'    => 'marketing',
		'wc-facebook-pixel-events'       => 'marketing',
		'facebook-for-woocommerce-inline' => 'marketing',
		// Statistik (Jetpack / WooCommerce Analytics → stats.wp.com).
		'jetpack-stats'                  => 'statistic',
		'woocommerce-analytics'          => 'statistic',
		'woocommerce-analytics-client'   => 'statistic',
	);
}

/** Liefert die Kategorie für eine Script-ID oder null. */
function wf_consent_category_for_id( $id ) {
	if ( ! is_string( $id ) || '' === $id ) {
		return null;
	}
	foreach ( wf_consent_script_map() as $handle => $category ) {
		foreach ( array( '-js', '-js-before', '-js-after', '-js-extra' ) as $suffix ) {
			if ( $id === $handle . $suffix ) {
				return $category;
			}
		}
	}
	return null;
}

/** Im Admin, Customizer, für eingeloggte Admins in der Vorschau usw. nichts verändern. */
function wf_consent_is_frontend() {
	return ! is_admin() && ! wp_doing_ajax() && ! ( defined( 'REST_REQUEST' ) && REST_REQUEST ) && ! is_customize_preview();
}

function wf_consent_mark( $attributes ) {
	if ( ! wf_consent_is_frontend() || empty( $attributes['id'] ) ) {
		return $attributes;
	}
	$category = wf_consent_category_for_id( $attributes['id'] );
	if ( null === $category ) {
		return $attributes;
	}
	$attributes['type']         = 'text/plain';
	$attributes['data-webcare'] = $category;
	// Bei text/plain wirken async/defer nicht; das Banner übernimmt diese Angaben beim Ausführen.
	return $attributes;
}
add_filter( 'wp_script_attributes', 'wf_consent_mark', 20 );
add_filter( 'wp_inline_script_attributes', 'wf_consent_mark', 20 );

/** Meta-Pixel-Basiscode und Event-Snippets des Plugins "Meta for WooCommerce" (offizieller Filter). */
add_filter(
	'wc_facebook_pixel_script_attributes',
	function ( $attributes ) {
		if ( ! wf_consent_is_frontend() ) {
			return $attributes;
		}
		$attributes                 = (array) $attributes;
		$attributes['type']         = 'text/plain';
		$attributes['data-webcare'] = 'marketing';
		return $attributes;
	},
	20
);

/** <noscript>-Bild des Meta-Pixels (nur für Besucher ohne JavaScript) entfernen. */
add_action(
	'wp',
	function () {
		if ( ! wf_consent_is_frontend() ) {
			return;
		}
		global $wp_filter;
		foreach ( array( 'wp_footer', 'wp_head', 'wp_body_open' ) as $hook ) {
			if ( empty( $wp_filter[ $hook ] ) ) {
				continue;
			}
			foreach ( $wp_filter[ $hook ]->callbacks as $priority => $callbacks ) {
				foreach ( $callbacks as $cb ) {
					if ( is_array( $cb['function'] ) && is_object( $cb['function'][0] )
						&& 'inject_base_pixel_noscript' === $cb['function'][1] ) {
						remove_action( $hook, $cb['function'], $priority );
					}
				}
			}
		}
	},
	99
);

/* -------------------------------------------------------------------------
 * Schriften lokal statt von Google/Bunny
 * ---------------------------------------------------------------------- */

// Elementor soll keine Google-Fonts laden (Roboto, Roboto Slab, Amiko werden nicht verwendet).
add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );

add_action(
	'wp_enqueue_scripts',
	function () {
		// Storefront (Source Sans Pro von fonts.googleapis.com) und Child-Theme (Barlow von fonts.bunny.net).
		foreach ( array( 'storefront-fonts', 'google-fonts' ) as $handle ) {
			wp_dequeue_style( $handle );
			wp_deregister_style( $handle );
		}
		wp_enqueue_style(
			'wf-local-fonts',
			plugins_url( 'fonts.css', __FILE__ ),
			array(),
			'1.0.0'
		);
	},
	99
);

// Elementor-Google-Fonts, falls sie trotzdem als eigene Styles registriert werden.
add_action(
	'wp_print_styles',
	function () {
		if ( ! wf_consent_is_frontend() ) {
			return;
		}
		global $wp_styles;
		if ( empty( $wp_styles->queue ) ) {
			return;
		}
		foreach ( $wp_styles->queue as $handle ) {
			if ( 0 === strpos( $handle, 'elementor-gf-' ) ) {
				wp_dequeue_style( $handle );
			}
		}
	},
	99
);

// DNS-Prefetch-Hinweise auf Google/Bunny-Fonts entfernen.
add_filter(
	'wp_resource_hints',
	function ( $urls ) {
		return array_values(
			array_filter(
				(array) $urls,
				function ( $u ) {
					$href = is_array( $u ) ? ( $u['href'] ?? '' ) : (string) $u;
					return false === strpos( $href, 'fonts.googleapis.com' )
						&& false === strpos( $href, 'fonts.gstatic.com' )
						&& false === strpos( $href, 'fonts.bunny.net' );
				}
			)
		);
	},
	99
);
