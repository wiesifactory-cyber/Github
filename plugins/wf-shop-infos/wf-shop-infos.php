<?php
/**
 * Plugin Name: Wiesi Factory Shop-Infos
 * Description: Zeigt auf Semi-Custom-Dekorseiten unter dem Preis Lieferzeit und Gratisversand-Schwelle an und lädt Kundenvideos im CusRev-Bewertungsslider erst beim Antippen (spart ca. 11 MB auf der Startseite).
 * Version: 1.0.0
 * Author: Wiesi Factory
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* Texte zentral, damit sie leicht anzupassen sind. */
function wf_shop_infos_config() {
	return array(
		// Produktkategorie-IDs, auf deren Produkten die Zeile erscheint (151 = Semi Custom Dekor).
		'categories' => array( 151 ),
		'lines'      => array(
			array( 'icon' => 'clock', 'text' => 'Lieferung 14–20 Tage nach deiner Freigabe' ),
			array( 'icon' => 'truck', 'text' => 'Gratisversand ab 300 € (AT/EU)' ),
		),
	);
}

/* ---------------------------------------------------------------------
 * 1) Lieferzeit-Zeile unter dem Preis
 * ------------------------------------------------------------------ */
add_action(
	'woocommerce_single_product_summary',
	function () {
		global $product;
		if ( ! $product instanceof WC_Product ) {
			return;
		}
		$cfg = wf_shop_infos_config();
		if ( ! has_term( $cfg['categories'], 'product_cat', $product->get_id() ) ) {
			return;
		}
		$icons = array(
			'clock' => '<svg viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><circle cx="12" cy="12" r="9" fill="none" stroke="currentColor" stroke-width="2"/><path d="M12 7v5l3 2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
			'truck' => '<svg viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><path d="M3 6h11v9H3zM14 9h4l3 3v3h-7z" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><circle cx="7" cy="17" r="2" fill="currentColor"/><circle cx="17" cy="17" r="2" fill="currentColor"/></svg>',
		);
		echo '<ul class="wf-lieferinfo">';
		foreach ( $cfg['lines'] as $line ) {
			$icon = isset( $icons[ $line['icon'] ] ) ? $icons[ $line['icon'] ] : '';
			echo '<li>' . $icon . '<span>' . esc_html( $line['text'] ) . '</span></li>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		echo '</ul>';
	},
	15 // Preis = 10, Kurzbeschreibung = 20.
);

add_action(
	'wp_head',
	function () {
		if ( ! is_product() ) {
			return;
		}
		?>
<style id="wf-shop-infos">
.wf-lieferinfo{list-style:none;margin:-.4em 0 1.2em;padding:0;display:flex;flex-wrap:wrap;gap:.35em 1.2em;font-size:.92em;color:#333}
.wf-lieferinfo li{display:flex;align-items:center;gap:.4em;margin:0}
.wf-lieferinfo svg{color:#2475C9;flex:0 0 auto}
</style>
		<?php
	},
	100
);

/* ---------------------------------------------------------------------
 * 2) CusRev-Videos erst beim Antippen laden
 * ------------------------------------------------------------------ */
function wf_shop_infos_lazy_videos( $html ) {
	if ( ! is_string( $html ) || false === strpos( $html, 'image-row-vid' ) ) {
		return $html;
	}
	return preg_replace_callback(
		'/<video\b[^>]*class="[^"]*image-row-vid[^"]*"[^>]*>/i',
		function ( $m ) {
			$tag = preg_replace( '/\spreload="[^"]*"/i', '', $m[0] );
			return str_replace( '<video', '<video preload="none"', $tag );
		},
		$html
	);
}
add_filter(
	'do_shortcode_tag',
	function ( $output, $tag ) {
		return ( 0 === strpos( $tag, 'cusrev' ) ) ? wf_shop_infos_lazy_videos( $output ) : $output;
	},
	20,
	2
);

add_action(
	'wp_head',
	function () {
		?>
<style id="wf-shop-infos-video">.image-row-vid[preload="none"]{background:#1d2b3a}</style>
		<?php
	},
	100
);
