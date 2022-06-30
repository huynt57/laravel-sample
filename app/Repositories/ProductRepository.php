<?php

namespace App\Repositories;

use App\Domain\Product\DataTransferObjects\CreateProductData;
use \App\Domain\Product\Repositories\ProductRepository as DomainProductRepository;
use App\Models\Product;

class ProductRepository implements DomainProductRepository
{

    public function store(CreateProductData $createProductData): void
    {
        Product::create([
            'name' => $createProductData->getName(),
            'price' => $createProductData->getPrice(),
            'expire_date' => $createProductData->getExpireDate()->toDateTimeString()
        ]);
    }
}
