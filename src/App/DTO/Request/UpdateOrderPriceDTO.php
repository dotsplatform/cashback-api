<?php
/**
 * Description of UpdateOrderPriceDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace App\DTO\Request;


class UpdateOrderPriceDTO
{
    /**var integer */
    private $price;

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

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'price' => $this->getPrice(),
        ];
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }
}