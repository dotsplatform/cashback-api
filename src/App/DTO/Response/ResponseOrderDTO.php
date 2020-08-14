<?php
/**
 * Description of ResponseOrderDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response;



class ResponseOrderDTO
{
    private int $id;
    private int $account_id;
    private int $user_id;
    private int $delivery_type;
    private int $price;
    private ?array $data;
    private int $status;
    private int $order_status;
    private ?int $external_id;

    private function __construct(
        int $id,
        int $account_id,
        int $user_id,
        int $delivery_type,
        int $price,
        ?array $data,
        int $status,
        int $order_status,
        ?int $external_id
    )
    {
        $this->id = $id;
        $this->account_id = $account_id;
        $this->user_id = $user_id;
        $this->delivery_type = $delivery_type;
        $this->price = $price;
        $this->data = $data;
        $this->status = $status;
        $this->order_status = $order_status;
        $this->external_id = $external_id;
    }

    public static function fromArray(array $data): ResponseOrderDTO
    {
        return new static(
            $data['id'] ?? 0,
            $data['account_id'] ?? 0,
            $data['user_id'] ?? 0,
            $data['delivery_type'] ?? 0,
            $data['price'] ?? 0,
            $data['data'] ?? null,
            $data['status'] ?? 0,
            $data['order_status'] ?? 0,
            $data['external_id'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'account_id' => $this->getAccountId(),
            'user_id' => $this->getUserId(),
            'delivery_type' => $this->getDeliveryType(),
            'price' => $this->getPrice(),
            'data' => $this->getData(),
            'status' => $this->getStatus(),
            'order_status' => $this->getOrderStatus(),
            'external_id' => $this->getExternalId(),
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAccountId(): int
    {
        return $this->account_id;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function getDeliveryType(): int
    {
        return $this->delivery_type;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getData(): ?array
    {
        return $this->data;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getOrderStatus(): int
    {
        return $this->order_status;
    }

    public function getExternalId(): ?int
    {
        return $this->external_id;
    }
}