<?php
/**
 * Description of StoreUserGroupDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request\Users;

use Dots\Data\DTO;

class UpdateUserDTO extends DTO
{
    protected string $userGroupId;

    protected int $userGroupAutoChange;

    protected ?int $cashbackExpirationTime = null;

    public function getUserGroupId(): string
    {
        return $this->userGroupId;
    }

    public function getUserGroupAutoChange(): int
    {
        return $this->userGroupAutoChange;
    }

    public function getCashbackExpirationTime(): ?int
    {
        return $this->cashbackExpirationTime;
    }
}
