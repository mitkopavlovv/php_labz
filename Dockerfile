FROM ubuntu:bionic

USER root

ENV DEBIAN_FRONTEND noninteractive
RUN apt update -y && apt install -y apache2 
RUN apt install -y php libapache2-mod-php php-mysql php-xdebug

WORKDIR /var/www/html

COPY ./code .
COPY ./apache2_container/apache2.conf /etc/apache2/apache2.conf
#COPY ./apache2_container/php.ini /usr/local/etc/php/7.2/php.ini
#COPY ./apache2_container/xdebug.ini /etc/php/7.2/mods-available/xdebug.ini
RUN phpenmod xdebug

EXPOSE 80

ENTRYPOINT [ "/usr/sbin/apache2ctl", "-D", "FOREGROUND" ]