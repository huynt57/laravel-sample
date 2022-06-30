<?php

namespace App\Domain\Product\Builders;

use App\Domain\Product\ValueObjects\Date\DateFilter;
use Illuminate\Database\Eloquent\Builder;

class ProductBuilder extends Builder
{
    public function whereExpireDateBetween(?DateFilter $dates): self
    {
        if ($dates) {
            return $this->whereBetween('expire_date', [$dates->startDate, $dates->endDate]);
        }

        return $this;
    }
}
