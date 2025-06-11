<?php
/**
 * Description of SettingsDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Accounts;

class SettingsDTO
{
    protected function __construct(
        private readonly AccountSettingsDTO $accountSettings,
        private readonly FirstOrdersSettingsDTO $firstOrdersSettings,
        private readonly ReviewsSettingsDTO $reviewsSettings,
        private readonly NotificationsSettingsDTO $notificationsSettingsDTO,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            AccountSettingsDTO::fromArray($data['accountSettings'] ?? []),
            FirstOrdersSettingsDTO::fromArray($data['firstOrdersSettings'] ?? []),
            ReviewsSettingsDTO::fromArray($data['reviewsSettings'] ?? []),
            NotificationsSettingsDTO::fromArray($data['notificationsSettings'] ?? []),
        );
    }

    public function toArray(): array
    {
        return [
            'accountSettings' => $this->getAccountSettings()->toArray(),
            'firstOrdersSettings' => $this->getFirstOrdersSettings()->toArray(),
            'reviewSettings' => $this->getReviewsSettings()->toArray(),
            'notificationsSettings' => $this->getNotificationsSettings()->toArray(),
        ];
    }

    public function getAccountSettings(): AccountSettingsDTO
    {
        return $this->accountSettings;
    }

    public function getFirstOrdersSettings(): FirstOrdersSettingsDTO
    {
        return $this->firstOrdersSettings;
    }

    public function getReviewsSettings(): ReviewsSettingsDTO
    {
        return $this->reviewsSettings;
    }

    public function getNotificationsSettings(): NotificationsSettingsDTO
    {
        return $this->notificationsSettingsDTO;
    }
}