<?php
/**
 * Description of ResponseOrderDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace App\DTO\Response;


use App\DTO\Request\UpdateTransactionNoteDTO;

class ResponseOrderDTO
{
    /** @var integer */
    private $id;
    /** @var integer */
    private $account_id;
    /** @var integer */
    private $user_id;
    /**var integer */
    private $delivery_type;
    /**var integer */
    private $price;
    /**var array */
    private $data;
    /**var integer */
    private $status;
    /**var integer */
    private $order_status;

    private function __construct(
        int $id,
        int $account_id,
        int $user_id,
        int $delivery_type,
        int $price,
        array $data,
        int $status,
        int $order_status
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
    }

    /**
     * @param array $data
     * @return ResponseOrderDTO
     */
    public static function fromArray(array $data): ResponseOrderDTO
    {
        return new self(
            $data['id'] ?? 0,
            $data['account_id'] ?? 0,
            $data['user_id'] ?? 0,
            $data['delivery_type'] ?? 0,
            $data['price'] ?? 0,
            $data['data'] ?? '',
            $data['status'] ?? 0,
            $data['order_status'] ?? 0
        );
    }

    /**
     * @return array
     */
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
        ];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getAccountId(): int
    {
        return $this->account_id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
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
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getOrderStatus(): int
    {
        return $this->order_status;
    }
}