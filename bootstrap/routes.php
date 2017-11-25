<?php

use App\v1_0\Controllers\PublicEventController;
use App\v1_0\Controllers\PublicHelloController;
use App\v1_0\Controllers\PublicLogController;
use Nen\Http\Request;
use Nen\Router\Group;
use Nen\Router\Route;
use Nen\Router\Routes;

return new Routes([
    new Group('api/1.0', new Routes([
        new Group('hello', new Routes([
            new Route(PublicHelloController::class, 'hello', null, Request::METHOD_GET),
        ])),
        new Group('event', new Routes([
            new Route(PublicEventController::class, 'list', null, Request::METHOD_GET),
            new Route(PublicEventController::class, 'create', null, Request::METHOD_POST),
            new Route(PublicEventController::class, 'view', '([0-9]+)', Request::METHOD_GET),
            new Route(PublicEventController::class, 'update', '([0-9]+)', Request::METHOD_PUT),
            new Route(PublicEventController::class, 'delete', '([0-9]+)', Request::METHOD_DELETE),
        ])),
        new Group('log', new Routes([
            new Route(PublicLogController::class, 'list', null, Request::METHOD_GET),
        ])),
    ])),
]);
