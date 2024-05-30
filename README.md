<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Run Laravel with SQLite

1. Create env file using env.example
2. Install composer `composer install`
3. And remember to generate your key: `php artisan key:generate`
4. Run migrations `php artisan migrate`
5. Run server `php artisan serve`

## Run Laravel with MySQL

1. Create env file using env.example and change DB_CONNECTION=mysql and uncomment:
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel
   DB_USERNAME=root
   DB_PASSWORD=
   to put your database credentials.

2. Install composer `composer install`
3. And remember to generate your key: `php artisan key:generate`
4. Run migrations `php artisan migrate`
5. Run server `php artisan serve`

## Consume API

### Create a new student

POST http://localhost:8000/api/students

```
{
  "name": "Victor",
  "email": "balvirp6@gmail.com"
}
```

### Get all students

GET http://localhost:8000/api/students

### Get by Criteria

GET http://localhost:8000/api/studentscriteria

```
{
  "name": "Victor",
  "email": "balvirp6@gmail.com"
}
```
