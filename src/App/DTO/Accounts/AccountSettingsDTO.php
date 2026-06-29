<?php
/**
 * Description of SettingsDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Accounts;

class AccountSettingsDTO
{
    protected function __construct(
        private float $minChargeAmount,
        private string $callbackUrl,
        private ?float $maxChargeAmount,
        private ?float $maxChargePercent,
        private bool $roundCashbackDown,
        private ?string $defaultUserGroupId,
        private bool $groupsTransitionAvailable,
        private ?int $cashbackExpirationInterval,
        private ?string $lang,
        private ?string $cashbackExpirationPeriod,
        private bool $userGroupsVisible = false,
        private array $levelMaxText = [],
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['minChargeAmount'] ?? 0,
            $data['callbackUrl'] ?? '',
            $data['maxChargeAmount'] ?? null,
            $data['maxChargePercent'] ?? null,
            $data['roundCashbackDown'] ?? false,
            $data['defaultUserGroupId'] ?? null,
            $data['groupsTransitionAvailable'] ?? false,
            $data['cashbackExpirationInterval'] ?? null,
            $data['lang'] ?? null,
            $data['cashbackExpirationPeriod'] ?? null,
            $data['userGroupsVisible'] ?? false,
            $data['levelMaxText'] ?? [],
        );
    }

    public function toArray(): array
    {
        return [
            'minChargeAmount' => $this->getMinChargeAmount(),
            'callbackUrl' => $this->getCallbackUrl(),
            'maxChargeAmount' => $this->getMaxChargeAmount(),
            'maxChargePercent' => $this->getMaxChargePercent(),
            'roundCashbackDown' => $this->isRoundCashbackDown(),
            'defaultUserGroupId' => $this->getDefaultUserGroupId(),
            'groupsTransitionAvailable' => $this->isGroupsTransitionAvailable(),
            'cashbackExpirationInterval' => $this->getCashbackExpirationInterval(),
            'lang' => $this->getLang(),
            'cashbackExpirationPeriod' => $this->getCashbackExpirationPeriod(),
            'userGroupsVisible' => $this->isUserGroupsVisible(),
            'levelMaxText' => $this->getLevelMaxText(),
        ];
    }

    public function getMinChargeAmount(): float
    {
        return $this->minChargeAmount;
    }

    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    public function getMaxChargeAmount(): ?float
    {
        return $this->maxChargeAmount;
    }

    public function getMaxChargePercent(): ?float
    {
        return $this->maxChargePercent;
    }

    public function isRoundCashbackDown(): bool
    {
        return $this->roundCashbackDown;
    }

    public function getDefaultUserGroupId(): ?string
    {
        return $this->defaultUserGroupId;
    }

    public function isGroupsTransitionAvailable(): bool
    {
        return $this->groupsTransitionAvailable;
    }

    public function isUserGroupsVisible(): bool
    {
        return $this->userGroupsVisible;
    }

    /**
     * @return array<string, string>
     */
    public function getLevelMaxText(): array
    {
        return $this->levelMaxText;
    }

    public function getCashbackExpirationInterval(): ?int
    {
        return $this->cashbackExpirationInterval;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function getCashbackExpirationPeriod(): ?string
    {
        return $this->cashbackExpirationPeriod;
    }
}