<?php

namespace App\Http\Controllers;

use App\Domains\Market\Product\Service;
use Exception;
use OpenApi\Attributes as OA;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class ProductController extends BaseController
{
    public function __construct(private readonly Service $productService)
    {
    }

    /**
     * @throws Exception
     */
    #[OA\Get(path: '/products')]
    #[OA\QueryParameter(name: "category", schema: new OA\Schema(type: "string"), example: 'category-1')]
    #[OA\QueryParameter(name: "sort", schema: new OA\Schema(type: "string"), example: 'name')]
    #[OA\Response(
        response: 200,
        description: 'Criterion data with group conditions',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(
                    property: "meta",
                    ref: "#/components/schemas/MetaResponse",
                ),
                new OA\Property(
                    property: "data",
                    ref: "#/components/schemas/CriterionCollection",
                ),
            ],
            type: "object"
        )
    )]
    public function list(Request $request, $authenticated): Response
    {
        $queryParams = $request->getQueryParams();

        $result = $this->productService->list($queryParams, $authenticated);

        return $this->setResponse(200, [
            'data' => $result,
        ]);
    }
}