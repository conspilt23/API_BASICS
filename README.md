<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


# API Documentation

This folder contains API documentation and Postman collections for this Laravel project.

---

## Running Tests

To run all feature tests included in this project, use the following command:

<code>php artisan test</code>

This will run all automated tests to verify the correctness of the API.

## Postman Collection
You can use the Postman collection included here to quickly test and explore the API.

File path: /docs/postman/product-api.postman_collection.json

## Import to Postman:

Open Postman

Click on Import

Select File and choose this JSON file

The collection will appear in your workspace

## API Base URL
The API endpoints are prefixed with /api

Example base URL for local development: http://your-app.test/api

## Endpoints Overview
<code>
GET /api/products
Retrieves a paginated list of products.

GET /api/products/{product_id}
Retrieves a single product by ID.

POST /api/products
Creates a new product. Requires JSON payload.

PUT /api/products/{product_id}
Updates an existing product.

DELETE /api/products/{product_id}
Deletes a product.

GET /api/products/{product_id}/prices
Lists all prices for a given product.

POST /api/products/{product_id}/prices
Creates or updates a price for a product in a given currency.
</code>

## Authentication
This API does not require authentication for testing purposes.

If you add auth later, include tokens or credentials accordingly.

## Using the API with Postman
Ensure the base URL is set correctly (e.g., http://your-app.test/api).

Use the pre-made requests in the imported Postman collection.

For POST and PUT requests, use JSON body as specified in each request.

No need to add CSRF tokens since this is a stateless API.

## Example JSON Payloads
## Create Product
<code>
{
  "name": "Example Product",
  "description": "Description here",
  "price": 100.00,
  "currency_id": 1,
  "tax_cost": 5.00,
  "manufacturing_cost": 10.00
}
</code>

## Create Product Price
<code>
{
  "currency_id": 1,
  "price": 49.99
}
</code>

## Further Documentation
For more detailed docs, refer to:

Laravel official docs: https://laravel.com/docs

API resource classes and controllers in /app/Http/Controllers/Api

## Postman environment variables and tests can be customized as needed.

Contact & Support
If you find bugs or want to contribute, please open an issue or PR in the project repository.

Thank you for using this Laravel API project!