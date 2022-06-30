<?php

namespace App\Domain\Product\DataTransferObjects;

use Carbon\Carbon;
use Illuminate\Http\Request;

class CreateProductData
{
    /** @var string */
    public $name;

    /** @var int */
    public $price;

    /** @var Carbon */
    public $expireDate;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @return Carbon
     */
    public function getExpireDate(): ?Carbon
    {
        return $this->expireDate;
    }

    /**
     * @param array $payload
     */
    public function __construct(array $payload)
    {
        $this->name = $payload['name'];
        $this->price = $payload['price'];
        $this->expireDate = Carbon::make($payload['expire_date']);
    }

    /**
     * @param Request $request
     * @return static
     */
    public static function fromRequest(Request $request): self
    {
        return new self([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'expire_date' => $request->input('expire_date')
        ]);
    }

    /**
     * @return array
     */
    public function toArray(): array {
        return [
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'expire_date' => $this->getExpireDate()->toDateTimeString()
        ];
    }
}
