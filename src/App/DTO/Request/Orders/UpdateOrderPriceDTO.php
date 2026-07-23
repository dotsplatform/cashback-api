<?php
/**
 * Description of UpdateOrderPriceDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request\Orders;


class UpdateOrderPriceDTO
{
    protected function __construct(
        private int $price,
        private ?int $total_price,
        private int $paidByCashbackAmount,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['price'] ?? 0,
            $data['total_price'] ?? null,
            $data['paid_by_cashback_amount'] ?? 0,
        );
    }

    public function toArray(): array
    {
        return [
            'price' => $this->getPrice(),
            'total_price' => $this->getTotalPrice(),
            'paid_by_cashback_amount' => $this->getPaidByCashbackAmount(),
        ];
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getTotalPrice(): ?int
    {
        return $this->total_price;
    }

    public function getPaidByCashbackAmount(): int
    {
        return $this->paidByCashbackAmount;
    }
}