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
        private ?string $idempotencyKey = null,
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
            $data['idempotencyKey'] ?? null,
        );
    }

    public function toArray(): array
    {
        $data = [
            'userToken' => $this->getUserToken(),
            'userPhone' => $this->getUserPhone(),
            'amount' => $this->getAmount(),
            'note' => $this->getNote(),
            'type' => $this->getType(),
            'createdByUserToken' => $this->getCreatedByUserToken(),
            'transactionSource' => $this->getTransactionSource()->value,
        ];
        // Sent only when set, so requests without a key stay exactly as before.
        if ($this->getIdempotencyKey() !== null) {
            $data['idempotencyKey'] = $this->getIdempotencyKey();
        }

        return $data;
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

    /**
     * Unique per account (max 64 chars): a repeated key returns the original transaction and credits nothing.
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }
}
