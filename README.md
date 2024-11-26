# Sirma entry task

Pair of employees who have worked together

## System requirements

- PHP 8.3
- Composer 2
- NPM

## Installation


1. Clone the project
2. Run in the root directory:
```
composer install --ignore-platform-reqs

npm install

php artisan serve
```

3. Copy .env.example into .env
4. Setup a DB connection using .env variables:

```
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

5. Run:

```

php artisan migrate

```

6. Open http://localhost:8000
