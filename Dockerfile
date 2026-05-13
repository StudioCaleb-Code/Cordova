FROM php:8.2-apache

# 1. Extensiones necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# 2. Habilitar rewrite para el .htaccess
RUN a2enmod rewrite

# 3. SOLUCIÓN AL BUCLE: Desactivar explícitamente el módulo conflictivo
# Esto evita que se carguen dos MPMs al mismo tiempo
RUN a2dismod mpm_event && a2enmod mpm_prefork

# 4. Configurar el puerto dinámico de Railway
# Lo hacemos aquí para que Apache sepa dónde escuchar
RUN sed -i "s/80/\${PORT}/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# 5. Copiar archivos y permisos
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html

# 6. Arrancar Apache en primer plano
CMD ["apache2-foreground"]