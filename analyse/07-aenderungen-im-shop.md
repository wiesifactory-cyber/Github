# Änderungen direkt im Shop (17.11.2026)

Gemacht über den WordPress.com/Jetpack-Zugang auf wiesi-factory.at.

## Erledigt und live

| Was | Wo | Rückgängig machen |
|---|---|---|
| E-Mail-Tippfehler `office@wiesi-factory.a` → `.at` (2 Stellen) | Seite „Widerrufsbelehrung“ (ID 439) | Revisionen der Seite |
| Startseiten-Text: Rechtschreibung korrigiert, Untertitel „Dekore für Enduro, Supermoto & Moped“, „ohne Aufpreis“ ergänzt, Button „Dekor finden“ führt jetzt zu Semi-Custom statt zum allgemeinen Shop | Startseite (ID 414), Block „Text + Bild“ | Revisionen der Seite |
| Produkt „.Felgenaufkleber“ → „Felgenaufkleber“ | Produkt ID 1152 | Titel wieder ändern |
| Zwei „Hello world!“-Demo-Beiträge auf Entwurf gesetzt (nicht mehr öffentlich) | Beiträge ID 1 und 13046 | Status wieder auf „Veröffentlicht“ |

## Vorbereitet, aber noch nicht aktiv: Handy-Menü

Das neue Menü **„Handy-Menü“** (ID 256) ist angelegt:
Semi-Custom Dekore · Full Custom · Factory Style Dekore · Plastics · Scheinwerfer · Felgensticker · Zubehör · Bewertungen · Kontakt.

Beim Aktivieren stellte sich heraus, dass das Child-Theme CSS-Regeln enthält (`.main-navigation .menu { position: fixed; … }`), die nur mit der alten Seitenliste funktionieren. Mit dem echten Menü stand es dauerhaft offen und quer über der Seite. Deshalb wurde die Zuweisung **sofort wieder zurückgenommen**. Der Shop ist im alten Zustand.

Die Lösung ist getestet: Datei `handy-menue-fix.css` in diesem Ordner. Sobald dieses CSS im Customizer unter **Design → Customizer → Zusätzliches CSS** steht, wird das Menü dem Ort „Handheld-Menü“ zugewiesen.

## Bewusst nicht geändert

- **Beta Kotflügel** in der KTM-Kategorie: Er ist absichtlich allen Marken zugeordnet (universell), das ist kein Fehler.
- **Hero „Get your New style“**: kommt aus dem Theme-Header (ACF-Optionen), nicht über diesen Zugang änderbar.
- **Meta-Description der Startseite**: Das Feld wird von der Seite nicht angenommen (kein Jetpack-SEO aktiv).
- **Adresse (Kobel 4 vs. Grünbachstraße 23)** und **Rücksendekosten**: Dafür braucht es deine Entscheidung, welche Angabe stimmt.
- **Newsletter-Seite, Updraft-Central-Seite, Testprodukt „Buddy TEST“, „Orange Spark“**: Für diese Punkte braucht es deine Entscheidung.
- **Preisformat, Versandschwelle, Produkt-Attribute, Cookie-Einstellungen, Bilder**: WooCommerce- bzw. Plugin-Einstellungen, über diesen Zugang nicht erreichbar.
