FROM webdevops/php-apache:7.4
WORKDIR "/application/webroot"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        php7.4-ldap \ 
        php7.4-mysql \
        php7.4-mbstring \ 
        php7.4-pdomysql \
        php7.4-xdebug; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
