<?php
/**
 * Description of StoredTransactionsResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response\Transactions;

use Illuminate\Support\Collection;

/**
 * One entry per transaction sent with an idempotency key; transactions without a key are not listed
 * (the service stores them in its queue, so their ids are not known yet).
 *
 * @extends Collection<int, StoredTransactionResponseDTO>
 */
class StoredTransactionsResponse extends Collection
{
    public static function fromArray(array $data): static
    {
        return new static(array_map(fn(array $item) => StoredTransactionResponseDTO::fromArray($item), $data));
    }

    public function findByIdempotencyKey(string $idempotencyKey): ?StoredTransactionResponseDTO
    {
        foreach ($this->all() as $storedTransaction) {
            if ($storedTransaction->getIdempotencyKey() === $idempotencyKey) {
                return $storedTransaction;
            }
        }

        return null;
    }
}
