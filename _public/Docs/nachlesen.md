# Das mit der Zeit:

Wenn man auf Login drückt, wird man erst noch auf eine andere Seite zwischen geleitet.
Dort wird die $_SESSEION["inactiv"] = 1; gesetzt, damit diese immer initialisiert ist.

Dann wird immer wenn der Header geladen wird ein timestamp gespeichert: 
    Drückt der Benutzer jetzt direkt auf einen Login erforderliche Funktion kann anhand
    des Timestamps geschaut werden ob der Benutzer zu lange inaktiv war.

    -> Problem: Wenn der Benutzer auf eine Seite drückt die kein Login erfordert wird der Timestamp zurückgesetzt
    -> Dafür gibt es die inactiv Variable. Diese wird immer auf 2 gesetzt sobald eine nicht login seite aufgerufen wird
        -> Dadurch kann man mit einem if schauen ob die Zeit schoneinmal abgelaufen ist

# index.php
Die index.php-Seite direkt im webshopprojekt-Verzeichnis sorgt für eine direkte Weiterleitung auf "_public/php/index.php" .
Das hat den Vorteil das User sich nicht den gesamten Pfad angeben müssen (http://localhost/webshopproject/_public/php/index.php), sondern der aufruf des ordners (http://localhost/webshopproject/) ausreichend ist. Grund dafür ist die eigenschaft des XAMPP, welcher immer die index.php im angegebenen Pfad automatich öffnet.

# Impressum
## Was muss ein Impressum enthalten?
Es gibt bestimmte Mindestanforderungen an das Impressum. Danach muss das Impressum enthalten:

-den Namen (bei natürlichen Personen sind es Vor- und Nachname. Bei Unternehmen, also den sogenannten juristischen Personen, der komplette Unternehmensname sowie Name und Vorname des Vertretungsberechtigten),
-bei juristischen Personen außerdem die Rechtsform (zum Beispiel GmbH oder AG),
-die Anschrift (Straße, Hausnummer, Postleitzahl und Ort. Nicht ausreichend ist ein Postfach),
-einen Kontakt, unter dem Sie die Person oder das Unternehmen schnell erreichen können – elektronisch als auch nicht elektronisch. In der Regel sind das E-Mail-Adresse und Telefonnummer,
-soweit vorhanden, die Umsatzsteuer- oder Wirtschaftssteuer-Identifikationsnummer,
-ebenfalls, soweit vorhanden, das Handels-, Vereins-, Partnerschafts-, Gesellschafts- oder Genossenschaftsregister mit Registernummer.

Zudem müssen bestimmte Berufsgruppen wie Makler, Gastronomiebetriebe oder Versicherungen die für sie zuständige Aufsichtsbehörde angeben. Der Betreiber sollte die Internetseite und die Anschrift der Behörde nennen. Grund: Verstößt der Betreiber gegen eine Berufspflicht, so sollen Verbraucherinnen und Verbraucher einen Ansprechpartner haben.

Anbieter, die einen reglementierten Beruf ausüben (Rechtsanwälte, Steuerberater, Notare et cetera) müssen die zuständige Kammer sowie ihre Berufsbezeichnung und den Staat angeben, in dem ihnen die Berufsbezeichnung verliehen worden ist. Außerdem müssen sie diejenigen Vorschriften angeben, die ihren Beruf regeln und wo diese zu finden sind.

Bietet der Betreiber auf seiner Seite journalistisch-redaktionell gestaltete Inhalte an, muss zudem ein Verantwortlicher mit Namen und Anschrift angegeben werden. Bei Zeitungen oder Magazinen sind das in der Regel Geschäftsführer und Chefredakteur.

Seit dem Jahr 2016 müssen Online-Anbieter, die ihre Ware oder Dienstleistung auch Verbraucherinnen und Verbrauchern anbieten, zusätzlich mit einem Link auf die Online-Streitbeilegungsplattform hinweisen. Diese ist EU-weit gültig.

Daneben muss ein Unternehmen Verbraucherinnen und Verbraucher auch darüber informieren, ob er bereit oder verpflichtet ist, an einem Verbraucherschlichtungsverfahren teilzunehmen. Ist das der Fall, so muss die zuständige Verbraucherschlichtungsstelle unter Angabe ihrer Kontaktdaten (Anschrift und Webseite) genannt werden. Allerdings müssen diese Hinweise nicht zwingend im Impressum stehen. So lange sie leicht zugänglich auf der Webseite erscheinen, kann dies auch ein anderer Ort auf der Webseite sein.

Wo muss das Impressum stehen?
Bei den meisten Anbietern ist das Impressum über einen Link zu finden. Das ist auch ausreichend, soweit dieser Link gut sichtbar und von jeder Seite aus abrufbar ist. Das Gesetz spricht von "leicht erkennbar, unmittelbar erreichbar und ständig verfügbar zu halten".

Der Link sollte auch einen eindeutigen Namen wie "Impressum" oder "Kontakt" tragen, damit für jeden verständlich ist, was sich dahinter verbirgt. Nicht ausreichend ist es, wenn ein Anbieter die Angaben in seinen Allgemeinen Geschäftsbedingungen (AGB) versteckt oder wenn für das Abrufen des Impressums spezielle Leseprogramme notwendig sind.

Quelle: *[Bundesministerium für Umwelt, Naturchutz, nukleare Sicherheit und Verbraucherschutz](https://www.bmuv.de/themen/verbraucherschutz-im-bmuv/digitaler-verbraucherschutz/impressumspflicht#:~:text=Bei%20Unternehmen%2C%20also%20den%20sogenannten,%2C%20Hausnummer%2C%20Postleitzahl%20und%20Ort)* .
