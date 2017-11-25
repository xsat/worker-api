<?php

use App\v1_0\Controllers\PublicHelloController;
use Nen\Http\Request;
use Nen\Router\Group;
use Nen\Router\Route;
use Nen\Router\Routes;

return new Routes([
    new Group('api/1.0', new Routes([
        new Group('hello', new Routes([
            new Route(PublicHelloController::class, 'hello', null, Request::METHOD_GET),
        ])),
    ])),
]);
