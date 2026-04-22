#!/bin/bash
# Build script untuk deployment

echo "🚀 Starting deployment..."

# Install dependencies
echo "📦 Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

# Install npm packages
echo "📦 Installing NPM packages..."
npm install

# Build assets
echo "🔨 Building assets..."
npm run build

# Laravel optimization
echo "⚡ Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations
echo "🗄️ Running migrations..."
php artisan migrate --force

# Seed database
echo "🌱 Seeding database..."
php artisan db:seed --force

echo "✅ Deployment complete!"
