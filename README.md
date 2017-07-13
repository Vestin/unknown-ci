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

tests
```
./vendor/bin/codecept run
```

code coverage
```
./vendor/bin/codecept run --coverage --coverage-html
```