# Backend – Projektarbete – Skapa ett CMS system

Målen med projektarbetet är att tillämpa kunskaper i PHP:s interaktion mot MySQL-databaser samt att hantera databaser via PDO.

## Kravspecifikation

### G-Del

1. Utveckla ett enklare CMS från scratch i PHP och MySQL.
   Systemet är en minimal version av WordPress CMS.
   Systemet skall hantera inlägg (posts).
   Systemet behöver inte hantera användare, sidor eller menyer!
   Publicera systemet på en live-server (ett hosting-konto) i en egen mapp.
   T.ex. http://my-domain.se/my-cms.

2. Systemet skall ha en adminpanel.
   För att komma åt adminpanelen skall man skriva /admin efter systemets startsida.
   T.ex. http://my-domain.se/my-cms/admin
   Skydda mappen med funktionen ”Directory Privacy” via cPanel.

3. Via adminpanelen skall man kunna skapa inlägg.
   Varje inlägg måste ha en rubrik som visas i en H2-tagg (på startsidan).
   Via en textruta skall man kunna skriva texter.
   En radbrytning i textrutan skapar ett nytt stycke (en P-tagg).
   OBS! Alla inlägg måste sparas i en databas.

4. Systemets frontend (startsidan) skall visa alla inlägg i omvänd kronologisk ordning.
   Man skall alltså se senaste inlägg (som publiceras via adminpanelen) högst upp på sidan.
   Visa publiceringsdatumet under varje inlägg.

5. Skapa två olika mallar. En mall till adminpanelen och en annan till startsidan.
   Ni får använda ett valfritt CSS-Ramverk t.ex. Bootstrap.

### VG-Del

1. Man skall kunna redigera inlägg.

2. Man skall kunna ta bort inlägg (permanent från databasen).

3. Man skall kunna avpublicera/publicera inlägg.

4. Man skall kunna bädda in en karta eller en YouTube-film.
   Skapa en extra textruta för att hantera detta.

5. Man skall kunna ladda upp bilder (minst en bild i varje inlägg).
   Bilderna måste sparas i en undermapp t.ex. images.
   Tips: https://www.w3schools.com/php/php_file_upload.asp
