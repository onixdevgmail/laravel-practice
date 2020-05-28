# Instruction

## Windows users:
- Download wamp: http://www.wampserver.com/en/
- Download and extract cmder mini: https://github.com/cmderdev/cmder/releases/download/v1.1.4.1/cmder_mini.zip
- Update windows environment variable path to point to your php install folder (inside wamp installation dir) (here is how you can do this http://stackoverflow.com/questions/17727436/how-to-properly-set-php-environment-variable-to-run-commands-in-git-bash)
 

## Mac Os, Ubuntu and windows users continue here:
- Create a database locally named
- Open the console and cd your project root directory
- Rename `.env.example` file to `.env` inside your project root and fill the database information.
  (windows wont let you do it, so you have to open your console cd your project root directory and run `mv .env.example .env` )
- Run `composer install` or ```php composer.phar install```
- Run `php artisan key:generate` 
- Run `php artisan migrate`
- Run `php artisan db:seed --class=Core\\Api\\Seeds\\CustomerProductSeeder` to run Customer and Product seeders, if needed.
- Run `php artisan serve`

##### You can now access your project at localhost:8000 :)

## If for some reason your project stop working do these:
- `composer install`
- `php artisan migrate`

## API Documentation
- `/api/documentation`

## Interface for add Customers and Products
- `/core-api`

## Command to look for products on “pending”
- Go to `/core-api` page and run `php artisan command:pending-products`. You should see notification in right bottom of page. (Make sure PUSHER credentials correct in .env. You cna find it in .env.example)
