FROM php:8.0.3-fpm-alpine3.13

LABEL maintainer="gianiaz@gmail.com"

# workaround for https://github.com/docker-library/php/issues/240
RUN apk add --no-cache --repository http://dl-cdn.alpinelinux.org/alpine/edge/community/ gnu-libiconv
ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php

RUN apk --no-cache add \
        git \
        icu-dev \
        vim \
        zip \
        zsh \
    && docker-php-ext-install -j5 \
        intl \
        opcache \
        pcntl \
    && php -m

WORKDIR /var/www/ddd

 ## Utente non-root (no sudo)
RUN adduser -D -u 1000 gianiaz -G www-data \
    && mkdir -p /home/gianiaz \
    && chown -R gianiaz /home/gianiaz \
    && chown -R gianiaz /var/www/ddd \
 ## Composer and accounts
    && curl -sS https://getcomposer.org/installer | php -- \
        --install-dir=/usr/local/bin \
        --filename=composer

USER gianiaz

 ## ZSH / OhMyZsh
RUN sh -c "$(curl -fsSL https://raw.github.com/ohmyzsh/ohmyzsh/master/tools/install.sh)"
COPY zsh-config.sh /home/gianiaz/.zshrc
ENV TERM xterm-256color
