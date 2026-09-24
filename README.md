# Countries API

A RESTful API built with Laravel and Laravel Sanctum for token-based authentication.

## Features

- User registration & login with Sanctum tokens
- Full CRUD for countries
- Token-protected routes
- Request validation with `sometimes`/`nullable` rules
- Clean JSON responses

## Tech Stack

- Laravel 13
- MySQL
- Laravel Sanctum

## API Endpoints

### Auth (public)

| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/register` | Register a new user |
| POST | `/api/login` | Login and receive a token |

### Auth (protected — require `Authorization: Bearer <token>`)

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/me` | Get the authenticated user |
| POST | `/api/logout` | Revoke the current token |

### Countries (protected)

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/countries` | List all countries |
| POST | `/api/countries` | Create a country |
| GET | `/api/countries/{id}` | Show one country |
| PUT/PATCH | `/api/countries/{id}` | Update a country |
| DELETE | `/api/countries/{id}` | Delete a country |

## Setup

```bash
git clone https://github.com/YOUR_USERNAME/countries-api.git
cd countries-api
composer install
cp .env.example .env
php artisan key:generate
# edit .env with your DB credentials
php artisan migrate
php artisan serve
