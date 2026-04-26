@echo off
echo [*] Dang khoi dong Docker...
docker-compose up -d --build

echo [*] Dang cai dat thu vien Composer (co the mat vai phut)...
docker-compose exec app composer install

echo [*] Dang tao APP_KEY...
docker-compose exec app php artisan key:generate

echo [*] Dang chay Migration...
docker-compose exec app php artisan migrate --seed

echo [*] Dang thiet lap quyen...
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache

echo [!] XONG! Ban co the truy cap tai: http://localhost
pause
