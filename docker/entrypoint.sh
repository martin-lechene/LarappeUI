#!/bin/bash
set -e
cd /var/www/html

mkdir -p /data
touch /data/database.sqlite
chown www-data:www-data /data/database.sqlite 2>/dev/null || true
chmod 664 /data/database.sqlite 2>/dev/null || true

if [ ! -f .env ]; then
  cp .env.example .env
fi

chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true
chmod -R ug+rwX storage bootstrap/cache 2>/dev/null || true

if ! grep -qE '^APP_KEY=base64:[A-Za-z0-9+/=]+' .env 2>/dev/null; then
  php artisan key:generate --force --no-interaction
fi

php artisan migrate --force --no-interaction

exec apache2-foreground
