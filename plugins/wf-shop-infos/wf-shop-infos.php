<?php
/**
 * Plugin Name: Wiesi Factory Shop-Infos
 * Description: Zeigt auf Semi-Custom-Dekorseiten unter dem Preis Lieferzeit und Gratisversand-Schwelle an und lädt Kundenvideos im CusRev-Bewertungsslider erst beim Antippen (spart ca. 11 MB auf der Startseite).
 * Version: 1.1.0
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

/* ---------------------------------------------------------------------
 * 3) Einmalig: falsches Attribut "Verkleidung" bei den Scheinwerfern entfernen
 *    (war beim Kopieren von einem Plastics-Produkt mitgekommen; alle betroffenen
 *    Produkte sind einfache Produkte, das Attribut wird für keine Variante genutzt).
 *    Ergebnis steht in der Option "wf_shop_infos_attr_fix_log".
 * ------------------------------------------------------------------ */
add_action(
	'init',
	function () {
		if ( get_option( 'wf_shop_infos_attr_fix_done' ) || ! function_exists( 'wc_get_product' ) ) {
			return;
		}
		update_option( 'wf_shop_infos_attr_fix_done', 1, false ); // sofort sperren, damit es nie doppelt läuft.

		$ids = array( 12451, 12447, 12442, 11658, 11649, 11642, 11633, 11628, 11622, 11612, 11606, 11600, 11592, 11588, 11578, 11572, 11567, 11548, 11547, 11541, 11536, 12455 );
		$log = array();
		foreach ( $ids as $id ) {
			$product = wc_get_product( $id );
			if ( ! $product || ! $product->is_type( 'simple' ) ) {
				continue;
			}
			$attrs   = $product->get_attributes();
			$changed = false;
			foreach ( $attrs as $key => $attr ) {
				$label = $attr->is_taxonomy() ? wc_attribute_label( $attr->get_name() ) : $attr->get_name();
				if ( 'verkleidung' === strtolower( trim( $label ) ) ) {
					if ( $attr->is_taxonomy() ) {
						wp_delete_object_term_relationships( $id, $attr->get_name() );
					}
					unset( $attrs[ $key ] );
					$changed = true;
				}
			}
			if ( $changed ) {
				$product->set_attributes( $attrs );
				$product->save();
				$log[] = $id;
			}
		}
		update_option( 'wf_shop_infos_attr_fix_log', array( 'time' => current_time( 'mysql' ), 'products' => $log ), false );
	},
	99
);

/* ---------------------------------------------------------------------
 * 4) Englische Standard-Beschriftungen der Preisbox (Gravity Forms Product Add-ons)
 *    auf Deutsch – nur wenn dort noch der englische Standardtext steht.
 * ------------------------------------------------------------------ */
add_action(
	'wp_footer',
	function () {
		if ( ! is_product() ) {
			return;
		}
		?>
<script id="wf-shop-infos-labels">
(function () {
	function fix() {
		var map = { 'Subtotal': 'Grundpreis', 'Options': 'Optionen' };
		document.querySelectorAll('.product_totals .gfield_label').forEach(function (l) {
			var t = l.textContent.trim();
			if (map[t]) { l.textContent = map[t]; }
		});
		document.querySelectorAll('.product_totals .wcgfpa_grand_total .price').forEach(function (p) {
			p.childNodes.forEach(function (n) {
				if (n.nodeType === 3 && n.textContent.trim() === 'Total') { n.textContent = 'Gesamtpreis '; }
			});
		});
	}
	if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', fix); } else { fix(); }
})();
</script>
		<?php
	},
	100
);
