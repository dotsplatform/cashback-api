<?php
/**
 * Description of StoreOrdersSettingsDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request;

use Dotsplatform\CashbackApi\DTO\OrdersSettingsDTO;

class StoreOrdersSettingsDTO
{
    protected function __construct(
        private readonly OrdersSettingsDTO $settings,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            OrdersSettingsDTO::fromArray($data['settings'] ?? []),
        );
    }

    public function toArray(): array
    {
        return [
            'settings' => $this->getSettings()->toArray(),
        ];
    }

    public function getSettings(): OrdersSettingsDTO
    {
        return $this->settings;
    }
}