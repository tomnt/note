# Notes API
This is a simple API built on top of Laravel for "notes" application.

<b>User</b>:<br>
A user in the system. It contains the following fields:
 - Email: Non-blank, valid email address, unique
 - Password: Non-blank, at least 8 characters
 - Create Time
 - Last Update Time

<b>Note</b>:<br>
A note in the system. Notes are associated with Users. A user can have many notes. A note has the following fields:
 - Title: Non-blank, max 50 characters long
 - Note: max 1000 long
 - Create Time
 - Last Update Time

<b>RESTful API</b>:<br>
 - Design and build a RESTful API to allow CRUD operations on notes. 
 - Support JSON for requests and responses. 
 - Note access should be restricted to the owner of the note.

<b>Authentication</b>:<br>
Use Basic HTTP Authentication.

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
 - Username:  <i>user</i>
 - Password:  <i>password</i>

The username and password are being defined at;<br>
<i>config/very_basic_auth.php</i>

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
