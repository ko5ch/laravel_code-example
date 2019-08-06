## Install

```
git clone https://github.com/ko5ch/laravel_code-example.git
docker-compose up
```
then add to your hosts file

```
127.0.0.1 demo.local #Linux

10.0.75.2 demo.local #Windows
```

entering to container:

```
docker exec -ti todoko5ch_app bash
```

migration and seeders command:
```
php artisan boss
```
