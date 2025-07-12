#!/bin/sh

# Exit script on error
set -e

echo "Starting Laravel application..."

# Create database file
if [ ! -f /var/www/html/database/database.sqlite ]; then
  echo "Database file not found. Creating a new one..."
  touch /var/www/html/database/database.sqlite
fi

# Set correct permissions
chown -R www-data:www-data /var/www/html/database/database.sqlite
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Start Supervisor in the background
supervisord -c /etc/supervisord.conf &

# Run database migrations and other artisan commands
echo "Running Laravel artisan commands..."

# echo "Running migrations..."
# php artisan migrate --force

echo "Clearing caches..."
php artisan optimize

echo "Restart queue workers..."
php artisan queue:restart

# Keep the container running
wait
