FROM php:7.0.8-fpm

#all usefull stuff
RUN apt-get update && apt-get install -y \
    mc \
    git \
    openssl \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    g++

#composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

#mongo
RUN pecl install mongodb
RUN cd /usr/local/etc/php/conf.d && touch mongo.ini && echo "extension=mongodb.so" > ./mongo.ini