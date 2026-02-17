FROM php:8.4-fpm

# Installer les dépendances et extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev libpq-dev

RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd

# Installer composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install

CMD ["php-fpm"]
