
# Restaurant Management System

A web-based restaurant management system built with Laravel. This application helps manage restaurant operations such as tables, orders, dishes, categories, and users.

## Features
- User authentication
- Table management
- Dish and category management
- Order processing
- Kitchen order view
- Admin panel

## Requirements
- PHP >= 8.0
- Composer
- Node.js & npm
- MySQL or compatible database

## Installation

1. **Clone the repository:**
	```bash
	git clone https://github.com/yourusername/restaurant_system.git
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
- Login with the seeded user credentials or register a new account.
- Access the admin panel for management features.
- Place and manage orders from the kitchen view.

## License
This project is open-source. See the LICENSE file for details.

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## Contact
For support, contact [your-email@example.com].
