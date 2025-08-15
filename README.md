# 1. Clone the repository
git clone https://github.com/CHSophat/Project1.git
cd Project1

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies (optional if using frontend assets)
npm install
npm run dev

# 4. Copy .env file and generate application key
cp .env.example .env
php artisan key:generate

# 5. Configure database in .env
# Example configuration for PostgreSQL:
# DB_CONNECTION=pgsql
# DB_HOST=127.0.0.1
# DB_PORT=5432
# DB_DATABASE=ems
# DB_USERNAME=your_db_username
# DB_PASSWORD=your_db_password

# 6. Run database migrations
php artisan migrate

# 7. Seed the database with default data (optional)
php artisan db:seed

# 8. Run the development server
php artisan serve
