cp .env.example .env

composer install

./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan key:generate 