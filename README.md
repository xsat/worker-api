# API documentation

## 1. Events

### 1.1. View events

Params:

* offset  // default **0**
* limit  // default **10**

Request:

```
GET {{host}}/api/1.0/event
```

Response:
```
HTTP/1.x 200 OK
Content-Type: application/json
{
    "total": 1,
    "count": 1,
    "offset": 0,
    "limit": 10,
    "items": [
        {
            "eventId": 1,
            "name": "Test",
            "link": "http://worker-api.local/api/1.0/event",
            "payload": null
        }
    ]
}
```

### 1.2. Create event

Request:
```
POST {{host}}/api/1.0/event
Content-Type: application/json
{
    "name": "Test2",
    "link": "http://worker-api.local",
    "payload": "data" // optional
}
```

Response:
```
HTTP/1.x 200 OK
Content-Type: application/json
{
    "eventId": 2,
    "name": "Test2",
    "link": "http://worker-api.local",
    "payload": "data"
}
```

Response:
```
HTTP/1.x 200 OK
Content-Type: application/json
{}
```

### 1.3. View event

Request:
```
GET {{host}}/api/1.0/event/{{eventId}}
```

Response:
```
HTTP/1.x 200 OK
Content-Type: application/json
{
    "eventId": 2,
    "name": "Test2",
    "link": "http://worker-api.local",
    "payload": "data"
}
```

### 1.4. Update event

Request:
```
PUT {{host}}/api/1.0/event/{{eventId}}
Content-Type: application/json
{
    "name": "Test2",
    "link": "http://worker-api.local",
    "payload": "data" // optional
}
```

Response:
```
HTTP/1.x 200 OK
Content-Type: application/json
{}
```

### 1.5. Delete event

Request:
```
DELETE {{host}}/api/1.0/event/{{eventId}}
```

Response:
```
HTTP/1.x 200 OK
Content-Type: application/json
{}
```

## 2. Logs

### 1.1. View logs

Params:

* offset  // default **0**
* limit  // default **10**

Request:

```
GET {{host}}/api/1.0/event
```

Response:
```
HTTP/1.x 200 OK
Content-Type: application/json
{
    "total": 1,
    "count": 1,
    "offset": 0,
    "limit": 10,
    "items": [
        {
            "logId": 1,
            "content": "694260526",
            "createdAt": "2017-11-25T22:54:28+01:00"
        }
    ]
}
```
