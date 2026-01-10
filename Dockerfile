# Tahap 1: Menggunakan PHP-FPM Official
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip nginx

# Clean cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node.js (Sesuaikan versi jika perlu)
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - && apt-get install -y nodejs

# Set working directory
WORKDIR /var/www

# Copy seluruh file project
COPY . .

# Gunakan .env.production sebagai .env utama di dalam container
RUN cp .env.production .env

# Install PHP dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Install Node dependencies & Build assets (Vue/Inertia)
RUN npm install
RUN npm run build

# Copy konfigurasi Nginx
COPY nginx.conf /etc/nginx/sites-available/default
RUN ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# Beri izin ke folder storage & bootstrap/cache (Hanya folder ini yang writable di Cloud Run tertentu)
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expose port 8080 (standar Cloud Run)
EXPOSE 8080

# Jalankan Nginx dan PHP-FPM
CMD service nginx start && php-fpm