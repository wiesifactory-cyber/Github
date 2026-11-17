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
- **Hero „Get your New style“**: kommt aus dem Theme-Header (ACF-Optionen), nicht über diesen Zugang änderbar.
- **Meta-Description der Startseite**: Das Feld wird von der Seite nicht angenommen (kein Jetpack-SEO aktiv).
- **Updraft-Central-Seite**: bleibt, falls die Backup-Fernsteuerung genutzt wird.
- **Preisformat, Versandschwelle, Produkt-Attribute, Cookie-Einstellungen, Bilder**: WooCommerce- bzw. Plugin-Einstellungen, über diesen Zugang nicht erreichbar.
