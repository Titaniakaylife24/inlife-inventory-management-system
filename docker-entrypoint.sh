#!/bin/bash
set -e

a2dismod mpm_event 2>/dev/null || true
a2dismod mpm_worker 2>/dev/null || true
a2dismod mpm_prefork 2>/dev/null || true
a2enmod mpm_prefork

mkdir -p \
storage/framework/cache \
storage/framework/views \
storage/framework/sessions \
storage/framework/testing \
bootstrap/cache

chown -R www-data:www-data storage bootstrap/cache

chmod -R 775 storage bootstrap/cache

php artisan optimize:clear || true

php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

exec apache2-foreground