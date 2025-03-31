# Use an official PHP runtime as a base image
FROM php:8.2.12-fpm

# Install required system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev zip unzip git curl \
    libssl-dev pkg-config

# Install MongoDB PHP extension
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Install additional PHP extensions
RUN docker-php-ext-install mbstring exif pcntl bcmath gd pdo

# Install Composer globally
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Set the working directory
WORKDIR /var/www

# Copy the Laravel application files
COPY . /var/www

# Install project dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions for storage and cache directories
RUN chmod -R 775 storage bootstrap/cache && \
    chown -R www-data:www-data storage bootstrap/cache

# Expose the container's port (adjust if needed)
# EXPOSE 9000

COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh
CMD ["sh", "/usr/local/bin/entrypoint.sh"]
