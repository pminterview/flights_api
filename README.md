Uruchamiamy apkę:

copy .env.example .env
docker-compose up -d

docker-compose exec app bash

php composer install

php artisan migrate

php artisan db:seed

php artisan key:generate

Wszystko powinno się zainstalować.
localhost (port 80)

u mnie działa :)

W repozytorium w głównym katalogu jest Postman Collection zgodnie z wymaganiami

flight_api.postman_collection.json
