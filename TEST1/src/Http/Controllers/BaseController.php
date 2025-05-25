<?php

namespace App\Http\Controllers;

use OpenApi\Attributes as OA;
use Slim\Psr7\Response;

#[OA\OpenApi(
    info: new OA\Info(
        version: '1.0',
        title: 'Market'
    ),
    servers: [
        new OA\Server(
            url: '{schema}://{host}/v1',
            variables: [
                new OA\ServerVariable(
                    serverVariable: 'schema',
                    default: 'http',
                    enum: ['http', 'https']
                ),
                new OA\ServerVariable(
                    serverVariable: 'host',
                    default: 'localhost:82',
                    enum: ['localhost:82']
                ),
            ]
        ),
    ],
)]
abstract class BaseController
{
    protected function setResponse(int $statusCode = 200, array $data = []): Response
    {
        $response = new Response();

        $response->getBody()->write(json_encode($data));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($statusCode);
    }
}
