# Note

## Program files set up
```
# Obtaining code
git clone https://github.com/tomnt/note

# Moving to repository directory
cd note

# Obtaining dependencies
composer install
```

## Basic Authentication
 - Username: user
 - Password: password

## Create [POST]
curl -X POST "http://127.0.0.1:8000/api/note/" -d "user_id=1&title=Foo!" --user user:password
http://127.0.0.1:8000/api/note?user_id=1&title=abc

## Read [GET]
curl -X GET "http://127.0.0.1:8000/api/note/" --user user:password
http://127.0.0.1:8000/api/note/
http://127.0.0.1:8000/api/note?title=they
http://127.0.0.1:8000/api/note/123/

## Update [PUT]
curl -X PUT "http://127.0.0.1:8000/api/note/12/" -d "title=Foo!" --user user:password
http://127.0.0.1:8000/api/note/12/?title=Foo!

## Delete [DELETE]
curl -X DELETE "http://127.0.0.1:8000/api/note/5/" --user user:password
http://127.0.0.1:8000/api/note/3/

## System Requirements
- [PHP 7.0 or higher](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/download/)
