# Konfiguratoren: Was lässt sich kopieren? (Prüfung 27.11.2026)

Geprüft wurde alles, was ein Besucher ohne Login abrufen kann.

## Öffentliche Konfiguratoren

| Konfigurator | Seite | Technik |
|---|---|---|
| Sitzbank-Konfigurator „Motocross Bezug“ | `/sitzbank-konfigurator/` | eigenes Plugin „Wiesi Seat Studio“ (`scc-apple.js`) |
| Sitzbank-Studio | `/sitzbank-studio/` | eigenes Plugin „Wiesi Seat Studio“ (`studio.js`, `renderer.js`, Datenpaket `WSS_DATA`) |
| Dekor-Konfigurator | Produktseiten (z. B. Buddy V2) | Gravity Forms + Product Add-ons (Standard-Plugins) |

## Ergebnis

### Gut geschützt
- **Ordner-Auflistung gesperrt:** `/wp-content/plugins/…` und `/uploads/` liefern 403, man kann nicht „durchblättern“.
- **PHP-Quellcode nicht lesbar:** Die Server-Logik (u. a. Preisberechnung `class-wss-pricing.php`) wird ausgeführt, nicht ausgeliefert.
- **Preise werden auf dem Server geprüft:** Laut Code ist „maßgeblich immer der Server“. Wer das JavaScript kopiert oder verändert, kann keine falschen Preise in den Warenkorb legen.
- **Produktliste der Schnittstelle geschützt:** `/wp-json/wss/v1/products` liefert ohne Login 401.

### Offen einsehbar (Kopier-Risiko)
1. **JavaScript lesbar und kommentiert:** `studio.js` (48 KB, 992 Zeilen, 45 Kommentarzeilen), `renderer.js`, `scc-apple.js`. Aufbau und Logik sind gut nachvollziehbar. Die Kommentare verraten auch die Server-Struktur.
2. **Komplette Konfiguration im Seitenquelltext:** `WSS_DATA` (27 KB) enthält Grundpreis, alle 15 Farben, 15 Materialien mit Aufpreisen, 11 Zonen mit Ebenen und Hotspots, 6 Extras mit Preisen sowie 20 Marken mit Modellen. Ein Mitbewerber bekommt damit das ganze Produktkonzept mit einem Klick.
3. **Bildbibliothek mit vorhersehbaren Dateinamen:** Die Vorschau-Ebenen liegen als 850 × 850 px WebP unter `/wp-content/plugins/wiesi-seat-studio-bilder(-2)/bilder/` mit Namen wie `cote-noir.webp`, `grip2-rouge.webp`. Die Namensmuster stehen in `WSS_DATA`. Mit einem kleinen Skript lässt sich die ganze Bibliothek herunterladen. **Das ist das wertvollste und am leichtesten kopierbare Gut.**
4. **Dekor-Konfigurator (Gravity Forms):** Standard-Plugins. Kopierbar sind nur Formularfelder und Produktbilder, keine eigene Technik.

### Nicht geprüft
- Die Schreib-Schnittstellen `/wss/v1/config`, `/defaults`, `/product`, `/import-sbs`, `/fusion`, `/sanitize` (POST). Ein Test hätte im Zweifel Daten verändern können. Im Plugin-Code ist zu prüfen, dass jede dieser Routen eine Berechtigungsprüfung (`permission_callback` mit `manage_options` o. ä.) hat.

### Nebenbei gefunden
- Auf `/sitzbank-konfigurator/` überlappt am Desktop der Konfigurator mit der Kategorien-Seitenleiste (Screenshot `screens/konfiguratoren/sitzbank-konfigurator-desktop.png`).

## Wichtig vorweg
Alles, was im Browser angezeigt wird (Bilder, Skripte, Daten), lässt sich grundsätzlich herunterladen. 100 % Schutz gibt es technisch nicht. Ziel ist, das Kopieren **mühsam** zu machen und das Wertvolle (Bilder) als deins **erkennbar** zu machen.

## Empfohlene Maßnahmen (nach Wirkung)
1. **Wasserzeichen in die Vorschau-Ebenen:** dezentes „WIESI FACTORY“ ins Bild bzw. als oberste Ebene im Renderer. Kopierte Bilder sind dann unbrauchbar bzw. als deine erkennbar.
2. **Hotlink-Schutz für die Bilderordner:** Der Server liefert die Bilder nur aus, wenn die Anfrage von wiesi-factory.at kommt. Das geht beim Hoster (easyname, `.htaccess`) und verhindert direktes Abgreifen bzw. Einbinden auf fremden Seiten.
3. **JavaScript minifizieren und Kommentare entfernen:** Skripte vor dem Ausliefern verkleinern bzw. verschleiern, im Plugin-Quellcode bleiben sie lesbar. Alternativ in WP Rocket „JavaScript minifizieren“ einschalten. Das ist derzeit aus und wirkt auf alle Skripte, deshalb vorher testen.
4. **Konfiguration nur schrittweise laden:** Statt `WSS_DATA` komplett im Quelltext nur die Daten der gewählten Marke bzw. des gewählten Schritts per Schnittstelle nachladen. Das ist aufwendiger, macht das Komplett-Abgreifen aber deutlich mühsamer.
5. **Dateinamen der Bilder nicht erratbar machen:** z. B. mit einer Prüfsumme im Namen (`cote-noir-8f3a2c.webp`), aufgelöst nur über die Server-Konfiguration.
6. **Urheberrechtshinweis:** Im Konfigurator-Footer und in den AGB (Punkt 11 deckt Produkte und Muster schon ab) ausdrücklich „Konfigurator, Grafiken und Bildmaterial © Wiesi Factory“ ergänzen.
