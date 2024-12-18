<?php
/**
 * Description of StoreUserGroupDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request\UserGroups;

use Dots\Data\DTO;

class StoreUserGroupDTO extends DTO
{
    protected int $accountId;

    protected string $name;

    protected ?int $priority = null;

    protected ?int $transitionAmount = null;

    public function getAccountId(): int
    {
        return $this->accountId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function getTransitionAmount(): ?int
    {
        return $this->transitionAmount;
    }
}
