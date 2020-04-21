FROM php:7.2-apache
RUN a2enmod rewrite
RUN apt-get update && apt-get install -y mariadb-client git zip unzip stunnel \
  &&  docker-php-ext-install pdo_mysql 
RUN pecl install redis-5.1.1 \
  && docker-php-ext-enable redis
COPY redis-cli.conf /etc/stunnel/redis-cli.conf
COPY DocumentRoot/ /var/www/html/
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN cd /var/www/html && /usr/local/bin/composer install
COPY wrapper_script.sh wrapper_script.sh
CMD ./wrapper_script.sh
