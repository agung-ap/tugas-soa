FROM php:8.0-fpm

LABEL maintainer="Agung Aprianto"

# Composer version 2.1.11
COPY composer.phar /usr/local/bin/composer

RUN apt-get update \
	&& apt-get install -y git vim libpq-dev libzip-dev libjpeg62-turbo-dev libpng-dev libfreetype6-dev zip \
	&& docker-php-ext-install gd zip \
    && chmod +x /usr/local/bin/composer

COPY . /srv/app

WORKDIR /srv/app

RUN chown -R www-data:www-data /srv/app 

# steps for running composer in docker
RUN chmod 777 -R /srv/app 

RUN useradd userToRunComposer

USER userToRunComposer

RUN composer update --no-interaction