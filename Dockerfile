# Use official PHP image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo pdo_mysql gd

# Install required PHP extensions, including MongoDB
RUN apt-get update && apt-get install -y libssl-dev && \
    docker-php-ext-install pdo pdo_mysql && \
    pecl install mongodb && \
    docker-php-ext-enable mongodb

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy Laravel application files
COPY . .

# Copy entrypoint script and give execution permissions
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Set correct permissions for storage and cache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

RUN rm -rf public/storage && mkdir -p storage/app/public

# Expose port for PHP-FPM
EXPOSE 9000

RUN git config --global --add safe.directory /var/www/html

# Use the entrypoint script
ENTRYPOINT ["sh", "/usr/local/bin/entrypoint.sh"]
