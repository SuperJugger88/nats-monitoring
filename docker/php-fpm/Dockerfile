ARG PHP_VERSION
FROM php:${PHP_VERSION}-fpm

ARG UID
ARG GID

RUN groupadd -g $GID php || true
RUN useradd -rm -s /bin/bash -g php -u $UID -m php

RUN set -xe; \
    apt-get update -yqq \
    && pecl channel-update pecl.php.net \
    && apt-get install -yqq apt-utils zlib1g-dev g++ git libicu-dev libzip-dev zip unzip libpq-dev libxml2-dev

RUN set -xe; \
    docker-php-ext-install intl opcache xml zip soap sockets pcntl; \

COPY ./php.ini /usr/local/etc/php/conf.d/php.ini
COPY ./opcache.ini /usr/local/etc/php/conf.d/opcache.ini

USER php

RUN mkdir -p "/home/php/bin"

WORKDIR /var/www

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/home/php/bin --filename=composer

RUN echo 'export PATH="/home/php/bin:$PATH"' >> /home/php/.ashrc

RUN mkdir -p "/home/php/log" && \
    touch "/home/php/log/fpm-php.www.log"

EXPOSE 9000
