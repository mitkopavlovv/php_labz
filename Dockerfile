FROM ubuntu:bionic

USER root

ENV DEBIAN_FRONTEND noninteractive
RUN apt update -y && apt install -y apache2 
RUN apt install -y php libapache2-mod-php php-mysql 

WORKDIR /var/www/html

COPY ./code .

EXPOSE 80

ENTRYPOINT [ "/usr/sbin/apache2ctl", "-D", "FOREGROUND" ]