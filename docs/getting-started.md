git clone "repositorio"
- composer install
- php artisan key:generate
- cp .env.example .env
- php artisan migrate --database=sqlite
- php artisan optimize:clear