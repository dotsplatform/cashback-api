<?php
/**
 * Description of StoreTransactionDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request\Transactions;


use Dotsplatform\CashbackApi\DTO\Request\Transactions\Consts\TransactionSource;
use Illuminate\Contracts\Support\Arrayable;

class StoreTransactionDTO implements Arrayable
{
    protected function __construct(
        private ?string $userToken,
        private ?string $userPhone,
        private int $amount,
        private string $note,
        private int $type,
        private ?string $createdByUserToken,
        private TransactionSource $transactionSource,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['userToken'] ?? null,
            $data['userPhone'] ?? null,
            $data['amount'] ?? 0,
            $data['note'] ?? '',
            $data['type'] ?? 0,
            $data['createdByUserToken'] ?? null,
                TransactionSource::tryFrom($data['transactionSource'] ?? TransactionSource::DOTS->value)
                ?? TransactionSource::DOTS,

        );
    }

    public function toArray(): array
    {
        return [
            'userToken' => $this->getUserToken(),
            'userPhone' => $this->getUserPhone(),
            'amount' => $this->getAmount(),
            'note' => $this->getNote(),
            'type' => $this->getType(),
            'createdByUserToken' => $this->getCreatedByUserToken(),
            'transactionSource' => $this->getTransactionSource()->value,
        ];
    }

    public function getUserToken(): ?string
    {
        return $this->userToken;
    }

    public function getUserPhone(): ?string
    {
        return $this->userPhone;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getNote(): string
    {
        return $this->note;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getCreatedByUserToken(): ?string
    {
        return $this->createdByUserToken;
    }

    public function getTransactionSource(): TransactionSource
    {
        return $this->transactionSource;
    }
}