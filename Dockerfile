FROM php:8.2.4-apache

# mysqli
RUN docker-php-ext-install mysqli

# pdo
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# update apt
RUN apt-get update -y

# update ping
RUN apt-get install -y iputils-ping

# Curl Libary install for Curl php
RUN apt-get install -y  libcurl3-dev

# install sudo
RUN apt-get install -y  sudo

# install nano
RUN apt-get install -y  nano

# install some base extensions
RUN apt-get install -y libzip-dev zip && docker-php-ext-install zip

# GD Libary install for upload image
RUN apt-get install -y  libpng-dev 
RUN apt-get install -y  libjpeg62-turbo-dev
RUN apt-get install -y  libfreetype6-dev
RUN apt-get install -y  libmcrypt-dev
RUN apt-get install -y  zlib1g-dev

# configure gd for other type (jpeg, jpg)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j $(nproc) gd

# php.ini:
RUN echo 'opcache.file_update_protection=0\n\
opcache.memory_consumption=256\n\
opcache.max_accelerated_files=24000\n\
opcache.max_wasted_percentage=10\n\
opcache.fast_shutdown=1\n\
zlib.output_compression=On\n\
upload_max_filesize=128M\n\
max_input_vars=10000\n\
max_execution_time=30000\n\
short_open_tag=On\n\
memory_limit=128M\n\
post_max_size=128M\n' > /usr/local/etc/php/php.ini