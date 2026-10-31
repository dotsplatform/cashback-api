<?php
/**
 * Description of StoredTransactionResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response\Transactions;

/**
 * The outcome of one transaction sent with an idempotency key.
 * transactionId is null when the service had nothing to create (e.g. a relative amount resolved to 0).
 * isDuplicate is true when the key was already used: the original transaction id is returned and nothing was created.
 */
class StoredTransactionResponseDTO
{
    protected function __construct(
        private string $idempotencyKey,
        private ?string $transactionId,
        private bool $isDuplicate,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['idempotencyKey'] ?? '',
            $data['transactionId'] ?? null,
            $data['isDuplicate'] ?? false,
        );
    }

    public function toArray(): array
    {
        return [
            'idempotencyKey' => $this->getIdempotencyKey(),
            'transactionId' => $this->getTransactionId(),
            'isDuplicate' => $this->isDuplicate(),
        ];
    }

    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function isDuplicate(): bool
    {
        return $this->isDuplicate;
    }
}
