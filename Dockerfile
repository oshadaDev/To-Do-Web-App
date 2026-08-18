FROM php:8.4-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpq-dev \
    libzip-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_mysql zip \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy Laravel application
COPY . .

# Install PHP dependencies
RUN composer install \
    --optimize-autoloader \
    --no-dev \
    --no-interaction

# Install frontend dependencies and build
RUN npm ci
RUN npm run build

# Laravel storage permissions
RUN chmod -R 775 storage bootstrap/cache

# Railway provides the PORT environment variable
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8080}