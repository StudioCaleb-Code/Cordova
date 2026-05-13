# 1. Descarga un sistema Linux oficial con PHP 8.2 y el servidor web Apache integrado
FROM php:8.2-apache

# 2. Instala las extensiones de MySQL necesarias para tu archivo Database.php
RUN docker-php-ext-install mysqli pdo pdo_mysql

# 3. Activa el módulo que procesa tu archivo .htaccess (Rutas dinámicas)
RUN a2enmod rewrite

# 4. Habilita permisos totales para que Apache obedezca las reglas de tu .htaccess
RUN echo '<Directory "/var/www/html">\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf

# 5. Copia todo tu proyecto dentro de la carpeta del servidor web
COPY . /var/www/html/

# 6. Da permisos de lectura y escritura seguros a los archivos
RUN chown -R www-data:www-data /var/www/html

# 7. Configura el puerto para que use el que Railway le asigne automáticamente
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# 8. Expone el puerto de red
EXPOSE ${PORT}
