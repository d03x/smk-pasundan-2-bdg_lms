# Gunakan PHP 8.2 FPM berbasis Debian Bookworm untuk stabilitas
FROM php:8.2-fpm

# 1. Install system dependencies
# Menambahkan libzip-dev (untuk zip) dan libicu-dev (opsional tapi disarankan untuk Laravel)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    nginx

# 2. Clean cache untuk mengurangi ukuran image
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# 3. Install PHP extensions
# Menambahkan 'zip' ke dalam daftar instalasi
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# 4. Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 5. Install Node.js (Versi 18 LTS)
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - && apt-get install -y nodejs

# 6. Set working directory
WORKDIR /var/www

# 7. Copy seluruh file project
COPY . .

# 8. Penanganan .env (PENTING)
# Pastikan file .env.production ada di folder project saat build. 
# Jika file ini tidak ada, proses build akan gagal lagi.
RUN cp .env.production .env

# 9. Install PHP dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev

# 10. Install Node dependencies & Build assets (Vue/Inertia)
RUN npm install && npm run build

# 11. Copy konfigurasi Nginx
COPY nginx.conf /etc/nginx/sites-available/default
# Pastikan symlink benar agar config aktif
RUN ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# 12. Optimasi Laravel (Cache config & route untuk performa)
# Cloud Run bersifat read-only, jadi lebih baik di-cache saat build
RUN php artisan config:cache && php artisan route:cache

# 13. Atur Permission
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# 14. Expose port 8080
EXPOSE 8080

# 15. Jalankan Nginx dan PHP-FPM
# Menggunakan format script agar jika salah satu mati, container bisa restart
CMD service nginx start && php-fpm