# Use an official PHP runtime as a base image
FROM php:8.2.12-fpm

# Install required system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev zip unzip git curl \
    libssl-dev pkg-config nodejs npm \
    supervisor

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

# Build front-end assets using Laravel Mix
RUN npm install && npm run prod

# Set permissions for storage and cache directories
RUN chmod -R 775 storage bootstrap/cache public && \
    chown -R www-data:www-data storage bootstrap/cache public

# Install and configure Nginx to serve the application
RUN apt-get install -y nginx
COPY ./nginx.conf /etc/nginx/sites-available/default

# Expose the necessary port
EXPOSE 80

# Set up Supervisor to manage PHP-FPM and Nginx processes
COPY ./supervisord.conf /etc/supervisord.conf
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
