<?php

namespace App\Http\Controllers;

use App\Domain\Product\Actions\CreateProductAction;
use App\Domain\Product\DataTransferObjects\CreateProductData;

use App\Domain\Product\Repositories\ProductRepository;
use App\Domain\Product\ValueObjects\Date\DateFilter;
use App\Domain\Product\ViewModels\GetProductsViewModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * @var CreateProductAction
     */
    public $createProductAction;

    /**
     * @var GetProductsViewModel;
     */
    public $getProductsViewModel;

    /**
     * @param CreateProductAction $createProductAction
     * @param GetProductsViewModel $getProductsViewModel
     */
    public function __construct(CreateProductAction $createProductAction, GetProductsViewModel $getProductsViewModel)
    {
        $this->createProductAction = $createProductAction;
        $this->getProductsViewModel = $getProductsViewModel;
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
            'success' => true,
            'data' => $productData->toArray()
        ]);
    }

    /**
     * @return void
     */
    public function getProductsThisWeek(): Response
    {
        return response([
            'success' => true,
            'data' => $this->getProductsViewModel->getProductsThisWeek()->get()
        ]);
    }
}
