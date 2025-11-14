# Imagen base con PHP + Apache
FROM php:8.2-apache

# Activar extensiones necesarias (curl para Supabase)
RUN docker-php-ext-install pdo pdo_mysql && apt-get update && apt-get install -y curl

# Copiar código
COPY . /var/www/html/

# Dar permisos correctos
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
