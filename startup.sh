#!/bin/bash
set -e

echo "Starting Laravel application..."

# Wait for database
if [ -n "$DB_HOST" ] && [ -n "$DB_PORT" ]; then
    echo "Waiting for database..."
    until nc -z $DB_HOST $DB_PORT; do
        sleep 2
    done
    echo "Database is ready!"
fi

# Clear all caches first
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Generate key if needed
if [ ! -f .env ]; then
    cp .env.example .env
    php artisan key:generate --force
fi



# **CRITICAL: Publish Vite assets and cache config**
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "=== Checking Vite manifest ==="
ls -la public/build/ || echo "No public/build directory"

# Start services
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
