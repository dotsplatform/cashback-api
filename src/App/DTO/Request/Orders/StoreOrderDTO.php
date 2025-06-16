<?php
/**
 * Description of StoreOrderDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request\Orders;


class StoreOrderDTO
{
    protected function __construct(
        private ?string $token,
        private int $delivery_type,
        private int $ordering_type,
        private int $payment_type,
        private int $price,
        private int $paidByCashBackAmount,
        private array $data,
        private string $userToken,
        private string $userPhone,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['token'] ?? null,
            $data['delivery_type'] ?? 0,
            $data['ordering_type'] ?? 0,
            $data['payment_type'] ?? 0,
            $data['price'] ?? 0,
            $data['paid_by_cash_back_amount'] ?? 0,
            $data['data'] ?? [],
            $data['userToken'] ?? '',
            $data['userPhone'] ?? '',
        );
    }

    public function toArray(): array
    {
        return [
            'token' => $this->getToken(),
            'delivery_type' => $this->getDeliveryType(),
            'ordering_type' => $this->getOrderingType(),
            'payment_type' => $this->getPaymentType(),
            'price' => $this->getPrice(),
            'paid_by_cash_back_amount' => $this->getPaidByCashBackAmount(),
            'data' => $this->getData(),
            'userToken' => $this->getUserToken(),
            'userPhone' => $this->getUserPhone(),
        ];
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function getDeliveryType(): int
    {
        return $this->delivery_type;
    }

    public function getOrderingType(): int
    {
        return $this->ordering_type;
    }

    public function getPaymentType(): int
    {
        return $this->payment_type;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getPaidByCashBackAmount(): int
    {
        return $this->paidByCashBackAmount;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getUserToken(): ?string
    {
        return $this->userToken;
    }

    public function getUserPhone(): string
    {
        return $this->userPhone;
    }
}