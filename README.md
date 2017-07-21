web
--

1. all project list
2. project tasks
3. project task detail

--build

KEY-WORD
- ENV
- BUILDER

KEY-WORD-EVENT
    - PREPARE-BUILD
    - BEFORE-BUILD
    - AFTER-BUILD
    - FINISH-BUILD

BUILDING
    - PREPARE-BUILD
    - BEFORE-BUILD
    - AFTER-BUILD
    - FINISH-BUILD


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