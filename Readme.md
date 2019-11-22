# Plain Simple Lieferdienst Website

Eine Pico index.md für Lieferdienste und eine Installationsanleitung.

* Online bestellen. Per Paypal bezahlen.
* Email mit der Bestellung bekommen.
* Das kann wirklich Jeder, der einen Webspace hat.
* Einfacher geht es kaum.
* Unfassbar individualisierbar.

## Was du brauchst

* Webspace
* [Pico CMS](http://picocms.org/download/)
* [ContactFORM for Pico](http://picocms.org/download/)
* [Google Mail Adresse](www.gmail.com)
* ein wenig Geduld
* optional die index.md oben

## Instllation

Zuerst bringe bitte in den Einstellungen deines Webservers<br>
in Erfahrung ob deine PHP Version über 7.2 liegt.

Leider wird für PicoMailForms composer benötigt,<br>
daher installieren wir PicoCms auch mit composer.<br>

### Über SSH
* Falls du SSH Zugang auf deinem Webspace hast,<br>
funktioniert das über folgende Befehle.

```
curl -sSL https://getcomposer.org/installer | php
php composer.phar create-project picocms/pico-composer pico
cd pico
php ../composer.phar require jflepp/picomailformsplugin
```

### Ohne SSH

* Falls du kein SSH hast, musst du auf deinem Rechner installieren<br>
und dann den Ordner uploaden.

Dazu installiere [XAMPP](https://www.apachefriends.org/de/index.html)<br>
dann insalliere [Composer](https://getcomposer.org/download/)<br>
Starte XAMPP im Control Panel und starte eine Windows Eingabeaufforderung

Befehle unter Windows::

```
curl -sSL https://getcomposer.org/installer | php
composer create-project picocms/pico-composer pico
cd pico
composer require jflepp/picomailformsplugin
```

Jetzt uploade das entstandene Verzeichnis.<br>
Und begutachte dein Pico CMS Setup.

### Einrichtung

Erstelle eine Google Mail Addresse.<br>
Um darüber per smtp von einem Webspace Emails zu schicken<br>
Musst du aber noch 2 Dinge freischalten.<br>
Besuche https://myaccount.google.com/lesssecureapps und schalte auf An.<br>
Besuche https://accounts.google.com/UnlockCaptcha und schalte frei.

Lege eine Datei im Ordner /config/ an namens config.yml

```
Mail:
    SenderName: MeinName
    Host: ssl://smtp.gmail.com
    UserName: über_diese_email_wird_gesendet@gmail.com
    Password: deinpasswort
    Port: 465
    OperatorMail: an_diese_email_wird_gechickt@gmx.de

Forms:
    UseBootstrap: true
```

### Und fertig!

Wenn du magst lege die index.md oben (aus dieser repo)<br>
in deinen content folder.

Beim click auf Senden bekommst du eine Email mit der Bestellung<br>
Vergleiche dann ob der Besteller auch gezahlt hat bei Paypal<br>
oder rufe ihn einfach direkt an.

Natürlich übernehme ich keinerlei Haftung<br>
weil ich mich mit Restaurant Gesetzen auch nicht auskenne<br>
also solltest du erstmal selbst recherchieren was du hier tust.

Alles ist open source. Also ist alles bis in die Nieren anpassbar.<br>
In den Pico Docs lernst du wie du Themes erstellst mit Twig.

## Contribution

Das hier ist eher ein Proof of Concept für alle Restaurants<br>
die meinen ein Online Bestellsystem sei kompliziert.<br>
Hilf deinem örtlichen Essen Dealer aus und setzt ihm eine Website auf.<br>
Die Großkonzerne können einen auf dem Gebiet wirklich bluten lassen.<br>
Und nicht jeder hat immer Bargeld zu Hause oder (noch schlimmer) Lust zu telefonieren.

Contribution: Mich würde natürlich freuen wenn Jemand die Paypal API einarbeitet.<br>
Oder sogar ein Pico Plugin für eine Speisekarte.<br>
Ich glaube aber die Mühe lohnt sich nicht.<br>
Bist du anderer Meinung? Erstell gerne einen Fork.