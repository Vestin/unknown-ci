unknown-ci
---
@vestin

queue
```
php artisan queue:work --queue=task --tries=1
```

environment
---
* php>7.0
* nginx
* mysql


install
---
```
git clone https://git.coding.net/bombzds/unknown-ci.git
cd unknown-ci/src
composer install
```
config
```
cp .env.example .env
php artisan key:generate
```
edit .evn file fit your environment

migrate
```
php artisan migrate
```

directory permissions
```
chown www-data:www-data -R src/storage/
chown www-data:www-data -R src/bootstrap/cache/
```

web server
see nginx conf example in `dev/nginx/unknow`

start queue worker
```
php artisan queue:worker --queue:task
```