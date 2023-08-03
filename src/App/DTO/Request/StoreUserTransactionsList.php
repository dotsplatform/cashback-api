<?php
/**
 * Description of StoreUserTransactions.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;


use Illuminate\Support\Collection;

class StoreUserTransactionsList extends Collection
{
    public static function fromArray(array $data): static
    {
        return new static(array_map(
                fn(array $item) => StoreTransactionDTO::fromArray($item),
                $data,
            )
        );
    }
}