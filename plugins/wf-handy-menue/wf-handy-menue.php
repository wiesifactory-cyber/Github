<?php
/**
 * Plugin Name: Wiesi Factory Handy-Menü
 * Description: Lässt das Storefront-Handy-Menü (Ort "Handheld-Menü") mit dem Child-Theme korrekt auf- und zuklappen. Gibt nur CSS aus.
 * Version: 1.0.0
 * Author: Wiesi Factory
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'wp_head', function () {
	?>
<style id="wf-handy-menue">
@media (max-width: 767px) {
  .main-navigation .handheld-navigation ul.menu {
    position: static;
    display: block;
    height: auto;
    width: auto;
    overflow: visible;
  }
  .main-navigation .handheld-navigation {
    max-height: 0;
    overflow: hidden;
  }
  .main-navigation.toggled .handheld-navigation {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    max-height: calc(100vh - 230px);
    overflow-y: auto;
    background: #fff;
    padding: 0 15px 15px;
    z-index: 9999;
  }
  .main-navigation .handheld-navigation ul.menu li a {
    display: block;
    padding: 12px 0 !important;
    border-bottom: 1px solid #eee;
    font-weight: 500;
    text-transform: uppercase;
  }
}
@media (max-width: 767px) {
  button.menu-toggle span { white-space: nowrap; }
}
</style>
	<?php
}, 100 );
