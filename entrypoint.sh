#!/bin/bash

# Default to port 8000 if PORT is not set
PORT=${PORT:-8000}

# Start Laravel's built-in server
php artisan serve --host=0.0.0.0 --port=$PORT
