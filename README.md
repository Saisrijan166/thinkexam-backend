# ThinkExam — Backend API

Laravel REST API for ThinkExam, a computer-based testing (CBT) platform. Provides authentication, candidate management, test/event configuration, and reporting for the [thinkexam-frontend](https://github.com/Saisrijan166/thinkexam-frontend) admin dashboard.

## Features

- Authentication via Laravel Sanctum
- Candidate management endpoints (CRUD, table/listing views)
- Test and event configuration endpoints
- Reporting endpoints for exam/candidate results
- Profile management
- Interactive API documentation via Swagger (l5-swagger)

## Tech Stack

- PHP 8.2, Laravel 11
- Laravel Sanctum (authentication)
- L5-Swagger (API documentation)

## Architecture

This is the backend half of a two-repo system:

- **Backend** (this repo) — Laravel REST API, business logic, persistence
- **[thinkexam-frontend](https://github.com/Saisrijan166/thinkexam-frontend)** — React admin dashboard consuming this API

## Getting Started

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Configure your database and other environment variables in `.env` before running migrations. Once running, API docs are available at the `/api/documentation` route (Swagger UI).
