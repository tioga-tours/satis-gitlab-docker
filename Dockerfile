FROM php:7.4-cli-alpine

RUN mkdir -p /app/data && mkdir /app/public
ADD ./conf.dist /app/conf.dist
ADD ./scripts /app/scripts
ADD ./vendor /app/vendor
ADD ./README.md /app/README.md
ADD ./LICENSE /app/LICENSE
CMD PHP_CLI_SERVER_WORKERS=4 php -S 0.0.0.0:80 -t /app/public /app/scripts/router.php
