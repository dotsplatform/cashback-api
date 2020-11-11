<?php
/**
 * Description of StoreTransactionDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;


class StoreTransactionDTO
{
    private string $token;
    private int $amount;
    private string $note;

    protected function __construct(
        string $token,
        int $amount,
        string $note
    )
    {
        $this->token = $token;
        $this->amount = $amount;
        $this->note = $note;
    }

    public static function fromArray(array $data): self
    {
        return new static(
            $data['token'] ?? '',
            $data['amount'] ?? 0,
            $data['note'] ?? ''
        );
    }

    public function toArray(): array
    {
        return [
            'token' => $this->getToken(),
            'amount' => $this->getAmount(),
            'note' => $this->getNote(),
        ];
    }

    public function getToken(): string
    {
        return $this->token;
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