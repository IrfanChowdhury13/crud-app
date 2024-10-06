# Simple Product CRUD Application

----

#### Quick Overview:


This project is a Simple Product CRUD Application built with Laravel 11. The app allows you to perform basic CRUD operations (Create, Read, Update, Delete) on products. It features an intuitive interface for managing product details, including product name, price, description, and images.


##### Visual Overview:




----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/11.x/installation)

Clone the repository

    git clone https://github.com/IrfanChowdhury13/carrental-app.git

Switch to the repo folder

    cd carrental-app

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/IrfanChowdhury13/carrental-app.git
    cd carrental-app
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding & backup


    Run the database seeder

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh


* Also, there is a backup database file included in database folder named 'database.sql'
    
----------


## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------