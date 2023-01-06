
rem 1. Copy .env.example to .env
copy .env.example .env

rem 2. generate app_key
php artisan key:generate

rem 3. Open the .env file and edit settings if necessary
rem 4. Edit the DB_HOST and DB_PORT settings on lines 12 and 13, and username and password on lines 15 and 16 if necessary
rem 5. Assign a new database name to DB_DATABASE on line 14 if necessary
rem 6. Continue batch
pause

rem 7. Create the database
php artisan make:database

rem 9. Seed the tables
php artisan migrate:refresh --seed

rem 9. Run tests
php artisan test
