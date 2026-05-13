# 1. Usamos la imagen oficial
FROM php:8.2-apache

# 2. Instalamos extensiones (Esto está perfecto)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# 3. Activamos el módulo rewrite para el .htaccess
RUN a2enmod rewrite

# 4. Ajustamos la configuración de Apache para Railway
# En lugar de concatenar, usamos un archivo de configuración limpio
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# 5. Copiamos el proyecto
COPY . /var/www/html/

# 6. Permisos (Crucial para que Apache pueda leer archivos)
RUN chown -R www-data:www-data /var/www/html

# 7. El truco para el PUERTO en Railway:
# Railway inyecta la variable PORT, pero Apache espera un número fijo al arrancar.
# Usaremos un script de inicio para que el puerto se asigne justo antes de empezar.
CMD sed -i "s/Listen 80/Listen ${PORT}/g" /etc/apache2/ports.conf && \
    sed -i "s/<VirtualHost \*:80>/<VirtualHost \*:${PORT}>/g" /etc/apache2/sites-available/000-default.conf && \
    apache2-foreground