Docker version 20.10.14
Docker-compose version 1.29.0

1. git clone https://github.com/nikden13/pastes-back.git
2. cd pastes-back/
3. docker-compose up -d
4. docker-compose exec back composer install
5. docker-compose exec back php artisan migrate
6. docker-compose exec back php artisan db:seed
7. http://localhost:8000/api/
