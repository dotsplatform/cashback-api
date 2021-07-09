<?php
/**
 * Description of StoreOrderDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;


class StoreOrderDTO
{
    private ?string $token;
    private int $delivery_type;
    private int $price;
    private int $paidByCashBackAmount;
    private array $data;
    private ?string $userToken;

    protected function __construct(
        ?string $token,
        int $delivery_type,
        int $price,
        int $paidByCashBackAmount,
        array $data,
        ?string $userToken
    )
    {
        $this->token = $token;
        $this->delivery_type = $delivery_type;
        $this->price = $price;
        $this->paidByCashBackAmount = $paidByCashBackAmount;
        $this->data = $data;
        $this->userToken = $userToken;
    }

    public static function fromArray(array $data): self
    {
        return new static(
            $data['token'] ?? null,
            $data['delivery_type'] ?? 0,
            $data['price'] ?? 0,
            $data['paid_by_cash_back_amount'] ?? 0,
            $data['data'] ?? [],
            $data['userToken'] ?? '',
        );
    }

    public function toArray(): array
    {
        return [
            'token' => $this->getToken(),
            'delivery_type' => $this->getDeliveryType(),
            'price' => $this->getPrice(),
            'paid_by_cash_back_amount' => $this->getPaidByCashBackAmount(),
            'data' => $this->getData(),
            'userToken' => $this->getUserToken(),
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
}