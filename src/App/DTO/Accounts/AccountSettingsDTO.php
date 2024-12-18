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
        private ?int $cashbackExpirationInterval,
        private array $cashbackExpirationNotifyTimes,
        private ?string $lang,
        private ?string $cashbackExpirationPeriod,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['minChargeAmount'] ?? 0,
            $data['callbackUrl'] ?? '',
            $data['maxChargeAmount'] ?? null,
            $data['maxChargePercent'] ?? null,
            $data['cashbackExpirationInterval'] ?? null,
            $data['cashbackExpirationNotifyTimes'] ?? [],
            $data['lang'] ?? null,
            $data['cashbackExpirationPeriod'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'minChargeAmount' => $this->getMinChargeAmount(),
            'callbackUrl' => $this->getCallbackUrl(),
            'maxChargeAmount' => $this->getMaxChargeAmount(),
            'maxChargePercent' => $this->getMaxChargePercent(),
            'cashbackExpirationInterval' => $this->getCashbackExpirationInterval(),
            'cashbackExpirationNotifyTimes' => $this->getCashbackExpirationNotifyTimes(),
            'lang' => $this->getLang(),
            'cashbackExpirationPeriod' => $this->getCashbackExpirationPeriod(),
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

    public function getCashbackExpirationInterval(): ?int
    {
        return $this->cashbackExpirationInterval;
    }

    public function getCashbackExpirationNotifyTimes(): array
    {
        return $this->cashbackExpirationNotifyTimes;
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