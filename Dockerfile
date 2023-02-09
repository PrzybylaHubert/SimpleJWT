FROM php:8.2-apache

RUN a2enmod rewrite
 
RUN apt-get update && apt-get install -y libzip-dev wget openssl git zip \
  && apt-get install -y libpq-dev \
  && docker-php-ext-install pgsql pdo pdo_pgsql
  
RUN wget https://getcomposer.org/download/2.4.4/composer.phar \ 
    && mv composer.phar /usr/bin/composer && chmod +x /usr/bin/composer

COPY docker/apache.conf /etc/apache2/sites-enabled/000-default.conf
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod 777 /entrypoint.sh
COPY . /var/www

WORKDIR /var/www

RUN composer install -n

RUN chmod 777 /var/www/var/ -R

CMD ["apache2-foreground"]

ENTRYPOINT ["/entrypoint.sh"]
