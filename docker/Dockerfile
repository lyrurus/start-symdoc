FROM php:8.2.16-fpm

ARG UID=1000

RUN apt-get update -y && apt-get upgrade -y \
    && apt-get install -y \
       apt-utils libpq-dev libzip-dev libicu-dev \
       curl nano sudo git \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-install -j$(nproc) zip \
    && docker-php-ext-install -j$(nproc) pdo_pgsql

RUN groupadd -g "$UID" app \
    && useradd -g "$UID" -u "$UID" -d /home/app -s /bin/bash app \
    && usermod -aG sudo,www-data app \
    && echo "app ALL=(ALL) NOPASSWD: ALL" >> /etc/sudoers \
    && mkdir -p /home/app/.composer \
    && chown -R app:app /home/app/.composer

COPY --from=composer:2.5.4 /usr/bin/composer /usr/bin/composer

USER app
WORKDIR /var/www/html
