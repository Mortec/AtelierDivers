# _
# Notes
## __



## Exercice

https://github.com/O-clock-Titan/S07-E01-exo-first-lumen-project

_

## Composer
creation du projet sous laravel dans le repertoire contenant le repertoire du projet :

composer create-project --prefer-dist laravel/lumen S07-E01-lumen-videogame

_

## Git

ajout de composer.lock dans .gitignore

cd projectDir
git init
git add .
git commit -a -m'init'

->créer un repo coté github 

git remote add origin git@github.com:NOM_DU_PROGJET_CREE.git
git remote add origin git@github.com:oScrum-Mortec.git
git push -u origin master

_

## Terminal
autorisation des repertoires pour eviter errreurs d'écriture.lecture php :

sudo chgrp -R www-data storage
sudo chmod -R ug+rwx storage

_

## Config

(https://lumen.laravel.com/docs/5.8/configuration#environment-configuration)

### -> .env
_APP KEY clef cypté de 32 char
_credentials database

### -> bootstrap
decommenter $app->withFacades() et $app->withEloqouent() dans bootstrap/app.php



_

## Server temporaire php

php -S localhost:8080 -t public


# _
# Recap des file & folders utiles


## Routes

`routes/web.php`

## Views

`resources/views`

## Controllers

`app/Http/Controllers`

## Models

`app/Models`

## Configuration

`.env`

## Démarrage / Amorçage

`bootstrap/app.php`

## Logs

`storage/logs`
