<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Run Locally

Clone the project

```bash
  git clone https://github.com/AkmalIrsyad/wedding-website-jewepe-16.git
```

Go to the project directory

```bash
  cd wedding-website-jewepe-16
```

## Environment Variables
create database and import `wedding_db.sql` 
To run this project, you will need to add the following environment variables to your .env file

```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=wedding_db
DB_USERNAME=(your username)
DB_PASSWORD=(your password)
```



Start the server

```bash
  php artisan serve
```



## Demo

http://127.0.0.1:8000/beranda (pengguna)

![App Screenshot](/public/img/landing.png)

http://127.0.0.1:8000/login (admin)
![App Screenshot](/public/img/login_admin.png)

