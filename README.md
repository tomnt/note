# Note

## Program files set up
```
# Obtaining code
git clone https://github.com/tomnt/note

# Moving to repository directory
cd note

# Obtaining dependencies
composer install

# Starting service
php artisan serve
```

## Basic Authentication
 - Username: user
 - Password: password

The username and password are being defined at;<br>
config/very_basic_auth.php

## Create [POST]
```
curl -X POST "http://127.0.0.1:8000/api/note/" -d "user_id=1&title=Foo!" --user user:password
```
http://127.0.0.1:8000/api/note?user_id=1&title=Foo!

## Read [GET]
```
curl -X GET "http://127.0.0.1:8000/api/note/" --user user:password
curl -X GET "http://127.0.0.1:8000/api/note/" -d "title=they" --user user:password
curl -X GET "http://127.0.0.1:8000/api/note/123/" --user user:password
```
http://127.0.0.1:8000/api/note/<br>
http://127.0.0.1:8000/api/note?title=they<br>
http://127.0.0.1:8000/api/note/123/<br>

## Update [PUT]
```
curl -X PUT "http://127.0.0.1:8000/api/note/12/" -d "title=Foo!" --user user:password
```
http://127.0.0.1:8000/api/note/12/?title=Foo!

## Delete [DELETE]
```
curl -X DELETE "http://127.0.0.1:8000/api/note/5/" --user user:password
```
http://127.0.0.1:8000/api/note/5/

## System Requirements
- [PHP 7.0 or higher](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/download/)
