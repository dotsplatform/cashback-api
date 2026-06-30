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

    protected ?array $titleTranslations = null;

    protected ?int $transitionAmount = null;

    protected ?array $benefitsDescriptionTranslations = null;

    protected ?array $levelProgressTextTranslations = null;

    public function getAccountId(): int
    {
        return $this->accountId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTitleTranslations(): ?array
    {
        return $this->titleTranslations;
    }

    public function getTransitionAmount(): ?int
    {
        return $this->transitionAmount;
    }

    public function getBenefitsDescriptionTranslations(): ?array
    {
        return $this->benefitsDescriptionTranslations;
    }

    public function getLevelProgressTextTranslations(): ?array
    {
        return $this->levelProgressTextTranslations;
    }
}
