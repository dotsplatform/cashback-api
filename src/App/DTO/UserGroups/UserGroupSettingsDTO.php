<?php
/**
 * Description of SettingsDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\UserGroups;

use Dots\Data\DTO;

class UserGroupSettingsDTO extends DTO
{
    protected UserGroupOrdersSettingsDTO $ordersSettings;

    public static function fromArray(array $data): static
    {
        $data['ordersSettings'] = UserGroupOrdersSettingsDTO::fromArray($data['ordersSettings'] ?? []);

        return parent::fromArray($data);
    }

    public function getOrdersSettings(): UserGroupOrdersSettingsDTO
    {
        return $this->ordersSettings;
    }
}