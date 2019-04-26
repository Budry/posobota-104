FROM php:7-apache

RUN apt-get update && apt-get install -y libpng-dev libzip-dev libxml2-dev

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    php composer-setup.php --install-dir=/bin \
    php -r "unlink('composer-setup.php');"

RUN docker-php-ext-install pdo_mysql gd iconv zip

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

RUN printf '[PHP]\ndate.timezone = "Europe/Prague"\n' > /usr/local/etc/php/conf.d/tzone.ini
RUN touch /usr/local/etc/php/conf.d/uploads.ini \
    && echo "upload_max_filesize = 1G;" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "upload_max_filesize = 1G;"  >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 1G;"  >> /usr/local/etc/php/conf.d/uploads.ini

RUN a2enmod rewrite
RUN a2enmod headers

COPY . /var/www/html/
WORKDIR /var/www/html/