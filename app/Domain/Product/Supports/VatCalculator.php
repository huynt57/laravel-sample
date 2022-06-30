<?php

namespace App\Domain\Product\Supports;

use App\Domain\Product\DataTransferObjects\CreateProductData;

class VatCalculator
{
    /**
     * @param CreateProductData $createProductData
     * @return int
     */
    public function calculate(CreateProductData $createProductData): int
    {
        return 0;
    }
}
