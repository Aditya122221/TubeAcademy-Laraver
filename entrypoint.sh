#!/bin/sh

# Default to port 8000 if PORT is not set
PORT=${PORT:-8000}

# Run Laravel migrations (optional — you can comment this if not needed)
# php artisan migrate --force

# Start Laravel's built-in server
php artisan serve --host=0.0.0.0 --port=$PORT
