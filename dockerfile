FROM php:8.2-apache

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Copiar SOLO el contenido de api al web root
COPY api/ /var/www/html/

# Establecer permisos correctos
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Establecer un DirectoryIndex explícito
RUN echo "DirectoryIndex index.php" >> /etc/apache2/apache2.conf

