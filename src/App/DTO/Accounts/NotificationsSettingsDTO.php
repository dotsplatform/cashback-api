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
        private ?string $cashbackExpirationNotifyPeriod,
        private array $cashbackExpirationNotifyMethods,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['cashbackExpirationSMSNotifyTimes'] ?? [],
            $data['cashbackExpirationPushNotifyTimes'] ?? [],
            $data['cashbackExpirationNotifyPeriod'] ?? null,
            $data['cashbackExpirationNotifyMethods'] ?? [],
        );
    }

    public function toArray(): array
    {
        return [
            'cashbackExpirationSMSNotifyTimes' => $this->getCashbackExpirationSMSNotifyTimes(),
            'cashbackExpirationPushNotifyTimes' => $this->getCashbackExpirationPushNotifyTimes(),
            'cashbackExpirationNotifyPeriod' => $this->getCashbackExpirationNotifyPeriod(),
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

    public function getCashbackExpirationNotifyPeriod(): ?string
    {
        return $this->cashbackExpirationNotifyPeriod;
    }

    public function getCashbackExpirationNotifyMethods(): array
    {
        return $this->cashbackExpirationNotifyMethods;
    }
}