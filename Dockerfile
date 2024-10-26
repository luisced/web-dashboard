# Use an official PHP image with PHP 8.2 and Composer
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    zip \
    libpng-dev \
    libonig-dev \
    curl \
    && docker-php-ext-install pdo pdo_pgsql pgsql zip bcmath mbstring

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . .

# Install application dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev
RUN docker-php-ext-install pdo pdo_mysql

# Copy existing application configuration (if needed)
COPY .env.example .env

# Generate key
RUN php artisan key:generate

# Change permissions for Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Expose port 9000 and start PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]
