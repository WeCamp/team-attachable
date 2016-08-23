FROM php:7.0-fpm

# Install Curl & GIT
RUN apt-get update && apt-get install -y curl git zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# Install bcmath
RUN docker-php-ext-install bcmath

# Install opcache
RUN docker-php-ext-install opcache

# Install JSON
RUN docker-php-ext-install json

# Install mbstring
RUN docker-php-ext-install mbstring

# Install mcrypt
RUN apt-get update && apt-get install -y libmcrypt-dev
RUN docker-php-ext-install mcrypt

# Install PDO
RUN docker-php-ext-install pdo_mysql

# Install intl
RUN apt-get update && apt-get install -y libicu-dev
RUN docker-php-ext-install intl

COPY php.ini /usr/local/etc/php/php.ini

RUN mkdir -p ~/.ssh && ssh-keyscan github.com >> ~/.ssh/known_hosts

EXPOSE 9000

VOLUME /var/www

WORKDIR /var/www