# Employee Management System (EMS)

![Project Logo](https://via.placeholder.com/150x50?text=EMS+Logo) <!-- Replace with your actual logo -->

A modern Employee Management System built with Laravel and Vue.js.

##  Quick Start

### Prerequisites
- PHP 8.1+
- Composer
- Node.js 16+
- PostgreSQL 12+ (or your preferred database)
- Git

### Installation

```bash
# 1. Clone the repository
git clone https://github.com/CHSophat/Project1.git
cd Project1

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies and build assets
npm install
npm run dev

# 4. Setup environment
cp .env.example .env
php artisan key:generate

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=ems
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password

# Run migrations
php artisan migrate

# Seed with sample data (optional)
php artisan db:seed

# Start development server
php artisan serve
