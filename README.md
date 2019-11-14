# Note

## Create [POST]
curl -X POST "http://127.0.0.1:8000/api/note/create/" -d "user_id=1&title=Foo!"
http://127.0.0.1:8000/note/create?user_id=1&title=abc
http://127.0.0.1:8000/api/note/create?user_id=1&title=abc

## Read [GET]
curl -X GET "http://127.0.0.1:8000/api/note/read/"
http://127.0.0.1:8000/note/read/
http://127.0.0.1:8000/note/read/?title=they
http://127.0.0.1:8000/note/read/123/

http://127.0.0.1:8000/api/note/read/
http://127.0.0.1:8000/api/note/read/?title=they
http://127.0.0.1:8000/api/note/read/123/

## Update [PUT]
curl -X PUT "http://127.0.0.1:8000/api/note/update/12/" -d "title=Foo!"
http://127.0.0.1:8000/note/update/12/?title=Foo!
http://127.0.0.1:8000/api/note/update/12/?title=Foo!

## Delete [DELETE]
curl -X DELETE "http://127.0.0.1:8000/api/note/delete/5/"
http://127.0.0.1:8000/note/delete/3/
http://127.0.0.1:8000/api/note/delete/3/
