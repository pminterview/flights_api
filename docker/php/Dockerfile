FROM php:8.0.3-fpm-buster

RUN docker-php-ext-install bcmath pdo_mysql

RUN apt-get update
#RUN apt-get install -y git zip unzip

RUN apt-get update && apt-get install -y \
libbz2-dev \
libfreetype6-dev \
libjpeg62-turbo-dev \
libpng-dev \
build-essential \
mariadb-client \
libjpeg62-turbo-dev \
libfreetype6-dev \
locales \
libzip-dev \
zip \
jpegoptim optipng pngquant gifsicle \
vim \
unzip \
git \
curl \
libxml++2.6-dev \
sqlite3 \
&& docker-php-ext-configure gd --with-freetype --with-jpeg \
&& docker-php-ext-install -j$(nproc) gd pdo pdo_mysql

RUN docker-php-ext-install exif pcntl bz2 zip
RUN docker-php-ext-configure gd --with-freetype --with-jpeg

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN php artisan migrate
RUN php artisan db:seed
RUN php artisan key:generate
EXPOSE 9000
