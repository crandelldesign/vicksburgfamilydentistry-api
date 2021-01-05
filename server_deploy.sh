#!/bin/sh
set -e

echo "Deploying application ..."

# Update codebase
git fetch origin $(git rev-parse --abbrev-ref HEAD)
git reset --hard origin/$(git rev-parse --abbrev-ref HEAD)

# Install dependencies based on lock file
composer install --no-interaction --prefer-dist --optimize-autoloader

# Migrate database
# php artisan migrate --force

# Note: If you're using queue workers, this is the place to restart them.
# ...

# Reload PHP to update opcache
# echo "" | sudo -S service php7.4-fpm reload

echo "Application deployed!"