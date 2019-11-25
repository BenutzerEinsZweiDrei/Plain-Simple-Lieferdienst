## Was du brauchst

* Webspace
* [Pico CMS](http://picocms.org/download/)
* [ContactFORM for Pico](http://picocms.org/download/)
* [Google Mail Adresse](www.gmail.com)
* ein wenig Geduld

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

Uploade die Dateien aus dieser Repo in die jeweiligen Pico Folder<br>


Beim click auf Senden bekommst du eine Email mit der Bestellung<br>
Vergleiche dann ob der Besteller auch gezahlt hat bei Paypal<br>
oder rufe ihn einfach direkt an.

Natürlich übernehme ich keinerlei Haftung<br>
weil ich mich mit Restaurant Gesetzen auch nicht auskenne<br>
also solltest du erstmal selbst recherchieren was du hier tust.

Alles ist open source. Also ist alles bis in die Nieren anpassbar.<br>
In den Pico Docs lernst du wie du Themes erstellst mit Twig.

