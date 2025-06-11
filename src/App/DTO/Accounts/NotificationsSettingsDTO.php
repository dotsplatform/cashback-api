<?php
/**
 * Description of NotificationsSettingsDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Accounts;

class NotificationsSettingsDTO
{
    protected function __construct(
        private array $cashbackExpirationSMSNotifyTimes,
        private array $cashbackExpirationPushNotifyTimes,
        private ?string $cashbackExpirationSMSPeriod,
        private ?string $cashbackExpirationPushPeriod,
        private array $cashbackExpirationNotifyMethods,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['cashbackExpirationSMSNotifyTimes'] ?? [],
            $data['cashbackExpirationPushNotifyTimes'] ?? [],
            $data['cashbackExpirationSMSPeriod'] ?? null,
            $data['cashbackExpirationPushPeriod'] ?? null,
            $data['cashbackExpirationNotifyMethods'] ?? [],
        );
    }

    public function toArray(): array
    {
        return [
            'cashbackExpirationSMSNotifyTimes' => $this->getCashbackExpirationSMSNotifyTimes(),
            'cashbackExpirationPushNotifyTimes' => $this->getCashbackExpirationPushNotifyTimes(),
            'cashbackExpirationSMSPeriod' => $this->getCashbackExpirationSMSPeriod(),
            'cashbackExpirationPushPeriod' => $this->getCashbackExpirationPushPeriod(),
            'cashbackExpirationNotifyMethods' => $this->getCashbackExpirationNotifyMethods(),
        ];
    }

    public function getCashbackExpirationSMSNotifyTimes(): array
    {
        return $this->cashbackExpirationSMSNotifyTimes;
    }

    public function getCashbackExpirationPushNotifyTimes(): array
    {
        return $this->cashbackExpirationPushNotifyTimes;
    }

    public function getCashbackExpirationSMSPeriod(): ?string
    {
        return $this->cashbackExpirationSMSPeriod;
    }

    public function getCashbackExpirationPushPeriod(): ?string
    {
        return $this->cashbackExpirationPushPeriod;
    }

    public function getCashbackExpirationNotifyMethods(): array
    {
        return $this->cashbackExpirationNotifyMethods;
    }
}