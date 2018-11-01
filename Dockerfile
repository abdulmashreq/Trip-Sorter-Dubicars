FROM php:7.1-apache
COPY . /var/www/html/
RUN chmod -R 777 /var/www/html/

RUN apt-get update && \
    apt-get install -y git zip unzip && \
    php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer && \
    apt-get -y autoremove && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN composer install
RUN a2enmod rewrite
EXPOSE 8002

RUN curl -O https://phar.phpunit.de/phpunit-6.0.13.phar
RUN chmod +x phpunit-6.0.13.phar
RUN mv phpunit-6.0.13.phar /usr/local/bin/phpunit
RUN cd tests && phpunit TripApiTest.php 

