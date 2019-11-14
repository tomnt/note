# Note

## Create [POST]
http://127.0.0.1:8000/note/create?user_id=1&title=abc
http://127.0.0.1:8000/api/note/create?user_id=1&title=abc

## Read [GET]
http://127.0.0.1:8000/note/read/
http://127.0.0.1:8000/note/read/?title=they
http://127.0.0.1:8000/note/read/123/

http://127.0.0.1:8000/api/note/read/
http://127.0.0.1:8000/api/note/read/?title=they
http://127.0.0.1:8000/api/note/read/123/

## Update [PUT]
http://127.0.0.1:8000/note/update/12/?title=Foo!
http://127.0.0.1:8000/api/note/update/12/?title=Foo!

## Delete [DELETE]
http://127.0.0.1:8000/note/delete/3/
http://127.0.0.1:8000/api/note/delete/3/
