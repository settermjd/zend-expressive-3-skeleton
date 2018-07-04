FROM php:7.2-apache

WORKDIR /var/www/html
COPY ./ /var/www/html/
COPY ./docker/default.conf /etc/apache2/sites-enabled/000-default.conf

EXPOSE 80

RUN docker-php-ext-install pdo_mysql \
    && docker-php-ext-install json

RUN a2enmod rewrite
