<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Task Management System

## Description
A Laravel-based Task Management System that allows users to register, log in, log out and manage tasks. It includes both web and API interfaces.

## Features
- User Authentication (Laravel Breeze & Sanctum)
- Task CRUD Operations
- Task Filtering and Sorting
- API with Sanctum Authentication

## Installation
1. Clone the repository:   
 ```bash
   git clone https://github.com/yourusername/task-management.git
- composer install
- npm install   
- copy .env.example .env
- php artisan key:generate
- php artisan migrate
- php artisan migrate:refresh --seed
- php artisan serve and
- npm run dev

## There have 3 users
- emails 1. tomal@gmail.com, 2. hasan@gmail.com, 3. arif@gmail.com
- password: 12345678 (all)
** And you can make Register and login as </b>your wish</b>and dive the TMS Application

API Documentation
Public Routes
Register: POST /api/register
Login: POST /api/login
Get all Tasks: GET /api/all/tasks
Get one Task: GET /api/tasks/{id}

CRUD Operations (Private Routes)
Create Task: POST /api/tasks/store
Update Task: PUT /api/tasks/{id}
Delete Task: DELETE /api/tasks/{id}
Logout: POST /api/logout

