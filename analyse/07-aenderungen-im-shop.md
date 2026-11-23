# Änderungen direkt im Shop (17.11.2026)

Gemacht über den WordPress.com/Jetpack-Zugang auf wiesi-factory.at.

## Erledigt und live

| Was | Wo | Rückgängig machen |
|---|---|---|
| E-Mail-Tippfehler `office@wiesi-factory.a` → `.at` (2 Stellen) | Seite „Widerrufsbelehrung“ (ID 439) | Revisionen der Seite |
| Startseiten-Text: Rechtschreibung korrigiert, Untertitel „Dekore für Enduro, Supermoto & Moped“, „ohne Aufpreis“ ergänzt, Button „Dekor finden“ führt jetzt zu Semi-Custom statt zum allgemeinen Shop | Startseite (ID 414), Block „Text + Bild“ | Revisionen der Seite |
| Produkt „.Felgenaufkleber“ → „Felgenaufkleber“ | Produkt ID 1152 | Titel wieder ändern |
| Zwei „Hello world!“-Demo-Beiträge auf Entwurf gesetzt (nicht mehr öffentlich) | Beiträge ID 1 und 13046 | Status wieder auf „Veröffentlicht“ |
| Adresse überall auf **Kobel 4** vereinheitlicht (Widerrufsbelehrung 2×, AGB Punkt 13.2) | Seiten ID 439 und 433 | Revisionen der Seiten |
| Rücksendekosten an die AGB angeglichen: Widerrufsbelehrung sagt jetzt „Sie tragen die unmittelbaren Kosten der Rücksendung der Waren.“ | Seite ID 439 | Revisionen der Seite |
| „Orange-Spark SMC“ → **„Havoc SMC“** (Adresse `/produkt/havoc-smc/`, alte Adresse leitet per 301 weiter), Bild-Alt-Texte angepasst. Das Semi-Custom-„Havoc“ war schon umbenannt. | Produkt ID 11148, Bilder 11149/11150 | Titel/Slug zurück |
| Testprodukt „Buddy TEST Bikeauswahl“ auf **Privat** gesetzt (nur eingeloggt als Admin sichtbar, für alle anderen 404) | Produkt ID 15589 | Status wieder auf „Veröffentlicht“ |
| Newsletter-Seite auf **Entwurf** gesetzt (Newsletter noch nicht aktiv) | Seite ID 13181 | Status wieder auf „Veröffentlicht“ |
| **Plugin „Wiesi Factory Consent & Fonts“** installiert und aktiv: Meta-Pixel, Jetpack-Statistik und WooCommerce-Analytics laden erst nach Zustimmung im DataReporter-Banner. Google- und Bunny-Schriften sind durch lokale Dateien ersetzt. Live getestet auf Start- und Produktseite: vor der Zustimmung 0 Verbindungen zu Facebook, `stats.wp.com` und Google, danach Pixel aktiv, keine JS-Fehler. Quellcode in `plugins/wf-consent/`. | Plugin `wf-consent` | Plugin deaktivieren |
| WordPress-Adresse auf `https://` (von Michael gespeichert, Jetpack abgeglichen) | Einstellungen → Allgemein | – |
| **Yoast: Google-Titel und -Beschreibungen** für Startseite und 57 Produktkategorien gesetzt (statt „… Archive“, Fremdmarken aus der Semi-Custom-Beschreibung entfernt). Uncategorized, Felgen und Schwingendekor auf noindex. Liste: `analyse/08-yoast-vorschlaege.md`. Live geprüft. | Yoast je Kategorie | Felder in Yoast leeren |
| **Preisformat** auf „189,99 €“ umgestellt (Währung rechts mit Leerzeichen, Komma als Dezimal-, Punkt als Tausendertrennzeichen) über das Einmal-Plugin `wf-preisformat` (danach deaktiviert, alte Werte in Option `wf_preisformat_backup`). Konfigurator live geprüft: 189,99 + 49,99 + 39,99 = 279,97 €, keine JS-Fehler. | WooCommerce → Einstellungen → Allgemein | dort Währungsposition „Links“, Dezimal „.“, Tausender „,“ |
| **AGB 3.5 Zahlungsarten** an den Checkout angeglichen: PayPal, Kredit- und Debitkarte, Klarna, Apple Pay und Google Pay (statt „Sofort Überweisung“). | Seite AGB (ID 433) | Revisionen der Seite |
| **Plugin „Wiesi Factory Shop-Infos“**: (1) Auf Semi-Custom-Produkten steht unter dem Preis „Lieferung 14–20 Tage nach deiner Freigabe · Gratisversand ab 300 € (AT/EU)“. Texte und Kategorien oben in `plugins/wf-shop-infos/wf-shop-infos.php`. (2) Kundenvideos im CusRev-Bewertungsslider laden erst beim Antippen (`preload=none`): Die Startseite lädt kein 11-MB-.mov mehr. Live geprüft, keine JS-Fehler. | Plugin `wf-shop-infos` | Plugin deaktivieren |
| **Scheinwerfer bereinigt** (Plugin `wf-shop-infos` 1.1): Das falsche Attribut „Verkleidung: Black, White …“ ist bei allen 21 Scheinwerfern inkl. AC/DC-Converter einmalig entfernt (alles einfache Produkte, keine Varianten betroffen; Protokoll in Option `wf_shop_infos_attr_fix_log`). Die Preisbox heißt jetzt „Grundpreis / Optionen / Gesamtpreis“ statt „Subtotal / Options / Total“ (nur wo noch der englische Standard stand). Live geprüft: Loccis Eye 4.0 + H4-Adapter = 335,99 €, keine JS-Fehler. | Produkte 11536–12455 | Attribut im Produkt wieder anlegen |
| **Handy-Menü aktiv** (siehe unten) | Menü „Handy-Menü“ (ID 256) am Ort „Handheld-Menü“ + Widget `block-2` in „Footer Spalte 1“ | Menü-Ort leeren, Widget entfernen |

## Handy-Menü

Das neue Menü **„Handy-Menü“** (ID 256) hat diese Punkte:
Semi-Custom Dekore · Full Custom · Factory Style Dekore · Plastics · Scheinwerfer · Felgensticker · Zubehör · Bewertungen · Kontakt.

Das Child-Theme enthält CSS-Regeln (`.main-navigation .menu { position: fixed; … }`), die nur mit der alten Seitenliste funktionieren. Ohne Korrektur stand das neue Menü dauerhaft offen und quer über der Seite. Die Korrektur steht in `handy-menue-fix.css`.

So ist die Korrektur eingebaut:
- **Plugin-Upload:** Vom Server abgelehnt („Plugin uploads require HTTPS on the target site“). Wahrscheinlich steht in WordPress bzw. Jetpack die Seiten-Adresse noch mit `http://`.
- **Bereich „Unter dem Header“:** Wird vom Child-Theme nicht ausgegeben.
- **Lösung:** HTML-Block-Widget `block-2` in **Footer Spalte 1**. Es enthält nur das `<style>` und blendet sich selbst aus.

Live geprüft (iPhone-Ansicht) auf Startseite und Produktseite: zu, offen, wieder zu. Die Desktop-Ansicht ist unverändert.

Falls das Theme einmal neu gemacht wird: Das CSS gehört dann besser ins Child-Theme oder unter „Zusätzliches CSS“, und das Widget kann weg.

## Bewusst nicht geändert

- **Beta Kotflügel** in der KTM-Kategorie: Er ist absichtlich allen Marken zugeordnet (universell), von Michael bestätigt.
- **Hero „Get your New style – AND BE DIFFERENT!“**: bleibt bewusst (Michaels Botschaft). Es wird an einer neuen Startseite gearbeitet, daher vorerst keine Änderung am Startbild.
- **Meta-Description der Startseite**: Das Feld wird von der Seite nicht angenommen (kein Jetpack-SEO aktiv).
- **Updraft-Central-Seite**: bleibt, falls die Backup-Fernsteuerung genutzt wird.
- **Preisformat, Versandschwelle, Produkt-Attribute, Cookie-Einstellungen, Bilder**: WooCommerce- bzw. Plugin-Einstellungen, über diesen Zugang nicht erreichbar.

## Hinweise für die neue Startseite

Damit beim Umbau nichts verloren geht:
- **Handy-Menü:** Das CSS steckt im Widget `block-2` in „Footer Spalte 1“. Wenn das neue Design den Footer oder das Theme austauscht, muss das CSS mit (Datei `handy-menue-fix.css`). Sonst steht das Handy-Menü wieder offen über der Seite.
- **Consent-Plugin `wf-consent`:** Es ist unabhängig vom Theme und funktioniert weiter. Neue Tracking-Skripte (z. B. TikTok, Google Ads) müssen ebenfalls mit `type="text/plain" data-webcare="marketing"` eingebunden werden, sonst laden sie vor der Zustimmung.
- **Schriften:** Lokal liegen Source Sans Pro, Barlow und Barlow Condensed. Neue Google-Schriften bitte ebenfalls lokal einbinden, nicht über fonts.googleapis.com.
- **Startseiten-Titel und -Beschreibung (Yoast)** bleiben erhalten, solange die neue Startseite dieselbe Seite (ID 414) ist. Bei einer neuen Seite müssen sie dort neu gesetzt werden.
