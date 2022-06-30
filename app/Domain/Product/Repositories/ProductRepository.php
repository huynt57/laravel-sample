<?php

namespace App\Domain\Product\Repositories;

use App\Domain\Product\DataTransferObjects\CreateProductData;

interface ProductRepository
{
    public function store(CreateProductData $createProductData): void;
}
