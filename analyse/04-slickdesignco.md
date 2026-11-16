# Wettbewerbsanalyse: Slick Design Co. (slickdesignco.com)

Stand: 16.11.2026. Erhoben mit curl (`/products.json`, `/collections.json`, `/products/<handle>.js(on)`, Sitemaps, Seiten-HTML) und Playwright (Desktop 1440 px und iPhone 13). Preise gelten für den Markt Österreich (`/en-at/`) in EUR, sie entsprechen dem Basispreis des Shops.

**Wichtig zum Zeitpunkt:** Während der Erhebung lief der „BLACK WEEKS VIP SALE“. Viele der unten angegebenen Preise sind also Aktionspreise. Die „regulären“ Preise stehen jeweils als Streichpreis (compare-at) daneben.

**Grenzen der Erhebung:**
- Einige Ressourcen waren aus der Testumgebung nicht erreichbar: Swatch-Bilder der Optionen (gehostet auf digitaloceanspaces.com), Loox-Widgets und Instagram-Feeds. Deshalb zeigen manche Screenshots leere Kästchen oder weiße Flächen. Das liegt an der Testumgebung, nicht am Shop.
- Einige Seiten (`/pages/faq-2025`, `/pages/materials`, `/pages/order-proof`, `/policies/refund-policy`) lieferten nur eine Cloudflare-Prüfung und konnten nicht gelesen werden.
- Die Startseite wurde trotz `/en-at` per IP-Geolocation in USD angezeigt (z. B. 139,00 $ statt 123,75 €). Produktseiten und Warenkorb zeigen EUR.

---

## 1. Steckbrief

| Punkt | Befund |
|---|---|
| Firma / Sitz | Slick Design Co., Arnhem (NL), laut Kontaktseite „De Overmaat 71“. Laut Footer „Based in The Netherlands“, laut Über-uns „From Bedroom to 500-Square-Meter Warehouse, EST 2016“ |
| Plattform | Shopify, Theme **Impact 6.6.0** (Theme Store 1190), Shop-Handle `slickdesign-nl.myshopify.com` |
| Sprache | Nur **Englisch** (Locale `en`). Ein Weglot-Script ist eingebunden, im Test waren aber keine weiteren Sprachen aktiv. Marktpfade `/en-at`, `/en-de`, `/en-it` usw. ändern nur die Währung und den Markt, nicht die Sprache |
| Währung | EUR als Basis; Multi-Currency per Geolocation |
| Sortiment | 321 Produkte in `products.json`, davon 88 versteckte „option-set“- und „template“-Produkte, die die Options-App für Aufpreise nutzt. 210 Kollektionen, viele davon leer (Altlasten nach Modell und Baujahr) |
| Schwerpunkt | Semi-Custom-Kits (ca. 120 Designs, je bis zu 27 Farbvarianten), dazu Full Custom, Matching Graphics, Plastics, Sitzbänke, Helm-Dekore, LED-Scheinwerfer und Bike-Parts |

---

## 2. Sortiment und Preise

### 2.1 Hauptprodukte

| Kategorie | Produkt | Preis jetzt | Streichpreis | Anmerkung |
|---|---|---|---|---|
| Semi-Custom-Kit | z. B. „NEW! SHOCKWAVE – GRAPHICS KIT“ (ca. 120 Designs) | **123,75 €** | 165,00 € | −25 % im Sale. Universell: Design wählen, dann wird es auf das eigene Bike angepasst. Farbvarianten als Variante (RED, BLUE, PURPLE … bis 27) |
| Full Custom | „FULL CUSTOM GRAPHICS KIT“ | **209,25 €** | 350,00 € | Auf der Infoseite `/pages/additional-info` steht als Basispreis noch „€ 295“, dazu Fluo 79,95 €, Chrome 99,95 €, Gold- oder Holo-Glitter je 39,95 €. Das ist widersprüchlich zum Produktpreis, vermutlich eine veraltete Seite |
| Full-Custom-Bundle | „FULL CUSTOM BUNDLE 70% OFF BLACK WEEKS VIP SALE“ | 299,00 € | 1.000,00 € | Full Custom plus Sitzbank plus alle Materialien plus Matching Graphics, „ONLY 10 SPOTS“. Im Test **ausverkauft** |
| Helm-Dekor | Semi Custom Helmet Graphics | 66,75 € | 129,95 € | Helmmodell aus Liste (6D, Airoh, Alpinestars, Bell, Fox, Shoei …) |
| Helm-Dekor | Full Custom Helmet Graphics | 111,75 € | 169,95 € | |
| Sitzbank | Full Custom Seat Cover Gripper / Premium | 99,95 € / 129,95 € | 139,95 € / 159,95 € | Rippen +29 €, Rippenfarbe +14,95 € |
| Plastics | Komplett-Plastiksätze und Einzelteile | 16,77–167,40 € | z. B. 279,00 € | Eigene Kollektionen pro Marke |
| LED-Scheinwerfer | X-Beam, Raptor Eye, Loccis Eye, Hex Beam (E-geprüft bzw. RGB/RGBW) | 139,99–339,00 € | – | Im September 2026 neu angelegt |
| Bike-Parts | Kennzeichenhalter, Achs-Slider, Bar-Ends, RGB Seat Glow, Kabelbaum | 24,79–130,00 € | | |

### 2.2 Günstige Einstiegsprodukte (für 14- bis 25-Jährige leistbar)

| Produkt | Preis | Streichpreis | Bemerkung |
|---|---|---|---|
| MINIPLATES 15 | 3,65 € | 9,95 € | ohne Beschreibung |
| Pro Apply Kit („Highly Recommended“) | **7,95 €** | 14,95 € | Montage-Set, auch als Häkchen im Kit-Formular |
| Sticker Bundle Fluo Yellow | **9,95 €** | – | 3× Slick-Logo, 3× SlickGang, 3× „Legalize Wheelies“, also Merch als Sticker |
| Decal Doctor – Reprint Service | 9,95 € | – | Einzelteile nachdrucken (Hinweis: Farbabweichung möglich) |
| Geschenkgutschein | ab 10 € | – | 10–1.000 € |
| Instagram Tag Stickers (Name bzw. Handle) | **13,97 €** | 19,95 € | Matching-Version: 10×, 15×, 30× oder 50× für 13,97–48,97 € |
| Matching Mini-Headlight Stickers | 13,97–46,87 € | 19,95 € | 10× bis 50× |
| Matching Exhaust Graphics | 17,45 € | 34,95 € | |
| Barpad Graphics (Lenkerpolster) | 17,45 € bzw. 24,47 € | 30,00 € bzw. 34,95 € | |
| Slick MX Gloves (3 Farben) | 17,47 € | 34,95 € | Eigenmarke |
| FMF Sticker (Auspuff, 6 Farben) | 20,97 € | 29,95 € | |
| Universal Bar-Ends | 24,79 € | 34,95 € | |
| **50/50 Supermoto Wheel Graphics (Felgen-Aufkleber)** | **34,97 €** | 59,95 € | Bewertung 4,7 ★. Passformen: 17″ 32–36 Speichen „FITS ALL WHEELS“, 701/690/GG 700, Gussfelgen universal, 16,5″. Material: Weiß, Chrome, Holochrome, Fluo Orange, Gelb oder Pink. Finish: Gloss, Matt, Holo-, Silber-, Gold- oder Red-Glitter |
| Matching Wheel Graphics (zum Kit) | 34,97 € | 69,95 € | Normal, Chrome/Holochrome oder Fluo |
| Matching Fork Graphics | 34,95 € / 34,97 € | 60,00 € | |

Ein Kunde kommt also schon mit **8–35 €** ins Sortiment: mit Stickern, Namens-Stickern, Handschuhen oder Felgen-Aufklebern. Das Kit ist die Hauptware, die kleinen Produkte dienen als Einstieg und als Upsell.

---

## 3. Produktwahl und Konfiguration

### 3.1 Ablauf: erst das Design, dann das Bike (keine Bike-Auswahl vorab)

1. **Navigation:** „Semi Custom Graphics“ öffnet ein Mega-Menü mit „For All KTM / Husqvarna / Honda / … / Talaria, Surron, Stark Models“. Fast alle Einträge führen auf **dieselbe** Kollektion `otherbike-bike-brands` („ALL SEMI CUSTOM GRAPHICS“). Die Marken dienen nur der Orientierung und filtern nicht.
2. **Kollektionsseite:** Kurztext „Please select the design/style you prefer and we will transfer it to fit your exact bike model after ordering. Design proof within 24 hours & Free unlimited revision round“. Darunter Chips „FITS ALL BIKES & BRANDS: Mopeds (50cc), Supermoto's, Enduro's, MX, Electric Bikes …“ und ein Raster aller Designs mit „Save €41,25“-Badges.
3. **Produktseite** (Formular der App Globo Product Options), Reihenfolge:
   - **Farbe** (Variante, Bild-Swatches)
   - **BIKE DETAILS:** Dropdown „Bike Brand“ (Pflichtfeld, 23 Marken plus „Other“). Danach erscheinen **bedingte Modellgruppen**, z. B. bei KTM „EXC EXC-F / XC-W XCF-W (All Models)“, „SX SX-F“, „SMC-R 690“, „SX 50/65/85/SX-E“, „Duke“, „Adventure“, „RC“, „ATV“, „Other Model (We make decals for all KTM models)“. Teilweise folgt eine dritte Ebene (exaktes Modell). Einige Gruppen kosten Aufpreis (Adventure +29,00 €, RC +49,95 €). Dazu ein freies Feld „Aftermarket/Non Standard plastics?“
   - **DESIGN CHANGES:** „Fully customizable at no extra cost … first design proof within 24 hours.“ Freitextfelder für Design- und Farbwünsche, Text- und Logo-Änderungen und die Startnummer, alle **ohne Aufpreis**
   - **MATERIALS & FINISHES** (Bild-Swatches):
     - Premium Print Base: Regular (Standard), Full Chrome („highly recommended“), Full Holographic Chrome
     - Full Fluorescent Base: keine, Fluo Orange, Gelb oder Pink, dazu Fluo-Akzente (+48,51 € bzw. +69,95 €)
     - Finish: Gloss (Standard), Silver Glitter, Holographic Glitter, Ultra Red Glitter (neu), Gold Glitter, Ultra Matte
   - **MATCHING GRAPHICS & EXTRA'S:** Wheel, Fork („Highly Recommended“), Barpad, Exhaust, Helmet, 10× Mini Headlight, 15× Instagram-Sticker, „Slick Apply Service“, „Pro Installation Kit (+7,95 €)“. Dazu modellabhängig **komplette Plastiksätze als Add-on** (z. B. KTM EXC 2024+ in Schwarz, Weiß oder Orange, je +97,97 €)
   - **Extra Printed Parts:** Front Fender, Rear Fender, Number Plate oder Headlight je +29,95 €, „Full Extra Kit“ +149,00 €
   - **Upload** von Bike-Fotos (optional)
   - Button „Add to cart“, darunter „+ Free big Slick Sticker Pack + How to apply like a pro tutorial“ und „Free EU shipping“
4. **Nach dem Kauf:** Designvorschau per E-Mail. Die Freigabe läuft über eine eigene Seite im Chat-Look („TEAM SLICK · Online“ mit Buttons „SEND TO PRODUCTION – Approve & start production“ und „REQUEST CHANGES“). Auf derselben Seite steht „Complete your setup! 🏁 Add these must-haves to your order and save big!“ mit Handschuhen, Bar-Ends, Achs-Slidern, Matching-Grafiken und dem Apply-Service. Das ist ein **Upsell genau im Moment der Freigabe**. Die Seiten `/pages/configurator`, `/pages/builder`, `/pages/faq` und andere nutzen offenbar dieselbe Vorlage. Ohne Bestellnummer bleiben sie leer, weshalb die FAQ-Seite öffentlich nichts zeigt.

### 3.2 Aufpreise (Preise der versteckten Options-Produkte laut `products.json`)

| Option | Aufpreis |
|---|---|
| Full Chrome bzw. Full Holographic Chrome | 69,97 € (Streichpreis 119 €) |
| Fluo-Farben | 48,51 € bzw. 69,95 € (Streichpreis 129 €) |
| Silber- bzw. Holo-Glitter | 27,97 € (Streichpreis 49,95 €) |
| Gold- bzw. Ultra-Red-Glitter | 34,97 € bzw. 34,99 € |
| Ultra Matte | 20,97 € (Streichpreis 39,95 €) |
| Gloss | 0 € |
| Extra Druckteil | 29,95 € je Teil, Full Extra Kit 149,00 € |
| Aufkleben durch Slick („Apply Graphics to Plastics“) | 89,00 € (Streichpreis 119 €) |
| Pro Installation Kit | 7,95 € |
| Matching Helmet | 35,70–57,23 € je nach Material |

Ein Kit kostet damit schnell 200–300 € statt 123,75 €. Die Grundbotschaft bleibt trotzdem „Design-Änderungen kostenlos“.

---

## 4. Lieferzeit-Kommunikation

| Quelle | Aussage |
|---|---|
| Startseite, Footer-Leiste | „Design Proof 24 Hours – Get a preview of your Semicustom kit within just 24 hours“ |
| Produktseite Kit, Akkordeon „Shipping & Production times“ | „Production usually takes **2–10 working days** … after design approved“. Versand in Europa „1–5 working days“ |
| Seite `/pages/production-shipping-time` | Semi-Custom: Vorschau in **1–2 Werktagen**, Revision meist ≤ 24 h, dann „**1–2 weeks**“ Produktion und Versand nach Freigabe. **Full Custom: Vorschau 1–4 Werktage, Produktion und Versand 1–4 Wochen nach Freigabe.** Sitzbänke 1–3 Wochen (Versand aus NL und DE). Wheel/FMF/Other: „production time of usually **1 week**“. Plastics: Versand in 1–2 Werktagen, sonst 2–4. Versand jeweils 1–5 Tage |
| Produktseite Felgen-Aufkleber | Grüner Hinweis „✓ Ordered before 23:00, **shipped out within 2–3 working days**“. Im Akkordeon derselben Seite steht dagegen „usually 1 week“ |
| Bundle | „✓ Shipped within 1–2 working days“ (bei einem Full-Custom-Bundle wenig glaubwürdig, vermutlich ein Theme-Baustein) |

Die Suchangabe „Full Custom 2–4 Wochen, Felgen 2–3 Tage“ trifft so nicht ganz zu. Laut Shop braucht Full Custom **1–4 Wochen nach Freigabe**. Für Felgen gibt es zwei verschiedene Angaben (2–3 Werktage bzw. etwa 1 Woche). **Muster:** Slick zerlegt die Lieferzeit in Schritte (Vorschau → Freigabe → Produktion → Versand) und betont den schnellsten Schritt (24 h Vorschau). Eine Gesamtdauer nennt Slick nirgends prominent. Die Angaben sind allerdings untereinander nicht konsistent.

---

## 5. Vertrauenselemente, Bewertungen, Fahrer und Teams, Content, Social

- **Bewertungen (Loox):** Die Seite `/pages/reviews` und Über uns zeigen „Overall rating: 4.8 / 5 from **5613 reviews**“ mit vielen aktuellen Einträgen, auch auf Deutsch, Italienisch und Niederländisch. Der Produktseiten-Block sagt „4.8★ Average rating · **4193+ Photo & Video Reviews** · Reviews verified by [Loox]“. Ein Loox-Karussell steht auf der Startseite. Produktsterne gibt es z. B. bei den Felgen (4,7 ★) und beim Bundle (5,0 ★).
- **Garantie- und Nutzenkacheln** auf jeder Produktseite: „Free Unlimited Adjustments – Designed until it's perfect“, „Produced with the best machines“, „Fitment & Quality Guaranteed“, „World wide shipping – Fast and fully tracked“.
- **Footer-Leiste:** „Free Shipping in the EU on Orders Over €200!“, „Customer Service Mo–Fr 8am–8:30pm, Average answer time: 8h“, „Design Proof 24 Hours“, „Based in The Netherlands 🇳🇱“. Auf der Kontaktseite stehen andere Zeiten (Mo–Fr 10–22 Uhr).
- **Erfahrung:** „EST. 2016 · 10 Years+ Graphics Experience“, „MAKING THE BEST LOOKING GRAPHICS SINCE 2016 … over thousands of custom bike graphics shipped“.
- **Material-Story:** „Air-Release Technology“, „not a one-shot application“, „around 95% of our customers install their graphics themselves“. Dazu Erklärseiten zu Chrome und Holochrome und ein Vorher-Nachher-Slider auf Startseite und Produktseite.
- **Fahrer und Teams:** **Nicht vorhanden.** Die Seite `/pages/collabs` existiert, zeigt aber nur die leere Freigabe-Vorlage. Eine Team- oder Fahrerseite und Signature-Kits habe ich nicht gefunden.
- **Content:** Der Blog `/blogs/news` ist leer. Content gibt es nur als Anleitung (z. B. „How to Apply Wheel Graphics“ in 6 Schritten mit Föhn und Messer) und als Akkordeons auf den Produktseiten.
- **Social:** Instagram @slickdesign_co, Facebook /slickdesignco und ein **WhatsApp-Kanal**. Den Kanal hat Slick 2024 als Zugang zum passwortgeschützten Black-Week-Sale genutzt (siehe 6.3). TikTok- oder YouTube-Links habe ich nicht gefunden. Hashtag und Community-Name: **#SLICKGANG**.

---

## 6. Startseite, Navigation, Tonalität, Upsells, Rabatte, Newsletter, Versand und Zahlung

### 6.1 Startseite (Reihenfolge)
1. Rote Laufschrift: „BLACK WEEKS VIP SALE IS LIVE!! + KTM 450 EXC-F SUPERMOTO GIVEAWAY. EACH € 25 SPEND IS ONE TICKET“
2. Hero-Slider: „#SLICKGANG ★★★★★ BLACK WEEKS VIP SALE LIVE NOW! UP TO 70% OFF + KTM 450 EXC-F 2025 SUPERMOTO GIVEAWAY“, Button „GET YOUR DEALS NOW >>“
3. Countdown, im Test abgelaufen und auf 00:00:00:00
4. „SHOP OUR TOP CATEGORIES“ als Kacheln: Semi Custom, Full Custom, Seatcovers, Matching Graphics, Plastic Kits, Bike Parts, mit Rabatt-Badges „UP TO 30% OFF“ bzw. „70% OFF“
5. „NEWEST SEMI CUSTOM KITS – FITS ALL MOPEDS, SM, MX & STREET BIKES“ als Karussell
6. „BUILD YOUR DREAM BIKE TODAY“ mit Vorher-Nachher-Slider und Kacheln für Kit, Sitzbank, Wheel, Fork, Barpad und Plastics (ein „Complete the look“-Prinzip)
7. Laufband „PREMIUM MOTORSPORT DECALS“, Loox-Bewertungen, Text zur Air-Release-Technik
8. Black-Weeks-Block, Nutzenleiste, Footer mit „About Us“-Text, Newsletter („Sign up for new stories and personal offers“) und Zahlungs-Icons

Mobil kommt ein **Sale-Pop-up** („FULL BIKE GRAPHICS – SALE IS LIVE! UP TO 70% OFF“ mit Kacheln „MATCHING GRAPHICS 30% OFF“ usw.). Ein klassisches Newsletter-Pop-up mit Rabattcode trat im Test nicht auf, obwohl Klaviyo eingebunden ist.

### 6.2 Navigation
Auf dem Desktop hat die Navigation drei Zeilen mit 13 Hauptpunkten (Globo Mega Menu): Full Custom Rebuild Bundle 70% Off, Full Custom Graphics, Semi Custom Graphics ▾, Helmets ▾, Plastics ▾, Matching Graphics, Wheel Graphics, Custom Seat Covers, Slick MX Gloves, Bike Parts, Our Reviews, Info ▾. Dazu ein Währungswähler, Suche, Konto und Warenkorb. Das wirkt eher überladen. Mobil gibt es ein Burger-Menü.

### 6.3 Tonalität und Branding
- Schwarz, Weiß und Signalrot, fette Großbuchstaben (Barlow-ähnlich), aggressives Logo „SLICK DESIGNCO.“
- Jugendliche, laute Sprache: „Get your ride looking slick“, „look dope while riding in the streets“, „#SLICKGANG“, „Legalize Wheelies“. Viele Emojis (🔥🚀🏁⚡) und Rechtschreibfehler („Revieuws“, „Populair“, „Exhuast“, „unlimted“)
- Die Studiofotos zeigen fast nur **Supermotos** auf dem Slick-Ständer mit einheitlichem Hintergrund. Jedes Produktbild hat unten ein Band „This design fits all brands & models. After ordering we will transfer this design to your bike of choice.“

### 6.4 Upsells
- Im Produktformular: Matching Graphics, Materialien und Finishes, Plastiksätze, Extra-Teile, Apply-Service und Pro Installation Kit
- Unter dem Felgen-Produkt: eine Reihe „Matching Fork, Matching Wheel, Seat Cover, Kit, Instagram Stickers“
- Im Warenkorb (Drawer und Seite): **Fortschrittsbalken „Spend €41.28 more and get free shipping!“**, „Trending this month“, ein **Gewinnspiel-Block „THE KTM SUPERMOTO GIVEAWAY – 6 TICKETS WITH THIS ORDER – Every €25 spent = 1 ticket“** und „Total discount −66,23 €“ mit durchgestrichener Summe. Button „Secure Your Order Now“
- Auf der Freigabeseite nach dem Kauf: „Complete your setup!“ mit 14 Zusatzprodukten (siehe 3.1)
- Gratis-Beigabe: „Free big Slick Sticker Pack + How to apply like a pro tutorial“

### 6.5 Rabatte und Aktionen
- Praktisch **alle Produkte haben Streichpreise**, im Sale 25 % (Kits), etwa 40 % (Full Custom) und bis 50 % (Add-ons). Viele Add-ons stehen dauerhaft mit Streichpreis im Katalog, angelegt 2022–2024.
- **Black Weeks 2024** (Seite `/pages/blackweeksale`): Der Shop war eine Woche gesperrt, das Passwort gab es nur im WhatsApp-Kanal, dazu Gewinnspiele über 5.000 € und „10 SLOTS ONLY“ beim 70-%-Full-Custom-Bundle. 2026 wird diese Mechanik mit „VIP“-Wording und dem 299-€-Bundle fortgesetzt.
- **Gewinnspiel mit Kaufbindung:** KTM 450 EXC-F Supermoto, jede 25 € Einkauf ergibt ein Los.
- Gutscheinkarten von 10 bis 1.000 €.

### 6.6 Versand und Zahlung
- Gratisversand in der EU ab **200 €**, weltweiter Versand aus NL.
- Zahlungsarten laut Footer: American Express, Apple Pay, Bancontact, Bizum, BLIK, Google Pay, **Klarna**, Maestro, Mastercard, MobilePay, **PayPal**, Satispay, Shop Pay, iDEAL Wero, UnionPay, Visa. Auf Produktseiten steht „Buy now, pay later“ (Klarna).
- Erstattung laut Infoseite: „After we started designing your graphics, we can no longer refund your order“.

---

## 7. Erkennbare Apps und Tracking

| Typ | Erkannt (aus HTML und Web-Pixel-Konfiguration) |
|---|---|
| Theme | Shopify Impact 6.6.0 |
| Produktoptionen | **Globo Product Options** (bedingte Felder, Bild-Swatches, Aufpreise über versteckte Option-Produkte, Datei-Upload) |
| Menü | Globo Mega Menu |
| Bewertungen | **Loox** (Foto- und Video-Reviews) |
| E-Mail | **Klaviyo** (Web-Pixel und `static.klaviyo.com`) |
| Countdown | Essential Countdown Timer |
| Länder- und Betrugsschutz | Region Restrictions / IP-Blocker, Synctrack (Betrugsschutz-Asset) |
| Übersetzung | Weglot (Script eingebunden, im Test nur EN) |
| Zahlungen | Shop Pay, Klarna, PayPal |
| Tracking | **Meta Pixel** (über die Facebook-App), **Google Ads** (AW-Tag mit Events page_view, view_item, add_to_cart, begin_checkout, add_payment_info, purchase, search), Google-Tag GT-…, „Google Analytics tag (migrated)“ als Custom Pixel |

---

## 8. Screenshots

Alle unter `/home/user/Github/analyse/screens/slick/`, jeweils `-desktop`, `-mobile` sowie `-full` (ganze Seite) und `-popup` (Zustand vor dem Schließen eines Pop-ups):

| Datei | Inhalt |
|---|---|
| `01-startseite-*` | Startseite |
| `02-configurator-*`, `15-builder-*` | Freigabeseite mit Upsells (ohne Bestellung leer) |
| `03-kollektion-ktm-*` | Kollektion „For All KTM Models“ |
| `09-bike-auswahl-semi-custom-*` | Alle Semi-Custom-Kits (Ziel der Marken-Menüpunkte) |
| `04-produkt-graphics-kit-*`, `04-produkt-graphics-kit-optionen-desktop-full.png` | Semi-Custom-Kit mit Optionen |
| `05-produkt-full-custom-*` | Full Custom Kit |
| `06-produkt-wheel-graphics-*`, `12-wheel-graphics-page-*` | Felgen-Aufkleber |
| `14-full-custom-bundle-*` | 299-€-Bundle (ausverkauft) |
| `07-faq-*`, `11-production-times-*`, `13-collabs-*` | Leere Chat- bzw. Freigabevorlage |
| `08-ourstory-*`, `10-reviews-*` | Über uns, Bewertungen |
| `16-navigation-mobile.png` | Mobiles Sale-Pop-up (statt Menü) |
| `17-warenkorb-*`, `18-warenkorb-drawer-*` | Warenkorb mit Gratisversand-Balken und Gewinnspiel-Losen |

---

## 9. Vergleich mit Wiesi Factory in Kürze

| | Slick Design Co. | Wiesi Factory |
|---|---|---|
| Semi-Custom-Preis | 165 € regulär, 123,75 € im Sale, Materialien mit Aufpreis | 189,99 €, freie Farbwahl ohne Aufpreis |
| Vorschau | „24 h“ (Seite: 1–2 Werktage) | 48 h |
| Lieferzeit-Angabe | in Schritte zerlegt: 24 h, 2–10 Werktage Produktion bzw. 1–2 Wochen, 1–5 Tage Versand | 14–20 Tage pauschal |
| Bike-Auswahl | erst Design, dann Marke und Modell im Formular | geplant: Marke als Button, nur passende Modelle |
| Einstieg unter 35 € | ja, viele Produkte (Sticker, Namens-Sticker, Felgen, Handschuhe) | nicht im Kontext genannt |
| Bewertungen | 5.613 (Loox, 4,8 ★) | ca. 13 (CusRev, 4,9 ★) |
| Gratisversand | ab 200 € | ab 300 € |
| Sprache | nur Englisch | Deutsch |

---

## 10. Was Wiesi Factory übernehmen sollte

Die folgenden Punkte gehen von Wiesis Lage aus: kleines Budget, Traffic fast nur über Instagram, derzeit etwa 3 statt 10 Bestellungen pro Woche, Ø-Preis 189,99 €, Lieferzeit 14–20 Tage.

1. **Ein Einstiegsregal unter 35 € aufbauen.** Das ist der wichtigste Punkt für die 14- bis 25-Jährigen. Slick holt Kunden mit Namens- bzw. Instagram-Stickern (13,97 € für 10 Stück), einem Logo-Sticker-Pack (9,95 €) und Felgen-Aufklebern (34,97 €). Wiesi kann das ohne neue Technik bei Ekkstein mitdrucken:
   - „Wiesi Felgen-Aufkleber 50/50“ für 17″ und Moped-Felgen für etwa 29–35 €
   - Namens- bzw. @Handle-Sticker als 10er-Set für etwa 12–15 €
   - Ein Wiesi-Logo-Sticker-Pack für etwa 8–10 €, das gleichzeitig als „Merch“ wirkt. Auf Spreadshop gab es bisher keine Bestellung, Sticker sind die günstigere Merch-Form

   Diese Produkte lassen sich in Reels zeigen, kurze Lieferzeit ist möglich, und wer klein kauft, kommt später für das Kit wieder. Lieferzeit dafür getrennt angeben, z. B. „Versand in 3–5 Werktagen“.
2. **Matching-Upsells direkt ins Semi-Custom-Formular.** Unter der Farbwahl ein Block „Passend dazu“ mit Häkchen: Felgen-Aufkleber, Gabel-Sticker, Lenkerpolster, Startnummer bzw. Name, Montage-Set (Rakel, Reiniger, etwa 7–10 €) und optional ein UFO-Plast-Plastiksatz fürs gewählte Modell. Bei 189,99 € Ø-Preis bringen schon 30 € Zubehör pro zweiter Bestellung spürbar mehr Umsatz, ohne einen einzigen zusätzlichen Kunden. Technisch geht das in WooCommerce mit einem Produkt-Add-on-Plugin, im Stil des geplanten Bike-Auswahl-Umbaus.
3. **Lieferzeit in Schritten kommunizieren statt „14–20 Tage“.** Slick führt mit dem schnellsten Schritt („Design Proof 24 Hours“). Für Wiesi: **„Deine Vorschau in 48 h → du gibst frei → Druck und Versand in X Tagen.“** Die Gesamtzeit ehrlich nennen, aber den 48-h-Schritt als Kachel auf jede Produktseite, in die Footer-Leiste und in die Instagram-Bio stellen. Wichtig dabei: Slick widerspricht sich (24 h gegen 1–2 Werktage, 2–3 Tage gegen 1 Woche). Wiesi sollte überall dieselben Zahlen verwenden.
4. **Drei Kurzantworten auf jede Produktseite** (Akkordeon wie Slick): „Wie läuft's ab?“ (Design wählen → Bike angeben → Vorschau → Änderungen gratis → Freigabe → Druck), „Wie lange dauert's?“ und „Kann ich das selbst aufkleben?“ (mit Hinweis auf Montage-Set bzw. Video). Damit sind die typischen DM-Fragen von Eltern und Jugendlichen schon auf der Seite beantwortet.
5. **Den Freigabe-Moment für Upsells nutzen.** Slick zeigt auf der Freigabeseite „Complete your setup!“. Wiesi verschickt die Vorschau ohnehin per Mail. Ein Absatz „Passt perfekt dazu: Felgen-Aufkleber im gleichen Design – jetzt mitdrucken, kein extra Versand“ mit Direktlink kostet nichts und trifft den Kunden, wenn die Begeisterung am größten ist.
6. **Gratis-Beigabe statt Rabatt.** „Gratis Wiesi-Sticker-Pack + Anleitungsvideo zu jedem Dekor“ (Slick: „Free big Slick Sticker Pack + How to apply like a pro tutorial“). Das passt zur Entscheidung gegen Streichpreise und gegen Black Friday, kostet bei Ekkstein nur Centbeträge und macht die Kunden zu Werbeträgern.
7. **Gratisversand-Schwelle und Fortschrittsbalken.** 300 € liegt weit über dem Ø-Preis von 189,99 €. Slick setzt die Schwelle bei 200 € an und zeigt im Warenkorb „Noch 41,28 € bis Gratisversand“. Eine Schwelle von etwa 200–220 € mit Balken (WooCommerce-Plugin) würde genau die Upsells aus Punkt 1 und 2 anstoßen, also Dekor plus Felgen.
8. **Bewertungen sichtbar machen, auch mit nur 13 Stück.** Slick zeigt Sternschnitt, Anzahl und Foto-Reviews auf jeder Produktseite. Wiesi sollte „4,9 ★ aus 13 Bewertungen“ auf Startseite und Produktseiten zeigen, in den CusRev-Mails um **Fotos vom fertigen Bike** bitten und diese Fotos zusätzlich als Instagram-Story-Highlight „Kundenbikes“ sammeln. Ein Vorher-Nachher-Slider wie bei Slick lässt sich mit vorhandenen Mockups und Kundenfotos sofort bauen.
9. **Einen WhatsApp-Kanal für Drops und den Adventkalender anlegen.** Er ist kostenlos und passt zu Instagram-Traffic. Slick nutzt ihn als „VIP-Zugang“. Für Wiesi passt das zum Adventkalender: tägliches Reel plus Hinweis „Codes und Verlosungen zuerst im WhatsApp-Kanal“. Ein Gewinnspiel nach dem Muster „je 25 € ein Los“ ist ein starker Kaufanreiz. Gewinnspiele mit Kaufbindung vorher rechtlich prüfen.
10. **Ratenzahlung bzw. „Später bezahlen“ anzeigen.** Bei 190 € und einer Zielgruppe, in der oft die Eltern zahlen, hilft „Später bezahlen mit PayPal bzw. Klarna“ direkt unter dem Preis. PayPal ist schon vorhanden, PayPal-Später-Zahlen bzw. Klarna über Stripe lassen sich meist ohne Fixkosten aktivieren.
11. **Tracking nachziehen.** Slick hat Meta Pixel, Google-Ads-Events (view_item, add_to_cart, begin_checkout, purchase) und Klaviyo. Für Wiesis Meta-Kampagne ab Februar sind Meta Pixel und Conversions API Pflicht. Ohne sie lernt die Kampagne mit 300–450 € im Monat zu langsam.

**Nicht übernehmen sollte Wiesi:**
- Dauer-Streichpreise und „bis 70 %“-Rabatte (unglaubwürdig, Omnibus-Risiko, widerspricht Wiesis Linie)
- Die überladene Navigation mit drei Menüzeilen
- Widersprüchliche Lieferzeiten
- Nur-Englisch. Deutsch ist Wiesis Vorteil bei österreichischen und deutschen Eltern
- Das Modell „erst Design, dann Bike im Dropdown“. Wiesis geplante Bike-Auswahl mit Marken-Buttons, passenden Modellen und „Anderes Modell“ ist nutzerfreundlicher. Bei Slick führen alle Marken-Menüpunkte auf dieselbe Kollektion.
- Eine eigene Fahrer- bzw. Team-Seite hat Slick nicht. Wiesis geplante Signature-Kits mit Szene-Fahrern wären hier ein echter Vorsprung gegenüber Slick.
