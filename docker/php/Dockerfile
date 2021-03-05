FROM php:7.4-fpm-alpine

ENV TIMEZONE Europe/Moscow

RUN apk upgrade --update && apk --no-cache add \
    autoconf tzdata file g++ gcc binutils isl libatomic libc-dev \
    musl-dev make re2c libstdc++ libgcc libcurl curl-dev mpc1 gmp libgomp \
    coreutils freetype-dev libjpeg-turbo-dev libltdl libmcrypt-dev libpng-dev \
    openssl-dev libxml2-dev expat-dev oniguruma libzip-dev postgresql-dev bash \
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install -j$(nproc) iconv mysqli pdo_mysql pdo_pgsql curl zip opcache \
    && pecl install xdebug-2.9.6 && docker-php-ext-enable xdebug

RUN curl -sL 'https://deb.nodesource.com/setup_12.x' -o nodesource_setup.sh ; \
    bash nodesource_setup.sh; \
        apk add nodejs
###> Yarn ###
RUN apk add yarn
###< Yarn ###

RUN curl -L -C - --progress-bar -o /usr/local/bin/composer https://getcomposer.org/composer.phar
RUN chmod 755 /usr/local/bin/composer
RUN composer config --global repo.packagist composer https://packagist.org
# TimeZone
RUN cp /usr/share/zoneinfo/${TIMEZONE} /etc/localtime \
&& echo "${TIMEZONE}" >  /etc/timezone

RUN wget https://get.symfony.com/cli/installer -O - | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

ADD php.ini /etc/php/conf.d/
ADD php.ini /etc/php/cli/conf.d/
ADD php.ini /usr/local/etc/php
ADD php-fpm.conf /etc/php/php-fpm.d/

#WORKDIR /var/www/symfony

EXPOSE 9000

#ADD entrypoint.sh /entrypoint

#ENTRYPOINT ["/entrypoint"]

CMD ["php-fpm"]