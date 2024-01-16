FROM webdevops/php-nginx:8.2-alpine
EXPOSE 80
COPY source/ /app
COPY .docker/conf/nginx/default.conf /opt/docker/etc/nginx/vhost.conf
RUN chown application:application /app -R
RUN chmod 775 /app -R
WORKDIR /app
