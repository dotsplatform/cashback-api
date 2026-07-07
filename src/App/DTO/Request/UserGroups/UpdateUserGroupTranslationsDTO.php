<?php
/**
 * Description of UpdateUserGroupTranslationsDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request\UserGroups;

use Dots\Data\DTO;

class UpdateUserGroupTranslationsDTO extends DTO
{
    protected ?array $titleTranslations = null;

    protected ?array $benefitsDescriptionTranslations = null;

    protected ?array $levelProgressTextTranslations = null;

    protected ?array $highlightTranslations = null;

    protected ?array $lockedDescriptionTranslations = null;

    public function getTitleTranslations(): ?array
    {
        return $this->titleTranslations;
    }

    public function getBenefitsDescriptionTranslations(): ?array
    {
        return $this->benefitsDescriptionTranslations;
    }

    public function getLevelProgressTextTranslations(): ?array
    {
        return $this->levelProgressTextTranslations;
    }

    public function getHighlightTranslations(): ?array
    {
        return $this->highlightTranslations;
    }

    public function getLockedDescriptionTranslations(): ?array
    {
        return $this->lockedDescriptionTranslations;
    }
}
