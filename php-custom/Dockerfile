FROM alpine:latest
RUN apk update && \
    apk add --no-cache sed icu-data-full bash php81 php81-fpm php81-pecl-imagick \
    php81-iconv \
    php81-mysqli \
    php81-mysqlnd \
    php81-openssl \
    php81-pcntl \
    php81-pdo_mysql \
    php81-ctype \
    php81-calendar \
    php81-curl \
    php81-exif \
    php81-fileinfo \
    php81-json \
    php81-session \
    php81-tokenizer \
    php81-zip \
    php81-intl \
    php81-simplexml
EXPOSE 9000
WORKDIR /app

CMD [ "php-fpm81", "-F", "--pid", "/tmp/php-fpm.pid"]

