<?php
/**
 * Description of ResponseTransactionWithOrderDataDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Igor Abdrazakov <igor@mister.am>
 */

namespace Dotsplatform\CashbackApi\DTO\Response;


class ResponseTransactionWithOrderDataDTO extends ResponseTransactionDTO
{
    protected function __construct(
        string $id,
        int $user_id,
        int $order_id,
        string $note,
        int $amount,
        int $status,
        ?array $data,
        int $completed_time,
        int $created_at_time,
        private ?ResponseOrderDTO $order,
    )
    {
        parent::__construct($id, $user_id, $order_id, $note, $amount, $status, $data, $completed_time, $created_at_time);
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['id'] ?? '',
            $data['user_id'] ?? 0,
            $data['order_id'] ?? 0,
            $data['note'] ?? '',
            $data['amount'] ?? 0,
            $data['status'] ?? 0,
            $data['data'] ?? null,
            $data['completed_time'] ?? 0,
            $data['created_at_time'] ?? 0,
            isset($data['order']) ? ResponseOrderDTO::fromArray($data['order']) : null,
        );
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'order' => $this->getOrder()?->toArray(),
        ]);
    }

    public function getOrder(): ?ResponseOrderDTO
    {
        return $this->order;
    }
}