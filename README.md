# Postuler

A job-offers website built with Laravel (Blade + PHP). This repository contains the source code for a platform to publish, browse and apply to job offers.

> Description: job offers website

---

## Table of contents

- [Features](#features)
- [Tech stack](#tech-stack)
- [Prerequisites](#prerequisites)
- [Local installation](#local-installation)
- [Docker (optional)](#docker-optional)
- [Environment variables](#environment-variables)
- [Database](#database)
- [Running the app](#running-the-app)
- [Testing](#testing)
- [Project structure (where to look)](#project-structure-where-to-look)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

---

## Features

- Create, list and manage job offers
- Apply to offers (applicant flow)
- Admin panel for managing offers and applications
- Blade-based server-rendered UI; small progressive enhancements with JavaScript/Vue where needed
- Docker-friendly configuration for reproducible environments

(Adjust the list above to match the actual implemented features in the repository.)

---

## Tech stack

- PHP (Laravel)
- Blade templates (server-side UI)
- JavaScript / Vue (small client-side components)
- Docker (optional)
- MySQL / Postgres (configurable via env)

This repo's primary languages are Blade and PHP with small amounts of JavaScript and Vue.

---

## Prerequisites

- PHP 8.0+ (or the version compatible with the project)
- Composer
- Node.js & npm / Yarn (for frontend assets)
- A database server (MySQL, MariaDB or Postgres)
- Git

If you plan to use Docker, only Docker and Docker Compose are required.

---

## Local installation

1. Clone the repository
   ```
   git clone https://github.com/SaberToua/postuler.git
   cd postuler
   ```

2. Install PHP dependencies
   ```
   composer install
   ```

3. Copy the environment file and set values
   ```
   cp .env.example .env
   ```

4. Generate application key
   ```
   php artisan key:generate
   ```

5. Install frontend dependencies and compile assets
   ```
   npm install
   npm run dev
   ```
   or, for production builds:
   ```
   npm run build
   ```

6. Create storage symlink (if needed)
   ```
   php artisan storage:link
   ```

7. Run migrations and (optionally) seeders
   ```
   php artisan migrate
   php artisan db:seed
   ```

8. Start the development server
   ```
   php artisan serve
   ```
   The app will typically be available at http://127.0.0.1:8000

---

## Docker (optional)

A Dockerfile / docker-compose setup may be included. To run with Docker (example generic steps):

1. Build and start containers
   ```
   docker-compose up -d --build
   ```

2. Run migrations inside the app container
   ```
   docker-compose exec app php artisan migrate --seed
   ```

Adjust docker-compose service names/commands to your repository's configuration.

---

## Environment variables

Important env variables to set in `.env`:

- APP_NAME, APP_ENV, APP_KEY, APP_URL
- DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
- MAIL_MAILER, MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD, MAIL_FROM_ADDRESS, MAIL_FROM_NAME
- BROADCAST_DRIVER, CACHE_DRIVER, QUEUE_CONNECTION, SESSION_DRIVER

Check `.env.example` for the full list used by the project and fill in values appropriate for your environment.

---

## Database

- Migrations are located in `database/migrations`.
- Seeders are located in `database/seeders`.
- Models are typically under `app/Models`.

To reset and migrate:
```
php artisan migrate:fresh --seed
```

Be cautious running destructive commands in production.

---

## Running tests

If the project includes tests:
```
php artisan test
```
or with PHPUnit directly:
```
vendor/bin/phpunit
```

Add or update tests under `tests/` as needed.

---

## Project structure (where to look)

Typical Laravel structure used by this project:

- app/ — core PHP code (Models, Http/Controllers, Policies)
- resources/views/ — Blade templates (UI)
- routes/web.php — web routes
- database/ — migrations & seeders
- public/ — web entry (assets)
- docker/ or Dockerfile, docker-compose.yml — docker configuration (if present)

Adjust these paths to the actual layout if the repository differs.

---

## Contributing

Thank you for considering contributing!

- Fork the repo
- Create a feature branch: `git checkout -b feat/your-feature`
- Commit changes and push: `git push origin feat/your-feature`
- Open a pull request with a clear description of changes

Please follow any contribution guidelines or code styles used in the project. Add tests for bug fixes and new features where applicable.

---

## License

This repository does not include a license file by default. To define permissions, add a LICENSE file (for example the MIT license). If you are the repository owner and want to use the MIT license, add a `LICENSE` file with the MIT text.

---

## Contact

Maintainer: [SaberToua](https://github.com/SaberToua)

If you need help or want to report an issue, please open an issue on the repository.

---

Thank you for using Postuler — a job offers website. Feel free to improve this README with project-specific commands, screenshots, or deployment notes.
