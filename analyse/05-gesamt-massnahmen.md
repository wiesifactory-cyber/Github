# Wiesi Factory: Was sich ändern sollte (Gesamtliste)

Stand: 16.11.2026 · Grundlage: die Berichte 01–04 in diesem Ordner und der Kontext in `00-kontext-wiesi-factory.md`
Ziel: von ca. 3 auf 10 Bestellungen pro Woche, Break-even bei 5

## Die Lage in drei Sätzen

Das Produkt ist konkurrenzfähig. Semi-Custom kostet 189,99 € mit freier Farbwahl, bei Bold kostet das gleiche Paket inklusive Farben und Nummer rund 218 €, bei Slick 165 € plus Aufpreise. Woran es scheitert, ist der Weg zum Kauf am Handy: Das Menü zeigt keine Produkte, der Warenkorb-Button liegt 8 Bildschirme tief, Lieferzeit und Versand fehlen auf der Produktseite, und die Startseite lädt 11 MB. Bold und Slick gewinnen außerdem über Vertrauen: Tausende Bewertungen, Gratisversand ab 200 €, eine klare Lieferzeit und Fahrer-Content.

## Was die Konkurrenz besser macht

| | Wiesi Factory | Bolddesignz | Slickdesignco |
|---|---|---|---|
| Semi-Custom-Preis | 189,99 €, Farbe gratis | 179 € + 19 € Farben + 20 € Name/Nr. | 165 € (Sale 123,75 €) |
| Bike-Auswahl | Dropdown im Konfigurator | Marken-Buttons, Bild wechselt aufs Bike | Dropdown im Formular |
| Bewertungen | 22–24 (Anzahl widersprüchlich) | 3.945 (Loox) | 5.613 (Loox) |
| Gratisversand | ab 300 € | ab 200 € | ab 200 €, mit Fortschrittsbalken |
| Vorschau | 48 h | Entwurf per Mail vor Druck | 24 h |
| Einstiegsprodukte unter 35 € | Instagram-Sticker 9,90 € (nur als Zusatz) | Felgen/Gabel 49 € | Logos 9,95 €, Name 13,97 €, Felgen 34,97 € |
| Fahrer/Content | kaum im Shop | Signature-Kits, YouTube-Videos | keine |
| Ratenzahlung | Klarna im Checkout | Klarna, sichtbar | Klarna, sichtbar |
| Tracking | Meta-Pixel aktiv, kein GA4 | GA4, Ads, Pixel, Klaviyo | GA4, Ads, Pixel, Klaviyo |

## Priorität 1: Diese Woche (je unter 1 Tag, großer Hebel)

1. **Das Handy-Menü reparieren.** Es zeigt derzeit AGB, Kasse, „Updraft Central“ usw., aber keine Produktkategorien. Ein echtes Menü einsetzen: Semi-Custom, Full-Custom, Plastics, Scheinwerfer, Felgensticker, Zubehör, Bewertungen, WhatsApp. (UX B1)
2. **Den ersten Bildschirm am Handy neu texten:** „Dekore für Enduro, Supermoto & Moped – in deiner Farbe, für dein Bike. Ab 189,99 €, Vorschau in 48 h.“ Darunter zwei Buttons und die Sterne. Die Kacheln bekommen Bilder, Dekore an Platz 1. (UX A1)
3. **Unter jeden Dekor-Preis eine Vertrauenszeile setzen:** „Farbe frei ohne Aufpreis · Name & Nummer inklusive · Vorschau in 48 h · Lieferung 14–20 Tage nach Freigabe · Versand 7,08 €“. Damit kommt auch der Preisvorteil gegenüber Bold rüber. (UX D2, Bold)
4. **Die Startseite leichter machen:** das 11-MB-.mov-Video aus dem Bewertungsslider nehmen, Hero-Bilder auf ca. 1.000 px als WebP. (UX A4, Technik 4)
5. **Ein Bild und eine Beschreibung für geteilte Links (Open Graph) setzen,** damit Links in WhatsApp und Instagram-DMs gut aussehen. (Technik 5)
6. **Datenfehler und Altlasten aufräumen:**
   - E-Mail `office@wiesi-factory.a` korrigieren
   - eine einheitliche Adresse
   - die Newsletter-Seite mit rohem `[newsletter]`
   - „Hello World“, Testprodukt „buddy“, „-2“-Duplikate und „Uncategorized“
   - Fremdmarken (Bold, Slick, TMX) aus den Beschreibungen
   - „Orange Spark“ umbenennen

   (Technik 3, 6, 7; UX D4, J1)
7. **Das Preisformat auf „189,99 €“ umstellen** und die Bewertungszahl vereinheitlichen (Startseite 22, Bewertungsseite 24). (UX D5, E1)

## Priorität 2: Vor dem Adventkalender bzw. bis Ende Dezember

8. **Die Cookie-Einwilligung korrekt machen.** Meta-Pixel, Jetpack Stats und Google Fonts laden derzeit vor der Zustimmung. Im Pixel-Plugin auf Einwilligung warten lassen und Google Fonts lokal einbinden. Danach Impressum und Datenschutz (DataReporter) prüfen lassen, das ist schon als offener Punkt notiert. (Technik 1–3)
9. **Eine Seite „Versand, Zahlung & Ablauf“ (FAQ) anlegen.** Den Ablauf in Schritten zeigen: Bestellung → Vorschau in 48 h → Freigabe → Druck → Versand. Die Zahlungsarten in den AGB an den Checkout angleichen und die Lieferzeit in die AGB schreiben. (UX F1, F2; Slick)
10. **Einen fixen „In den Warenkorb“-Button mit Live-Preis am Handy einbauen.** Der Button liegt derzeit ca. 5.400 px tief. (UX D1)
11. **Eine Seite „Über uns“ anlegen,** mit Foto von dir und der Werkstatt, Bachmanning, „seit 2020“ und einer Passform-Zusage. Diese Seite überzeugt die Eltern. (UX E3, E4)
12. **Leads für den Adventkalender sammeln:** MailPoet auf SMTP umstellen und auf der Startseite einen Block „Adventkalender: täglich gewinnen – E-Mail/WhatsApp eintragen“ einbauen. Slick nutzt dafür einen WhatsApp-Kanal. (UX J2, Slick)
13. **Mehr Bewertungen:** Bei 450 Mails und 13 Bewertungen eine Erinnerungsmail schicken und um Fotos bitten. Ein kleiner Anreiz wie ein Gratis-Sticker-Pack beim nächsten Kauf hilft. Die Sterne in Kategorien und oben auf der Produktseite zeigen. (Bold, Slick)

## Priorität 3: Januar bis Februar, vor der Meta-Kampagne

14. **Der Semi-Custom-Umbau.** Besser machen als Bold:
    - Die Marken-Buttons füllen das Bestellfeld gleich mit aus; bei Bold wählt man das Bike zweimal.
    - Die Bike-Wahl wird gemerkt, die Designs erscheinen auf dem gewählten Bike.
    - Die Wahl funktioniert auch als Link, z. B. `?bike=aprilia-sx-125`.
    - Unter 10 Pflichtfelder vor dem Warenkorb. Personalisierung und Bike-Foto können per WhatsApp nachgereicht werden.

    (UX C1, D1; Bold)
15. **Einen Seiten-Cache einrichten.** Die Server-Antwort lag bei 2–8 s. Dazu Bilder durchgehend als WebP und unnötige Skripte entfernen. Ziel: unter 3 MB und unter 3 s am Handy. Bei einer bezahlten Kampagne zählt jede Sekunde. (UX Performance)
16. **Tracking prüfen:** Im Meta Events Manager kontrollieren, ob Käufe mit Conversions API sauber ankommen. Das Plugin ist schon aktiv. Dazu GA4 einrichten. Ohne das lässt sich die Kampagne ab Februar nicht steuern. (Technik)
17. **Einstiegsprodukte unter 35 € als eigene Produkte anbieten:** Logo-Sticker, Instagram- bzw. Namens-Sticker, Felgenaufkleber, eventuell die Bar Ends. Für 14-Jährige ist das der erste Kauf, danach folgt das Dekor. Bei Slick sind das die günstigen Kaufanlässe. (Slick)
18. **Die Gratisversand-Schwelle neu rechnen.** Beide Konkurrenten liegen bei 200 €. Vorschlag: gratis ab 189 €, also bei jedem Dekor. Die Kosten rechnest du mit deinen Zahlen. Den Fortschrittsbalken im Warenkorb gibt es schon. (UX F3, Bold, Slick)
19. **SEO-Grundlagen:**
    - Kategorie-Titel statt „… Archive“, dazu Meta-Descriptions.
    - Landingpages pro Marke bzw. Bike, z. B. „KTM SX Dekor“, „Aprilia SX 125 Dekor“, „Moped Dekor“. Die Mockups der 10 Bikes passen genau dazu.
    - Im Schema brand und Versand ergänzen.

    (Technik 7, 8)

## Priorität 4: Ab März (laut Wachstumsplan)

20. **Signature-Kits von Szene-Fahrern** mit eigener Seite und Video, so wie bei Bold. Slick hat so etwas nicht, damit hebst du dich ab.
21. **Bundles und Cross-Sells passend zum Bike:** Dekor + Plastics + Verklebeservice. Wer Plastics für eine KTM kauft, sieht Dekor und Loccis-Scheinwerfer für KTM. Optional eine Rabattstaffel wie bei Bold.
22. **Zubehör in der Vorschau-Mail anbieten,** wie Slick es auf der Freigabeseite macht. Die Mail geht ohnehin raus, und die Kunden sind da gerade begeistert.

## Was du nicht übernehmen solltest

- **Dauer-Rabatte und Streichpreise auf alles** (Slick). Du hast die Streichpreise bewusst entfernt, dabei bleiben.
- **Gewinnspiele mit Losen pro Kauf** (Bold, Slick). In Österreich vorher rechtlich prüfen lassen.
- **Lange Pflichtformulare und Dropdowns mit 38 Marken.**
- **Einen Auftritt nur auf Englisch.** Deutsch ist dein Vorteil in AT und DE.

## Grenzen der Analyse

- Cookie-Banner, Impressum und Datenschutz kommen von datareporter.eu, und diese Seite war in der Testumgebung gesperrt. Ihre Inhalte wurden nicht geprüft.
- Die Ladezeiten wurden aus einem Cloud-Container gemessen. Sie eignen sich zum Vergleichen der Seiten, nicht als absolute Werte.
- Ob Meta-Events wirklich ankommen, ob Apple Pay oder Google Pay angezeigt werden und was Versand ins Ausland kostet, wurde nicht geprüft.
- Bei Bold und Slick lief gerade der Black-Friday-Sale, daher sind einige Preise Aktionspreise.
- Keine Rechtsberatung.
