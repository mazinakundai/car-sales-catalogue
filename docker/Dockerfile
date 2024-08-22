# Use the official PHP image
FROM php:8.0-apache

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Create session directory and set permissions
RUN mkdir -p /var/lib/php/sessions && \
    chown www-data:www-data /var/lib/php/sessions && \
    chmod 1733 /var/lib/php/sessions

# Copy php.ini from src to the PHP configuration directory
COPY ./src/php.ini /usr/local/etc/php/

# Enable Apache mod_rewrite for URL rewriting
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Copy the application code to the container
COPY ./src /var/www/html

# Ensure the Apache user has access to the application files
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 to the outside world
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
