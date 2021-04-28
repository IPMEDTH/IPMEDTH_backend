# IPMEDTH_backend

API voor het IPMEDTH project voor The Space

Als je laravel via docker met laravel sail draait, en dus geen lokale php of composerinstallatie hebt, moet je dit commando draaien om toegang te krijgen tot laravel sail (voor een gewone php installatie kun je skippen naar deploy instructions):

```bash
$ docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
```

Daarna kun je ```./vendor/bin/sail up -d``` gebruiken om een webserver op localhost te draaien en ```./vendor/bin/sail down``` om deze weer af te sluiten

Evt kun je voor sail een alias instellen in bash: ```alias sail='bash vendor/bin/sail'```

daarna moet je elk volgend command beginnen met ```sail ...``` bijvoorbeeld: ```sail php artisan key:generate```

Deploy instructions:

```bash
$ composer install
```

```php
# Copy .env file from example
php -r "file_exists('.env') || copy('.env.example', '.env');"
```

```php
php artisan key:generate
```

Verander de database host en credentials in je .env file (niet nodig bij sail):
```bash
$ nano .env
```

Finally, migrate en seed de database als dit nog niet gedaan is:
```php
$ php artisan migrate:fresh --seed
```
(dit werkt ook als nuke&fix voor de database, dus pas hier wel mee op)

Krijg je bij het seeden een [ReflectionException] fix dit door:
```bash
$ composer dump-autoload
$ php artisan db:seed
```

En mocht je editor raar doen met laravel is laravel-ide-helper geïnstalleerd:
```bash
$ php artisan ide-helper:generate
```
