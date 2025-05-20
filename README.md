## About Evocommerce test

Product Orders API is a minimal Laravel-based application that allows creating, updating, and managing customer orders. Each order contains customer information and a list of products with quantities and prices. The API is designed with RESTful principles and supports basic CRUD operations for products and orders.

## Getting Started

Clone the repository:
<pre><code>git clone https://github.com/Pykipsi/evocommerce-test.git</code></pre>

Go to project:
<pre><code>cd evocommerce-test</code></pre>

<pre><code>composer install</code></pre>
Set up environment variables:



- Copy .env.example to .env.
- Configure your database connection in the .env file.

Run migrations and seeders:
<pre><code>php artisan migrate --seed</code></pre>

Start server:
<pre><code>php artisan serv</code></pre>

## Authentication (via Laravel Sanctum)

This project uses Laravel Sanctum for API authentication. Users can register, login.


## API Endpoints

Products

- GET /api/products – List all products
- POST /api/products – Create a new product
- GET /api/products/{id} – Get single product
- PATCH /api/products/{id} – Update product
- DELETE /api/products/{id} – Delete product

Orders

- POST /api/orders – Create a new order
- GET /api/orders/{id} – Get single order (with products)


Authentication Endpoints

- /api/register - Registers a new user.

    Request Body:
<pre><code>{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password"
}</code></pre>

- POST /api/login - Logs in an existing user.

  Request Body:
<pre><code>{
  "email": "john@example.com",
  "password": "password"
}</code></pre>
