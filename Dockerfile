FROM php:8.2-apache-buster

RUN apt-get update && apt-get install -y locales \ 
	locales-all \
	git \
	zip \
	unzip \
	libfreetype6-dev \
	libjpeg-dev \
	libpng-dev \
	libonig-dev \
	libzip-dev \
	mariadb-client \
	libxslt-dev \
	wkhtmltopdf \
	librabbitmq-dev

RUN docker-php-source extract \
    && mkdir /usr/src/php/ext/amqp \
    && curl -L https://github.com/php-amqp/php-amqp/archive/master.tar.gz | tar -xzC /usr/src/php/ext/amqp --strip-components=1

RUN apt-get install -y  zlib1g-dev libicu-dev libpq-dev imagemagick git default-mysql-client\
	&& docker-php-ext-install opcache \
	&& docker-php-ext-install intl \
	&& docker-php-ext-install pdo_mysql \
	&& docker-php-ext-install zip \
	&& docker-php-ext-install xsl \
	&& docker-php-ext-install amqp \
	&& docker-php-ext-enable amqp 

RUN docker-php-ext-install mysqli xsl

COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/030-custom.ini
COPY ./docker/apache/vhost/host.conf /etc/apache2/sites-enabled/000-default.conf

RUN docker-php-ext-install gd
RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/local/bin --filename=composer \
	&& chmod +sx /usr/local/bin/composer

RUN a2enmod rewrite

WORKDIR /var/www

COPY composer.* ./

# RUN composer install --no-plugins --no-scripts

COPY . .