FROM library/ubuntu:16.10

# 修改成阿里源
ADD ./sources.list /etc/apt
RUN apt-get update

RUN apt-get -y install php
RUN apt-get -y install nginx
RUN apt-get -y install curl
RUN apt-get -y install zip
RUN apt-get -y install git

RUN echo "mysql-server mysql-server/root_password password 123456" | debconf-set-selections && \
echo "mysql-server mysql-server/root_password_again password 123456" | debconf-set-selections  && \
apt-get -y install mysql-server
RUN apt-get -y install php-curl php-gd php-mysql php-mbstring

# composer install
RUN php -r "copy('https://install.phpcomposer.com/installer', 'composer-setup.php');" && \
php composer-setup.php && \
php -r "unlink('composer-setup.php');" && \
mv composer.phar /usr/local/bin/composer && \
composer config -g repo.packagist composer https://packagist.phpcomposer.com && \
composer self-update
# 添加composer path
ENV PATH="/root/.composer/vendor/bin:${PATH}"

RUN composer global require "laravel/installer"

#clean
RUN apt-get clean