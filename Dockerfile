# Use official PHP image
FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libjpeg-dev libfreetype6-dev \
    libpq-dev
RUN docker-php-ext-install pdo pdo_pgsql pgsql


# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Generate application key

# Expose port 8000
EXPOSE 8000
# Install Node & npm
RUN apt-get update && apt-get install -y nodejs npm

# Install dependencies and build assets
# Install npm dependencies and build assets
# Force reinstall of all dependencies including dev dependencies
RUN rm -rf node_modules
RUN npm install --include=dev
RUN npm run production


CMD php artisan migrate --force && php-fpm

# Start Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
