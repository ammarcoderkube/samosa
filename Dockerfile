FROM php:8.3-cli

# Install system dependencies, Node.js, and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libsqlite3-dev \
    sqlite3 \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_sqlite mbstring bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node.js 20
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

WORKDIR /var/www/html

# Copy application code
COPY . .

# Install PHP & Node dependencies and build assets
RUN composer install --no-dev --optimize-autoloader && \
    npm install && \
    npm run build

# Ensure database directory and SQLite file exist with proper permissions
RUN mkdir -p /var/www/html/database && \
    touch /var/www/html/database/database.sqlite && \
    chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database && \
    chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

EXPOSE 8000

CMD ["sh", "-c", "php artisan migrate --force && php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan serve --host 0.0.0.0 --port ${PORT:-8000}"]
