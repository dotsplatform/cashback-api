<?php
/**
 * Description of ResponseTransactionDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace App\DTO\Response;


class ResponseTransactionDTO
{
    /** @var string */
    private $id;
    /** @var integer */
    private $user_id;
    /** @var integer */
    private $order_id;
    /** @var string */
    private $note;
    /** @var integer */
    private $amount;
    /** @var integer */
    private $status;
    /** @var array */
    private $data; //
    /** @var integer */
    private $completed_time;

    private function __construct(
        string $id,
        int $user_id,
        int $order_id,
        string $note,
        int $amount,
        int $status,
        array $data,
        int $completed_time
    )
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->order_id = $order_id;
        $this->note = $note;
        $this->amount = $amount;
        $this->status = $status;
        $this->data = $data;
        $this->completed_time = $completed_time;
    }

    /**
     * @param array $data
     * @return ResponseTransactionDTO
     */
    public static function fromArray(array $data): ResponseTransactionDTO
    {
        return new self(
            $data['id'] ?? '',
            $data['user_id'] ?? 0,
            $data['order_id'] ?? 0,
            $data['note'] ?? '',
            $data['amount'] ?? 0,
            $data['status'] ?? 0,
            $data['data'] ?? '',
            $data['completed_time'] ?? 0
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {

        return [
            'id' => $this->getId(),
            'user_id' => $this->getUserId(),
            'order_id' => $this->getOrderId(),
            'note' => $this->getNote(),
            'amount' => $this->getAmount(),
            'status' => $this->getStatus(),
            'data' => $this->getData(),
            'completed_time' => $this->getCompletedTime(),
        ];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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
    public function getOrderId(): int
    {
        return $this->order_id;
    }

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
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
    public function getCompletedTime(): int
    {
        return $this->completed_time;
    }
}