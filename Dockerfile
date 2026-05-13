FROM php:8.2-apache

# 1. Extensiones necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# 2. Activar rewrite para que funcione tu .htaccess
RUN a2enmod rewrite

# 3. FIX CRÍTICO: Desactivar módulos que chocan (Adiós al error AH00534)
RUN a2dismod mpm_event && a2enmod mpm_prefork

# 4. Configurar permisos para el .htaccess
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# 5. Copiar tu proyecto
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html

# 6. Configurar el puerto dinámico de Railway
RUN sed -i "s/Listen 80/Listen \${PORT}/g" /etc/apache2/ports.conf
RUN sed -i "s/<VirtualHost \*:80>/<VirtualHost \*:\${PORT}>/g" /etc/apache2/sites-available/000-default.conf

CMD ["apache2-foreground"]