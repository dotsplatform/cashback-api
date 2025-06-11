<?php
/**
 * Description of StoreNotificationsSettingsDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request\Accounts;

use Dotsplatform\CashbackApi\DTO\Accounts\NotificationsSettingsDTO;

class StoreNotificationsSettingsDTO
{
    protected function __construct(
        private readonly NotificationsSettingsDTO $settings,
    ){
    }

    public static function fromArray(array $data): static
    {
        return new static(
            NotificationsSettingsDTO::fromArray($data['settings'] ?? []),
        );
    }

    public function toArray(): array
    {
        return [
            'settings' => $this->getSettings()->toArray(),
        ];
    }

    public function getSettings(): NotificationsSettingsDTO
    {
        return $this->settings;
    }
}