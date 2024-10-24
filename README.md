# Installation
```bash
docker compose up --build -d
```
```bash
cp .env.example .env
```
There are default values for the database. You can change them.
```bash
docker compose exec app composer install
```
```bash
docker compose exec app php artisan key:generate
```
```bash
docker compose exec app php artisan jwt:secret
```
```bash
docker compose exec app php artisan migrate
```
```bash
docker compose exec app php artisan app:crate-user
```

# Link
### [Posman collect](https://crimson-crescent-621112.postman.co/workspace/Test-work-Yamaguchi~a75cb72f-1e36-4b5b-8f15-acfb2ac6d323/collection/18465237-555d0445-f193-4e0c-bfa6-b8d7f3f0d6d8?action=share&creator=18465237&tab=authorization)
