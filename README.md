# PapLaravel
Site com a framework laravel

composer require laravel/ui

php artisan ui bootstrap

php artisan ui bootstrap --auth

php artisan serve

npm run dev

php artisan migrate 

php artisan migrate:refresh --seed


# JWT Authentication
composer require tymon/jwt-auth
## Generate a JWT secret key
php artisan jwt:secret

# MAILJET
MAIL_DRIVER=smtp
MAIL_HOST=in-v3.mailjet.com
MAIL_PORT=465
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_FROM_ADDRESS="no-reply@jarg.pt"
MAIL_FROM_NAME="mBot Quiz"  
MAIL_ENCRYPTION=ssl