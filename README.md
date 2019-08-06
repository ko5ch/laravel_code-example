## Install

```
git clone https://github.com/ko5ch/laravel_code-example.git
docker-compose up
```
then add to your hosts file:

```
127.0.0.1 demo.local #Linux

10.0.75.2 demo.local #Windows
```

install dependencies with composer:
```
composer install 
```

copy .env file:
```
cp .env.example .env #Linux

copy .env.example .env #Windows
```

create these folders under storage/framework:
```
mkdir sessions
mkdir views
mkdir cache
```

entering to container from project folder:

```
cd laravel_code-example

docker exec -ti todoko5ch_app bash
```
or
```
docker exec -ti todoko5ch_app /bin/bash
```
migration and seeders command:
```
php artisan boss
```

generate application key:
```
php artisan key:generate
```

## DONE!
