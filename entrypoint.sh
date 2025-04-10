#!/bin/sh

set -e

PORT=${PORT:-8000}

# Ensure .env file exists
if [ ! -f .env ]; then
    echo "Copying .env.example to .env..."
    cp .env.example .env
fi

# Generate app key if not set
if ! grep -q "APP_KEY=base64" .env && ! grep -q "APP_KEY=" .env | grep -vE "^#"; then
    echo "Generating APP_KEY..."
    php artisan key:generate
fi

# Create storage symlink (if not exists)
php artisan storage:link || true

# Set permissions
chmod -R 775 storage bootstrap/cache || true
chown -R www-data:www-data storage bootstrap/cache || true

# Start server
echo "Starting Laravel server on port $PORT..."
php artisan serve --host=0.0.0.0 --port=$PORT
