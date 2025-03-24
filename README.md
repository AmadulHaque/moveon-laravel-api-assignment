# Product Service API

## Overview
This API provides a simple product management system, including features to create, retrieve, update, and delete products. It is built using Laravel and follows a clean architecture with DTOs and service layers for maintainability and scalability.

## Design Choices

### 1. **Service-Oriented Architecture**
   - The business logic is encapsulated within a `ProductService`, keeping controllers thin.
   - This promotes separation of concerns and makes unit testing easier.

### 2. **DTOs (Data Transfer Objects)**
   - Used to enforce data consistency when transferring data between layers.
   - Ensures validation before passing data to the service layer.

### 3. **Transactions for Database Integrity**
   - Database operations are wrapped in transactions to ensure consistency in case of failures.

### 4. **Dependency Injection**
   - The `ProductServiceInterface` is injected into the controller, making the system more modular and testable.

## Database Schema

The `products` table schema:

| Column      | Type         | Description                      |
|------------|-------------|----------------------------------|
| id         | INT (PK)     | Auto-incrementing primary key   |
| name       | STRING       | Product name                    |
| description| TEXT         | Product description             |
| price      | DECIMAL(10,2)| Product price                   |
| category   | STRING       | Product category                |
| image_url  | STRING       | URL of the product image        |
| created_at | TIMESTAMP    | Timestamp of creation           |
| updated_at | TIMESTAMP    | Timestamp of last update        |

## API Endpoints

### 1. **Create Product**
   - **Endpoint:** `POST /api/products`
   - **Request Body:**
   ```json
   {
       "name": "Laptop",
       "description": "High-performance laptop",
       "price": 1200.99,
       "category": "Electronics",
       "image_url": "http://example.com/laptop.jpg"
   }
   ```
   - **Response:** `201 Created`

### 2. **Retrieve Product by ID**
   - **Endpoint:** `GET /api/products/{id}`
   - **Response:** `200 OK`
   ```json
   {
       "id": 1,
       "name": "Laptop",
       "description": "High-performance laptop",
       "price": 1200.99,
       "category": "Electronics",
       "image_url": "http://example.com/laptop.jpg"
   }
   ```

### 3. **Update Product**
   - **Endpoint:** `PUT /api/products/{id}`
   - **Request Body:** Same as Create Product.
   - **Response:** `200 OK`

### 4. **Delete Product**
   - **Endpoint:** `DELETE /api/products/{id}`
   - **Response:** `204 No Content`

## Dependencies

- **Laravel 12+** (PHP framework)
- **MySQL** (Relational Database)
- **Mockery** (For Unit Testing Mocks)
- **PHPUnit** (Testing Framework)
- **Faker** (For generating test data)

## Installation

1. Clone the repository:
   ```sh
   https://github.com/AmadulHaque/moveon-laravel-api-assignment
   ```
2. Install dependencies:
   ```sh
   composer install
   ```
3. Configure environment variables:
   ```sh
   cp .env.example .env
   ```
   - Set database credentials.
4. Run migrations:
   ```sh
   php artisan migrate --seed
   ```
5. Start the development server:
   ```sh
   php artisan serve
   ```

## Running Tests

```sh
php artisan test
```

---
This API follows best practices in Laravel application development, ensuring scalability, maintainability, and security.

