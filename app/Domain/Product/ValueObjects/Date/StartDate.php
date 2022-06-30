<?php

namespace App\Domain\Product\ValueObjects\Date;

use Carbon\Carbon;

class StartDate
{
    public $date;

    public function __construct(Carbon $date)
    {
        $this->date = $date->startOfDay();
    }

    public static function fromString(string $date): self
    {
        return new static(Carbon::parse($date));
    }

    public function __toString(): string
    {
        return $this->date->format('Y-m-d H:i:s');
    }
}
