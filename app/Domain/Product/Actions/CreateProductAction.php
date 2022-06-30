<?php

namespace App\Domain\Product\Actions;

use App\Domain\Product\DataTransferObjects\CreateProductData;
use App\Domain\Product\Repositories\ProductRepository;
use App\Domain\Product\Supports\VatCalculator;

class CreateProductAction
{
    /**
     * @var VatCalculator
     */
    public $vatCalculator;

    /**
     * @var ProductRepository
     */
    public $productRepository;

    /**
     * @param VatCalculator $vatCalculator
     * @param ProductRepository $productRepository
     */
    public function __construct(
        VatCalculator $vatCalculator,
        ProductRepository $productRepository
    )
    {
        $this->vatCalculator = $vatCalculator;
        $this->productRepository = $productRepository;
    }

    /**
     * @param CreateProductData $createProductData
     * @return void
     */
    public function createProduct(CreateProductData $createProductData)
    {
        $vat = $this->vatCalculator->calculate($createProductData);
        $this->productRepository->store($createProductData);
    }
}
