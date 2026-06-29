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

    protected ?array $title = null;

    protected ?int $transitionAmount = null;

    protected ?array $benefitsDescription = null;

    protected ?array $levelProgressCaption = null;

    public function getAccountId(): int
    {
        return $this->accountId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTitle(): ?array
    {
        return $this->title;
    }

    public function getTransitionAmount(): ?int
    {
        return $this->transitionAmount;
    }

    public function getBenefitsDescription(): ?array
    {
        return $this->benefitsDescription;
    }

    public function getLevelProgressCaption(): ?array
    {
        return $this->levelProgressCaption;
    }
}
