#!/bin/bash

cp .env.example .env
docker compose up -d --build
docker exec php-fpm bash -c "/home/php/bin/composer install && php artisan key:generate && php artisan optimize:clear"
