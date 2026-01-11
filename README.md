# Hausdaten-Editor

Kleiner Web-Editor zum Bearbeiten von Hausdaten im CSV-Format.  
Man kann CSV-Dateien hochladen, die Daten im Browser als Tabelle bearbeiten und wieder als CSV exportieren. Optional können die Datensätze auch in einer MySQL-Datenbank gespeichert und wieder exportiert werden.

Tech-Stack: Laravel, Vue, Vuetify, MySQL

## Funktionen

- CSV-Datei (Haus-Format) hochladen und prüfen (Fehlermeldung bei falschem Format/kaputter Datei)
- Bereits hochgeladene Dateien anzeigen, laden und löschen
- Tabelle im Browser anzeigen und Werte direkt bearbeiten (passende Eingabefelder je Typ)
- CSV jederzeit wieder exportieren (Input = Output Format)
- Daten in MySQL speichern (Entität „Haus“)
- Daten aus der DB anzeigen und als CSV exportieren
- Toolbar über der Tabelle (Name/Größe/Anzahl Einträge)
- Neue leere Tabelle erstellen und exportieren

## CSV-Format (Entität: Haus)

Die CSV-Spalten entsprechen der Entität „Haus“ (Auszug):

- Objekt Nummer (string)
- Dienstleister Nummer (string)
- Beschreibung (string)
- Quadratmeter (decimal)
- Etagen (integer)
- Räume (integer)
- Badezimmer (integer)
- Straße / Hausnummer / Postleitzahl / Stadt / Land (string)
- Kaltmiete / Kaution / Heizkosten (decimal)
- Baudatum / Letzte Sanierung am (date)
- Küche vorhanden / Balkon vorhanden / … (bool)

Hinweis: Es werden nur CSV-Dateien akzeptiert, die genau diesem Haus-Format entsprechen.


## Lokales Setup

### Voraussetzungen
- PHP >= 8.x
- Composer
- Node.js + npm
- MySQL

### Schritte

1) Abhängigkeiten installieren (im Projektordner)
```bash
composer install
npm install
```
2) Konfiguration anlegen + App-Key setzen
```bash
cp .env.example .env
php artisan key:generate
```
3) Datenbank in der Datei .env eintragen (Beispiel)
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=deine_db
DB_USERNAME=dein_user
DB_PASSWORD=dein_passwort
```

4) Tabellen anlegen
```bash
php artisan migrate
```

5) Frontend starten
```bash
npm run dev
```

6) Backend starten
```bash
php artisan serve
```

