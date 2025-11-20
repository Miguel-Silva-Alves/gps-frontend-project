FROM php:8.2-apache

# Habilitar módulos necessários
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Ativar mod_rewrite (caso use)
RUN a2enmod rewrite

# Copiar o código para dentro do container
COPY ./src /var/www/html

# Instalar cliente mysql para o .sh
RUN apt-get update && apt-get install -y default-mysql-client

# Dar permissão
RUN chown -R www-data:www-data /var/www/html
