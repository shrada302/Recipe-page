# Use official PHP Apache image
FROM php:8.2-apache

# Enable Apache rewrite module
RUN a2enmod rewrite

# Install MySQL extensions
RUN apt-get update && apt-get install -y default-mysql-client \
    && docker-php-ext-install mysqli pdo pdo_mysql

# Copy project files into container
COPY . /var/www/html/

# Replace default Apache config with custom one
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Set ownership and permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html/website
