## Student Management System

## Getting started

Fork this repository, then clone your fork, and run this in your newly created directory:

``` bash
composer install
```

Next you need to make a copy of the `.env.example` file and rename it to `.env` inside your project root.

Run the following commands:
```
php artisan migrate
```
```
php artisan db:seed --class=StudentsTableSeeder
```

```
php db:seed --class=TeachersTableSeeder
```

Then start your server:

```
php artisan serve
```
