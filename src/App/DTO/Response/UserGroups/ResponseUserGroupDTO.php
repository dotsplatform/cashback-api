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

    protected ?array $title = null;

    protected ?int $transitionAmount;

    protected ?array $benefitsDescription = null;

    protected ?array $levelProgressText = null;

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
        return $this->title;
    }

    public function getTransitionAmount(): ?int
    {
        return $this->transitionAmount;
    }

    public function getBenefitsDescriptionTranslations(): ?array
    {
        return $this->benefitsDescription;
    }

    public function getLevelProgressTextTranslations(): ?array
    {
        return $this->levelProgressText;
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
