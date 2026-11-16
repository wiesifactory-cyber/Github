# Wiesi Factory: UX- und Conversion-Analyse

Stand: 16.11.2026 · geprüft: https://wiesi-factory.at · Ziel: von ca. 3 auf 10 Bestellungen pro Woche · Hauptzielgruppe: mobil, von Instagram, 14–25 Jahre plus Eltern

Screenshots: `/home/user/Github/analyse/screens/wiesi/` (`*-mobile.png` = iPhone 13, `*-desktop.png` = 1440×900, `*-full.png` = ganze Seite, `*-scrollNN.png` = Handy-Ansicht nach Scrollen)

## So wurde geprüft und was nicht geprüft werden konnte

- HTML mit curl geholt, Seiten mit Playwright/Chromium als iPhone 13 und Desktop geladen, Screenshots angesehen. Nichts gekauft und kein Formular abgeschickt. Um den Warenkorb und den Checkout zu sehen, wurde ein Filzrakel (3,50 €) über `?add-to-cart=191` in den Warenkorb gelegt.
- **Grenzen der Testumgebung** (die Netzwerk-Sperre der Sandbox, nicht der Shop):
  - Diese Adressen waren gesperrt: Typekit, fonts.bunny.net, jsDelivr/unpkg, Facebook, stats.wp.com und datareporter.eu. Deshalb zeigen die Screenshots Ersatzschriften. Das Cookie-Banner (datareporter) war **nicht sichtbar und konnte nicht geprüft werden**.
  - Der Produkt-Slider der Startseite lädt `slick.min.js` von jsDelivr. Damit die Bestseller zu sehen sind, wurde die gleiche Bibliothek vom Shop-Server eingespielt (Kopie aus dem CusRev-Plugin). Ohne diese Bibliothek bleiben „Bestseller“ und „Neu eingetroffen“ leer. Ob das bei echten Besuchern passiert, ist nicht belegt. Es zeigt aber eine Abhängigkeit von einem fremden CDN (siehe Probleme).
  - Chromium spielt keine Apple-Pay- oder Google-Pay-Buttons ab und hat keine H.264/HEVC-Codecs. Express-Zahlungen und Videos konnten deshalb nicht real geprüft werden.
  - Exit-Intent-Pop-ups, echte Ladezeiten über 4G, Versandkosten außerhalb Österreichs und Bestell-E-Mails wurden nicht geprüft.
- Die Ladezeiten sind grob, gemessen aus einem Cloud-Container über einen Proxy, ohne Drosselung. Sie eignen sich zum Vergleichen der Seiten, nicht als absolute Werte.

## Ladezeit (grob)

| Seite | Mobil: Server-Antwort / erster Inhalt / fertig geladen | Übertragen |
|---|---|---|
| Startseite | 2,5 s / 4,5 s / 9–11 s | **11–12 MB** |
| Shop | 2,0 s / 3,7 s / 6,2 s | ca. 0,9 MB |
| Kategorie Semi Custom | 2,6 s / 4,2 s / 6,3 s | ca. 1,7 MB |
| Semi-Custom „Buddy V2“ | 3,0 s / 5,0 s / 10,4 s (größtes Element nach ca. 5,8 s) | ca. 5,6 MB |
| Full-Custom ab 125 cc | 2,5 s / 5,2 s / 12,8 s | **ca. 11,7 MB** |
| Plastics KTM EXC 2020–23 | **6,3 s** / 8,1 s / 11,9 s | ca. 3,2 MB |
| Scheinwerfer Loccis Eye 4.0 | 2,4 s / 4,5 s / 8,4 s | ca. 2,1 MB |

Mit curl lag die Server-Antwort je nach Seite und Abruf zwischen 0,3 und 8 s (Buddy V2 beim ersten Abruf 8,0 s). Das deutet auf einen fehlenden oder unzuverlässigen Seiten-Cache hin.

Größte Ursachen auf der Startseite:
- ein Kundenvideo `IMG_4251.mov` (ca. 11 MB) im CusRev-Bewertungsslider (`preload="metadata"`), von Chromium mehrfach angefragt
- Hero-Bilder in 1920×2560 px mit je ca. 0,8–1,4 MB, z. B. `/wp-content/uploads/2024/12/IMG-20241126-WA0027-1920x2560.jpg`

Auf Buddy V2 lädt ein 1,6-MB-Bild `/wp-content/uploads/2023/07/IMG_9810-scaled.jpg`, dazu zwei Laminat-Vorschauen mit je ca. 700 KB.

---

## Stärken

1. **Starkes Semi-Custom-Konzept mit klaren Versprechen auf der Produktseite.** Die Kacheln sagen „Unbegrenzte Anpassungen gratis“, „Vorschau in 48 Stunden per Mail, WhatsApp oder Instagram“ und „Eigene Farbe ohne Aufpreis“. Die 20 Farben sind als Farbfelder wählbar. Das passt zur Zielgruppe, vor allem der Kontakt über Instagram und WhatsApp. Beleg: `screens/wiesi/04-semi-custom-buddy-v2-mobile-scroll01.png`, `04-semi-custom-buddy-v2-desktop.png`
2. **Einheitliche, gute Mockups in der Kategorie.** Jedes Semi-Custom-Dekor sitzt auf demselben Supermoto-Studio-Mockup, die Designs lassen sich gut vergleichen. Beleg: `03-kategorie-semi-custom-mobile-full.png`
3. **Ein durchdachter Konfigurator ist live.** Er führt in Schritten durch ① Bike (Marke als Dropdown, dazu Modell und Baujahr), ② Druck & Finish, ③ Personalisierung, ④ Extras, ⑤ Bike-Foto und Infos und zeigt dann den Preis. Beleg: `04-semi-custom-buddy-v2-mobile-scroll02.png`, https://wiesi-factory.at/produkt/voltage/ (gleiches Formular)
4. **Upsells sind schon eingebaut, mit Bild und Preis direkt auf der Produktseite.** Angeboten werden 50/50-Felgenaufkleber, Gabelaufkleber, Felgenrandaufkleber (+34,99 €), Instagram-Sticker (+9,90 €), Mini Plates und der Verklebeservice. Gerade der Instagram-Sticker trifft die Zielgruppe. Beleg: `04-semi-custom-buddy-v2-mobile-scroll05.png`
5. **Echte Bewertungen mit Text, Fotos und Antworten des Shops.** Die Bewertungen kommen über CusRev und werden auf der Startseite als Slider mit „Verifizierter Käufer“ gezeigt. Eine eigene Bewertungsseite gibt es: https://wiesi-factory.at/bewertungen/. Die Bewertungstexte sind authentisch und in der Sprache der Zielgruppe („sieht richtig geil aus“, „jeden cent wert“).
6. **Plastics sind nach Marke gegliedert** (Aprilia, Beta, Derbi, GasGas, Gilera, Honda, Husqvarna, Kawasaki, KTM, Rieju). Auf der Produktseite stehen die passenden Modelle, der Lieferumfang und die Lieferzeit (5–7 Tage). Beleg: https://wiesi-factory.at/product-category/plastics/, https://wiesi-factory.at/produkt/ktm-exc-2020-2023-verkleidung/
7. **Die Scheinwerfer-Seite ist fachlich stark.** Sie erklärt die Kompatibilität (mit oder ohne Batterie, Vergaser oder Einspritzung, passende Modelle), weist klar auf die fehlende Straßenzulassung hin und bietet an, die Kompatibilität vorab zu prüfen. Beleg: https://wiesi-factory.at/produkt/loccis-eye-4-0-rgbw-fuer-ktm-gasgas/
8. **Gute Basics im Checkout.** Es gibt einen Fortschrittsbalken zum Gratisversand („Noch 296,50 € bis zum kostenlosen Versand“), einen WhatsApp-Button auf allen Seiten, eine Leiste mit Login, Wunschliste und Warenkorb, Gastbestellung ohne Kontozwang, Kreditkarte, PayPal und Klarna sowie eine Newsletter-Checkbox im Checkout. Im Test war Österreich bei Land/Region vorausgewählt. Beleg: `08-warenkorb-mobile.png`, `09-checkout-mobile-full.png`
9. **Gute Produkt-Metadaten.** Die Meta-Beschreibung von Buddy V2 ist gut formuliert („… in 20 Farben oder deiner Wunschfarbe, angepasst an KTM, Husqvarna, GasGas & mehr“).

---

## Probleme

### A. Erste Ansicht am Handy (der 3-Sekunden-Test)

**A1. Nach 3 Sekunden weiß man nicht, was es gibt und für welches Bike.** Der sichtbare Bereich zeigt nur den Slogan „Get your New style – AND BE DIFFERENT!“ (Englisch, ohne Produktbezug), den Button „alle Produkte“ und zwei Kacheln ohne Bild („Entdecke Dekore“, „Entdecke Sitzbezüge“). Begriffe wie „Dekor“, Enduro, Supermoto oder Moped, ein Preis ab 189,99 €, die Vorschau in 48 h oder Bewertungen kommen dort nicht vor. Beleg: `screens/wiesi/01-home-mobile.png`
- Die Kategorie-Kacheln sind am Handy weiße Kästen ohne Bild und haben die falsche Reihenfolge: Sitzbezüge und Fahrwerk stehen vor Plastics, obwohl die Semi-Custom-Dekore das Hauptprodukt sind.
- Der Slogan ist auf der Seite ein `<h1>`. Für Suchmaschinen fehlt damit jedes Keyword.

**A2. Fixe Kopf- und Fußleisten nehmen am Handy sehr viel Platz.** Oben sind die blaue USP-Leiste und der Header mit Logo fix (zusammen ca. 157 CSS-px). Unten ist die Leiste mit Login, Wunschliste und Warenkorb fix (ca. 69 px), dazu der WhatsApp-Button. Von 844 px Bildschirmhöhe bleiben damit nur ca. 620 px für Inhalt. Beleg: `01-home-mobile.png`, `04-semi-custom-buddy-v2-mobile-scroll02.png`
- „Wunschliste“ und „Login“ sind für diese Zielgruppe keine wichtigen Aktionen.
- In der Startseiten-Ansicht bricht das Wort „MENÜ“ als „MEN / Ü“ um. Das kann an der Ersatzschrift in der Testumgebung liegen; bitte auf einem echten Gerät prüfen.

**A3. Die Bestseller auf der Startseite starten mit einem Scheinwerfer-Bild statt mit einem Dekor.** Beleg: `01-home-bestseller-mobile.png`. Zur Erinnerung: Wenn jsDelivr nicht lädt, bleibt die ganze Bestseller- und Neuheiten-Sektion leer (in der Testumgebung ohne Workaround so gesehen). Beleg: https://wiesi-factory.at/ lädt `https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js`

**A4. Die Startseite ist zu schwer.** Sie überträgt ca. 11–12 MB, davon ca. 11 MB ein `.mov`-Kundenvideo im Bewertungsslider, dazu Hero-Hintergründe in 1920 px. Am Handy über Mobilfunk ist das teuer und langsam. Bei Besuchern aus Instagram (In-App-Browser, ungeduldig) kostet das direkt Absprünge.

### B. Navigation

**B1. Das Handy-Menü zeigt die WordPress-Seitenliste statt der Shop-Kategorien.** Nach Tippen auf „Menü“ erscheinen: Start, AGB, Bewertungen, Datenschutzerklärung, Impressum, Kasse, Kontakt, Mein Konto, Newsletter, Shop, Sitzbank-Konfigurator, Sitzbank-Studio, **Updraft Central**, Vertrag widerrufen, Warenkorb, Widerrufsbelehrung, Wunschliste. Semi Custom, Full Custom, Plastics, Scheinwerfer und Felgensticker **fehlen**. Für mobilen Traffic ist das wahrscheinlich das größte Navigationsproblem. Beleg: `screens/wiesi/10-menue-mobile.png`
- Das Desktop-Menü hat nur drei Punkte: „Semi Custom“, „Factory Style“, „Felgensticker“. Plastics, Scheinwerfer, Full Custom und Zubehör sind nicht direkt erreichbar. Beleg: `01-home-desktop.png`
- „Updraft Central“ ist ein Backup- und Admin-Tool und gehört nicht öffentlich ins Menü: https://wiesi-factory.at/updraft-central/

**B2. Die mobile Header-Suche wurde im Test nicht gefunden.** Auf Desktop gibt es das Suchfeld „Produkt suchen“, am Handy war im Header keines zu sehen; es steht in der Seitenleiste unter der Produktliste („Products search“, Englisch). Beleg: `03-kategorie-semi-custom-mobile-full.png`

**B3. Die Kategorie-Seitenleiste ist unaufgeräumt.** Sie zeigt „Uncategorized“ (1 Produkt), „Helme“ (6 Produkte, sonst nirgends verlinkt) und „Motocross“. Im Footer unter „Unser Sortiment“ stehen nur Aprilia, Derbi, Schwingendekor und Zubehör. Beleg: https://wiesi-factory.at/product-category/dekore/semi-custom-dekor/, https://wiesi-factory.at/product-category/uncategorized/

**B4. Die Shop-Seite beginnt mit „Fahrwerk“.** Die erste große Kachel unter „Shop“ ist ein Neon-Bild „FAHRWERK“, nicht das Kernprodukt Dekore. Beleg: `02-shop-mobile.png`

### C. Auswahl nach Bike/Modell

**C1. Für Semi-Custom gibt es keinen Einstieg „Mein Bike“.** In der Kategorie kann man nur nach Farbe filtern (28 Farbwerte, darunter auch alte wie „Grün-Pink“ und „Holo“). Ein Filter nach Marke oder Modell fehlt, und auf der Startseite gibt es keine Bike-Auswahl. Die Marke wird erst im Konfigurator auf der Produktseite gewählt. Laut Kontext ist eine Auswahl im Bold-Stil geplant; live ist sie noch nicht. Beleg: https://wiesi-factory.at/product-category/dekore/semi-custom-dekor/
- Die Mockups zeigen alle dasselbe Supermoto-Bike. Wer eine Aprilia SX, eine Derbi Senda oder ein 50-cc-Moped fährt, sieht sein Bike nicht. Die Zeile „passt auf alle Marken, Modelle & Baujahre!“ muss das allein tragen.
- Das Marken-Dropdown ist ein natives `<select>` mit 15 Einträgen. Statt Logo-Buttons kommen Moped-Marken wie Aprilia, Derbi und Rieju dabei erst weit unten. Gilera, Beta-Moped und Sherco-Moped sind nicht einzeln aufgeführt, Gilera fehlt ganz. Beleg: `04-semi-custom-buddy-v2-mobile-scroll02.png`

**C2. Bei den Plastics stimmen Kategorien nicht.** Der „Beta Kotflügel“ (29,99 €) steht in der KTM-Kategorie. Beleg: https://wiesi-factory.at/product-category/plastics/ktm-plastics/

### D. Produktseiten

**D1. Semi-Custom (Buddy V2): Der „In den Warenkorb“-Button liegt sehr tief.** Am Handy steht er ca. 5.360 px unter dem Seitenanfang, also gut 8 Bildschirmhöhen bei ca. 620 px sichtbarem Inhalt. Die Seite ist ca. 11.250 px lang und hat 58 Formularfelder, davon 19 Pflichtfelder. Einen fixen Kaufen-Button gibt es nicht. Beleg: `04-semi-custom-buddy-v2-mobile-full.png`
- Beim Full-Custom ab 125 cc liegt der Button bei ca. 5.760 px, der Preis erst bei ca. 1.540 px. Der erste Bildschirm ist ein Wheelie-Foto, ohne Titel, Preis oder Aktion. Beleg: `05-full-custom-ab125-mobile.png`

**D2. Die Lieferzeit fehlt auf den Dekor-Seiten.** Auf Buddy V2 und Full-Custom kommen weder „14–20 Tage“ noch „Lieferzeit“ oder „Versandkosten“ vor; dort steht nur die Vorschau in 48 h bzw. 5 Tagen. Die 14–20 Tage stehen nur im Startseiten-Text. Eltern als Käufer wollen genau das wissen. Beleg: https://wiesi-factory.at/produkt/buddy-v2/, https://wiesi-factory.at/produkt/full-custom-dekor-ab125/

**D3. Wenige Bilder bei Semi-Custom.** Buddy V2 hat 2 Galeriebilder (Mockup und Bogen-Layout) und kein Foto eines echten verklebten Bikes, obwohl es Kundenfotos gibt. Im Mockup steht der Hinweis „schreib uns bitte an office@wiesi-factory.at“, also E-Mail statt WhatsApp oder Instagram. Beleg: `04-semi-custom-buddy-v2-mobile.png`

**D4. Inhaltliche Fehler und Altlasten auf Produktseiten:**
- Der Loccis Eye 4.0 zeigt unter „Zusätzliche Informationen“ das Attribut „Verkleidung: Black, White, Black-White, Fluo Orange …“, offenbar von einem Plastics-Produkt kopiert. Die Preisbox ist auf Englisch („Subtotal / Options / Total“). Beleg: https://wiesi-factory.at/produkt/loccis-eye-4-0-rgbw-fuer-ktm-gasgas/
- Bei „Ähnliche Produkte“ erscheint das Produkt selbst (Loccis bei Loccis, KTM EXC 2020–2023 bei KTM EXC 2020–2023). Beleg: dieselbe URL sowie https://wiesi-factory.at/produkt/ktm-exc-2020-2023-verkleidung/
- Das Cross-Sell-Produkt heißt „.Felgenaufkleber“, mit Punkt am Anfang. Beleg: ebenda
- Bei der Plastics-Verkleidung werden Lucy, Buddy und „.Felgenaufkleber“ als „Das könnte dir auch gefallen“ angeboten. Passend wäre ein Dekor *für genau dieses Modell*, ein Scheinwerfer für KTM oder der Verklebeservice.
- Das Produkt „Orange-Spark“ ist noch online (laut Kontext ist der Name problematisch). Beleg: Kategorie Semi Custom
- „Passform & Qualität garantiert“ steht nur beim Full-Custom; beim Semi-Custom heißt es weicher „auf die du dich verlassen kannst“. Das sollte einheitlich sein.

**D5. Preisformat.** Preise werden als „€189.99“ angezeigt (Punkt als Dezimaltrennzeichen, € vorn), im Konfigurator dagegen als „0,00 €“. In Österreich üblich ist „189,99 €“. Das wirkt wenig professionell und ist uneinheitlich. Beleg: `04-semi-custom-buddy-v2-desktop.png`, `08-warenkorb-mobile.png`

### E. Vertrauen und Social Proof

**E1. Die Bewertungszahlen widersprechen sich.** Die Startseite sagt „5,0 von 5 · 22 verifizierte Kundenbewertungen“. Die Seite /bewertungen/ sagt „5,0 · Basierend auf 24 Rezensionen“ (96 % 5★, 4 % 4★). Der interne Stand im Kontext ist ca. 13 Bewertungen mit 4,9★. Einzelne Produkte wie Buddy V2 zeigen „Rezensionen (0)“. Beleg: https://wiesi-factory.at/, https://wiesi-factory.at/bewertungen/

**E2. Kein Instagram-Beweis im Shop.** Die 11.500 Follower, Reels und Kundenbikes aus Instagram kommen auf der Website nicht vor. Es gibt nur ein kleines Instagram-Icon im Footer (`https://www.instagram.com/wiesi_factory_customs/`). Gerade für Käufer, die von Instagram kommen, wäre der Wiedererkennungseffekt wichtig. Beleg: `01-home-mobile-full.png`

**E3. Es gibt kein „Über uns“.** /ueber-uns/ ist 404. Auf der Startseite heißt ein Icon-Block „Über uns – Top Beratung“, ohne Text, Gesicht oder Werkstatt-Foto. Für Eltern als Käufer fehlt damit: wer steckt dahinter, wo sitzt die Firma (Bachmanning, AT) und seit wann gibt es sie. Beleg: `01-home-mobile-scroll03.png`, https://wiesi-factory.at/ueber-uns/ (404)

**E4. Garantie und Passform sind nicht konkret.** „Unbegrenzte Anpassungen gratis“ bezieht sich auf das Design. Was passiert, wenn das Dekor nicht passt, steht nirgends (Nachdruck, Kulanz?).

**E5. Die Kontaktseite ist nur ein Formular.** Sie zeigt weder WhatsApp-Nummer noch Instagram, Telefon oder Adresse sichtbar (WhatsApp nur über den schwebenden Button). Beleg: https://wiesi-factory.at/kontakt/

**E6. Das Teilen von Links sieht schlecht aus.** Die Startseite hat `og:description = "Das sagen unsere Kunden"` und kein `og:image`. Wird der Link in WhatsApp oder in einer Instagram-DM geteilt, erscheint eine unpassende Vorschau. Beleg: Quelltext von https://wiesi-factory.at/

### F. Versand- und Zahlungsinfos

**F1. Es gibt keine Seite zu Versand und Zahlung.** /versand/, /versandkosten/, /zahlung/ und /faq/ liefern 404. Die AGB sagen nur „Die Versand- und Lieferkosten werden … separat ausgewiesen“. Die Versandkosten für Österreich (Pauschale **7,08 €**, eine krumme Zahl) sieht man erst im Warenkorb. Versandkosten nach DE, CH und in die übrige EU konnten nicht geprüft werden, weil dafür ein Formular hätte abgeschickt werden müssen. Beleg: `08-warenkorb-mobile-full.png`, https://wiesi-factory.at/agb/

**F2. Die Zahlungsarten in AGB und Checkout stimmen nicht überein.** In den AGB (Punkt 3.5) stehen „Paypal, Apple Pay, Kreditkarte oder Sofort Überweisung“, im Checkout Kredit-/Debitkarte, PayPal und Klarna. Ob Apple Pay oder Google Pay angeboten werden, ließ sich in Chromium nicht prüfen. Für Jugendliche, die oft keine Kreditkarte haben, wäre eine sichtbare Info wie „PayPal, Klarna, Apple Pay, Eltern zahlen lassen“ wichtig. Beleg: https://wiesi-factory.at/agb/, `09-checkout-mobile-full.png`

**F3. Die Schwelle für Gratisversand (300 €) ist bei einem Dekor um 189,99 € weit weg.** Der Hinweis „Noch 296,50 € bis zum kostenlosen Versand“ ist korrekt, schreckt bei kleinen Bestellungen aber eher ab. Beleg: `08-warenkorb-mobile.png`

### G. Checkout-Hürden

- Positiv: Gast-Checkout, wenige Pflichtfelder, Telefon optional.
- **G1.** Der Checkout hat drei Checkboxen unter- und übereinander: Newsletter, Bewertungseinladung und AGB. Dazu kommt ein langer Datenschutz-Absatz. Das ist rechtlich in Ordnung, wirkt am Handy aber unruhig. Beleg: `09-checkout-mobile-full.png`
- **G2.** Es gibt keine Vertrauenselemente direkt beim Bezahl-Button, etwa „Vorschau vor Druck, du gibst frei“, Lieferzeit, Bewertungen oder Kontakt.
- **G3.** Express-Buttons wie PayPal oder Apple Pay („Oder …“ im Warenkorb) waren im Test nicht sichtbar. Ob sie bei echten Nutzern erscheinen, ist **nicht geprüft**.
- Nicht geprüft: Fehlermeldungen, Zahlungsabläufe und Bestätigungsseite (es wurde nichts abgeschickt).

### H. Texte und Tonalität

- **H1.** Die Sprache mischt Englisch und Deutsch: „Get your New style AND BE DIFFERENT!“, „get your new Style now“, „Get your new Style NOW!“, „Drive with Style“, „Products search“, „Subtotal“. Die Zielgruppe versteht Englisch, aber die Botschaft ist generisch und sagt nichts über Dekore.
- **H2.** Die Startseite hat Tipp- und Grammatikfehler: „aus der Masse heraus sticht“ (statt heraussticht), „Motorrad und Moped Dekoren“, „das aus der Masse“ (Komma fehlt), uneinheitliche Großschreibung („New style“, „New Style“).
- **H3.** Die Kategorie Semi Custom zeigt „Semi Custom Dekor“ und darunter gleich „Semi Custom Dekore“ als zwei riesige Überschriften. Der erste Bildschirm am Handy ist nur Text. Beleg: `03-kategorie-semi-custom-mobile.png`
- **H4.** Die Tonalität der Produkttexte passt grundsätzlich (du-Form, „auffallen“, Fahrerlager). Für Eltern fehlt aber eine nüchterne Info-Ebene: Lieferzeit, Material, Haltbarkeit, Verklebung durch Laien und Rückgabe.

### I. Upsells und Cross-Sells

- Die Upsells im Konfigurator sind gut (siehe Stärken).
- **I1.** Im Warenkorb werden keine Cross-Sells angezeigt, z. B. Filzrakel, Felgenaufkleber oder Instagram-Sticker. Beleg: `08-warenkorb-mobile-full.png`
- **I2.** Die Cross-Sells auf Plastics- und Scheinwerferseiten sind unpassend oder doppelt (siehe D4).
- **I3.** Es gibt keine Bundles wie „Dekor + Plastics + Verklebeservice“, obwohl es genau das Setup für einen „Neuaufbau“ ist. Laut Kontext sind Bundles erst ab März geplant.

### J. Newsletter und Pop-ups

- **J1.** Die Newsletter-Seite ist kaputt: Auf https://wiesi-factory.at/newsletter/ steht als Inhalt nur der rohe Shortcode `[newsletter]`. Ein Anmeldeformular gibt es nicht, und die Seite ist im Handy-Menü verlinkt. Beleg: https://wiesi-factory.at/newsletter/
- **J2.** Popup Maker ist installiert, aber nach 25 s auf der Startseite erschien kein Pop-up. Damit fehlt ein Angebot zur Lead-Gewinnung (z. B. Adventkalender-Anmeldung). Exit-Intent konnte nicht geprüft werden. Beleg: `11-home-nach-25s-mobile.png`
- Positiv: Die Newsletter-Checkbox im Checkout ist nicht vorangehakt und klar formuliert.

---

## Quick Wins (je unter 1 Tag)

1. **Handy-Menü reparieren:** Unter Design → Menüs dem Menüort „Handheld/Mobile“ ein echtes Menü zuweisen, mit Semi-Custom-Dekore, Full-Custom, Plastics nach Marke, Scheinwerfer, Felgensticker, Zubehör, Bewertungen und Kontakt/WhatsApp. „Updraft Central“, „Kasse“, „Vertrag widerrufen“ usw. entfernen. (B1)
2. **Den ersten Bildschirm am Handy neu texten**, z. B. „Dekore für Enduro, Supermoto & Moped – in deiner Farbe, für dein Bike. Ab 189,99 €, Vorschau in 48 h.“ Darunter zwei Buttons: „Dekor wählen“ und „Eigenes Design (Full Custom)“, dazu Sterne „★ 5,0 · 24 Bewertungen“. Die Kategorie-Kacheln mit Bild versehen und Dekore an Platz 1 stellen. (A1)
3. **Lieferzeit und Versand auf jede Dekor-Produktseite**, direkt unter den Preis: „Vorschau in 48 h · nach Freigabe 14–20 Tage · Versand AT 7,08 € · gratis ab 300 €“. (D2, F1)
4. **Eine Seite „Versand & Zahlung“ (bzw. FAQ) anlegen**, im Footer und Menü verlinken und die AGB-Zahlungsarten an den Checkout angleichen (Sofort → Klarna, Apple Pay nur wenn wirklich aktiv). (F1, F2)
5. **Newsletter-Seite reparieren** (Shortcode ersetzen oder Seite aus dem Menü nehmen). (J1)
6. **Fixe Leisten am Handy verkleinern:** USP-Leiste nicht fix oder schmaler, „Wunschliste/Login“ aus der unteren Leiste nehmen oder durch „Shop | WhatsApp | Warenkorb“ ersetzen. (A2)
7. **Einen fixen „In den Warenkorb“- bzw. „Jetzt konfigurieren“-Button mit Live-Preis** auf Semi- und Full-Custom-Seiten am Handy einbauen. Alternativ unter dem Preis einen Anker-Button „Jetzt gestalten ↓“. (D1)
8. **Das Kundenvideo `.mov` (11 MB) aus dem Bewertungsslider auf der Startseite entfernen** oder als MP4 mit Poster-Bild und `preload="none"` einbinden. Hero-Bilder auf ca. 1.000 px Breite und WebP verkleinern. (A4)
9. **slick-Carousel lokal einbinden** statt von jsDelivr (Theme-Funktion bzw. LEMONTEC), damit Bestseller und Neuheiten nicht von einem fremden CDN abhängen. (A3)
10. **Datenfehler bereinigen:** Attribut „Verkleidung“ beim Loccis entfernen, „Subtotal/Options/Total“ übersetzen, „.Felgenaufkleber“ umbenennen, Beta-Kotflügel aus KTM nehmen, „Uncategorized“ und leere Kategorien aus der Seitenleiste entfernen, „Orange-Spark“ umbenennen. (B3, C2, D4)
11. **Preisformat auf „189,99 €“ umstellen** (WooCommerce → Einstellungen → Allgemein: Währungsposition rechts mit Leerzeichen, Dezimaltrennzeichen Komma). (D5)
12. **Bewertungszahl vereinheitlichen** (Startseiten-Widget und Bewertungsseite aus derselben Quelle) und die Sterne auch in der Kategorie und oben auf Produktseiten zeigen. (E1)
13. **Ein OG-Bild und eine OG-Beschreibung für die Startseite setzen**, damit geteilte Links in WhatsApp und Instagram gut aussehen. (E6)
14. **Echte Kundenbike-Fotos zum jeweiligen Design in die Galerie** aufnehmen und im Mockup-Bild die E-Mail-Zeile durch „Fragen? WhatsApp oder Instagram @wiesi_factory_customs“ ersetzen. (D3)
15. **Kontaktseite ergänzen** um WhatsApp-Link, Instagram, Adresse (Bachmanning) und Antwortzeit. (E5)
16. **Rechtschreibung auf der Startseite korrigieren** und die doppelte Überschrift in der Semi-Custom-Kategorie entfernen. (H2, H3)

## Größere Maßnahmen

1. **Bike-Auswahl im Bold-Stil fertigstellen und an den Anfang stellen** (geplanter Semi-Custom-Umbau). Auf der Startseite und in der Kategorie stehen Marken als Logo-Buttons, darunter nur die passenden Modelle und „Anderes Modell“ als freies Feld. Danach werden die Designs **auf dem gewählten Bike** gezeigt (Mockups der 10 Bikes). Das ist der größte Hebel für die Frage „Passt das auf mein Bike?“. (C1)
2. **Produktseite für Semi-Custom am Handy neu ordnen:** Bild auf dem gewählten Bike → Preis, Sterne und Lieferzeit → Farbe → Bike → Kaufen. Druck & Finish, Personalisierung, Extras und Foto-Upload als aufklappbare Schritte oder als zweiter Schritt **nach** dem Warenkorb („Details nachreichen per WhatsApp/Instagram“). Ziel: Kaufen-Button innerhalb von 2–3 Bildschirmen, weniger als 10 Pflichtfelder vor dem Warenkorb. (D1)
3. **Performance-Paket:** Seiten-Cache mit Vorladen einrichten (Server-Antwort gemessen bis 6–8 s), Bilder als WebP in passenden Größen, Lazy Loading, unnötige Skripte auf Produktseiten entfernen (Lottie/Bodymovin, mehrere Slider-Bibliotheken, Sitzbank-Plugins auf allen Seiten). Ziel: unter 3 MB und unter 3 s bis zum größten Element am Handy. (Tabelle oben)
4. **Vertrauensseite „Über uns / So arbeiten wir“** mit Foto von Michael und der Werkstatt, Ablauf (Bestellung → Vorschau in 48 h → Freigabe → Druck → Versand), Material, Passform-Zusage, Kundenbikes und einem eingebetteten Instagram-Feed. Auf Startseite und Produktseiten kurz anreißen. Der Inhalt richtet sich vor allem an Eltern. (E2, E3, E4)
5. **Instagram-Shop-Brücke:** Landingpages pro Reel oder Szene-Pate (wie im Plan 2027), die direkt ins passende Design mit vorgewähltem Bike führen, statt auf die Startseite. Dazu ein Instagram-Feed mit UGC unter „So sieht's verklebt aus“.
6. **Cross-Selling entlang des Bikes:** Wer eine KTM-EXC-2020-Verkleidung kauft, sieht Dekore und den Loccis-Scheinwerfer für KTM sowie den Verklebeservice. Wer ein Dekor kauft, sieht Plastics für sein Modell. Später kommen Bundles „Neuaufbau-Kit“ dazu (laut Plan ab März). (I1–I3)
7. **Lead-Erfassung:** MailPoet reparieren (laut Kontext offen) und ein dezentes Pop-up oder einen Startseiten-Block „Adventkalender: täglich gewinnen – E-Mail eintragen“ einbauen. Nach dem Kauf folgt eine Mail-Strecke mit Verklebe-Anleitung und der Bitte um eine Bewertung mit Foto. (J1, J2)
8. **Versandkosten-Logik prüfen:** Die Schwelle von 300 € bringt bei einem 189,99-€-Produkt wenig. Zu überlegen wäre z. B. Gratisversand ab 189 € (also für jedes Dekor) oder ein fester Versandpreis, der auf der Produktseite steht. Das ist eine kaufmännische Entscheidung, die mit den Zahlen aus dem Kontext abgeglichen werden muss. (F3)
