FROM php:8.2-fpm
WORKDIR /var/www
RUN apt-get update && apt-get install -y libpng-dev zip unzip
RUN docker-php-ext-install pdo pdo_mysql
COPY . .


