# Menggunakan image PHP 8.1 dengan Apache
FROM php:8.1-apache

# Mengaktifkan rewrite module untuk Laravel/PHP routing
RUN a2enmod rewrite

# Menyalin seluruh file ke root web server
COPY . /var/www/html/

# Mengatur izin akses folder
RUN chown -R www-data:www-data /var/www/html

# Port yang digunakan
EXPOSE 80
