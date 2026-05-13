FROM php:8.2-apache

# 1. Extensiones necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# 2. Habilitar rewrite para el .htaccess
RUN a2enmod rewrite

# 3. ELIMINAR EL ERROR AH00534 (Mano dura)
# Borramos cualquier rastro de configuración de MPMs previos
RUN rm -f /etc/apache2/mods-enabled/mpm_*
# Forzamos solo el prefork que es el que no da problemas
RUN ln -s /etc/apache2/mods-available/mpm_prefork.load /etc/apache2/mods-enabled/mpm_prefork.load
RUN ln -s /etc/apache2/mods-available/mpm_prefork.conf /etc/apache2/mods-enabled/mpm_prefork.conf

# 4. Configurar el puerto dinámico de Railway
RUN sed -i "s/80/\${PORT}/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# 5. Permitir que el .htaccess funcione
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# 6. Copiar proyecto y permisos
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html

CMD ["apache2-foreground"]