FROM php:8.2.12-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev zip unzip git curl \
    libssl-dev pkg-config

RUN pecl install mongodb && docker-php-ext-enable mongodb

RUN docker-php-ext-install mbstring exif pcntl bcmath gd pdo

COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . /var/www

RUN composer install --no-dev --optimize-autoloader
RUN rm -rf public/storage && mkdir -p storage/app/public
RUN git config --global --add safe.directory /var/www/html

RUN chmod -R 775 storage bootstrap/cache && \
    chown -R www-data:www-data storage bootstrap/cache

COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh
CMD ["sh", "/usr/local/bin/entrypoint.sh"]
