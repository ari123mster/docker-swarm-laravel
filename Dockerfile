FROM php:7.4-fpm


RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl
WORKDIR /var/www/html
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-enable pdo_mysql
RUN rm -rf /var/cache/apk/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN usermod -u 1000 www-data
COPY . /var/www/html
COPY --chown=www-data:www-data . /var/www/html
USER www-data
EXPOSE 9000
CMD ["php-fpm"]
