FROM php:8.3-fpm-alpine

# Set working directory
WORKDIR /var/www

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql bcmath

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY --chown=www-data:www-data . .

RUN composer install