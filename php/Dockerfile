FROM php:8.0-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y
RUN apt-get install -y python3 pip
RUN pip install matplotlib
RUN pip install mysql-connector
RUN pip install pandas