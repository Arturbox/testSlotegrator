<?php

declare(strict_types=1);

namespace App;

use App\Http\Middlewares\AuthMiddleware;
use DI\Bridge\Slim\Bridge;

[$container] = require_once '../bootstrap/app.php';

$app = Bridge::create($container);

$routeCollector = $app->getRouteCollector();
$routeCollector->setDefaultInvocationStrategy(new AuthMiddleware());

// Parse json, form data and xml
$app->addBodyParsingMiddleware();


//// Add routes
require_once '../routes/api.php';

$app->run();
