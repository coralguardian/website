FROM webdevops/php-nginx:8.2-alpine
EXPOSE 80
COPY . /app
COPY .docker/conf/nginx/default.conf /opt/docker/etc/nginx/vhost.conf
RUN chown application:application /app -R
RUN chmod 770 /app -R
RUN APP_ENV=prod composer2 install -d /app
WORKDIR /app
