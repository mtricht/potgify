FROM php:5.6-apache
RUN apt-get update && \
    apt-get install -y libpng-dev libmagickwand-dev libav-tools
RUN docker-php-ext-install gd
RUN pecl install imagick && echo "extension=imagick.so" > /usr/local/etc/php/conf.d/ext-imagick.ini
COPY php.ini /usr/local/etc/php/
RUN service apache2 restart