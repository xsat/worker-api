<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

define('DATA_DIR', __DIR__ . '/../data/');

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Nen\Application;

(new Dotenv(__DIR__ . '/../'))->load();

return new Application(include __DIR__ . '/routes.php');
