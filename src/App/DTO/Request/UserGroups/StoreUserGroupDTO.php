<?php
/**
 * Description of UserGroupDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request\UserGroups;

use Dots\Data\DTO;

class StoreUserGroupDTO extends DTO
{
    protected int $accountId;

    protected string $name;

    protected ?array $settings;

    public function getName(): string
    {
        return $this->name;
    }

    public function getAccountId(): int
    {
        return $this->accountId;
    }

    public function getSettings(): ?array
    {
        return $this->settings;
    }
}
