<?php
/**
 * Description of StoreTransactionDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;


class StoreTransactionDTO
{
    private ?string $userToken;
    private int $amount;
    private string $note;

    protected function __construct(
        ?string $userToken,
        int $amount,
        string $note
    )
    {
        $this->userToken = $userToken;
        $this->amount = $amount;
        $this->note = $note;
    }

    public static function fromArray(array $data): self
    {
        return new static(
            $data['userToken'] ?? null,
            $data['amount'] ?? 0,
            $data['note'] ?? ''
        );
    }

    public function toArray(): array
    {
        return [
            'userToken' => $this->getUserToken(),
            'amount' => $this->getAmount(),
            'note' => $this->getNote(),
        ];
    }

    public function getUserToken(): ?string
    {
        return $this->userToken;
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