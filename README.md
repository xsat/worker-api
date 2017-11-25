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

### 1.2. Create event

Request:
```
POST {{host}}/api/1.0/event
Content-Type: application/json
{}
```

Response:
```
HTTP/1.x 200 OK
Content-Type: application/json
{}
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
{}
```

### 1.4. Update event

Request:
```
PUT {{host}}/api/1.0/event/{{eventId}}
Content-Type: application/json
{}
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
PUT {{host}}/api/1.0/event/{{eventId}}
Content-Type: application/json
{}
```

Response:
```
HTTP/1.x 200 OK
Content-Type: application/json
{}
```
