FROM php:8.2-apache

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Copiar SOLO el contenido de /api al document root
COPY api/ /var/www/html/

# Establecer el directorio de trabajo
WORKDIR /var/www/html/

# Establecer permisos (opcional, recomendado)
RUN chown -R www-data:www-data /var/www/html
