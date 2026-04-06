# Scrap Collection Management System

A web application built using **Laravel (PHP Framework)** for managing scrap item collection and service requests.
This system allows users to submit scrap items (such as electronics or appliances) and helps service providers manage pickup requests and scrap listings.

The project demonstrates backend development using **Laravel MVC architecture**, database integration, and dynamic Blade templates.

---

## Tech Stack

* PHP
* Laravel Framework
* MySQL Database
* Blade Template Engine
* JavaScript
* Tailwind CSS
* Vite

---

## Features

* Scrap item submission and listing
* Dynamic website pages
* Database-driven content
* Contact or inquiry form
* Responsive frontend interface
* MVC architecture using Laravel
* Clean project structure for scalability

---

## Project Structure

Key Laravel directories used in this project:

```
app/            Application controllers and models
bootstrap/      Framework bootstrap files
config/         Configuration settings
database/       Database migrations and seeds
public/         Public assets and entry point
resources/      Blade templates and frontend assets
routes/         Application routes
storage/        Application storage
tests/          Test files
```

Important project files:

```
artisan
composer.json
package.json
vite.config.js
tailwind.config.js
```

---

## Installation

Clone the repository:

```
git clone https://github.com/MohmmadHamza/scrap-collection-goti-lo.git
```

Navigate to the project directory:

```
cd scrap-collection-goti-lo
```

Install PHP dependencies:

```
composer install
```

Install frontend dependencies:

```
npm install
```

Copy the environment configuration:

```
cp .env.example .env
```

Generate application key:

```
php artisan key:generate
```

---

## Database Setup

1. Create a MySQL database.
2. Update the `.env` file with your database credentials.

Example:

```
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Run migrations (if available):

```
php artisan migrate
```

---

## Running the Project

Start the development server:

```
php artisan serve
```

Open the application in your browser:

```
http://127.0.0.1:8000
```

---

## Possible Extensions

This project can be expanded with:

* Admin dashboard
* Scrap pickup scheduling
* User authentication
* Payment integration
* Notification system
* API endpoints for mobile apps

---

## Author

**Mohammed Hamza**

Backend Developer specializing in **PHP, Laravel, APIs, and scalable web applications**

GitHub:
https://github.com/MohmmadHamza

---

## License

This project is open source and available under the **MIT License**.
