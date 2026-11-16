# Wettbewerbsanalyse: bolddesignz.com (bold.)

Stand: 16.11.2026. Grundlage: `products.json` (1.289 Produkte), `collections.json` (88 Kollektionen), Sitemaps, Seiten-HTML, die Optionsdaten der Produktoptionen-App sowie Playwright-Durchläufe auf Desktop (1440 px) und iPhone 13. Nichts gekauft, kein Formular abgeschickt, der Warenkorb blieb leer.

Wichtig für die Einordnung: Gerade läuft bei Bold der **„Black Month“ (1.–30.11.)**. Die Seite ist deshalb voll mit Rabatten und einem Gewinnspiel. Die Normalpreise stehen unten jeweils dabei.

Einschränkung der Testumgebung: Die Server von Klaviyo, SalesPop, Loox, Pandectes und Shop.app waren von hier aus nicht erreichbar. Pop-ups dieser Apps (Newsletter-Formular, Verkaufsbenachrichtigungen) konnten also gar nicht erscheinen. Dass die Apps eingebunden sind, ist belegt. Wie ihre Pop-ups aussehen, wurde nicht gesehen.

Screenshots: `/home/user/Github/analyse/screens/bold/` (Endung `-d` = Desktop, `-m` = Mobil, `-full` = ganze Seite, `-popup` = Zustand beim Laden mit Cookie-Banner).

---

## 1. Eckdaten

| | |
|---|---|
| Firma | Bolddesignz, Sitz Göteborg, Werkstatt an der schwedischen Westküste. Druck, Laminieren und Schneiden passieren im eigenen Haus |
| Shopsystem | Shopify, Theme „Bold Designz“ auf Basis von **Minimog** (FoxEcom), aktiver Theme-Name „Black Month 2026 – fluo options 13/11“ |
| Sprache, Währung | nur **Englisch**, nur **EUR**. Keine Sprach- oder Länderauswahl, `/de` und `/sv` geben 404. Shopify-Markt erkannt als DE |
| Kontakt | Telefon und WhatsApp (+46 …), E-Mail, Mo–Fr 09–16 Uhr. „a designer answers, not a bot“ |
| Kanäle | Instagram und TikTok @bolddesignz.co, YouTube @bolddesignz, eigener Discord-Server |
| Zielgruppe (sichtbar) | Supermoto-Szene, 50er bis 701er, E-Bikes (Stark Varg, Sur-Ron, Talaria), auch Mopeds und Street. Merch-Kollabs mit „BackPackWheelieBoyz“ (BPWB) |

---

## 2. Sortiment und Preise

### 2.1 Semi-Custom-Dekorkits

- **833 Kit-Produkte.** Jede Kombination aus Design und Bike ist ein eigenes Produkt mit eigenem Mockup, z. B. `venom-graphics-kit` (KTM EXC) und `venom-husqvarna-701-graphics-kit`.
- Mockups gibt es für 18 Modellgruppen. Nach Anzahl der Kits: KTM EXC 132, Husqvarna 701 88, Beta RR 50/125 80, Fantic XM/XMF 68, Stark Varg MX und SM je 60, Aprilia SX 125 53, KTM 690 SMC-R 50, Rieju MRT 45, Yamaha WR 125X 43, Husqvarna FE/TE 39, Derbi Senda 36, MX-Kits 20, Yamaha YZF 450 SM und MX je 14, Honda CRF 450 11, Yamaha MT 10, KTM Duke 10. Dazu Sur-Ron Light Bee. KTM EXC ist das „Grundbike“, die anderen Modelle haben eine Auswahl der Designs.
- Jedes Kit hat **22–25 Farbvarianten** (Red, Purple, Blue, Teal, Pink, Yellow, Orange, White, Light Blue & White, Mint, Black & Red, Orange & Yellow, Pink & Yellow, Green, Olive, Blue Purple Fade, Sakura Pink, Sunset Fade, Flamingo, Red & Orange, Purple & Yellow, Pink & Light Blue, Cyan & Green) plus „Custom Colour“.
- Der **Lieferumfang ist bei allen Kits gleich.** Es gibt keine Preisstaffel nach Teilen. Mehr Umfang kommt nur über die Option „Extra Printed Parts“ dazu.

| Position | Normalpreis | Black Month (aktuell) |
|---|---|---|
| Semi-Custom-Kit, Standardfarbe | **179,00 €** | 165,00 € („SAVE €14“) |
| Semi-Custom-Kit, „Custom Colour“ (eigene Farben) | 198,00 € (+19 €) | 184,00 € |
| Einzelnes Kit „BRANDER“ in Fluo Yellow/Orange | 229,00 € | – |
| Signature-/Fahrer-Kits (Gebel V1–V5, Sebbe Rosén, NTK V2–V4, Ekke, LarsLion, Skoovby, Arttu Stenberg, Carlito, Alin …), Kollektion `rider-graphics` mit 79 Produkten | 179/198 € (gleicher Preis) | 165 € |
| Full-Custom-Kit | ab 379 € | „up to 21 % off“ |
| Helmet Wrap (Semi-Custom) | 149 € | – |
| Full Custom Helmet Graphics | 199–249 € | – |
| Reprint eines Kits („Reprint of Kit – Heal Your Bike“) | 9,99 € (Produkt). Einzelteile nachbestellen geht laut FAQ per Mail | – |

### 2.2 Aufpreise im Kit-Konfigurator (aus den Optionsdaten und am Bildschirm abgelesen)

| Option | Normalpreis | Anzeige im Black Month |
|---|---|---|
| Custom colours (Farbwähler) | +19 € | +19 € |
| Customization/changes („Yes, I would like customization“) | +20 € | +20 € |
| Farbänderung „Custom Selection“ (innerhalb der Customization) | +9,99 € | |
| Premium Base **Full Chrome** („Recommended“, „Most popular upgrade“) | +109 € | ~~109~~ **+79 €** |
| Premium Base **Full Holographic Chrome** („Special effect“) | +119 € | ~~119~~ **+99 €** |
| Full Fluorescent Base (Pink, Red, Yellow), nur bei ausgewählten Kits | +109 € | |
| Fluo Details | +79 € | |
| Finish Silver Glitter („Most popular“) | +39 € | +33 € |
| Finish Red Glitter / Holographic Glitter | je +69 € | je +58 € |
| Finish Gold Glitter | +79 € | +67 € |
| Finish Matte | +39 € | +33 € |
| Extra Printed Parts: Full Extra Kit / Rear Fender / Numberplate | +179 € / +24 € / +24 € | |
| Matching: Wheel Graphics / Fork Graphics | je +49 € | −8 % → +45 € |
| Matching: Barpad / Exhaust Graphics | je +29 € | +26 € |
| Matching: Mini Headlight Stickers (15/30/50/100 Stk.) | 5,99 / 18,99 / 30,99 / 59,99 € | |
| Matching: Instagram-Tag-Sticker (eigener Name; 15/30/50 Stk.) | 5,99 / 18,99 / 30,99 € | ab +13 € |
| Matching Helmet Graphics | 99 € | 84 € |
| Matching Seatcover („Maxed-Out“) | +159 € | |
| Dual-Tone-Material bei der Sitzbank (Gripper, Holo, Chrome, Fluo) | +29 €, „Same as Graphics Kit“ +39 € | |

Beispiel „maxed out“ zum Normalpreis: Kit 179 + Chrome 109 + Holo-Glitter 69 + Sitzbank 159 + Helm 99 = **615 €**. Die ganze Seite ist darauf gebaut, den Bestellwert über das Kit hinaus zu treiben.

### 2.3 Zubehör, Scheinwerfer, Plastics, Felgen, Bundles

| Kategorie | Beispiele und Preise |
|---|---|
| **Scheinwerfer** (Kollektion `headlights`, Beschreibungen verweisen auf Movetronix-Verkabelung bzw. -Wandler) | GasGas X-Light v3 39,90 €; KTM/Husqvarna/Yamaha X-Light 79,90 €; KTM X-Light Stealth 84,90 €; KTM „Tigereye“ 99,90 €; KTM RGB X-Light 159 €; Beta RGB Angel Eye 159 €; KTM RGB Angel Eye Ring 169 € (gerade ausverkauft); Beta Loccis Eye 4.0 / Hex Beam RGBW 329 €; Kabelbaum für Batterie-Scheinwerfer 79,95 €; Adapter KTM→KTM 2024–25 19,90 € |
| **Plastics** (UFO, „manufactured in Italy“) | 65 Produkte. Komplette Plastikkits 94,99–171,99 € (Black Month, ca. −15 %, Streichpreise 110,90–201,90 €), z. B. KTM EXC 08–11 141,99 €, KTM EXC 17–19 152,99 €, Husqvarna FE/TE 2026 161,99 € statt 189,90 €, KTM EXC/SX 2025+/2026 171,99 € statt 201,90 €. Einzelteile 28,99–66,99 € (Kotflügel, Lampenmaske ab 30,99 €, Tankabdeckung 33,99 €) |
| **Felgen** | bold.-Felgensätze 849–879 €; SMPRO-Sätze 1.199–1.699 €; Full-Custom-Felgenkonfigurator ab 1.095 € |
| **Felgen-Sticker** | 50/50 Wheel Graphics 48,99 €, 701 Style 49,99 €, Chrome/Holo 50/50 89,99 €, Hexagon 79,99 € |
| **Sitzbänke** | One-Gripper-Sitzbankbezug 89,90 €, Full Custom Seat Cover 139–159,90 € |
| **Zubehör** | Rakel 5,90 €, Cutter 6,90 €, Combo 7,90 €, Spiegel 23,90 €, Barends 34,90 €, Gabelcover 47 €, Blinker-Set 59 €, Quick-Swap-Kennzeichenhalter 44,99–134,99 €, Pit Mat 89,90 €, Spanngurte 34,90 €, 320-mm-Bremsscheibe ab 139,99 €, Handbremse links 699 € |
| **Sticker** | Sticker Bundles 6,99 €, Sticker Sheets 3,99–9,99 €, MEGA Sticker Bundle 24,99 €, Instagram Tag Stickers x10 29,99 € |
| **Bundles** | 19 Kleidungs-Bundles mit Streichpreis: Hoodie + Handschuhe 99 € statt 104,89 €, Hoodie-Duo 119 € statt 139,80 €, 2x Handschuhe 59,90 € statt 69,98 €, T-Shirt x3 74,90 €, x6 119 €. **Bike-Bundles im Sinn von „Kit + Plastics“ gibt es nicht als eigenes Produkt.** Gebündelt wird im Konfigurator (Matching-Staffel, siehe unten) |
| **Kleidung** | 173 Produkte (Hoodies 69,90 €, T-Shirts 34,90 €, Handschuhe, Jacken), eigene Kollektion „boldfamily exclusive pre-launch“ |
| **Gratis-Beigaben** | „Black Month Gift“ Sticker Pack 5,99 € und Sticker Bundle Large 9,90 € (als Geschenk ab 150 € Warenkorb) |

---

## 3. Bike-Auswahl und Konfigurator, Schritt für Schritt

Bold hat drei Ebenen. Genau diese Kombination ist der „Bold-Stil“.

### Ebene 1: Kategorie „Semi-Custom Graphics“ (Screens `collection-semicustom-*`, `collection-bikeselect-*`)
1. Kopf: „SUPERMOTO GRAPHICS KITS – FITS TO ALL BIKES. Choose your design. The design will be adjusted to your specific bike & model.“ Darunter „Design & Fitment Guarantee 🥇 … Not satisfied? Before we print, you can change the design for free or get your money back.“
2. **„SHOP BY COLOUR“**: 23 runde Farbpunkte als Filter.
3. **„YOUR BIKE“**: zwei **Dropdowns**, „Bike brand“ (38 Marken + Other) und „Model“ (z. B. bei KTM 16 Modelle). Hier sind es noch keine Buttons.
4. Nach der Auswahl zeigt die URL `?bike=Husqvarna&model=701+SM+(SUPERMOTO)`. Die Wahl wird im localStorage gespeichert (`bdBike`). Die Überschrift wechselt auf **„ALL DESIGNS FIT YOUR HUSQVARNA 701 SM (SUPERMOTO)“**, dazu „How we make it fit your Husqvarna: 01 Pick the design you love …“, und die Kacheln zeigen **Mockups dieses Bikes** (Venom, Divine, Phantom … – Husqvarna 701). Ein Link „Clear“ setzt zurück.

### Ebene 2: Produktseite, Bike-Switch als Buttons (Screens `bikeswitch-*`, `kit-venom-husqvarna701-m.png`)
5. Unter dem Preis bzw. auf dem Handy direkt unter dem Bild: **„Bike: Husqvarna 701“** und eine Zeile mit **Marken-Chips**: KTM · Beta · Fantic · Husqvarna · Aprilia · Stark Varg · Yamaha · Derbi · Rieju · Sur-Ron · **„+ Other bike“** (gestrichelter Rahmen). Es erscheinen nur Marken, für die es Mockups gibt. Die Zeile scrollt seitlich, mit Pfeilen und Fortschrittsbalken.
6. Darunter eine zweite Zeile mit den **Modellen der aktiven Marke**, z. B. „Husqvarna: 701 | FE/TE“ oder „KTM: EXC | 690 SMC-R“.
7. Ein Klick auf eine Marke oder ein Modell **lädt dasselbe Design als anderes Produkt** (eigene URL, eigenes Mockup). Das Bild wird während des Ladens abgedunkelt.
8. **„Other bike“** springt zum Pflichtfeld „Bike Brand“. Das Feld leuchtet zweimal auf, dazu kommt die Sprechblase **„We make it for your bike, choose it here“**.

### Ebene 3: Pflichtformular (App „YMQ Product Options“, Screens `kit-config-*`)
9. **Farbe:** 12 sichtbare Farbpunkte mit Pfeil für die restlichen (auf dem Handy liegen sie im Produktbild). Ein Klick wechselt das Mockup.
10. **„Custom colours +€19“** klappt einen Farbwähler auf. Pro Designfarbe gibt es einen Reiter (z. B. „Purple → / Chrome → / Black →“), dazu Farbfeld, Farbtonleiste, Hex-Eingabe und „Reset colours“. **Das Mockup färbt sich live um** (getestet mit #00FF00: das Bike wird sofort grün, siehe `kit-config-4b-customcolour-green-d.png`). Der Preis springt auf 198 € (bzw. 184 €).
11. **BIKE INFORMATION** (Pflicht): „Bike Brand“-Dropdown mit 38 Marken, dann „<Marke> Model“ (z. B. KTM: EXC 125-500, SX 125-450, SMC-R 690 Supermoto … SMT 890; Husqvarna: TE/FE 125-501 … 701 SM, 701 Enduro … Other), dann „<Modell> Year Range“ (z. B. KTM EXC: 2026-Current, 2024-2025, 2020-2023 … 2002-2003). Bei **„Other“** kommt ein **freies Textfeld „Model + CC + Year?“** mit Platzhalter „YZF 450 2016“.
    - Beobachtung: Das Formularfeld wird **nicht** aus dem Bike-Switch oder der Kategorie-Auswahl vorbefüllt. Nach dem Klick auf „Husqvarna 701“ stand dort weiter „Please choose“. Der Kunde wählt sein Bike also zweimal.
    - Das Mockup bleibt beim Bike des Produkts, auch wenn im Formular eine andere Marke gewählt wird.
12. **DESIGN CHANGES**: „Customization/changes?“ mit „Yes (+€20,00)“ oder „No Customization“. Bei „Yes“ kommen dazu:
    - „Information About Your Plastic Kit“: Standard (From Factory) oder Plastic Kit From Bolddesignz
    - „Change Front Fender & Headlight Fitment?“: Yes/No
    - „Change colors of the design? (Optional)“: No / Swatches / Custom Selection (+9,99 €)
    - **„Race Number/Number on kit (optional)“** (Platzhalter „450“; laut Tooltip meist der Hubraum „50“, „125“ …)
    - **„Change the main text? (optional)“** (Platzhalter „Change the main text to "Wheelieboy123"“), also der Name bzw. Schriftzug
    - Widerspruch: Laut FAQ sind „Name and number … part of every semi-custom kit“. Im Formular erscheinen die Felder aber nur nach „Customization +20 €“. Bei „No Customization“ gibt es kein Feld für Nummer oder Name.
13. **UPGRADES & FINISHES** (Pflicht, Kacheln mit Bild): „Premium Base“ (Regular / Full Chrome „Recommended“ / Full Holographic „Special effect“) mit dem Hinweis „+2 extra tickets with a premium base“. „Premium Finish“ (Gloss / Silver Glitter „Most popular“ / Red Glitter / Holo Glitter / Gold Glitter / Matte) mit „+1 extra ticket“. Daneben jeweils „Example Chart“.
14. **MATCHING GRAPHICS** („Complete the look“): Staffel **„Match more, save more“: 1 Teil −8 %, 2 Teile −10 %, 3 Teile −15 %, 4. Teil gratis**. Kacheln: Wheel, Fork, Mini Headlight, Barpad, Exhaust, Instagram-Tag-Sticker.
15. **Gewinnspiel-Box**: „With this kit: 3 tickets … Only €35 more to your next ticket. At €250 you get +2 bonus tickets.“ Fortschrittsleiste: **150 € Free stickers → 200 € Free shipping → 250 € +2 bonus tickets → 500 € +3 bonus tickets**.
16. Schalter **Matching Helmet Graphics** (99 € → 84 €) und **Matching Seatcover** (+159 €), jeweils mit Ticket-Plus.
17. **„Extra Printed Parts?“**: No / Full Extra Kit / Extra Rear Fender / Extra Numberplate.
18. Zwei Häkchen-Zeilen: „Fitment & Design Guarantee“ und „Design proof & Approval – Design proof will be emailed to you for approval before printing.“
19. **ADD TO CART**, darunter Zahlungs-Icons (Visa, Mastercard, Amex, Apple Pay, Google Pay, PayPal, Klarna).
20. Darunter Akkordeons: „The Order Process“ (3 Schritte: Customize → Review & Approve → Production & Fast Shipping), Material-Guide, Versand und Produktionszeit, Produktbeschreibung, Loox-Bewertungen.

Nach der Bestellung: Ein Designer passt das Kit an und schickt **innerhalb von 1–4 Tagen** einen Proof per E-Mail (Bild des Bikes mit dem Kit). Änderungen sind 30 Tage lang kostenlos, gedruckt wird erst nach Freigabe.

**Auf dem Handy** liegen Farbpunkte und „Custom colours“ im Produktbild, die Marken-Chips direkt darunter. Unten links schwebt ein Ticket-Zähler („YOUR ORDER 3 WITH KIT“, auf anderen Seiten „COLLECTED 0“).

---

## 4. Vertrauenselemente

| Element | Umsetzung bei Bold |
|---|---|
| Bewertungs-App | **Loox**: „4.8/5 – Average from 3,945 verified reviews on Loox“. Ein Bewertungs-Widget mit vielen kurzen 5★-Texten steht auf jeder Seite unten, auch auf FAQ und Produkten |
| Kundenzahl | Produktseite „★ 4.9 (50,000+ Customers)“, Startseite „TRUSTED BY 55,000+ RIDERS“, FAQ „more than 50,000 customers, rated 4.9 out of 5“. **Die Zahlen sind uneinheitlich** (4,8 bei Loox, 4,9 im Badge) |
| Fahrer und Teams | Signature-Kits von Szene-Fahrern und YouTubern (Gebel, Sebbe Rosén, NTK, Ekke, LarsLion, Skoovby, Arttu Stenberg …). Kooperationen: BackPackWheelieBoyz (eigene Merch-Kollektion), „bold. × Stark Future giveaway“, SMPRO × Bolddesignz (Felgen). Startseite mit 16 YouTube-Build-Videos von Creatorn (Gebel, Skoovby, Ice Moto, Lars Lion, Oida …) |
| Gewinnspiel als Beweis | „PREVIOUS GIVEAWAYS – Every bike went to a real rider.“ Videos zu Gewinnspiel, Ziehung und Übergabe (Summer Giveaway 2026, Black Month 2025, Black Friday 2024) |
| Garantie | **„365 Day Warranty – Full coverage guaranteed“**, **„Guaranteed Fitment“**, „Fitment & Design Guarantee“: Vor dem Druck kostenlose Änderungen oder Geld zurück |
| Lieferzeit | Proof 1–4 Tage, Produktion 1–3 Wochen (FAQ) bzw. „2–3 weeks“ (Seite Production Time), Versand 3–5 Tage. Auf der Produktseite „Design time 1–4 days, Production time 1–21 days“ |
| Versand | DHL Freight und DHL Express, weltweit, **gratis in der EU ab 200 €**, darunter Preise erst im Checkout. Sendungsverfolgung für alle Bestellungen |
| Rückgabe | Nicht bedruckte Ware 30 Tage. Bedruckte Ware nur bei Mängeln. Storno kostenlos bis zum Start der Designarbeit |
| Zahlungsarten | Icons Visa, Mastercard, Amex, Apple Pay, Google Pay, PayPal, **Klarna**. Unter dem Preis „Pay in 3 X of €59.67 with [Klarna]“ (der Betrag ist vom Normalpreis 179 € gerechnet, nicht vom Aktionspreis). Anfragen an shop.app, also ist vermutlich Shop Pay aktiv |
| Herkunft und Menschen | „We do not rely on third-party companies in low-wage countries … designers based in Europe“, „in-house production in Sweden“, „a designer answers, not a bot“ |
| Wissen | Material-Guide, Fitment-Guide, Downloads, Blog „How to apply a graphics kit“, „Premium base & finish“ |

---

## 5. Startseite, Navigation, Tonalität, Marketing

### Startseite (Desktop, von oben nach unten; Screens `home-*`)
1. Laufband (schwarz, rote Linie): „BLACK MONTH IS ON • WIN 2 MAXXED-OUT SUPERMOTOS • EVERY €50 = 1 TICKET • GRAPHICS KIT DEALS ALL MONTH • ENDS 30 NOV, 23:59“
2. Header: Logo „bold.“, 8 Menüpunkte, Suche, Warenkorb
3. Hero-Slider (2 Folien): „★★★★★ #boldfamily – WIN THESE TWO SUPERMOTOS / TWO BIKES TWO WINNERS – EVERY €50 SPENT = 1 TICKET TO WIN NEW DUCATI X GASGAS“, Buttons „Supermoto Graphics Kits“ und „Full Custom Kits“
4. Black-Month-Block: „THE BIGGEST SALE IN BOLD. HISTORY … 2 brand-new bikes, worth over €25,000 combined“ mit **Countdown** (Tage, Stunden, Minuten, Sekunden)
5. „TOP CATEGORIES“-Karussell mit Rabatt-Badges: Semi-Custom (bis −25 %), Full Custom (bis −21 %), Parts (bis −38 %), Plastics (bis −15 %), Wheels, Matching, Seat Covers, Wheel Graphics, Clothing (bis −28 %)
6. „PREVIOUS GIVEAWAYS“ (Videos)
7. „#BOLDFAMILY – #1 SUPERMOTO COMMUNITY – TRUSTED BY 55,000+ RIDERS“: Kundenvideos im Hochformat (Full Chrome Base, Holo, Maxxed out, Stark Varg) plus Loox-Kachel 4.8/5
8. „GET INSPIRED BY REAL BUILDS“: YouTube-Builds von Creatorn
9. „ONE STOP SUPERMOTO SHOP – BUILD YOUR BIKE“ mit nummerierten Kapiteln: 01 Semi-Custom Kits (10 Designs, „22 colourways · From €179“), Full-Custom-Teaser ab 379 €; 02 Wheels (ab 849 €, „★ 4.9 rated“, Felgenkonfigurator); 03 Wheel Graphics; 04 Accessories („12 FITMENTS LEFT“ als Knappheitshinweis); 05 Plastic Kits
10. Newsletter: „#BOLDFAMILY – Get exclusive & early access to drops, events & more. JOIN“
11. Footer: More Info, Explore, **„Shop by bike“** (11 Modell-Landingpages wie „KTM EXC graphics“, „Aprilia SX graphics“), Kontakt

### Navigation
Bike Graphics · Parts & Upgrades · Wheels · Plastics · Clothing · Matching Graphics · Accessories · Info. Die Mega-Menüs haben Bildkacheln mit Untertiteln („Upgrades that make heads turn“, „Canvas For Your Graphics“). **Mobil** öffnet das Menü als Raster großer Bildkacheln mit Rabatt-Badges („BIKE GRAPHICS – UP TO 25% OFF – Supermoto, Enduro, MX, E-Bikes, Moped – and anything else“).

### Texte und Tonalität
Englisch, kurz, viel in Großbuchstaben, selbstbewusst: „Don't be like everyone else. Stand out.“, „RIDE IN BOLD.“, „Be different. Be bold.“, „Pick the design. It's made to fit your bike.“ Community-Wörter (#boldfamily, riders, builds). Die FAQ ist persönlich und konkret geschrieben (Fön, Rakel, „lass das Bike 24 h stehen“). Die SEO-Produkttexte sind dagegen generisch („Conquer the Streets …“).

### Upsells, Rabatte, Pop-ups
- Upsells im Formular: Material (Kacheln mit Badges), Matching-Staffel, Helm und Sitzbank als Schalter, Extra-Teile. Theme-Funktionen von FoxKit (Minimog) sind konfiguriert: „Frequently bought with …“ (vor dem Kauf), „Customers also bought with …“ (im Warenkorb), Mengenrabatt, Bundles. Im leeren Warenkorb ist davon nichts zu sehen.
- Schwellen: Gratis-Sticker ab 150 €, Gratisversand ab 200 €, Bonus-Tickets ab 250 € und 500 €
- Rabattlogik Black Month: automatische Preissenkung auf Kits (−14 €), Material −15 bis −27 %, Plastics ca. −15 %, Kleidungs-Bundles mit Streichpreisen. Keine Rabattcodes gesehen.
- Gewinnspiel als Dauer-Mechanik: Black Friday 2024, Black Month 2025, Summer 2026, Black Month 2026
- Pop-ups und Overlays: Cookie-Banner (Pandectes: Preferences, Decline, Accept), schwebender Ticket-Zähler, Hinweis-Sprechblase am Bike-Feld. Klaviyo und SalesPop sind eingebunden, ihre Pop-ups waren hier technisch blockiert und wurden **nicht gesehen**. Auch nach 25 s auf dem Handy kein weiteres Pop-up.

### Instagram- und Fahrer-Content
Kein Instagram-Feed eingebettet. Stattdessen Kundenvideos im Hochformat, YouTube-Embeds von Creatorn, Gewinnspiel-Videos und Signature-Kits. Ein Instagram-Tag-Sticker mit eigenem Namen ist als Upsell eingebaut, macht also Werbung auf dem Bike des Kunden.

---

## 6. Erkennbare Apps und Tracking

| Zweck | App bzw. Tag (Beleg) |
|---|---|
| Produktoptionen und Konfigurator | **YMQ Product Options** (`ymq-options` App-Extension, `/apps/ymq-product-options`), eigene Bold-Skripte für Bike-Switch und Farbwähler (`bd-ms`, `bdBike`) |
| Theme und Upsell | Minimog + FoxKit (Pre-Purchase, In-Cart, Bundles, Mengenrabatt) |
| Bewertungen | **Loox** (inkl. „bundle reviews“) |
| E-Mail/SMS | **Klaviyo** (Account-ID im Web-Pixel), `/apps/klaviyo-email-marketing-sms` |
| Cookie-Consent | **Pandectes GDPR** |
| Social Proof | **SalesPop** (Web-Pixel `api.salespop.com`, Script `sp-micro-next.b-cdn.net`) |
| SEO | **Yoast SEO** for Shopify; eigene `sitemap_agentic_discovery.xml` |
| Retouren | Tag „Returbo-Ignore“ auf allen Kits → vermutlich die Retouren-App Returbo, Kits ausgenommen |
| Google | GA4 `G-92WTFJLFC4`, Google Ads `AW-18293768750` (+ `AW-456984130`), Google-Tags `GT-…`, Merchant Center `MC-…` (über die App „Google & YouTube“) |
| Meta | Facebook-/Instagram-Pixel `139905527691448` über die offizielle App (Pixel-Typ „facebook_pixel“) |
| Sonstiges | Shopify Web Pixels Manager, Shop-App/Shop Pay, Adobe Fonts (Typekit), YouTube-Embeds, App-Block „ShopPop“ |
| Nicht gefunden | Kein TikTok-Pixel (nur ein Link zum Profil), kein Hotjar, Clarity in einer App-Konfiguration auf „enabled: false“ |

---

## 7. Bold im Vergleich zu Wiesi auf einen Blick

| | Bold | Wiesi Factory |
|---|---|---|
| Kit-Grundpreis | 179 € (Aktion 165 €) | 189,99 € |
| Eigene Farben | +19 € (Live-Vorschau) | ohne Aufpreis (geplant) |
| Name und Startnummer | nur mit „Customization“ +20 € im Formular | – |
| Vorschau vor dem Druck | 1–4 Tage per Mail | 48 h |
| Gesamtzeit | Proof + 1–3 Wochen + 3–5 Tage | 14–20 Tage |
| Gratisversand | ab 200 € (EU) | ab 300 € (AT/EU) |
| Bewertungen | 3.945 (Loox, 4,8) | ca. 13 (CusRev, 4,9) |
| Bike-Mockups | 18 Modellgruppen, über 800 Kit-Produkte | 10 Bikes in Arbeit |
| Sprache | nur Englisch | Deutsch |

---

## Was Wiesi Factory übernehmen sollte

**1. Den Bike-Switch auf der Produktseite übernehmen, aber ohne Bolds Doppel-Eingabe.**
Marken als Chips direkt unter dem Bild, darunter die Modelle der aktiven Marke. Nur Bikes mit fertigem Mockup zeigen (bei Wiesi die 10 Bikes). Als letzter Chip „+ Anderes Modell“ mit gestricheltem Rahmen, der ein Freitextfeld „Modell + ccm + Baujahr“ öffnet (Platzhalter z. B. „Aprilia RS 50 2008“). Bold zwingt den Kunden, sein Bike danach im Formular noch einmal per Dropdown mit 38 Marken zu wählen. Genau das sollte Wiesi besser machen: Der Chip **befüllt das Bestellfeld** (bei Wiesi `wf_design` bzw. das Bike-Feld). Für 14-Jährige am Handy zählt jeder Schritt.

**2. Die Bike-Wahl merken und als Link nutzbar machen.**
Bold speichert die Wahl (URL `?bike=…&model=…` plus localStorage) und schaltet die ganze Kategorie auf „Alle Designs passen auf deine Husqvarna 701“ mit den passenden Mockups um. Für Wiesis Instagram-Traffic ist das wertvoll: In der Bio, in Reels und Stories gleich auf `…/semi-custom/?bike=aprilia-sx-125` verlinken. Der Klick aus einem Aprilia-Reel landet so sofort auf Aprilia-Mockups. Das kostet keine App, nur etwas JavaScript in WooCommerce.

**3. Die Farbwahl ohne Aufpreis laut sagen.**
Bold verlangt für eigene Farben 19 € und für Name und Startnummer praktisch 20 € (Felder nur über „Customization“). Ein Bold-Kit mit eigenen Farben und Nummer kostet damit 218 € (Aktion 204 €). Wiesis 189,99 € mit freier Farbwahl sind damit **nicht teurer, sondern günstiger**, wenn man vergleicht, was der Kunde wirklich will. Direkt beim Preis gehört eine Zeile wie „Farben frei wählbar – ohne Aufpreis · Name & Startnummer inklusive · Vorschau in 48 h“. Kein Preiskampf und keine Streichpreise, das passt zum Plan „erst Vertrauen“.

**4. Name und Startnummer immer anbieten, gratis und optional.**
Zwei einfache Felder (Startnummer mit Platzhalter „50“ oder „125“, Name mit Platzhalter „dein Name/Insta“), immer sichtbar. Bolds Widerspruch zwischen FAQ und Formular zeigt, wie leicht das verwirrt.

**5. Die Vertrauenszeile unter dem Preis kopieren.**
Bold arbeitet mit drei kurzen Icons: „365 Day Warranty“, „Guaranteed Fitment“, „Design proof before printing“. Dazu der stärkste Satz der Seite: „Nicht zufrieden? Vor dem Druck ändern wir kostenlos – oder du bekommst dein Geld zurück.“ Wiesi hat die Vorschau in 48 h schon, das ist sogar schneller als Bolds 1–4 Tage. Garantie und Passform-Versprechen nur so formulieren, wie Wiesi sie wirklich einhält. Unter den Warenkorb-Button die Zahlungs-Icons, vor allem **PayPal und Klarna** (für Eltern als Käufer und für Ratenzahlung bei Jugendlichen relevant), sofern über den Zahlungsanbieter verfügbar.

**6. Upsells als Kacheln statt Dropdown, aber wenige und günstige.**
Bold stapelt Material, sechs Matching-Teile, Helm und Sitzbank. Für Wiesis Zielgruppe und Budget reichen 2–3 Kacheln mit Bild und Badge („Beliebt“). Zum Beispiel: Ersatz-Startnummernplatte, **Insta-Name-Sticker** (bei Bold ab 5,99 € und ein Gratis-Werbeträger in der Szene), Plastics passend zum Bike, Verklebeservice. Die Staffel „mehr dazu = mehr Rabatt“ (Bold: −8/−10/−15 %, 4. Teil gratis) ist eine gute Vorlage für die **Bundles ab März**.

**7. Den Fortschrittsbalken zum Gratisversand übernehmen und die Schwelle prüfen.**
Bold zeigt „Only €35 more …“ bis zur nächsten Stufe. Bei Wiesi liegt der Gratisversand mit 300 € über einem Kit (189,99 €). Eine Schwelle um 200–220 € würde „Kit + ein Zubehörteil“ belohnen. Das vorher mit den echten Versandkosten durchrechnen.

**8. Gewinnspiel-Mechanik nur im Kleinen und nur nach rechtlicher Prüfung.**
„Jede 50 € = 1 Los, zwei Bikes für 25.000 €“ ist für Wiesi unerreichbar und war für Bold kein Einzelfall, sondern läuft seit 2024 in Serie. Übertragbar ist die Idee hinter dem **Adventkalender**: Szene-Paten, tägliches Reel, und danach die Übergabe filmen und als „echte Gewinner“ zeigen, so wie Bolds „Previous Giveaways“. Ein Los pro Kauf in Österreich vorher rechtlich prüfen lassen.

**9. Fahrer-Content auf die Produktseite holen.**
Bold verkauft Signature-Kits von Creatorn zum normalen Kitpreis und bindet deren Build-Videos auf der Startseite ein. Das ist genau Wiesis Plan 2027 („Szene-Fahrer mit Signature-Kits“). Dazu: pro Signature-Kit das Reel des Fahrers auf der Produktseite, Kundenvideos im Hochformat statt Fotokarussell, und eine Landingpage pro Bike (Bold: Footer „Shop by bike“ mit 11 Modellseiten). Die Landingpages passen auch zur Meta-Kampagne ab Februar.

**10. Bewertungen sichtbar machen und ehrlich zählen.**
Bold hat 3.945 Loox-Bewertungen, nennt aber drei verschiedene Kennzahlen (4,8, 4,9, 50.000+, 55.000+). Wiesi sollte die echten CusRev-Bewertungen (aktuell 13 mit 4,9 ★) auf jeder Kit-Seite zeigen, um Fotos bitten und Zahlen nie aufrunden. Bei einer jungen Zielgruppe fallen widersprüchliche Angaben schnell auf.

**11. Tracking vor der Kampagne schließen.**
Bold arbeitet mit GA4, Google Ads, Merchant Center, Meta-Pixel (offizielle App) und Klaviyo. Für Wiesi sind **Meta-Pixel und Conversions API** die Voraussetzung für die Dauer-Kampagne ab Februar und gehören vor den Umbau-Start. Dazu ein Cookie-Banner mit „Ablehnen“ wie bei Bold und die Datenschutzerklärung (beides ohnehin offen).

**12. Nicht übernehmen.**
Englisch-only-Texte, 38-Marken-Dropdowns, Pflicht-Upsell-Felder („Premium Base *“), ein sehr langes Produktformular, Dauer-Countdown und Rabatt-Badges überall. Das passt nicht zu „kein Black Friday“ und überfordert am Handy. Wiesis Vorteile sind Deutsch, persönlicher Kontakt, die Vorschau in 48 h und Farben ohne Aufpreis. Diese Vorteile gehören an die Stelle, an der Bold Aufpreise zeigt.
