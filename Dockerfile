# Use official PHP image with FPM and Alpine
FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install system dependencies and PHP extensions
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
    curl-dev \
    && docker-php-ext-install gd \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy Laravel app
COPY . .

# Copy and set permissions for the entrypoint
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose PHP-FPM port
EXPOSE 9000

# Use entrypoint
ENTRYPOINT ["sh", "/usr/local/bin/entrypoint.sh"]
