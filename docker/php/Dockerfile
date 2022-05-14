FROM php:7.4.0-fpm

RUN apt-get update && apt-get install -y libonig-dev && \
    docker-php-ext-install pdo_mysql mysqli mbstring && \
    apt-get install -y zip unzip

RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    chmod 777 /usr/local/bin/composer

RUN curl https://get.fuelphp.com/oil | sh

ADD ./php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www
