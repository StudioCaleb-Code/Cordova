FROM php:8.2-apache

# 1. Instalamos extensiones
RUN docker-php-ext-install mysqli pdo pdo_mysql

# 2. LIMPIEZA TOTAL de módulos MPM (Esto mata el error AH00534)
# Borramos los archivos que cargan los módulos y solo dejamos prefork
RUN rm /etc/apache2/mods-enabled/mpm_event.load || true
RUN rm /etc/apache2/mods-enabled/mpm_event.conf || true
RUN a2dismod mpm_event || true
RUN a2enmod mpm_prefork

# 3. Habilitar rewrite para que tu .htaccess funcione sí o sí
RUN a2enmod rewrite

# 4. Configurar el puerto de Railway en todos los archivos necesarios
RUN sed -i "s/80/\${PORT}/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# 5. Dar permisos para que el .htaccess mande
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# 6. Copiar proyecto y permisos
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html

CMD ["apache2-foreground"]