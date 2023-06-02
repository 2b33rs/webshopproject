Das mit der Zeit:

Wenn man auf Login drückt, wird man erst noch auf eine andere Seite zwischen geleitet.
Dort wird die $_SESSEION["inactiv"] = 1; gesetzt, damit diese immer initialisiert ist.

Dann wird immer wenn der Header geladen wird ein timestamp gespeichert: 
    Drückt der Benutzer jetzt direkt auf einen Login erforderliche Funktion kann anhand
    des Timestamps geschaut werden ob der Benutzer zu lange inaktiv war.

    -> Problem: Wenn der Benutzer auf eine Seite drückt die kein Login erfordert wird der Timestamp zurückgesetzt
    -> Dafür gibt es die inactiv Variable. Diese wird immer auf 2 gesetzt sobald eine nicht login seite aufgerufen wird
        -> Dadurch kann man mit einem if schauen ob die Zeit schoneinmal abgeloffen ist
