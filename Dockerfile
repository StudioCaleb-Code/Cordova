# 1. Imagen oficial de PHP con Apache
FROM php:8.2-apache

# 2. Instalar extensiones de base de datos
RUN docker-php-ext-install mysqli pdo pdo_mysql

# 3. Activar el módulo rewrite para que funcione el .htaccess
RUN a2enmod rewrite

# 4. Habilitar .htaccess cambiando 'None' por 'All' en la configuración base
# Esto es más limpio que añadir bloques de texto al final del archivo
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# 5. Copiar los archivos de tu proyecto
COPY . /var/www/html/

# 6. Permisos para que Apache pueda leer y escribir
RUN chown -R www-data:www-data /var/www/html

# 7. IMPORTANTE: Railway asigna el puerto dinámicamente. 
# Usamos un comando de inicio para configurar el puerto justo antes de arrancar Apache.
CMD sed -i "s/80/${PORT}/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf && \
    apache2-foreground