FROM webdevops/php-nginx:8.2-alpine
COPY source/ /app
COPY .docker/conf/nginx/default.conf /opt/docker/etc/nginx/vhost.conf
COPY .docker/conf/known_hosts /root/.ssh/known_hosts
RUN chown application:application /app -R
RUN chmod 775 /app -R
ARG GIT_TOKEN
ENV GIT_TOKEN=${GIT_TOKEN}
RUN APP_ENV=prod composer2 config --global github-oauth.github.com "${GIT_TOKEN}"
RUN APP_ENV=prod composer2 install -d /app
WORKDIR /app
