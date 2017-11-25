<?php

namespace App\v1_0\Controllers;

/**
 * Class PublicHelloController
 */
class PublicHelloController extends Controller
{
    public function helloAction(): void
    {
        $this->response();
    }
}
