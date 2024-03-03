#!/bin/bash

cp ./.env.example ./.env
cp ./nats-laravel/.env.example ./nats-laravel/.env
docker compose -f ./compose.yml up -d --build
docker exec php-fpm bash -c "/home/php/bin/composer install && php artisan key:generate && php artisan optimize:clear"
