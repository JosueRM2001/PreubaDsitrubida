# Utilizamos la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instalar extensiones necesarias de PHP
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Habilitar mod_rewrite de Apache para proyectos PHP
RUN a2enmod rewrite

# Configurar el directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos de la galería al contenedor
COPY . /var/www/html

# Dar permisos al directorio de uploads
RUN mkdir -p /var/www/html/uploads && \
    chmod -R 755 /var/www/html/uploads

# Exponer el puerto 80
EXPOSE 80

# Comando para iniciar el servidor Apache
CMD ["apache2-foreground"]
