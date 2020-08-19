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
    private int $paidByCashbackAmount;

    protected function __construct(
        int $price,
        int $paidByCashbackAmount
    )
    {
        $this->price = $price;
        $this->paidByCashbackAmount = $paidByCashbackAmount;
    }

    public static function fromArray(array $data): self
    {
        return new static(
            $data['price'] ?? 0,
            $data['paid_by_cashback_amount'] ?? 0,
        );
    }

    public function toArray(): array
    {
        return [
            'price' => $this->getPrice(),
            'paid_by_cashback_amount' => $this->getPaidByCashbackAmount(),
        ];
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getPaidByCashbackAmount(): int
    {
        return $this->paidByCashbackAmount;
    }
}