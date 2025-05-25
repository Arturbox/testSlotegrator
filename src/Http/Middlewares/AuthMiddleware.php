<?php

declare(strict_types=1);

namespace App\Http\Middlewares;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Interfaces\InvocationStrategyInterface;

class AuthMiddleware implements InvocationStrategyInterface
{
    public function __invoke(
        callable $callable,
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $routeArguments
    ): ResponseInterface {
        $authenticated = $request->hasHeader('Authorization');
        
        return $callable($request, $authenticated);
    }
}
