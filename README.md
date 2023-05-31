# Webshop Project

## Aufgabenbeschreibung

Ziel der Aufgabe ist die Entwicklung eines einfachen Web-Shops in PHP ohne
Zuhilfenahme existierender PHP-Frameworks. Dabei müssen die im nächsten
Kapitel beschriebenen Anforderungen berücksichtigt werden.


## Anforderungen
### Nichtfunktionale Anforderungen
- Das Layout basiert auf dem Framework Bootstrap.
- Die Datenhaltung erfolgt mittels einer MySQL-Datenbank.
- Es muss ein Datenmodell als ER-Diagramm erstellt werden.
- Die Sicherheit der Anwendung muss berücksichtigt werden (z.B. Vorkeh-
rungen gegen SQL-Injections)
- Das Projekt muss eine sinnvolle Ordnerstruktur aufweisen (z.B. separate
Order für php-Dateien und Ressourcen wie Bilder).
- Ein Rollenkonzept für die Benutzer ist nicht erforderlich.
- Arbeiten Sie wann immer möglich mit relativen URLs.
### Funktionale Anforderungen
- Kunden, die noch kein Konto beim Web-Shop haben, können sich über ein
Formular registrieren. Zu erfassen sind dabei gewünschter Benutzername
Passwort, Vorname, Name, Anschrift und Email-Adresse.
- Der Web-Shop verfügt über Produktkategorien, die nochmals in Unterka-
tegorien eingeteilt sein können. Wählt man eine Kategorie bzw. Unterka-
tegorie aus, werden die darin enthaltenen Artikel angezeigt.
- Produkte sind beschrieben durch eine Bezeichung, eine Beschreibung, ein
Bild und einen Preis in Euro. Ein Produkt ist dabei immer mindestens
einer Kategorie oder Unterkategorie zugeordnet.
- Der Web-Shop verfügt über einen Warenkorb. Dieser steht aber nur ange-
meldeten Benutzern zur Verfügung.
1
- Es gibt eine Übersichtsseite, auf der der Kunde den Warenkorb ansehen
kann und bei Bedarf Artikel wieder entfernen kann. Möchte der Kunde
einen Artikel mehrfach kaufen, dann soll der Einfachheit halber das ent-
sprechende Produkt auch einfach mehrfach im Warenkorb auftauchen.
- Kategorien, Unterkategorien und Produkte müssen in der Datenbank ab-
gelegt sein und für das Generieren der Web-Seiten für den Kunden aus
dieser ausgelesen werden.
- Einkäufe müssen in der Datenbank persistiert werden. D.h., wird ein Wa-
renkorb erfolgreich über Paypal (s.u.) bezahlt, dann sollen die gekauften
Artikel mit Kaufdatum in der Datenbank abgespeichert werden (natürlich
mit Zuordnung zum Kunden).
- Es gibt es Suchfunktion, bei der Produktbeschreibung und Produktbe-
zeichnung nach dem eingegebenen Suchbegri durchsucht werden und die
Treer danach angezeigt werden.
- Das Bezahlen der Produkte im Warenkorb soll über Paypal erfolgen. Unter
folgendem Link nden Sie ein Anleitung, wie sich Paypal anbinden lässt:
https://www.codexworld.com/paypal-standard-payment-gateway-integration-php/.
Hinweis: Man übergibt bei dieser Paypal-Schnittstelle lediglich ein Pro-
dukt und die dazugehörige Produktnummer. Da wir aber einen Warenkorb
mit beliebig vielen Produkten bezahlen wollen, übergeben Sie als Produkt-
name einfach Warenkorb und als Produktnummer eine eindeutige ID des
Warenkorbs.
- Automatische Abmeldung, wenn der Kunde für 10 Minuten inaktiv war
(d.h., für 10 Minuten keinen HTTP-Request geschickt hat). Dabei soll
lediglich die Session beendet werden. Es ist nicht erforderlich, dass der
Kunde nach dem Ablauf der 10 Minuten automatisch zur Login-Seite um-
geleitet wird. Dies geschieht erst dann, wenn er irgendwann nach den 10
Minuten versucht, eine Seite aufzurufen, die ein Login erfordert.
- Ist der Kunde angemeldet, dann gibt es auf jeder Seite auch einen Logout-
Button. Ist der Kunde nicht angemeldet, dann soll statt des Logout-
Buttons ein Link zur Login-Seite angezeigt werden.
- Das Ansehen der Produkte oder die Produktsuche ist ohne Login möglich.
- Das Hinzufügen von Produkten zum Warenkorb, das Ansehen und Bezah-
len des Wahrenkorbs sind nur angemeldete Benutzer verfügbar


## Testdaten
- Das Einpegen der Testdaten erfolgt direkt durch die Entwickler in der
Datenbank, d.h., es muss dafür keine Admin-Overäche erstellt wer-
den.
- Es müssen mindestens zwei Produktkategorien angelegt sein, die jeweils
mindestens in zwei Unterkategorien aufgeteilt sind.
- In jeder Unterkategorie müssen mindestens drei Artikel enthalten sein.
2
Abgabe
Die Abgabe der Projekts erfolgt über den Moodle-Kurs. Dabei muss enthalten
sein:
- Ein Datenmodell als ER-Diagramm.
- Ein kleiner Projektplan, der zumindest die Aufteilung der Aufgaben an
die einzelnen Team-Mitglieder enthält.
- Ein kompletter Abzug der Datenbank inklusive der Create-Anweisungen
für das Erstellen der Tabellen und Testdaten. Dieser kann z.B. über die
Oberäche phpMyAdmin erstellt werden.
- Ein Archiv (zip, tar oder rar) aller relevanten php- und html-Dateien.