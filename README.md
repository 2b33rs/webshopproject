# Webshop Project

## Getting Started
To get the project up and running, follow the steps below:

### 1. Install XAMPP
- Download and install XAMPP from the official website: https://www.apachefriends.org/index.html
- Choose the appropriate version for your operating system.
- Run the installer and follow the instructions to complete the installation process.

### 2. Start XAMPP
- Launch XAMPP after installation.
- Start the Apache Server and MySQL Server from the XAMPP Control Panel.
- Make sure both servers are running successfully without any errors.

### 3. Configure MySQL Server
- Access the MySQL Admin panel by clicking the "Admin" button next to the MySQL Server in the XAMPP Control Panel.
- Once the Admin panel opens in your default browser, navigate to the SQL tab.
- Execute the SQL script provided to set up the necessary databases.
- This script will create the required database structure for the project.

### 4. Access the web application
- Open your preferred web browser.
- Enter the following URL in the address bar: http://localhost/webshopproject
- The web application should now be accessible, and you can begin using it.

## Aufgabenbeschreibung
Ziel der Aufgabe ist die Entwicklung eines einfachen Web-Shops in PHP ohne
Zuhilfenahme existierender PHP-Frameworks. Dabei müssen die im nächsten
Kapitel beschriebenen Anforderungen berücksichtigt werden.

## Anforderungen
### Nichtfunktionale Anforderungen
- Das Layout basiert auf dem Framework Bootstrap.
- Die Datenhaltung erfolgt mittels einer MySQL-Datenbank.
- Es muss ein Datenmodell als ER-Diagramm erstellt werden.
- Die Sicherheit der Anwendung muss berücksichtigt werden (z.B. Vorkehrungen gegen SQL-Injections)
- Das Projekt muss eine sinnvolle Ordnerstruktur aufweisen (z.B. separate Order für php-Dateien und Ressourcen wie Bilder).
- Ein Rollenkonzept für die Benutzer ist nicht erforderlich.
- Arbeiten Sie wann immer möglich mit relativen URLs.

### Funktionale Anforderungen
- Kunden, die noch kein Konto beim Web-Shop haben, können sich über ein Formular registrieren. Zu erfassen sind dabei gewünschter Benutzername Passwort, Vorname, Name, Anschrift und Email-Adresse.
- Der Web-Shop verfügt über Produktkategorien, die nochmals in Unterkategorien eingeteilt sein können. Wählt man eine Kategorie bzw. Unterkategorie aus, werden die darin enthaltenen Artikel angezeigt.
- Produkte sind beschrieben durch eine Bezeichung, eine Beschreibung, ein Bild und einen Preis in Euro. Ein Produkt ist dabei immer mindestens einer Kategorie oder Unterkategorie zugeordnet.
- Der Web-Shop verfügt über einen Warenkorb. Dieser steht aber nur angemeldeten Benutzern zur Verfügung.
- Es gibt eine Übersichtsseite, auf der der Kunde den Warenkorb ansehen kann und bei Bedarf Artikel wieder entfernen kann. Möchte der Kunde einen Artikel mehrfach kaufen, dann soll der Einfachheit halber das entsprechende Produkt auch einfach mehrfach im Warenkorb auftauchen.
- Kategorien, Unterkategorien und Produkte müssen in der Datenbank abgelegt sein und für das Generieren der Web-Seiten für den Kunden aus dieser ausgelesen werden.
- Einkäufe müssen in der Datenbank persistiert werden. D.h., wird ein Warenkorb erfolgreich über Paypal (s.u.) bezahlt, dann sollen die gekauften Artikel mit Kaufdatum in der Datenbank abgespeichert werden (natürlich mit Zuordnung zum Kunden).
- Es gibt eine Suchfunktion, bei der Produktbeschreibung und Produktbezeichnung nach dem eingegebenen Suchbegriff durchsucht werden und die Treffer danach angezeigt werden.
- Das Bezahlen der Produkte im Warenkorb soll über Paypal erfolgen. Unter folgendem Link finden Sie ein Anleitung, wie sich Paypal anbinden lässt: https://www.codexworld.com/paypal-standard-payment-gateway-integration-php/. Hinweis: Man übergibt bei dieser Paypal-Schnittstelle lediglich ein Produkt und die dazugehörige Produktnummer. Da wir aber einen Warenkorb mit beliebig vielen Produkten bezahlen wollen, übergeben Sie als Produktname einfach Warenkorb und als Produktnummer eine eindeutige ID des Warenkorbs.
- Automatische Abmeldung, wenn der Kunde für 10 Minuten inaktiv war (d.h., für 10 Minuten keinen HTTP-Request geschickt hat). Dabei soll lediglich die Session beendet werden. Es ist nicht erforderlich, dass der Kunde nach dem Ablauf der 10 Minuten automatisch zur Login-Seite umgeleitet wird. Dies geschieht erst dann, wenn er irgendwann nach den 10 Minuten versucht, eine Seite aufzurufen, die ein Login erfordert.
- Ist der Kunde angemeldet, dann gibt es auf jeder Seite auch einen Logout-Button. Ist der Kunde nicht angemeldet, dann soll statt des Logout-Buttons ein Link zur Login-Seite angezeigt werden.
- Das Ansehen der Produkte oder die Produktsuche ist ohne Login möglich.
- Das Hinzufügen von Produkten zum Warenkorb, das Ansehen und Bezahlen des Wahrenkorbs sind nur angemeldete Benutzer verfügbar.

## Testdaten
- Das Einfügen der Testdaten erfolgt direkt durch die Entwickler in der Datenbank, d.h., es muss dafür keine Admin-Oberfläche erstellt werden.
- Es müssen mindestens zwei Produktkategorien angelegt sein, die jeweils mindestens in zwei Unterkategorien aufgeteilt sind.
- In jeder Unterkategorie müssen mindestens drei Artikel enthalten sein.

## Abgabe
Die Abgabe der Projekts erfolgt über den Moodle-Kurs. Dabei muss enthalten sein:
- Ein Datenmodell als ER-Diagramm.
- Ein kleiner Projektplan, der zumindest die Aufteilung der Aufgaben an die einzelnen Team-Mitglieder enthält.
- Ein kompletter Abzug der Datenbank inklusive der Create-Anweisungen für das Erstellen der Tabellen und Testdaten. Dieser kann z.B. über die Oberfläche phpMyAdmin erstellt werden.
- Ein Archiv (zip, tar oder rar) aller relevanten php- und html-Dateien.