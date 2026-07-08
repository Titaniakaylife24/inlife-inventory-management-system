FROM php:8.2-apache

# Install system packages
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    nodejs \
    npm \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libicu-dev \
    libonig-dev \
    libxml2-dev

# Install PHP Extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg

RUN docker-php-ext-install \
    gd \
    intl \
    pdo \
    pdo_mysql \
    zip

# Enable Apache Rewrite
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# Install PHP packages
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Install Node packages
RUN npm install

# Build assets
RUN npm run build

# Laravel cache directories
RUN mkdir -p storage/framework/cache
RUN mkdir -p storage/framework/views
RUN mkdir -p storage/framework/sessions
RUN mkdir -p bootstrap/cache

RUN chmod -R 775 storage bootstrap/cache

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
/etc/apache2/sites-available/*.conf \
/etc/apache2/apache2.conf

EXPOSE 80

CMD ["apache2-foreground"]