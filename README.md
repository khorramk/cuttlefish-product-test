# Cuttlefish laravel Test

## Instructions

1. once uploaded, please adjust env.example file
2. configure your db
3. composer install
4. run migrations: php artisan migrate
5. run seeder: php artisan db:seed --class=ProductCategoriesSeeder
6. then run the command: php artisan make:products:inactive

## Running Tests

1. php artisan test --filter=MakeProductActiveTest

## Note:
if you want to have data i suggest running factories or seeder after you configure you db.
