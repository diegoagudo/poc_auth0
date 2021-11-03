FROM php:7.4.25-cli-alpine
WORKDIR /home/app
ADD composer.json /home/app

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ONBUILD RUN composer update

EXPOSE 3003
