<?php
/**
 * Description of StoreOrdersSettingsDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dotsplatform\CashbackApi\DTO\Request\Accounts;

use Dotsplatform\CashbackApi\DTO\Accounts\FirstOrdersSettingsDTO;

class StoreFirstOrdersSettingsDTO
{
    protected function __construct(
        private readonly FirstOrdersSettingsDTO $settings,
    )
    {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            FirstOrdersSettingsDTO::fromArray($data['settings'] ?? []),
        );
    }

    public function toArray(): array
    {
        return [
            'settings' => $this->getSettings()->toArray(),
        ];
    }

    public function getSettings(): FirstOrdersSettingsDTO
    {
        return $this->settings;
    }
}