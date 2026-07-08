<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

echo "BEFORE<br>";

$request = Request::capture();

echo "REQUEST OK<br>";

$app->handleRequest($request);

echo "AFTER<br>";