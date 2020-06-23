<?php
/**
 * Description of ResponseTransactionDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace App\DTO\Response;


class ResponseTransactionDTO
{
    private string $id;
    private int $user_id;
    private int $order_id;
    private string $note;
    private int $amount;
    private int $status;
    private ?array $data;
    private int $completed_time;

    private function __construct(
        string $id,
        int $user_id,
        int $order_id,
        string $note,
        int $amount,
        int $status,
        ?array $data,
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

    public static function fromArray(array $data): ResponseTransactionDTO
    {
        return new self(
            $data['id'] ?? '',
            $data['user_id'] ?? 0,
            $data['order_id'] ?? 0,
            $data['note'] ?? '',
            $data['amount'] ?? 0,
            $data['status'] ?? 0,
            $data['data'] ?? null,
            $data['completed_time'] ?? 0
        );
    }

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

    public function getId(): string
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function getOrderId(): int
    {
        return $this->order_id;
    }

    public function getNote(): string
    {
        return $this->note;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getData(): ?array
    {
        return $this->data;
    }

    public function getCompletedTime(): int
    {
        return $this->completed_time;
    }
}