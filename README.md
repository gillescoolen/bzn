# BZN

## Running the project
0. Make sure you have [Composer](https://getcomposer.org/) & [PHP](https://www.php.net/downloads) installed!
1. Open a terminal in the root folder and run `composer install` and `npm install`.
2. Copy the `.env.example` file and name the new file `.env`.
3. Make sure the database credentials in your new `.env` file match your actual credentials.
4. Run `php artisan serve` in your terminal.
4. Run `npm run hot` in another terminal.
5. Voilà! View the project at [http://localhost:8000](http://localhost:8000)

## Testing the project
0. Browser tests are located in `~/tests/Browser/`.
1. Run the browser tests with `php artisan dusk`.

For more information about browser testing, read the [Dusk documentation](https://laravel.com/docs/6.x/dusk).