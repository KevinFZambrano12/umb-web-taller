FROM php:8.2-apache

# Habilitar módulos necesarios
RUN docker-php-ext-install pdo pdo_mysql

# Copiar tu app al contenedor
COPY . /var/www/html

# Establecer permisos
RUN chown -R www-data:www-data /var/www/html

# Exponer puerto
EXPOSE 80
