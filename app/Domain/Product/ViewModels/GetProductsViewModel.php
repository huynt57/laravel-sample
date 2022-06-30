<?php

namespace App\Domain\Product\ViewModels;

use App\Domain\Product\ValueObjects\Date\DateFilter;
use App\Models\Product;

class GetProductsViewModel
{
    /**
     * @return mixed
     */
    public function getProductsThisWeek()
    {
        $dateFilter = DateFilter::fromCarbons(now()->startOfCentury(), today());
        return Product::whereExpireDateBetween($dateFilter);
    }
}
