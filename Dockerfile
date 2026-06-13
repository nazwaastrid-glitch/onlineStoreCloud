FROM php:8.1-apache

# 1. Install sistem dependensi yang dibutuhkan
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# 2. Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 3. Aktifkan rewrite module untuk Laravel routing
RUN a2enmod rewrite

# 4. Copy seluruh file proyek Anda
COPY . /var/www/html/

# 5. Arahkan akses web ke folder 'public' (karena Laravel butuh ini)
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# 6. Beri izin akses folder storage (PENTING untuk Laravel)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 7. Port standar
EXPOSE 80
