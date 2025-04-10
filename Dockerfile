# Use official PHP image
FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apk update && apk add --no-cache \
    libpng-dev \
    zip \
    unzip \
    git \
    curl \
    openssl-dev \
    autoconf \
    gcc \
    g++ \
    make \
    curl-dev

# Install PHP extensions
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy Laravel application files
COPY . .

# Copy entrypoint script and give execution permissions
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Set permissions for storage and cache
RUN mkdir -p storage/framework/{sessions,views,cache} \
    && chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Create storage symlink
RUN rm -f public/storage && php artisan storage:link || true

# Expose port for Laravel server
EXPOSE 8000

# Mark repo as safe (for git)
RUN git config --global --add safe.directory /var/www/html

# Run the app
ENTRYPOINT ["sh", "/usr/local/bin/entrypoint.sh"]
