rem 1. Open the command window and navigate to the cloned site
rem 2. Run the Composer Install command
composer install

rem 3. Copy .env.example to .env
copy .env.example .env

rem 4. generate app_key
php artisan key:generate

rem 5. Open the .env file and edit settings if necessary
rem 6. Edit the DB_HOST and DB_PORT settings on lines 12 and 13, and username and password on lines 15 and 16 if necessary
rem 7. Assign a new database name to DB_DATABASE on line 14 if necessary
rem 8. Continue batch
pause

rem 9. Create the database
php artisan make:database

rem 10. Seed the tables
php artisan migrate:refresh --seed

rem 11. Run tests
php artisan test