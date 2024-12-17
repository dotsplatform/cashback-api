<?php
/**
 * Description of StoreOrdersSettingsDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request\UserGroups;

use Dots\Data\DTO;
use Dotsplatform\CashbackApi\DTO\UserGroups\UserGroupOrdersSettingsDTO;

class StoreUserGroupOrdersSettingsDTO extends DTO
{
    protected UserGroupOrdersSettingsDTO $settings;

    public function getSettings(): UserGroupOrdersSettingsDTO
    {
        return $this->settings;
    }
}