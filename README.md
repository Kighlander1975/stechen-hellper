# Stechen-Spielverwaltung

## Projektübersicht

**Ziel:**  
Verwaltung eines Karten-/Stichspiels („Stechen“) mit Spieler-Adressbuch, Spielverwaltung, Runden und Punktezählung.

**Tech-Stack:**  
- **Frontend:** React, Bootstrap (aktuell), Font Awesome 5.x  
- **Backend:** Symfony (API), PHP  
- **Datenbank:** MySQL/MariaDB/PostgreSQL (je nach Hosting)

---

## Roadmap

### 1. Planung & Setup

- [ ] Projektziele und Anforderungen finalisieren
- [ ] ER-Diagramm und Datenbankmodell fertigstellen
- [ ] Symfony-Projekt initialisieren (API-only, z.B. mit API Platform oder nur Serializer/Controller)
- [ ] Frontend-Projekt mit React, Bootstrap und Font Awesome initialisieren

---

### 2. Backend: Symfony

#### a) Grundstruktur

- [ ] Datenbankverbindung konfigurieren
- [ ] Entities/Doctrine Models anlegen:
    - Player (Adressbuch)
    - Game
    - GamePlayer (Teilnehmer)
    - Round
    - RoundEntry (Rundeneinträge)
- [ ] Relationen gemäß ER-Diagramm anlegen

#### b) API Endpoints

- [ ] Players: CRUD fürs Adressbuch (optional: Suche/Autovervollständigung)
- [ ] Games: Spiel anlegen, Details abrufen, Liste der Spiele
- [ ] GamePlayers: Teilnehmer zu Spiel hinzufügen (aus Adressbuch oder als Gast)
- [ ] Rounds & RoundEntries: Runden anlegen, Einträge verwalten, Ergebnisse berechnen
- [ ] Punkteberechnung: Logik für Auswertung der Stiche und Punkte

#### c) (Optional) API Platform nutzen

- Vorteil: Automatische REST-API-Generierung, OpenAPI/Swagger-Doku, einfache Filter/Suche

---

### 3. Frontend: React

#### a) Grundstruktur

- [ ] Projektstruktur anlegen, Routing einrichten
- [ ] Bootstrap & Font Awesome einbinden

#### b) Views/Seiten

- [ ] Spieler-Adressbuch (Listen, Hinzufügen, Suchen)
- [ ] Spiel erstellen (mit Teilnehmer-Auswahl, Zielpunkte, etc.)
- [ ] Übersicht laufender und vergangener Spiele
- [ ] Spiel-Detailansicht (Runden, Teilnehmer, Punktestand)
- [ ] Rundenansicht (Ansagen, Ergebnisse eingeben)
- [ ] Punkteauswertung/Statistik

#### c) API-Anbindung

- [ ] REST-API-Calls zu Symfony-Backend (z.B. mit Axios oder Fetch)
- [ ] Fehlerbehandlung und Feedback für User

---

### 4. Testing & Feinschliff

- [ ] Backend: Unit- und Integrationstests für API und Logik
- [ ] Frontend: Usability-Tests, ggf. automatisierte Tests
- [ ] Responsives Design prüfen
- [ ] Performance-Optimierung

---

### 5. Deployment

- [ ] Backend auf Webserver deployen (z.B. Apache/Nginx, PHP-FPM, Datenbank)
- [ ] Frontend bauen und deployen (z.B. als statische Dateien, ggf. über den gleichen Server)
- [ ] Umgebungsvariablen, Konfiguration, Sicherheit prüfen

---

## Datenmodell (vereinfacht)

- **Player:** Spieler-Adressbuch
- **Game:** Spiele
- **GamePlayer:** Teilnehmer je Spiel
- **Round:** Runden je Spiel
- **RoundEntry:** Rundeneinträge (Ansagen, Ergebnisse, Punkte)

---

**Nächster Schritt:**  
Backend- oder Frontend-Grundstruktur anlegen und Datenbankmodell umsetzen.