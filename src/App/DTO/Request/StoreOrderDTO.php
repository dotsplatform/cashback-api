<?php
/**
 * Description of StoreOrderDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;


class StoreOrderDTO
{
    private string $phone;
    private int $delivery_type;
    private int $price;
    private int $paidByCashBackAmount;
    private ?int $externalId;
    private array $data;

    protected function __construct(
        string $phone,
        int $delivery_type,
        int $price,
        int $paidByCashBackAmount,
        ?int $externalId,
        array $data
    )
    {
        $this->phone = $phone;
        $this->delivery_type = $delivery_type;
        $this->price = $price;
        $this->paidByCashBackAmount = $paidByCashBackAmount;
        $this->externalId = $externalId;
        $this->data = $data;
    }

    public static function fromArray(array $data): StoreOrderDTO
    {
        return new static(
            $data['phone'] ?? '',
            $data['delivery_type'] ?? 0,
            $data['price'] ?? 0,
            $data['paid_by_cash_back_amount'] ?? 0,
            $data['external_id'] ?? null,
            $data['data'] ?? [],
        );
    }

    public function toArray(): array
    {
        return [
            'phone' => $this->getPhone(),
            'delivery_type' => $this->getDeliveryType(),
            'price' => $this->getPrice(),
            'paid_by_cash_back_amount' => $this->getPaidByCashBackAmount(),
            'external_id' => $this->getExternalId(),
            'data' => $this->getData(),
        ];
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getDeliveryType(): int
    {
        return $this->delivery_type;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getPaidByCashBackAmount(): int
    {
        return $this->paidByCashBackAmount;
    }

    public function getExternalId(): ?int
    {
        return $this->externalId;
    }

    public function getData(): array
    {
        return $this->data;
    }
}