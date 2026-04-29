#!/usr/bin/env bash
# Deploy script for Digital Ocean
# Run this on the server after pulling from GitHub

set -e

echo "==> Pulling latest code..."
git pull origin main

echo "==> Installing PHP dependencies..."
composer install --no-dev --optimize-autoloader

echo "==> Installing Node dependencies and building assets..."
npm ci
npm run build

echo "==> Running migrations..."
php artisan migrate --force

echo "==> Optimising..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan icons:cache

echo "==> Restarting queue worker (if configured)..."
php artisan queue:restart

echo "==> Done!"
