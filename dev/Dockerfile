FROM library/php:7.1-fpm

# 修改成阿里源
RUN echo 'deb http://mirrors.aliyun.com/debian jessie main' > /etc/apt/sources.list
RUN echo 'deb http://mirrors.aliyun.com/debian jessie-updates main ' >> /etc/apt/sources.list
RUN apt-get update

# text editor
RUN apt-get install -y vim zip
# git
RUN apt-get install -y git
# nginx
RUN apt-get install -y nginx
# node&npm&vue-cli

# 安装php扩展
RUN docker-php-ext-install pdo pdo_mysql zip

WORKDIR /var
RUN apt-get install -y wget
RUN wget https://npm.taobao.org/mirrors/node/v8.1.3/node-v8.1.3-linux-x64.tar.gz && \
tar -zxvf node-v8.1.3-linux-x64.tar.gz && \
rm -rf /var/node-v8.1.3-linux-x64.tar.gz

ENV PATH="/var/node-v8.1.3-linux-x64/bin:${PATH}"

# npm install
RUN npm install -g cnpm --registry=https://registry.npm.taobao.org && \
cnpm install -g vue-cli
# composer install
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
php composer-setup.php && \
php -r "unlink('composer-setup.php');" && \
mv composer.phar /usr/local/bin/composer

#clean
RUN apt-get clean