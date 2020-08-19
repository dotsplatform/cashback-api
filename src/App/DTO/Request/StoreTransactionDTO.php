<?php
/**
 * Description of StoreTransactionDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;


class StoreTransactionDTO
{
    private string $phone;
    private int $amount;
    private string $note;

    protected function __construct(
        string $phone,
        int $amount,
        string $note
    )
    {
        $this->phone = $phone;
        $this->amount = $amount;
        $this->note = $note;
    }

    public static function fromArray(array $data): self
    {
        return new static(
            $data['phone'] ?? '',
            $data['amount'] ?? 0,
            $data['note'] ?? ''
        );
    }

    public function toArray(): array
    {
        return [
            'phone' => $this->getPhone(),
            'amount' => $this->getAmount(),
            'note' => $this->getNote(),
        ];
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getNote(): string
    {
        return $this->note;
    }
}