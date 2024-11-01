FROM php:8.2-apache
COPY . /var/www/html

RUN apt-get update && apt-get upgrade -y && a2enmod rewrite && a2enmod headers \
    && docker-php-ext-install mysqli