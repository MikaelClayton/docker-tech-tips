FROM php:8.2-apache
WORKDIR /var/www/html
COPY . /var/www/html

RUN apt-get update && apt-get upgrade -y && a2enmod rewrite && a2enmod headers