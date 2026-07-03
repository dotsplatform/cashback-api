<?php
/**
 * Description of ResponseUserDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Response\UserGroups;

use Dots\Data\DTO;
use Dotsplatform\CashbackApi\DTO\UserGroups\UserGroupSettingsDTO;

class ResponseUserGroupDTO extends DTO
{
    protected string $id;

    protected int $account_id;

    protected string $name;

    protected ?array $titleTranslations = null;

    protected ?int $transitionAmount;

    protected ?array $benefitsDescriptionTranslations = null;

    protected ?array $levelProgressTextTranslations = null;

    protected ?array $highlightTranslations = null;

    protected bool $visibleInLevels = true;

    protected int $usersCount = 0;

    protected UserGroupSettingsDTO $settings;

    public static function fromArray(array $data): static
    {
        $data['settings'] = UserGroupSettingsDTO::fromArray($data['settings'] ?? []);

        return parent::fromArray($data);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAccountId(): int
    {
        return $this->account_id;
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

    public function getHighlightTranslations(): ?array
    {
        return $this->highlightTranslations;
    }

    public function getTitle(string $lang): ?string
    {
        return $this->titleTranslations[$lang] ?? null;
    }

    public function getBenefitsDescription(string $lang): ?string
    {
        return $this->benefitsDescriptionTranslations[$lang] ?? null;
    }

    public function getLevelProgressText(string $lang): ?string
    {
        return $this->levelProgressTextTranslations[$lang] ?? null;
    }

    public function getHighlight(string $lang): ?string
    {
        return $this->highlightTranslations[$lang] ?? null;
    }

    public function isVisibleInLevels(): bool
    {
        return $this->visibleInLevels;
    }

    public function getUsersCount(): int
    {
        return $this->usersCount;
    }

    public function getSettings(): UserGroupSettingsDTO
    {
        return $this->settings;
    }
}
