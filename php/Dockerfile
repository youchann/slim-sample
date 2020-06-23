FROM php:7.4-apache
COPY ./php.ini /usr/local/etc/php/
RUN apt-get update \
  && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
  && docker-php-ext-install pdo_mysql mysqli gd iconv
COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN cd /etc/apache2/mods-available/
RUN a2enmod rewrite