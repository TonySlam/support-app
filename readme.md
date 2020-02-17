Environment Requirements
1.	Web Server,Apache, Nginx
2.	Database: Mysql 5*
3.	Composer https://getcomposer.org/
4.	Laravel 5.8 https://laravel.com
5.	php 7.1.3
6.	caffeinated/modules 5.2 https://github.com/caffeinated/modules
7.	Spatie permission 2.37 https://github.com/spatie/laravel-permission
8.	yajra/laravel-datatables-oracle ~9.0 https://github.com/yajra/laravel-datatables
Setup
•	clone repository https://github.com/{YOUR_USERNAME}/life-master-app-master.git
•	composer install
ENV File
•	Generate new env


APP_NAME=SupportApp
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost


LOG_CHANNEL=stack


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=root
DB_PASSWORD=secrete


BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120


REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379


MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=example@gmail.com
MAIL_PASSWORD=xxxxxxx
MAIL_ENCRYPTION=tls

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=


PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1


MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"


Migrations
•	php artisan migrate
•	php artisan db:seed --class=RoleTableSeeder
Installation
•	php artisan install:super_admin
Contact
thabo.tony@gmail.com
