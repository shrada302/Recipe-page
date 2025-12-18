FROM php:8.2-apache

RUN a2enmod rewrite

# Install MySQL support
RUN apt-get update && apt-get install -y default-mysql-client \
    && docker-php-ext-install mysqli pdo pdo_mysql

# Copy project files
COPY . /var/www/html/

# Replace Apache config
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Set permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html/website/pages
