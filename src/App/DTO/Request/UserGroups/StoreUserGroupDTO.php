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

    protected ?int $transitionAmount = null;

    /** @var array<string, string>|null map of language code => description text */
    protected ?array $benefitsDescription = null;

    public function getAccountId(): int
    {
        return $this->accountId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTransitionAmount(): ?int
    {
        return $this->transitionAmount;
    }

    /**
     * @return array<string, string>|null
     */
    public function getBenefitsDescription(): ?array
    {
        return $this->benefitsDescription;
    }
}
