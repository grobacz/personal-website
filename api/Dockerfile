FROM php:7.4
EXPOSE 80

WORKDIR /api

COPY --from=composer:2.0 /usr/bin/composer /usr/local/bin/composer
RUN apt update && apt install -y git libpq-dev unzip
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
    docker-php-ext-install pdo pdo_pgsql pgsql sockets

COPY . /api
RUN mkdir -p /run/secrets && cp /api/.secrets/* /run/secrets/

ENTRYPOINT ./spiral serve -v -d