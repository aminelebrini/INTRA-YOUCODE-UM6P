FROM php:8.2-fpm-alpine

ARG UID=1000
ARG GID=1000

WORKDIR /var/www/html

# 1. Utiliser 'apk' à la place de 'apt-get'
RUN apk update && apk add --no-cache \
    git \
    unzip \
    curl \
    libpq-dev \
    libzip-dev \
    zlib-dev \
    oniguruma-dev \
    bash \
    sudo \
    postgresql-dev

# 2. Installer les extensions PHP
RUN docker-php-ext-install pdo pdo_pgsql pgsql zip mbstring

# 3. Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 4. Créer l'utilisateur (Commandes Alpine)
RUN addgroup -g ${GID} laravel && \
    adduser -G laravel -u ${UID} -h /home/laravel -D laravel && \
    echo "laravel ALL=(ALL) NOPASSWD:ALL" >> /etc/sudoers

COPY . /var/www/html/

RUN chown -R laravel:laravel /var/www/html

USER laravel

EXPOSE 8000
CMD ["php-fpm"]