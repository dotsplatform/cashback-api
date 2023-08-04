<?php
/**
 * Description of StoreTransactionDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;


use Illuminate\Contracts\Support\Arrayable;

class StoreTransactionDTO implements Arrayable
{
    protected function __construct(
        private ?string $userToken,
        private int $amount,
        private string $note,
    )
    {
    }

    public static function fromArray(array $data): static
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