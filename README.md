<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
This project runs with Laravel version 9.

## Getting started

Assuming you've already installed on your machine: [XAMPP](https://www.apachefriends.org/),(PHP >= 8.1.6), [Laravel](https://laravel.com), [Composer](https://getcomposer.org) and NPM [Node.js](https://nodejs.org).

``` bash
# install dependencies
composer install
npm install

# create .env file and generate the application key
copy .env.example .env
php artisan key:generate
```
``` bash
# create Database (ajax) on your machine and then run this command
php artisan migrate --seed
```
Then launch the server:
``` bash
php artisan serve
```

The Laravel sample project is now up and running! Access it at http://localhost:8000.
