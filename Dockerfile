FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    npm \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    && docker-php-ext-install \
    pdo \
    pdo_mysql \
    zip \
    intl

# Enable Apache Rewrite
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# Install PHP packages
RUN composer install --no-dev --optimize-autoloader

# Install Node packages
RUN npm install

# Build Vite
RUN npm run build

# Laravel permissions
RUN mkdir -p storage/framework/{cache,sessions,views}
RUN chmod -R 775 storage bootstrap/cache

# Apache public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
/etc/apache2/sites-available/*.conf \
/etc/apache2/apache2.conf

EXPOSE 80

CMD ["apache2-foreground"]