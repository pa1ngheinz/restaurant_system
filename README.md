# Restaurant Management System

A web-based restaurant management system built with Laravel. This application helps manage restaurant operations such as tables, orders, dishes, categories, and users.

## Features

- User authentication
- User authorization
- Table, dish and category management
- Order processing
- Waiter panel
- Kitchen panel(Admins only)

## Requirements

- PHP >= 8.0
- Composer
- Node.js & npm
- MySQL

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/pa1ngheinz/restaurant_system.git
    cd restaurant_system
    ```

2. **Install PHP dependencies:**

    ```bash
    composer install
    ```

3. **Install Node.js dependencies:**

    ```bash
    npm install
    ```

4. **Copy the example environment file and set your configuration:**

    ```bash
    cp .env.example .env
    ```

    Edit `.env` and set your database credentials and other settings.

5. **Generate application key:**

    ```bash
    php artisan key:generate
    ```

6. **Run migrations and seeders:**

    ```bash
    php artisan migrate --seed
    ```

7. **Build frontend assets:**
    ```bash
    npm run dev
    ```

## Running the Application

Start the local development server:

```bash
php artisan serve
```

Visit [http://localhost:8000](http://localhost:8000) in your browser.

## Usage

- Login with the seeded users or register a new account.
- You can only set user role manually in the database.
- Access the admin panel for management features like creating the available dishes and tables (only for admins).
- Order the dishes from waiter panel and then manage orders(approve, cancel, done) from kitchen panel again.
- Once you approved and finished the orders, you can finally serve the dishes from waiter panel!.

