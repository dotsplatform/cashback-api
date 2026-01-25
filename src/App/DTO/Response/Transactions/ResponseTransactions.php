<?php
/**
 * Description of ResponseTransactions.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response\Transactions;


use Illuminate\Support\Collection;

/**
 * @extends Collection<int, ResponseTransactionDTO>
 */
class ResponseTransactions extends Collection
{
    public static function fromArray(array $data): static
    {
        return new static(array_map(fn(array $item) => ResponseTransactionDTO::fromArray($item), $data));
    }
}