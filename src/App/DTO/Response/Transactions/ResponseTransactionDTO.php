<?php
/**
 * Description of ResponseTransactionDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response\Transactions;

class ResponseTransactionDTO
{
    protected function __construct(
        private string $id,
        private int $user_id,
        private ?string $created_by_user_token,
        private ?int $order_id,
        private string $note,
        private int $amount,
        private int $status,
        private int $type,
        private ?array $data,
        private int $completed_time,
        private int $created_at_time,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['id'] ?? '',
            $data['user_id'] ?? 0,
            $data['created_by_user_token'] ?? null,
            $data['order_id'] ?? null,
            $data['note'] ?? '',
            $data['amount'] ?? 0,
            $data['status'] ?? 0,
            $data['type'] ?? 0,
            $data['data'] ?? null,
            $data['completed_time'] ?? 0,
            $data['created_at_time'] ?? 0,
        );
    }

    public function toArray(): array
    {

        return [
            'id' => $this->getId(),
            'user_id' => $this->getUserId(),
            'created_by_user_token' => $this->getCreatedByUserToken(),
            'order_id' => $this->getOrderId(),
            'note' => $this->getNote(),
            'amount' => $this->getAmount(),
            'status' => $this->getStatus(),
            'type' => $this->type,
            'data' => $this->getData(),
            'completed_time' => $this->getCompletedTime(),
            'created_at_time' => $this->getCreatedAtTime(),
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

    public function getCreatedByUserToken(): ?string
    {
        return $this->created_by_user_token;
    }

    public function getOrderId(): ?int
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

    public function getType(): int
    {
        return $this->type;
    }

    public function getData(): ?array
    {
        return $this->data;
    }

    public function getCompletedTime(): int
    {
        return $this->completed_time;
    }

    public function getCreatedAtTime(): int
    {
        return $this->created_at_time;
    }
}