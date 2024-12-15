<?php
/**
 * Description of SyrveOrganizationOptionsList.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response\Syrve\Organizations;


use Illuminate\Support\Collection;

/**
 * @extends Collection<int, SyrveOrganizationOptionsListItem>
 */
class SyrveOrganizationOptionsList extends Collection
{
    public static function fromArray(array $data): static
    {
        return new static(array_map(fn(array $item) => SyrveOrganizationOptionsListItem::fromArray($item), $data));
    }

}