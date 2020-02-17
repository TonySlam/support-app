# Support App
Support App Section 1<br>


## Environment Requirements
- Web Server,Apache, Nginx<br>
- Database: Mysql 5*<br>
- Composer https://getcomposer.org/<br>
- Laravel 5.7 https://laravel.com<br>
- php 7.1.3 <br>
- caffeinated/modules 5.2 https://github.com/caffeinated/modules<br>
- Spatie permission 2.37 https://github.com/spatie/laravel-permission<br>
- yajra/laravel-datatables-oracle ~9.0 https://github.com/yajra/laravel-datatables<br>

#  Setup
- clone repository https://github.com/{YOUR_USERNAME}/support-app.git<br>
- composer install<br>

## ENV File
- Generate new env<br><br><br>
APP_NAME=SupportApp<br>
APP_ENV=local<br>
APP_KEY=<br>
APP_DEBUG=true<br>
APP_URL=http://localhost<br>
<br><br>
LOG_CHANNEL=stack<br>
<br><br>
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=database<br>
DB_USERNAME=root<br>
DB_PASSWORD=secrete<br>
<br><br>
BROADCAST_DRIVER=log<br>
CACHE_DRIVER=file<br>
QUEUE_CONNECTION=sync<br>
SESSION_DRIVER=file<br>
SESSION_LIFETIME=120<br>
<br><br>
REDIS_HOST=127.0.0.1<br>
REDIS_PASSWORD=null<br>
REDIS_PORT=6379<br>
<br><br>
MAIL_DRIVER=smtp<br>
MAIL_HOST=smtp.gmail.com<br>
MAIL_PORT=587<br>
MAIL_USERNAME=example@gmail.com<br>
MAIL_PASSWORD=xxxxxxx<br>
MAIL_ENCRYPTION=tls<br>

<br><br>
AWS_ACCESS_KEY_ID=<br>
AWS_SECRET_ACCESS_KEY=<br>
AWS_DEFAULT_REGION=us-east-1<br>
AWS_BUCKET=<br>
<br><br>
PUSHER_APP_ID=<br>
PUSHER_APP_KEY=<br>
PUSHER_APP_SECRET=<br>
PUSHER_APP_CLUSTER=mt1<br>
<br><br>
MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"<br>
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"<br>
<br><br>
# Migrations
- php artisan migrate<br>
- php artisan db:seed --class=RoleTableSeeder<br>

# Installation 
- php artisan install:super_admin <br>

# Contact
thabo.tony@gmail.com


