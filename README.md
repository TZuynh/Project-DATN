# Install the composer packages
composer install

# Run & build js
yarn install
yarn build

# Copy the .env.example file to .env
cp .env.example .env

php artisan key:generate

# Remember to setup your DB settings in .env
# Migration and DB seeder (after changing your DB settings in .env)
php artisan migrate --seed
