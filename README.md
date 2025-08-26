# Laravel E-commerce Store

## Overview
This project is a fully functional e-commerce application built with Laravel. It provides a scalable and secure foundation for building online stores, including features for product management, user authentication, shopping cart, and order processing. The system is designed with clean architecture and can be extended to support advanced e-commerce requirements such as payment integration, product reviews, and inventory management.

---

## Features
- User authentication with registration and login  
- Role-based access (Admin and User)  
- Product listing, details, and categories  
- Shopping cart functionality  
- Order placement and checkout process  
- Admin dashboard for managing products and orders  
- Middleware-based access control  
- Responsive design for better user experience  

---

## Requirements
- PHP 8.1 or higher  
- Composer  
- Node.js and NPM  
- MySQL or any supported database  
- Laravel 11.x  

---

## Installation
1. Clone the repository into your local machine.  
2. Run `composer install` to install dependencies.  
3. Copy `.env.example` to `.env` and configure database and environment variables.  
4. Run `php artisan key:generate` to generate the application key.  
5. Run `php artisan migrate` to set up the database.  
6. Install frontend dependencies with `npm install` and build assets with `npm run dev`.  
7. Start the server with `php artisan serve`.  

---

## Usage
- Access the application at `http://localhost:8000`.  
- Register a new account or log in with existing credentials.  
- Admin users can manage products and orders from the dashboard.  
- Regular users can browse products, add them to the cart, and place orders.  

---

## Folder Structure
- `app/` – Application logic including Models, Controllers, Middleware  
- `routes/` – All route definitions (web and API)  
- `resources/views/` – Blade templates for frontend  
- `database/migrations/` – Database schema definitions  
- `public/` – Publicly accessible files like CSS, JS, and images  

---

## License
This project is open-source and available under the MIT license.

---
