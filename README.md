<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## First Setup

### 1. Run Composer Install
After clone the repo run command below to download all packages needed by laravel.
run this command
    
```
composer install
```

### 2. Setup Environment
Copy file **".env.example"** and rename it as **".env"**. fill the .env file according to your local environtment This file is the environtment of the application. For Testing Environtment, you can fill it in the **"phpunit.xml"** file. fill it according your testing environtment.

> DONT FORGET TO SETUP YOUR TESTING ENVIRONTMENT IF YOU RUNNING THE TESTING. IT POTENTIALLY REMOVE EXISTING DATA IN DATABASE WHILE TESTING RUNNING.

### 3. Generate Key
Generate key .env file with below command.
```
php artisan key:generate
```

### 4. Install Node Module for FE
Install node module to get All packages for Vue js as Front End framework
```
npm install
```
After that Compile and build the Vue Js with below Code
```javascript
npm run dev
```

### 5. Running Laravel Server
Running Laravel Server with below Command
```console
php artisan serve
```

<p>&nbsp;</p>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


<p>&nbsp;</p>

### Notes
----------
 1. laravel feature testing only works well with Database auto transaction (DB::transaction), and not works with manual transaction (DB::begintransaction, DB::commit) it will pass the manual transaction even if there is not DB::commit. 