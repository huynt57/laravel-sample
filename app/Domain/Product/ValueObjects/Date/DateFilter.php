<?php

namespace App\Domain\Product\ValueObjects\Date;

use App\Domain\Product\ValueObjects\Date\StartDate;
use App\Domain\Product\ValueObjects\Date\EndDate;
use Illuminate\Support\Carbon;

class DateFilter
{
    public $startDate;

    public $endDate;

    /**
     * @param $startDate
     * @param $endDate
     */
    public function __construct(
        $startDate,
        $endDate
    )
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @return static
     */
    public static function fromCarbons(
        Carbon $startDate,
        Carbon $endDate
    ): self
    {
        return new static(
            StartDate::fromString($startDate->toString()),
            EndDate::fromString($endDate->toString())
        );
    }
}
