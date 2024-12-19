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
    protected int $availableBalance;

    protected int $balance;

    protected int $receivingAmount;

    protected int $heldAmount;

    protected string $userGroupId;

    protected int $userGroupAutoChange;

    protected ?int $cashbackExpirationTime = null;

    public function getAvailableBalance(): int
    {
        return $this->availableBalance;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function getReceivingAmount(): int
    {
        return $this->receivingAmount;
    }

    public function getHeldAmount(): int
    {
        return $this->heldAmount;
    }

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
