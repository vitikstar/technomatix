FROM php:7
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli
