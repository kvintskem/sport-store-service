FROM php:8.3-fpm

# Устанавливаем nginx + зависимости
RUN apt-get update \
    && apt-get install -y nginx supervisor curl \
    && apt-get install -y libzip-dev libonig-dev libpng-dev \
    && docker-php-ext-install pdo pdo_mysql zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html
COPY . /var/www/html

COPY ./nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf
COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# права
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80 443

CMD ["/usr/bin/supervisord"]
