<?php
/**
 * Description of UpdateOrderPriceDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;


class UpdateOrderPriceDTO
{
    private int $price;

    private function __construct(
        int $price
    )
    {
        $this->price = $price;
    }

    public static function fromArray(array $data): UpdateOrderPriceDTO
    {
        return new self(
            $data['price'] ?? 0
        );
    }

    public function toArray(): array
    {
        return [
            'price' => $this->getPrice(),
        ];
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}