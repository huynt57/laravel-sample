<?php

namespace App\Http\Controllers;

use App\Domain\Product\Actions\CreateProductAction;
use App\Domain\Product\DataTransferObjects\CreateProductData;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * @var CreateProductAction
     */
    public $createProductAction;

    /**
     * @param CreateProductAction $createProductAction
     */
    public function __construct(CreateProductAction $createProductAction)
    {
        $this->createProductAction = $createProductAction;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $productData = CreateProductData::fromRequest($request);
        $this->createProductAction->createProduct($productData);
        return response([
            'success' => true
        ]);
    }
}
