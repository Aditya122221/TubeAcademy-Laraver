# Use an official PHP runtime as a parent image
FROM php:8.2.12-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

RUN pecl install mongodb && docker-php-ext-enable mongodb

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Set the working directory
WORKDIR /var/www

# Copy the Laravel application
COPY . /var/www

# Install dependencies
RUN composer install

# Set permissions for Laravel storage and cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expose port 9000 and start PHP-FPM server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=${PORT}"]
