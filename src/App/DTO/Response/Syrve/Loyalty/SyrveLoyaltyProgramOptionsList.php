<?php
/**
 * Description of SyrveLoyaltyProgramOptionsList.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response\Syrve\Loyalty;


use Illuminate\Support\Collection;

/**
 * @extends Collection<int, SyrveLoyaltyProgramOptionsListItem>
 */
class SyrveLoyaltyProgramOptionsList extends Collection
{
    public static function fromArray(array $data): static
    {
        return new static(array_map(fn(array $item) => SyrveLoyaltyProgramOptionsListItem::fromArray($item), $data));
    }
}
