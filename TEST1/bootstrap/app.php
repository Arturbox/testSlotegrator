<?php

declare(strict_types=1);

use DI\ContainerBuilder;

define('APP_PATH', dirname(__DIR__));

require_once APP_PATH . '/vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(true);

$containerBuilder->addDefinitions();

$container = $containerBuilder->build();

return [$container];
