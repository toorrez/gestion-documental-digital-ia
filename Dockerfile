
FROM php:8.4-cli

ARG UID=1000
ARG GID=1000

WORKDIR /var/www/html

RUN sed -i 's/http:/https:/g' /etc/apt/sources.list.d/debian.sources \
    || sed -i 's/http:/https:/g' /etc/apt/sources.list

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    libpng-dev \
    libxml2-dev \
    libonig-dev \
    libssl-dev \
    pkg-config \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        bcmath \
        zip \
        xml \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN groupadd -g ${GID} laravel \
    && useradd -m -u ${UID} -g ${GID} -s /bin/bash laravel

ENV HOME=/home/laravel

USER laravel

EXPOSE 8000

CMD ["bash"]
