# Wiesi Factory: SEO, Performance, Tracking und Recht (technische Analyse)

Stand: 16.11.2026. Geprüft mit curl und Playwright (Chromium, mobil emuliert als „Pixel 5“). Pro Seitentyp habe ich 1–2 Beispiele angesehen:

- Start: https://wiesi-factory.at/
- Kategorien: `/product-category/dekore/semi-custom-dekor/` und `/product-category/dekore/factory-dekore/ktm/`
- Produkte: `/produkt/lucy-black/`, `/produkt/meriot-sx/` und `/produkt/raptoreye-fuer-ktm-gasgas/`
- Rechtsseiten

Die Titel und Descriptions aller 58 Kategorien habe ich zusätzlich automatisch abgefragt.

**Grenzen der Messung:** Diese Umgebung sperrt viele Fremd-Hosts, darunter connect.facebook.net, stats.wp.com, webcache-eu.datareporter.eu, cdn.jsdelivr.net und use.typekit.net.

- Den Cookie-Banner (DataReporter) und die per JavaScript nachgeladenen Texte von Impressum und Datenschutzerklärung konnte ich deshalb **nicht laden und nicht inhaltlich prüfen**.
- Die Ladezeiten aus Playwright sind durch Proxy und gesperrte Hosts stark verfälscht. Mit curl lag die TTFB bei etwa 0,5 s, im Browser bei 2–7 s. Belastbar sind daher vor allem das **Seitengewicht, die Zahl der Requests und die Bildformate**.

Das ist keine Rechtsberatung. Die Rechtspunkte sind Auffälligkeiten, die eine fachkundige Stelle (z. B. WKO, Anwalt, DataReporter-Support) prüfen sollte.

---

## Widersprüche zum Kontextpapier (00-kontext)

| Kontext sagt | Befund auf der Live-Seite |
|---|---|
| „Meta-Pixel und Conversions API fehlen“ | **Der Meta-Pixel ist eingebaut und aktiv.** Er kommt über das Plugin „Facebook for WooCommerce“ 3.7.8 mit der Pixel-ID `593557335171791`. Es gibt die Events `PageView` und auf Produktseiten `ViewContent`, jeweils mit `eventID` zur Deduplizierung. Dazu wird der CAPI-Param-Builder geladen (`meta-capi-param-builder-clientjs@1.3.2`) und der Server setzt das Cookie `_fbp`. Das spricht für eine aktive Conversions-API-Anbindung. Ob die Events bei Meta ankommen, ließ sich hier nicht prüfen, weil facebook.com gesperrt ist. Das sollte im Meta Events Manager kontrolliert werden. |
| „Datenschutzerklärung offen“ | Die Seite `/datenschutzerklaerung/` existiert, ist aber im HTML leer. Der Text wird nur per JavaScript von DataReporter nachgeladen (`privacynotice_v2.js`). Ob dort ein vollständiger und aktueller Text steht, konnte ich nicht prüfen (siehe 2). |

---

## Priorität 1: hohe Wirkung

### 1. Tracker laufen vor der Einwilligung (Recht und Tracking)

**Beleg:** Im `<head>` jeder Seite wird der Pixel sofort initialisiert. Der Schalter `held: false` bedeutet: Der Pixel wartet nicht auf eine Einwilligung.

```js
FacebookSignals.init({ held: false, ... pixelId: "593557335171791" });
FacebookSignals.initPixel("593557335171791", {}, {"agent":"woocommerce_6-11.3.0-3.7.8"});
...
fbq('track', 'PageView', {...}, {"eventID": "..."});
```

`fbevents.js` wird im `<head>` angefordert, also vor dem Banner-Skript `datareporter.eu/.../banner.js`, das erst im Footer steht.

In einer frischen Browser-Sitzung waren **ohne jede Interaktion** folgende Cookies gesetzt:

- `_fbp`: Das Cookie setzt der Server per `set-cookie`, sogar bei der Abfrage von `https://wiesi-factory.at/robots.txt` (`set-cookie: _fbp=fb.1....; Max-Age=7776000`).
- `sbjs_*`: WooCommerce Order Attribution („sourcebuster“).
- `tk_ai`: Jetpack/WooCommerce Analytics.

Weitere Drittanbieter-Requests vor der Einwilligung:

- `stats.wp.com/s-202647.js` und `e-202647.js` (Jetpack Stats)
- `fonts.googleapis.com` (Google Fonts, auf der Startseite 4 Requests: Source Sans Pro, Roboto, Roboto Slab, Amiko)
- `use.typekit.net`, `fonts.bunny.net`, `cdn.jsdelivr.net` und `unpkg.com`

Ob der DataReporter-Banner einige dieser Skripte nachträglich blockiert, konnte ich nicht prüfen, weil der Host gesperrt ist. Pixel und Cookies sind aber schon aktiv, **bevor** der Banner überhaupt geladen ist.

**Empfehlung:**

- Den Pixel an die Einwilligung koppeln. Facebook for WooCommerce bietet dafür den Zustand „held“ und den Mechanismus `facebook_release_signals`. Die Freigabe muss mit dem Consent-Event von DataReporter verbunden werden.
- Jetpack Stats, WooCommerce Analytics und Order Attribution prüfen.
- Google Fonts lokal einbinden (Elementor: „Google Fonts lokal laden“ bzw. WP Rocket).
- Danach die Cookie-Liste und die Datenschutzerklärung abgleichen.

Wichtig für die geplante Meta-Kampagne ab Februar: Der Pixel ist schon da. Es fehlt nicht die Installation, sondern die **saubere Consent-Steuerung und eine Prüfung der Events** (z. B. `AddToCart`, `InitiateCheckout` und `Purchase` im Events Manager testen).

**GA4 und GTM:** Kein GA4 aktiv. GTM4WP (duracelltomi) befüllt nur den `dataLayer`. Der Container selbst ist abgeschaltet: `console.warn("[GTM4WP] Google Tag Manager container code placement set to OFF !!!")`. Es läuft also weder `gtag` noch ein GTM-Container (geprüft mit Playwright: `typeof gtag === "undefined"`, `google_tag_manager` fehlt). Es gibt damit derzeit **keine Google-Analytics-Messung**, nur Jetpack Stats und WooCommerce Analytics.

### 2. Impressum und Datenschutz nur per JavaScript von DataReporter

- `/impressum/`: Der Inhaltsbereich ist im Server-HTML leer. Der Text wird über `webcache-eu.datareporter.eu/.../imprint_v2.js` nachgeladen.
- `/datenschutzerklaerung/`: Im HTML steht nur die Überschrift „Datenschutzerklärung“. Der Text kommt über `.../privacynotice_v2.js`.
- Folge: Ohne JavaScript, oder wenn DataReporter nicht erreichbar ist, sind beide Seiten leer. Den Inhalt konnte ich nicht prüfen.
- Empfehlung: Die Seiten in einem normalen Browser öffnen und prüfen, ob die Texte vollständig sind. Die Datenschutzerklärung muss die tatsächlich eingesetzten Dienste nennen:
  - Meta-Pixel und CAPI
  - Jetpack/WooCommerce Analytics
  - Google Fonts, Typekit und bunny.net
  - Chaty (WhatsApp-Widget)
  - Stripe (FunnelKit) und PayPal
  - MailPoet
  - CusRev (Bewertungsmails)
  - Gravatar

  Außerdem lohnt sich ein Fallback-Text direkt im HTML.

### 3. Rechtstexte widersprechen sich (Prüfung nur grob)

Vorhanden sind Impressum, AGB, Datenschutz (siehe 2), Widerrufsbelehrung und eine „Vertrag widerrufen“-Seite (Plugin `eu-order-withdrawal-button-for-woocommerce`, Formular mit Bestellnummer, E-Mail und Name). Alle sind im Footer verlinkt. Folgende Punkte fallen auf:

| Punkt | Beleg |
|---|---|
| **Zwei verschiedene Adressen** | AGB Punkt 2 und 8.2: „Kobel 4, 4672 Bachmanning“. AGB 13.2 und die Widerrufsbelehrung: „Grünbachstraße 23, 4672 Bachmanning“. |
| **Rücksendekosten widersprüchlich** | AGB 8.7.1: „Der Kunde trägt die Kosten für die Rücksendung.“ Widerrufsbelehrung: „Wir tragen die Kosten der Rücksendung der Waren.“ |
| **Tippfehler in der E-Mail-Adresse** | Widerrufsbelehrung und Muster-Formular: `office@wiesi-factory.a` (das „t“ fehlt) |
| **OS-Plattform** | AGB 14: „…eine Plattform zur Online-Streitbeilegung (OS) bereit, die Sie hier finden.“ Es gibt **keinen Link**. Außerdem prüfen, ob dieser Hinweis überhaupt noch aktuell ist (Stichwort: Einstellung der EU-OS-Plattform 2025). |
| **Keine Lieferzeit in den AGB** | Punkt 4 „Lieferung“ sagt nur, dass nach Zahlungseingang produziert wird. Es gibt keine Frist. |
| **Herkunft der Widerrufsbelehrung** | „Widerrufsbelehrung erstellt mit rechtstexter.de“. Prüfen lassen, ob sie zum österreichischen Recht (FAGG) passt. Die AGB sprechen von „Rücktritt“, die Belehrung von „Widerruf“. |
| **Ausnahme für Custom-Produkte** | Ist geregelt: AGB 8.6 und Widerrufsbelehrung „Vom Widerrufsrecht ausgeschlossen sind sämtliche Artikel, welche nach Kundenwunsch individualisiert wurden“. Laut AGB 8.6.2 gilt schon die Farbwahl als Kundenspezifikation. Prüfen lassen, ob das für Semi-Custom mit Standardfarben trägt. |
| **Zahlungsarten** | AGB 3.5: „Paypal, Apple Pay, Kreditkarte oder Sofort Überweisung“. Mit den tatsächlich aktiven Zahlarten abgleichen (aktiv erkennbar: PayPal Payments und FunnelKit Stripe). |

### 4. Seitengewicht und Bilder (Performance)

Gemessen mit Playwright (Pixel 5, nach dem Scrollen bis zum Seitenende, also mit nachgeladenen Lazy-Bildern):

| Seite | Requests | Gewicht | davon Bilder | Bildformate | CLS |
|---|---|---|---|---|---|
| Startseite | 173 | **11,5 MB** | 51 / 10,8 MB | 34× JPEG (10,6 MB), 2× PNG, SVG, **kein WebP/AVIF** | 0 |
| Kategorie Semi-Custom | 120 | 1,8 MB | 17 / 1,1 MB | JPEG | 0 |
| Produkt Lucy Black | 196 | 5,7 MB | 48 / 4,7 MB | 29× JPEG (3,2 MB), 4× WebP (1,4 MB) | **0,266** (schlecht, Grenzwert 0,25) |
| Produkt RaptorEye | 173 | 5,3 MB | n/a | PNG/JPEG | 0,001 |

Weitere Messwerte:

- **Stylesheets und Skripte:** 39–49 CSS-Dateien (ca. 250 KB) und 54–86 JS-Dateien (310–490 KB) pro Seite. WP Rocket ist aktiv (`Debug: cached@...`, gzip), fasst die Dateien aber offenbar nicht zusammen.
- **DOM-Elemente:** Startseite 2.728, Produktseite 1.709.
- **Ladezeiten in Playwright** (nicht belastbar, siehe oben): FCP 4,7–9,5 s, LCP 4,7–12,8 s, Load 7,8–14,7 s. Die TTFB mit curl war gut (0,48–0,77 s, aus dem Cache von WP Rocket).

**Größte Bremse:** Der Slider auf der Startseite nutzt WhatsApp-Fotos in voller Größe als CSS-Hintergrund. Dadurch gibt es kein `srcset` und kein mobiles Format:

```html
<div class="c-slider-img c-slider-item" style="background-image: url('.../2024/12/IMG-20241126-WA0027-1920x2560.jpg')">
```

Die Dateien sind 1.397 KB, 1.330 KB (`...WA0026-1920x3413.jpg`), 1.141 KB, 1.113 KB und 759 KB groß. Auf der Produktseite Lucy Black lädt ein Bild aus der Gravity-Forms-Bildauswahl (`2023/07/IMG_9810-scaled.jpg`) mit **1.627 KB**. Dazu kommen die Laminat-Vorschauen (`Laminat-Holo-Flakes.webp` mit 716 KB und `Laminat-Gold-Flakes.webp` mit 706 KB).

**Empfehlung:**

- Slider-Bilder auf etwa 800–1000 px Breite und WebP umstellen, oder als `<img>` mit `srcset` einbauen.
- Bilder der Gravity-Forms-Auswahl und der Laminat-Vorschau auf Thumbnail-Größe bringen (WebP-Konvertierung z. B. mit WP Rocket/Imagify oder einem anderen Plugin).
- Die Schriftquellen auf eine reduzieren. Derzeit sind es Google Fonts mit allen Schnitten von Roboto und Roboto Slab, dazu Typekit und bunny.net.
- Den CLS auf der Produktseite prüfen. Wahrscheinliche Ursache ist das Produkt-Add-on-Formular, das ist aber nicht verifiziert.

### 5. Teilen auf WhatsApp und Instagram: Open Graph der Startseite

Auf der Startseite ist kein `og:image` gesetzt. Beim Teilen erscheint deshalb kein Vorschaubild, oder ein zufälliges. Die Beschreibung ist falsch:

```html
<meta property="og:description" content="Das sagen unsere Kunden" />
```

Auch die **Startseite hat keine Meta-Description**. Kategorieseiten haben ebenfalls kein `og:image` (geprüft: Semi-Custom, KTM, Shop). Produktseiten sind in Ordnung, z. B. `og:image .../ApriliaSx10MeriotRed.jpg` mit `og:image:width 1600`.

**Empfehlung:**

- In Yoast für die Startseite ein eigenes Social-Bild (1200×630) und einen eigenen Text setzen.
- Ein Standard-OG-Bild unter Yoast → Darstellung → Social hinterlegen.

---

## Priorität 2: mittlere Wirkung

### 6. Index-Hygiene: Demo-, Test- und Doppelseiten sind indexierbar

Alle folgenden Seiten liefern `200` mit `index, follow`, die meisten stehen auch in der Sitemap:

- Demo-Beiträge: `/hello-world/` und `/hello-world-2/` (Titel „Hello world!“)
- „Blog (new)“ mit Parameter-URL als Canonical: `/?page_id=13040`
- Demo-Portfolio: `/portfolio/financial-project/`, `/investment/`, `/invoicing/` (Portfolio-Typ „icyclub_portfolio“)
- Autorenseiten `/author/nextair/` und `/author/office_buhf8g3m/` (Titel „admin, Author at …“)
- MailPoet-Seiten `/?mailpoet_page=captcha` und `subscriptions` (Titel „MailPoet Page“)
- `/category/uncategorized/` und `/product-category/uncategorized/`. Der Shop zeigt sichtbar „Uncategorized (1)“.
- Testprodukt: `/produkt/buddy-test-bikeauswahl/` mit demselben Titel wie `/produkt/buddy/` („Buddy Supermoto Dekor in 20 Farben“)
- Kopie: `/produkt/ktm-sx-2025-verkleidung-kopie/`
- 21 Produkt-URLs enden auf `-2`, z. B. `thunderstroke-smt-2` mit identischem Titel und identischer Description wie `thunderstroke-smt`.
- `/wishlist/` ist indexierbar. `/cart/` hat zwar `noindex`, steht aber in der page-sitemap, genau wie `checkout` und `my-account`.
- Das Testprodukt „Buddy“ bzw. die Buddy-Familie (13 URLs: `buddy`, `buddy-2`, `buddy-v2`, `buddy-mrt`, `buddy-mrt-2` …) ist live. „Buddy“ und „Buddy V2“ erscheinen in der Semi-Custom-Kategorie und auf der Startseite.

**Empfehlung:**

- Demo- und Testinhalte löschen oder auf Entwurf setzen.
- In Yoast Autoren-Archive, Portfolio, MailPoet-Seiten und „Uncategorized“ auf noindex stellen bzw. aus der Sitemap nehmen.
- Doppelte `-2`-Produkte zusammenführen oder per Canonical bzw. 301 auf das Original lenken.

### 7. Sitemap (Struktur und Anzahl)

`/sitemap_index.xml` (Yoast) ist in robots.txt eingetragen. `/sitemap.xml` und `/wp-sitemap.xml` leiten per 301 dorthin weiter.

| Teil-Sitemap | URLs |
|---|---|
| product-sitemap | 356 Einträge (davon 1× `/shop/`, **6 URLs doppelt**: `scrape-fantic`, `scrape-sx-125-2t`, `thunderstroke-senda`, `thunderstroke-smt`, `thunderstroke-smt-2`, `wasted-exc`) |
| product_cat-sitemap | 58 |
| page-sitemap | 12 (cart, checkout, my-account, wishlist; **Impressum, AGB und Datenschutz fehlen**, weil sie auf noindex stehen) |
| product_tag-sitemap | 7 |
| post-sitemap | 3 (nur Demo-Inhalte) |
| icyclub_portfolio | 4 (Demo) |
| mailpoet_page | 2 |
| author | 2 |
| category / portfolio_categories | je 1 |

Laut Kontext gibt es etwa 33 Semi-Custom-Dekore. Die Sitemap enthält aber rund 350 Produkt-URLs, viele davon pro Modell dupliziert (z. B. 19× „thunderstroke-…“, je 18× „meriot-…“, „indy-…“, „burn-…“, „blaze-…“). Das verteilt die Signale stark. Für den geplanten Semi-Custom-Umbau sollte feststehen, welche alten Modell-Varianten weiterleiten.

### 8. Titel, Descriptions und Überschriften

- **Startseite:** Der Titel lautet „Wiesi Factory - get your new Style now - Wiesi Factory Customs“. Er ist englisch, nennt den Namen doppelt und enthält kein Keyword wie Dekor, Supermoto oder Moped. Die H1 ist „Get your New style“. Eine Meta-Description fehlt.
- **Kategorien:**
  - Alle 58 Titel folgen dem Muster „… **Archive** - Wiesi Factory Customs“ (Yoast-Standard), z. B. „KTM Archive“, „SX 125 (ab 2018) Archive“, „50 - 125 cc Archive“.
  - **50 von 58 Kategorien haben keine Meta-Description.**
  - Unterkategorien wie „SM“, „701“ oder „50 - 125 cc“ nennen im Titel weder Marke noch „Dekor“.
- **Doppelte H1** (zweimal) in den Kategorien Semi-Custom („Semi Custom Dekor“ und „Semi Custom Dekore“), Motocross und KTM SMC.
- **Produkte:**
  - Neuere Produkte sind gut optimiert, z. B. Lucy Black: Titel „Lucy Black Supermoto Dekor in 20 Farben | Wiesi Factory“ mit passender Description. RaptorEye ist ähnlich gut.
  - Ältere Produkte wie „Meriot SX - Wiesi Factory Customs“ nennen weder „Aprilia“ noch „Dekor“ im Titel. Ihre Description ist eine Keyword-Liste: „Colorfull Aprilia SX Racing Dekor, anpassbar, …, Gearparts24, TMX-Graphics, Lion Dekor“.
  - Je eine saubere H1 pro Produkt. Danach folgen H2-Überschriften für Tabs und Cross-Sells (z. B. „.Felgenaufkleber“ mit führendem Punkt).
- **Fremdmarken in den Meta-Descriptions:**
  - Semi-Custom: „Bold, Slickdesigns, Arider“
  - Meriot SX: „Gearparts24, TMX-Graphics, Lion Dekor“
  - SMC: „Slick-Des…“

  Das bringt kaum Rankings und ist markenrechtlich heikel, bitte prüfen lassen.

### 9. Keywords für die Zielgruppe

- **„Supermoto Dekor“:** gut abgedeckt. Neue Semi-Custom-Produkte und Alt-Texte nutzen den Begriff (z. B. „Lucy Black Supermoto Dekor in Rot am Bike“), dazu gibt es den Tag `/product-tag/supermoto-dekor/`. Eine eigene **Kategorie** „Supermoto Dekor“ gibt es nicht, nur den Tag. Der Tag hat den Titel „Supermoto Dekor Archive“ und konkurriert mit der Semi-Custom-Kategorie.
- **„Dekor KTM SX“:** Es gibt **keine Seite dafür**. Die KTM-Dekor-Kategorie hat nur „EXC (alle Baujahre)“ und „SMC“. „SX“ steht im Shop fast immer für **Aprilia** SX (z. B. `meriot-sx`, `buddy-v2-sx`). KTM SX kommt nur bei den Plastics vor (`ktm-sx-2005-2006-verkleidung`, `ktm-sx-2025-verkleidung-kopie`). Der Tag `/product-tag/ktm/` dupliziert die Kategorie `/factory-dekore/ktm/`.
- **„Moped Dekor“:** Der Begriff kommt auf der Startseite nur einmal vor. Es gibt keine Landingpage „Moped Dekor“ bzw. „50ccm Dekor“, obwohl Aprilia SX/RX, Derbi Senda, Rieju MRT, Beta RR und Gilera SMT die Kernmodelle sind.
- **Empfehlung:** Je eine Landingpage bzw. Kategorie mit eigenem Text, H1 und Description für:
  - „Supermoto Dekor“
  - „Moped Dekor 50 ccm“
  - „KTM SX/EXC/SMC Dekor“
  - „Aprilia SX Dekor“

  Diese passen auch zu den geplanten Landingpages im Wachstumsplan. Ältere Produkttitel nach dem Muster „[Design] [Modell] Dekor | Wiesi Factory“ ergänzen.

### 10. Strukturierte Daten

- **Product und Offer:** vorhanden, aus WooCommerce und Yoast. Preis, `priceCurrency EUR`, `valueAddedTaxIncluded: true`, `availability InStock` und `priceValidUntil 2027-12-31` sind gesetzt. Beispiel Lucy Black: `"price": "189.99"`.
- **AggregateRating:** nur bei Produkten mit Bewertung, z. B. Lucy Black `{"ratingValue": 5, "reviewCount": 1}`. Meriot SX und RaptorEye haben keine. Bei rund 13 Bewertungen auf rund 350 Produkte bleiben fast alle Produkte ohne Sterne in Google.
- **Doppelte Product-Einträge:** Lucy Black hat zwei `Product`-Knoten. Der zweite (aus einem zweiten `ld+json`-Block im Footer) hat `"offers": null`. Das kann in der Search Console zu Warnungen führen.
- **Es fehlen:**
  - `brand` (überall `null`, auch bei Movetronix-Scheinwerfern)
  - `shippingDetails` und `hasMerchantReturnPolicy` (wichtig für die Händlereinträge bei Google)
  - `gtin`/`mpn`. Die SKU ist nur die WordPress-ID, z. B. `"sku": 9758`.
- **Organization:** vorhanden, mit Name und Logo (`cropped-1-scaled-e1669651192684.jpg`). Es fehlen `sameAs` (Instagram), Adresse und Kontakt. Das wäre auch für das Google-Unternehmensprofil hilfreich.

### 11. Preisangaben, Versand und Lieferzeit (sichtbarer Text, Playwright)

- **Preis:** „€189.99 inkl. MwSt.“. Die USt ist ausgewiesen, das Format ist aber englisch (Punkt statt Komma, € vor der Zahl). In AT/DE üblich ist „189,99 €“ (WooCommerce → Einstellungen → Währung).
- **Versand:** Nur die Top-Leiste „Versandkostenfrei ab 300 €“ und „Versandkosten berechnen“ im Side-Cart. Es gibt **keinen Hinweis „zzgl. Versand“ mit Link am Preis** und **keine Seite zu Versand und Zahlung**. `/versand/`, `/versandkosten/`, `/zahlung/` und `/faq/` liefern 404, im Footer ist nichts verlinkt. Die AGB (Punkt 5 und 6) verweisen nur auf die Kasse.
- **Lieferzeit:**
  - Meriot SX nennt sie in der Beschreibung („Lieferzeit 14-20 Tage“).
  - **Lucy Black (Semi-Custom) und RaptorEye zeigen keine Lieferzeit** (geprüft im sichtbaren Text). Lucy Black nennt nur „Vorschau in 48 Stunden“.
  - Empfehlung: Die Lieferzeit einheitlich nahe am Preis bzw. am Warenkorb-Button anzeigen, z. B. über ein Produktfeld oder einen globalen Hinweis.

---

## Priorität 3: kleinere Punkte

- **robots.txt:** Sie enthält zwei Blöcke `User-agent: *`, einen von WooCommerce mit Disallow für `wc-logs`, `add-to-cart` und `wp-admin` und einen von Yoast mit leerem `Disallow:`. Google führt beide zusammen, das funktioniert also, ist aber unübersichtlich. Die Sitemap ist korrekt eingetragen. Die robots.txt selbst trägt `x-robots-tag: noindex, follow`, das ist unkritisch.
- **Filter- und Sortier-URLs sind sauber gelöst:**
  - `?orderby=` verweist per Canonical auf die Basis-URL (`/shop/?orderby=price` → `canonical /shop/`).
  - `?attribute_pa_farbe=` ebenso (`/produkt/meriot-sx/?attribute_pa_farbe=rot` → `canonical /produkt/meriot-sx/`).
  - Die Suche `?s=` hat `noindex`.
  - Seitenzahlen haben ein eigenes Canonical (`/product-category/dekore/page/2/`, „Seite 2 von 22“), das ist in Ordnung.
- **Canonicals:** auf allen geprüften Seiten vorhanden und selbstreferenzierend. HTTP und www leiten auf https://wiesi-factory.at weiter (www mit 301).
- **Alt-Texte:** Produkt- und Kategoriebilder sind gut beschriftet (z. B. „Lucy Black Supermoto Dekor in Rot – Teile-Layout“, „RaptorEye für KTM/GasGas – Movetronix Bild 2“). Ohne Alt-Text sind hauptsächlich Social-Icons im Footer (`facebook.svg`, ohne `alt`) und CusRev-Icons. Bei RaptorEye fehlt der Alt-Text am Anschlussbild (`raptoreye-ktm-gasgas-anschluss.jpg` mit `alt=""`). Die Slider-Bilder der Startseite sind CSS-Hintergründe und haben deshalb keinen Alt-Text.
- **Rechtsseiten auf noindex:** Impressum, AGB und Datenschutz haben `noindex, nofollow`. Für das Ranking ist das egal. Für das Google-Unternehmensprofil und das Vertrauen ist ein indexierbares Impressum mit der richtigen Adresse aber eher hilfreich.
- **Sicherheit und Ordnung:**
  - `/wp-json/wp/v2/users` gibt öffentlich den Admin-Login-Slug `office_buhf8g3m` aus.
  - Die automatische Seitenliste im Menü verlinkt `/updraft-central/` (immerhin `noindex`).
  - `xmlrpc.php` liefert 403, das ist gut.
- **Trustpilot:** Kein Trustpilot-Code und kein Link gefunden. Das passt zum Kontext. Bewertungen laufen nur über CusRev (Seite `/bewertungen/`, CusRev-Widgets auf der Startseite).

---

## Erkennbare Plugins und Technik

Grundlage: `wp-content/plugins/…`-Pfade, Generator-Tags und Skript-Hosts auf den geprüften Seiten.

| Bereich | Plugin / Technik |
|---|---|
| Kern | WordPress 7.1.4, WooCommerce 11.3.0, Theme Storefront mit Child-Theme („Site made by LEMONTEC“) |
| Page Builder | Elementor 4.4.0 |
| SEO | Yoast SEO (Schema-Graph, Sitemaps, robots-Block) |
| Cache/Performance | WP Rocket 3.24 (Lazyload 17.8.3, Minify) |
| Tracking | Facebook for WooCommerce 3.7.8 (Pixel und CAPI-Param-Builder), GTM4WP 2.1.1 (Container aus), Jetpack (Stats, WooCommerce Analytics), WooCommerce Order Attribution (sourcebuster) |
| Consent/Recht | DataReporter (Cookie-Banner `banner.js`, Impressum- und Datenschutz-Skripte), EU Order Withdrawal Button for WooCommerce |
| Bewertungen | Customer Reviews for WooCommerce (CusRev) 5.128.0 |
| Zahlung | WooCommerce PayPal Payments, FunnelKit Stripe Payment Gateway (js.stripe.com) |
| Produktoptionen | Gravity Forms, Gravity Forms Product Add-ons, GF Image Choices, Gravity Forms Zero Spam, Woo Variation Swatches, eigene Plugins `sitzbank-studio` und `seatcover-configurator` |
| Shop-UX | WooCommerce Side Cart Premium (XootiX), FiboSearch (ajax-search-for-woocommerce), Woo Discount Rules 2.6.18, Max Mega Menu, Popup Maker, Chaty (WhatsApp-Button), Wunschliste (Plugin nicht eindeutig erkennbar) |
| Newsletter | MailPoet (laut Sitemap `mailpoet_page`; die SMTP-Umstellung ist von außen nicht prüfbar) |
| Backup | UpdraftPlus (Seite „Updraft Central“) |
| Altlasten | Portfolio-Typ `icyclub_portfolio` (Demo-Inhalte), Hello-World-Beiträge |

---

## Kurz-Maßnahmenliste (in dieser Reihenfolge)

1. Meta-Pixel, Jetpack, Order Attribution und Google Fonts erst nach Einwilligung laden. Die DataReporter-Integration mit dem Release-Mechanismus von Facebook for WooCommerce verbinden. Danach die Pixel- und CAPI-Events im Events Manager testen.
2. Impressum und Datenschutz im Browser prüfen und mit den tatsächlich eingesetzten Diensten abgleichen. Adresse, Rücksendekosten, E-Mail-Tippfehler und OS-Hinweis in AGB und Widerrufsbelehrung vereinheitlichen. Prüfen lassen.
3. Die Slider-Bilder der Startseite verkleinern und in WebP umwandeln (spart etwa 9 MB). Große Bilder aus Gravity-Forms-Auswahl und Laminat-Vorschau verkleinern.
4. Für Startseite und Kategorien OG-Bild und Description setzen. Den Text „Das sagen unsere Kunden“ ersetzen.
5. Demo-, Test- und Kopie-Inhalte entfernen. Autoren-, Portfolio- und MailPoet-Seiten auf noindex stellen. Doppelte `-2`-Produkte bereinigen.
6. Kategorie-Titel ohne „Archive“ (Yoast-Taxonomie-Vorlage), Descriptions für 50 Kategorien, eine H1 pro Kategorie.
7. Landingpages für „Supermoto Dekor“, „Moped Dekor“, „KTM Dekor (SX/EXC/SMC)“ und „Aprilia SX Dekor“ anlegen.
8. Lieferzeit und den Hinweis „zzgl. Versand“ an jedem Produkt zeigen. Eine Seite „Versand und Zahlung“ anlegen. Preisformat „189,99 €“.
9. Schema ergänzen: `brand`, `shippingDetails`, `hasMerchantReturnPolicy`, Organization mit `sameAs`; den doppelten Product-Knoten entfernen.
