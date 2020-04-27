<?php
/**
 * Description of StoreOrderDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace App\DTO\Request;


class StoreOrderDTO
{
    private string $phone;
    private int $delivery_type;
    private int $price;
    private int $paid_by_cash_back_amount;


    private function __construct(
        string $phone,
        int $delivery_type,
        int $price,
        int $paid_by_cash_back_amount
    )
    {
        $this->phone = $phone;
        $this->delivery_type = $delivery_type;
        $this->price = $price;
        $this->paid_by_cash_back_amount = $paid_by_cash_back_amount;
    }

    /**
     * @param array $data
     * @return StoreOrderDTO
     */
    public static function fromArray(array $data): StoreOrderDTO
    {
        return new self(
            $data['phone'] ?? '',
            $data['delivery_type'] ?? 0,
            $data['price'] ?? 0,
            $data['paid_by_cash_back_amount'] ?? 0
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'phone' => $this->getPhone(),
            'delivery_type' => $this->getDeliveryType(),
            'price' => $this->getPrice(),
            'paid_by_cash_back_amount' => $this->getPaidByCashBackAmount(),
        ];
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return int
     */
    public function getDeliveryType(): int
    {
        return $this->delivery_type;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getPaidByCashBackAmount(): int
    {
        return $this->paid_by_cash_back_amount;
    }
}