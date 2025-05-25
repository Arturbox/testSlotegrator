<?php

global $app;

use App\Http\Controllers\ProductController;
use Slim\Routing\RouteCollectorProxy;

$app->group('/v1', function (RouteCollectorProxy $group) {
    $group->get('/products', [ProductController::class, 'list']);
});